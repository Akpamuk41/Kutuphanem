<?php 
include "classes/db.class.php";
include "classes/category.class.php";
?>

<?php 
    $category = new Categories();


    if(isset($_POST["deletecategory"])){
        $id = $_POST["categoryId"];



        if($category->deletecategory($id)){
            header("Location: kategoriler.php");
            exit;
        } 
    
    }


?>
