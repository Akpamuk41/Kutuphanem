<?php 
session_start();
include "classes/db.class.php";
include "classes/users.class.php";
?>

<?php 
    $user = new Users();


    if(isset($_POST["deleteUser"])){
        $id = $_POST["userId"];



        if($user->deleteUser($id)){
            header("Location: users-list.php");
            exit;
        } 
    
    }


?>
