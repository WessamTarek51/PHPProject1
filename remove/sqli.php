<?php 
//frist do it
//$connection->query("create database phpLab")

// $connection->query("insert into student set fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',username='$username',password='$password',department='$department',");

try{
    //connection
$connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

// $connection->query("create table student(id int not null AUTO_INCREMENT primary key,
// fname varchar(50),
// lname varchar(50),
// address varchar(50),
// country varchar(50),
// gender varchar(50),
// username varchar(50),
// password varchar(50),
// department varchar(50)
// )");

//get info from page1.php
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$address=$_GET['address'];
$country=$_GET['country'];
$gender=$_GET['gender'];
$username=$_GET['username'];
$password=$_GET['password'];
$department=$_GET['department'];

//query
$connection->query("insert into student set fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',username='$username',password='$password',department='$department'");

}catch(PDOException $e){
echo $e->getMessage();
}

//close connection
$connection=null;
header("Location:list.php");
 
?>