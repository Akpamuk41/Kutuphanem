<?php 
class Users extends DB {
    private $table;

    public function __construct($table = 'users') {
        $this->table = $table;
    }

    // Kullanıcıyı ID'ye göre getirir
    public function getUserById(int $userId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch() ?: null; // Kullanıcı bulunamazsa null döndür
    }

    // Yeni bir kullanıcı ekler
    public function createUser($name, $email, $phone, $address) {
        $sql = "INSERT INTO " . $this->table . " (name, email, phone, address, created_at) 
                VALUES (:name, :email, :phone, :address, NOW())";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        return $stmt->execute([
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'address' => $address
        ]);
    }

    // Tüm kullanıcıları getirir
    public function getUsers() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Kullanıcıyı siler
    public function deleteUser($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0; // Silinen satır sayısını kontrol et
    }

    // Kullanıcı bilgilerini günceller
    public function editUser($id, $name, $email, $phone, $address) {
        $sql = "UPDATE " . $this->table . " SET 
                name=:name, 
                email=:email, 
                phone=:phone, 
                address=:address 
                WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        $stmt->execute([
            'id'      => $id,
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'address' => $address
        ]);
        return $stmt->rowCount() > 0; // Güncellenen satır var mı kontrol et
    }

    public function getUserCount() {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->connect()->query($sql);  // connect() kullanılıyor
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    // Penalized kullanıcı sayısını getirir
    public function getPenalizedUserCount() {
        $sql = "SELECT COUNT(*) FROM " . $this->table . " WHERE penalty_status = 1";
        $stmt = $this->connect()->prepare($sql);  // connect() kullanılıyor
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}

?>
