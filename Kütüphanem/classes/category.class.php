<?php 
class Categories extends DB {
    private $table;

    public function __construct($table = 'categories') {
        $this->table = $table;
    }

    // Belirli bir kategoriyi ID'ye göre getirir
    public function getCategoryById(int $categoryId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $categoryId]);
        return $stmt->fetch();
    }
    
    // Yeni bir kategori ekler
    public function createCategory($category_name) {
        $sql = "INSERT INTO " . $this->table . " (category_name) VALUES (:category_name)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['category_name' => $category_name]);
    }

    // Tüm kategorileri getirir
    public function getCategories() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Kategori silme işlemi
    public function deleteCategory($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    } 

    // Kategori bilgilerini günceller
    public function editCategory($id, $category_name) {
        $sql = "UPDATE " . $this->table . " SET category_name=:category_name WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'category_name' => $category_name
        ]);
    }

    public function getCategoryCount() {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }
}
?>
