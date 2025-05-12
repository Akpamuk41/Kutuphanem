<?php
class Search extends DB {
    public function search($term) {
        $sql = "
            SELECT b.id, b.title, b.description, b.cover_image as image, 'kitap' as type
            FROM books b
            WHERE b.title LIKE :term OR b.description LIKE :term

            UNION

            SELECT a.id, a.author_name as title, NULL as description, a.author_photo as image, 'yazar' as type
            FROM authors a
            WHERE a.author_name LIKE :term

            UNION

            SELECT u.id, u.name as title, u.email as description, NULL as image, 'uye' as type
            FROM users u
            WHERE u.name LIKE :term OR u.email LIKE :term
        ";
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['term' => '%' . $term . '%']);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Arama sorgusu hatası: " . $e->getMessage());
        }
    }
}

?>
