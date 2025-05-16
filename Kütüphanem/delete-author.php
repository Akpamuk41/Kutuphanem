<?php 
include "classes/db.class.php";
include "classes/authors.class.php";
?>

<?php 
    $author = new Authors();


    if(isset($_POST["deleteAuthor"])){
        $id = $_POST["authorId"];



        if($author->deleteAuthor($id)){
            header("Location: yazarlar.php");
            exit;
        } 
    
    }


?>
