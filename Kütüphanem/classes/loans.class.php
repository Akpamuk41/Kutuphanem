<?php 
require_once 'db.class.php'; 

class Loans extends DB {
    private $table;

    public function __construct($table = 'loans') {
        $this->table = $table;
    }

    // Belirli bir ödünç işlemini ID'ye göre getirir
    public function getLoanById(int $loanId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $loanId]);
        return $stmt->fetch();
    }

    // Yeni ödünç işlemi ekler
    public function createLoan($user_id, $book_id, $loan_date, $due_date) {
        $sql = "INSERT INTO loans (user_id, book_id, loan_date, due_date, status) 
                VALUES (:user_id, :book_id, :loan_date, :due_date, 'borrowed')";
        
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'user_id'   => $user_id,
            'book_id'   => $book_id,
            'loan_date' => $loan_date,
            'due_date'  => $due_date
        ]);
    }

    // Kullanıcının ödünç aldığı kitapları getirir
    public function getLoansByUser($user_id) {
        $sql = "SELECT l.id, b.title, l.loan_date, l.due_date, l.status 
                FROM loans l
                INNER JOIN books b ON l.book_id = b.id
                WHERE l.user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Kitap iade işlemi
    public function returnLoan($loan_id, $return_date) {
        $sql = "UPDATE " . $this->table . " SET return_date=:return_date, status='returned' WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $loan_id,
            'return_date' => $return_date
        ]);
    }

    // Kitap hâlâ ödünçte mi kontrol eder
    public function isBookOnLoan($book_id) {
        $sql = "SELECT COUNT(*) FROM " . $this->table . " 
                WHERE book_id = :book_id AND status = 'active'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetchColumn() > 0;
    }



    public function getLoansByBookId($book_id) {
        $sql = "SELECT loans.*, users.name 
                FROM loans 
                LEFT JOIN users ON loans.user_id = users.id 
                WHERE loans.book_id = :book_id 
                ORDER BY loans.id DESC 
                LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    

    public function getAllLoansByBookId($book_id) {
        $sql = "SELECT loans.*, users.name, users.id as user_id 
                FROM loans 
                LEFT JOIN users ON loans.user_id = users.id 
                WHERE loans.book_id = :book_id 
                ORDER BY loans.loan_date DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    
    
    
    
    

    

}
?>
