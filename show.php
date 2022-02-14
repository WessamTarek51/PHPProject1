<html>
<style>
        a{
            padding-left:20px;
        }
    </style>
    <body>
<?php
session_start();

$studentInfo=json_decode($_REQUEST['data'],true);
if($_COOKIE["fname"]){
    echo" <h2>welcome  {$_COOKIE['fname']} {$_COOKIE['lname']}</h2>";
    echo" <h2>{$_SESSION['password']}</h2>";

}else{
    header("Location:login.php");
}

//get id 
// $id=$_GET["id"];
// try{
//     //connect
//     $connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

//     $student=$connection->query("select * from student where id=$id");
//     $studenrInfo=$student->fetch(PDO::FETCH_ASSOC);
    echo"<ul>";
    foreach($studentInfo as $value){
    echo"<li>$value</li>";
}
    echo"</ul>";
    echo"<td><a href='studentControler.php?id={$studentInfo['id']}&delete'>Delete</a></td>"; 
    echo"<td><a href='studentControler.php?id={$studentInfo['id']}&edit'>Edit</a></td>";
// }

//     catch(PDOException $e){
//         echo $e->getMessage();
//     }
//     $connection=null;


?>
<!-- <ul>
    <li><?=$studenrInfo['id']?></li>
    <li><?=$studenrInfo['fname']?></li>
    <li><?=$studenrInfo['lname']?></li>
    <li><?=$studenrInfo['address']?></li>
    <li><?=$studenrInfo['country']?></li>
    <li><?=$studenrInfo['gender']?></li>
    <li><?=$studenrInfo['username']?></li>
    <li><?=$studenrInfo['password']?></li>
    <li><?=$studenrInfo['department']?></li>
    <li><?=$studenrInfo['email']?></li>



</ul> -->
</body>
</html>