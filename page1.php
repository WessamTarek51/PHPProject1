<?php
        // session_start();
        if(isset($_REQUEST["error"])){
            $errors=json_decode($_REQUEST["error"]);
        }
if($_COOKIE["fname"]){
    echo" <h2>welcome  {$_COOKIE['fname']} {$_COOKIE['lname']} </h2>";
    echo" <h2>{$_SESSION['password']}</h2>";

}else{
    header("Location:login.php");

}
?>
<html>
    <style>
        span{
            color:red;
        }
    </style>
    <body>
   

    
        <form method="POST" action="studentControler.php" enctype="multipart/form-data">
        <label for="fname">First Name:</label> 
        <input type="text" name="fname" value="<?php echo $fname;?>">
        <span >* <?php echo $errors->fname;?></span>
        <br><br>  
        <label for="lname">Last Name:</label> 
        <input type="text" name="lname" >
        <span >* <?php echo $errors->lname;?></span>
        <br><br>  
        <label for="email">Email:</label> 
        <input type="text" name="email" >
        <span >* <?php echo $errors->email;?></span>

        <br><br>
        <label for="address">Address</label>
        <br>
        <textarea name="address" rows="4" cols="70" ></textarea>
        <span >* <?php echo $errors->address;?></span>
        <br><br>
        <label for="country">Country</label>
        <select name="country" >
        <option value="Cairo">Cairo</option>
        <option value="Qena">Qena</option>
        <option value="Sohag">Sohag</option>
        </select><br><br>

        <label >Gender</label>
        <input type="radio" name="gender" value="male">
        <label >male</label>
        <input type="radio" name="gender" value="female"> 
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
        <input type="text" name="username" >
        <span >* <?php echo $errors->username;?></span>

        <br><br>

        <label for="password">Password:</label> 
        <input type="password" name="password">
        <span >* <?php echo $errors->password;?></span>

        <br><br>

        <label for="department">Department</label> 
        <input type="text" name="department" placeholder="OpenSource" value="OpenSource" readonly><br><br>

        <label for="image">Your Image:</label> 
        <input type="file" name="img" >
        <span >* <?php echo $errors->img;?></span>

        <br><br>



        <input type="submit" value="Add Student" name="addStudent">
        <input type="reset" value="Reset">
        </form>

    </body>
</html>

