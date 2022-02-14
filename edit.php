<html>
    <style>
        a{
            padding-left:20px;
        }
    </style>
    <body>
        
   

<?php

$studentInfo=json_decode($_REQUEST['data'],true);

if(isset($_REQUEST['error'])){
    $errors=json_decode($_REQUEST['error']);

    var_dump($errors);
}

//get id 
// $id=$_GET["id"];
// try{
//     //connect
//     $connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

//     $student=$connection->query("select * from student where id=$id");
//     $studenrInfo=$student->fetch(PDO::FETCH_ASSOC);
   

// }

//     catch(PDOException $e){
//         echo $e->getMessage();
//     }
//     $connection=null;
session_start();

if($_COOKIE["fname"]){
    echo" <h2>welcome  {$_COOKIE['fname']} {$_COOKIE['lname']}</h2>";
    echo" <h2>{$_SESSION['password']}</h2>";

}else{
    header("Location:login.php");
}

?>

<form  method="POST" action="studentControler.php"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$studentInfo['id']?>">
        <label for="fname">First Name:</label> 

        <input type="text" name="fname" value="<?=$studentInfo['fname']?>">
        <span >* <?php echo $errors->fname;?></span>
        <br><br>  
        <label for="lname">Last Name:</label> 
        <input type="text" name="lname"  value="<?=$studentInfo['lname']?>">
        <span >* <?php echo $errors->lname;?></span>
        <br><br>  
        <label for="email">Email:</label> 
        <input type="text" name="email" value="<?=$studentInfo['email']?>">
        <span >* <?php echo $errors->email;?></span>
        <br><br>  
        <label for="address">Address</label>
        <br>
        <textarea name="address" rows="4" cols="70"><?=$studentInfo['address']?></textarea>
        <span >* <?php echo $errors->address;?></span>
        <br><br>
        <label for="country">Country</label>
        <select name="country">
        <option ><?=$studentInfo['country']?></option>
        <option value="Cairo">Cairo</option>
        <option value="Qena">Qena</option>
        <option value="Sohag">Sohag</option>
        </select><br><br>

        <label >Gender</label>
        <input type="radio" name="gender" value="male" <?php if (isset($studentInfo['gender']) && $studentInfo['gender']=="male") echo "checked";?>/>
        <label >male</label>
        <input type="radio" name="gender" value="female" <?php if (isset($studentInfo['gender']) && $studentInfo['gender']=="female") echo "checked";?>/> 
        <label >female</label>
        <span >* <?php echo $errors->gender;?></span>

        <br><br>
    

        <label>Skills</label>
        <input type="checkbox" name="PHP" value="PHP" >
        <label for="PHP">PHP</label>

        <input type="checkbox" name="J2SE" value="J2SE">
        <label for="J2SE">J2SE</label><br>
        <input type="checkbox"  name="MySQL" value="MySQL">
        <label for="MySQL"> MySQL</label>

        <input type="checkbox"  name="PostgreeSQL" value="PostgreeSQL">
        <label for="PostgreeSQL"> PostgreeSQL</label><br><br>

        <label for="username">user Name:</label> 
        <input type="text" name="username" required value="<?=$studentInfo['username']?>">
        <span >* <?php echo $errors->username;?></span>

        <br><br>

        <label for="password">Password:</label> 
        <input type="password" name="password"  value="<?=$studentInfo['password']?>">
        <span >* <?php echo $errors->password;?></span>

        <br><br>

        <label for="department">Department</label> 
        <input type="text" name="department" placeholder="OpenSource" value="OpenSource" readonly><br><br>
        <label for="image">Your Image:</label> 
        <input type="file" name="img"  value=" <?=$studentInfo['img']?>"> 
        <?=$studentInfo['img']?>
        <span >* <?php echo $errors->img;?></span>

        <br><br>

        <input type="submit" value="Update Student" name="updateStudent">
        </form>
        </body>
</html>
<?php

echo"<td><a href='studentControler.php?id={$studentInfo['id']}&delete'>Delete</a></td>"; 
echo"<td><a href='studentControler.php?id={$studentInfo['id']}&show'>show</a></td>";
?>