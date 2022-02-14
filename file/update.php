
<?php
try{
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $address=$_GET['address'];
    $country=$_GET['country'];
    $gender=$_GET['gender'];
    $username=$_GET['username'];
    $password=$_GET['password'];
    $id=$_GET['id'];

    //connect
    $connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

   $student =$connection->query("update student set
    fname= '$fname',
    lname='$lname',
    address='$address',
    country='$country',
    gender='$gender',
    username='$username',
    password='$password'
     where id=$id
    ");

    if($student){
    $studenrInfo=$student->fetch(PDO::FETCH_ASSOC);
    header("Location:list.php");
   }
    else{
        echo"no data";
    }

}
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $connection=null;


?>