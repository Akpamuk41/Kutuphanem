<?php 
include "classes/book_author.class.php";
class Books extends DB{
    private $table;

    public function __construct($table = 'books') {
        $this->table = $table;
    }

    // Belirli bir kitabı ID'ye göre getirir
    public function getBookById(int $bookId){
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $bookId]);
        return $stmt->fetch();
    }
    
    // Yeni bir kitap ekler


    // Yeni bir kitap ekler
    public function createBook($title, $description, $cover_image, $category_id, $isbn, $published_year, $total_copies, $available_copies){
        $sql = "INSERT INTO " . $this->table . " (title, description, cover_image, category_id, isbn, published_year, total_copies, available_copies) 
                VALUES (:title, :description, :cover_image, :category_id, :isbn, :published_year, :total_copies, :available_copies)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'cover_image' => $cover_image,
            'category_id' => $category_id,
            'isbn' => $isbn,
            'published_year' => $published_year,
            'total_copies' => $total_copies,
            'available_copies' => $available_copies
        ]);
    }
    

    // Tüm kitapları getirir
    public function getBooks(){
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Kitap silme işlemi
    public function deleteBook($id){
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $id]);
    } 

    // Kitap bilgilerini günceller
    public function editBook($id, $title, $description, $cover_image, $category_id, $isbn, $published_year, $total_copies, $available_copies){
        $sql = "UPDATE " . $this->table . " SET 
                title=:title, 
                description=:description, 
                cover_image=:cover_image, 
                category_id=:category_id, 
                isbn=:isbn, 
                published_year=:published_year, 
                total_copies=:total_copies, 
                available_copies=:available_copies 
                WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'cover_image' => $cover_image,
            'category_id' => $category_id,
            'isbn' => $isbn,
            'published_year' => $published_year,
            'total_copies' => $total_copies,
            'available_copies' => $available_copies
        ]);
    }

    //Kitapların sayısını almak için
    public function getBookCount() {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }
    
    public function getAuthorsByBookId($book_id) {
        $bookAuthor = new BookAuthor();
        return $bookAuthor->getAuthorsByBook($book_id);
    }
    
    public function getAllAuthors() {
        $stmt = $this->connect()->prepare("SELECT * FROM authors");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}





?>
