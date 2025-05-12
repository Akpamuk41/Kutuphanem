<?php 
session_start();
include "classes/db.class.php";
include "classes/books.class.php";
?>

<?php 
    $books = new Books();


    if(isset($_POST["deleteBook"])){
        $id = $_POST["bookId"];



        if($books->deleteBook($id)){
            header("Location: kitaplar.php");
            exit;
        } 
    
    }


?>
