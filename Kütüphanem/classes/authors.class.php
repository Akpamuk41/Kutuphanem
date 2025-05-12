<?php 
class Authors extends DB {
    private $table;

    public function __construct($table = 'authors') {
        $this->table = $table;
    }

    // Belirli bir yazarı ID'ye göre getirir
    public function getAuthorById(int $authorId) {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $authorId]);
        return $stmt->fetch();
    }
    
    // Yeni bir yazar ekler
    public function createAuthor($author_name, $author_photo, $author_bio, $author_title) {
        $sql = "INSERT INTO " . $this->table . " (author_name, author_photo, author_bio, author_title) 
                VALUES (:author_name, :author_photo, :author_bio, :author_title)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'author_name' => $author_name,
            'author_photo' => $author_photo,
            'author_bio' => $author_bio,
            'author_title' => $author_title
        ]);
    }

    // Tüm yazarları getirir
    public function getAuthors() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    

    // Yazar silme işlemi
    public function deleteAuthor($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Yazar bilgilerini günceller
    public function editAuthor($id, $author_name, $author_photo, $author_bio, $author_title) {
        $sql = "UPDATE " . $this->table . " SET 
                author_name=:author_name, 
                author_photo=:author_photo, 
                author_bio=:author_bio, 
                author_title=:author_title 
                WHERE id=:id";
                $stmt = $this->connect()->prepare($sql);
                return $stmt->execute([
            'id' => $id,
            'author_name' => $author_name,
            'author_photo' => $author_photo,
            'author_bio' => $author_bio,
            'author_title' => $author_title
        ]);
    }

    //Yazar Sayfasında Kitapları Çekmek için
    public function getBooksByAuthor($author_id) {
        $sql = "SELECT b.id, b.title, b.cover_image 
                FROM books b 
                INNER JOIN book_author ba ON b.id = ba.book_id 
                WHERE ba.author_id = :author_id";
        $stmt = $this->connect()->prepare($sql); 
        $stmt->execute(['author_id' => $author_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
