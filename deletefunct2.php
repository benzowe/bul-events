<?php

    $db = new mysqli("localhost", "mohammed","dollie","event");
    $id = $_GET['id'];
    $query = $db->query("DELETE FROM post WHERE id=$id");
    if($query){
        header("location:adminhome.php");
    }else{
        echo "An Unknown error occured";
    }
   
?>

