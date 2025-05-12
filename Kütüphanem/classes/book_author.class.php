<?php

class BookAuthor extends DB{
  
    public function addRelation($book_id, $author_id) {
        // Önce book_id'nin books tablosunda var olup olmadığını kontrol et
        $query = "SELECT COUNT(*) FROM books WHERE id = :book_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([':book_id' => $book_id]);
        $bookExists = $stmt->fetchColumn();
    
        // Eğer kitap yoksa hata döndür
        if ($bookExists == 0) {
            throw new Exception("Geçersiz book_id: Bu kitap mevcut değil.");
        }
    
        // Aynı şekilde author_id'nin authors tablosunda var olup olmadığını kontrol et
        $query = "SELECT COUNT(*) FROM authors WHERE id = :author_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([':author_id' => $author_id]);
        $authorExists = $stmt->fetchColumn();
    
        // Eğer yazar yoksa hata döndür
        if ($authorExists == 0) {
            throw new Exception("Geçersiz author_id: Bu yazar mevcut değil.");
        }
    
        // Eğer her iki id de geçerliyse, ilişkisini ekleyelim
        $query = "INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->bindValue(':author_id', $author_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    

    public function getAuthorsByBook($bookId)
    {
        $query = "SELECT a.* FROM authors a
                  INNER JOIN book_author ba ON a.id = ba.author_id
                  WHERE ba.book_id = :book_id";
        $stmt = $this->connect()->prepare($query); // DÜZENLENDİ
        $stmt->execute([':book_id' => $bookId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteRelationsByBook($bookId)
    {
        $query = "DELETE FROM book_author WHERE book_id = :book_id";
        $stmt = $this->connect()->prepare($query); // DÜZENLENDİ
        $stmt->execute([':book_id' => $bookId]);
    }
}

?>