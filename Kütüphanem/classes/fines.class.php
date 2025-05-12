<?php 
require_once 'db.class.php'; 

class Fines extends DB {

    private $db;
    // Ceza puanı ekleme işlemi
    public function addFine($loan_id) {
        $stmt = $this->connect()->prepare("SELECT fine_amount, paid_status FROM fines WHERE loan_id = :loan_id");
        $stmt->execute(['loan_id' => $loan_id]);
        $fine = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // loan'a bağlı user_id bulunuyor
        $stmtUser = $this->connect()->prepare("SELECT user_id FROM loans WHERE id = :loan_id");
        $stmtUser->execute(['loan_id' => $loan_id]);
        $user_id = $stmtUser->fetchColumn();
    
        if ($fine) {
            if ($fine['fine_amount'] >= 100) {
                return "Bu kullanıcı 30 gün boyunca kitap alamaz.";
            } else {
                $new_fine = $fine['fine_amount'] + 50;
                $stmt = $this->connect()->prepare("UPDATE fines SET fine_amount = :fine_amount WHERE loan_id = :loan_id");
                $stmt->execute([
                    'fine_amount' => $new_fine,
                    'loan_id' => $loan_id
                ]);
            }
        } else {
            $stmt = $this->connect()->prepare("INSERT INTO fines (loan_id, fine_amount, paid_status) VALUES (:loan_id, 10, 0)");
            $stmt->execute(['loan_id' => $loan_id]);
        }
    
        // Ceza güncellendikten sonra penalty_status kontrolü
        $this->updatePenaltyStatus($user_id);
    
        return "Ceza başarıyla eklendi veya artırıldı.";
    }
    

    public function getPenalizedUserCount() {
        $sql = "SELECT COUNT(*) FROM users WHERE penalty_status = 1"; // Adjust according to your database schema
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getTotalFineByUser($user_id) {
        $stmt = $this->connect()->prepare("
            SELECT SUM(f.fine_amount) as total_fine 
            FROM fines f
            INNER JOIN loans l ON f.loan_id = l.id
            WHERE l.user_id = :user_id
        ");
        $stmt->execute(['user_id' => $user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_fine'] ?? 0;
    }

    public function updatePenaltyStatus($user_id) {
        $stmt = $this->connect()->prepare("
            SELECT SUM(f.fine_amount) as total_fine
            FROM fines f
            INNER JOIN loans l ON f.loan_id = l.id
            WHERE l.user_id = :user_id
        ");
        $stmt->execute(['user_id' => $user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalFine = $row['total_fine'] ?? 0;
    
        $penaltyStatus = ($totalFine >= 100) ? 1 : 0;
    
        $update = $this->connect()->prepare("
            UPDATE users SET penalty_status = :status WHERE id = :user_id
        ");
        $update->execute([
            'status' => $penaltyStatus,
            'user_id' => $user_id
        ]);
    }

    public function resetFinesByUser($userId) {
        // Önce bu kullanıcıya ait loan_id'leri al
        $stmt = $this->connect()->prepare("SELECT id FROM loans WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        $loanIds = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
        // Eğer loan_id yoksa, işlem yapma
        if (empty($loanIds)) {
            return;
        }
    
        // loan_id'lere göre fines tablosundan silme işlemi
        $inQuery = implode(',', array_fill(0, count($loanIds), '?'));
        $delete = $this->connect()->prepare("DELETE FROM fines WHERE loan_id IN ($inQuery)");
        $delete->execute($loanIds);
    }
    
    
    
    
}
?>
