<?php
// try{
//     $connectionn = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");
// }
// catch(PDOException $e){
//     echo $e->getMessage();
//     }

    function validation($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

require("db.php");
$db= new db();
$connection=$db->get_connection();
    

    
 
    if(isset($_REQUEST['addStudent'])){


    $fname=validation($_REQUEST["fname"]);
    $lname=validation($_REQUEST["lname"]);
    $address=validation($_REQUEST["address"]);
    $country=$_REQUEST["country"];
    $gender=$_REQUEST["gender"];
    $username=validation($_REQUEST["username"]);
    $password=$_REQUEST["password"];
    $email=validation($_REQUEST["email"]);
    $department=$_REQUEST["department"];

    $id=$_REQUEST["id"];
    $error=[];

    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $filename = $_FILES['img']['name'];

    var_dump( $img);
    
    if (empty($_REQUEST["fname"])) {
        $error["fname"]="name is require";
     }else {
        $fname = validation($_REQUEST["fname"]);
     }





    if(strlen($fname)<3){
        $error["fname"]="frist name must be more than 3 letters";
     }
    
    if(strlen($lname)<3){
        $error["lname"]="last name must be more than 3 letters"; 
    }
    if(strlen($address)<3){
        $error["address"]="must add address";
    }
    if(strlen($gender)<1){
        $error["gender"]="must select gender";  
    }
    if(strlen($username)<3){
        $error["username"]="username must be more than 3 letters";  
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error["email"]="not valid email";
    }
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $error["password"]= "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
       } 
       if(!move_uploaded_file($_FILES["img"]["tmp_name"],"imgs/".$filename)){
        $error["img"]="fail to upload image";

    }
    
    if(count($error)>0){
        $errorArray=json_encode($error);
        header("Location:page1.php?error=$errorArray");
    }
   else{
   
    
    try{
   

    //query
    // $connection->query("insert into student set fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',username='$username',password='$password',department='$department',email='$email',img='$filename'");
    $db->insert("student","fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',username='$username',password='$password',department='$department',email='$email',img='$filename'");
    header("Location:list.php");

    }catch(PDOException $e){
    echo $e->getMessage();
    }}
    
    //close connection
    $connection=null;

}






 if(isset($_REQUEST['delete'])){
    $id=$_REQUEST["id"];
try{

    // $connection->query("delete from student where id=$id");
    $db->delete(student,"id=$id");
    header("Location:list.php");

}
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $connection=null;


}






 if(isset($_REQUEST['show'])){
    $id=$_REQUEST["id"];
    try{
        
        // $student=$connection->query("select * from student where id=$id");
       $student= $db->select("*","student","id=$id");

        $studentInfo=$student->fetch(PDO::FETCH_ASSOC);
        $dataEncode=json_encode($studentInfo);
        header("Location:show.php?data=$dataEncode"); 
    }
        
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $connection=null;
}








if(isset($_REQUEST['edit'])){

    $id=$_REQUEST["id"];
try{
    // $student=$connection->query("select * from student where id='$id'");
    $student= $db->select("*","student","id=$id");

    $studentInfo=$student->fetch(PDO::FETCH_ASSOC);
    $dataEncode=json_encode($studentInfo);
    header("location:edit.php?data=$dataEncode"); 

}

    catch(PDOException $e){
        echo $e->getMessage();
    }
    $connection=null;
}





 if(isset($_REQUEST['updateStudent'])){

    $fname=validation($_REQUEST["fname"]);
    $lname=validation($_REQUEST["lname"]);
    $address=validation($_REQUEST["address"]);
    $country=$_REQUEST["country"];
    $gender=$_REQUEST["gender"];
    $username=validation($_REQUEST["username"]);
    $password=$_REQUEST["password"];
    $email=validation($_REQUEST["email"]);
    $filename = $_FILES['img']['name'];
    $fillename_temp=$_FILES["img"]["tmp_name"];
    $id=$_REQUEST["id"];
    $error=[];
var_dump($fname);
var_dump($lname);
var_dump($id);




    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(strlen($fname)<3){
        $error["fname"]="frist name must be more than 3 letters";
    }
    
    if(strlen($lname)<3){
        $error["lname"]="last name must be more than 3 letters"; 
    }
    if(strlen($address)<3){
        $error["address"]="must add address";
    }
    if(strlen($gender)<1){
        $error["gender"]="must select gender";  
    }
    if(strlen($username)<3){
        $error["username"]="username must be more than 3 letters";  
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error["email"]="not valid email";
    }
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $error["password"]= "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
       } 
//       if(!move_uploaded_file($fillename_temp,"imgs/".$studentInfo['img'])){
//     $error["img"]="fail to upload image";

//  }
    
    if(count($error)>0){
        $errorArray=json_encode($error);
        header("Location:edit.php?error=$errorArray&id='$id'");
    }
   else{
   
try{
//  $student =$connectionn->query("UPDATE student SET 
//       fname='$fname',
//       lname='$lname',
//       email='$email',
//       address='$address',
//       country='$country',
//       gender='$gender',
//       username='$username',
//       password='$password',
//       email='$email',
//       img='$filename'
//       WHERE id='$id'
//     ");
// $student= $db->update("student","fname='fname'","id='$id'");
$student=$db->update("student","fname='$fname',lname='$lname',address='$address',country='$country',gender='$gender',username='$username',password='$password',department='$department',email='$email',img='$filename'","id=$id");


       var_dump($student);

    if($student){
    $studentInfo=$student->fetch(PDO::FETCH_ASSOC);
    header("Location:list.php");
   }
    else{
        echo"no data";
    }

}
    catch(PDOException $e){
        echo $e->getMessage();
    }}
    $connection=null;
}



    if(isset($_REQUEST["login"])){
    try{
        var_dump($_REQUEST["email"]);
        $password=$_REQUEST["password"];
        $email=$_REQUEST["email"];
        // $student=$connection->query("select * from student where email='$email' and password='$password'");
        $student= $db->select("*","student","email='$email' and password='$password'");

    if($student){
        $studentInfo=$student->fetch(PDO::FETCH_ASSOC);
        setcookie("fname",$studentInfo["fname"],time()+60*60);
        setcookie("lname",$studentInfo["lname"],time()+60*60);
        session_start();
        $_SESSION["password"]=$studentInfo["password"];

        header("Location:list.php");
     }
     else{
        header("Location:login.php");
     }
    }
        
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $connection=null;


}

?>