<?php

//get id 
$id=$_GET["id"];
try{
    //connect
    $connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

    $connection->query("delete from student where id=$id");
    header("Location:list.php");

}
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $connection=null;


?>