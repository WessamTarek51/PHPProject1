<html>
<style>
        table, td, th {  
            border: 1px solid #ddd;
            text-align: left;
                      }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
             padding: 15px;
                }
    </style>
    <body>
        <?php
        session_start();
        if($_COOKIE["fname"]){
            echo" <h2>welcome  {$_COOKIE['fname']} {$_COOKIE['lname']}</h2>";
            echo" <h2>{$_SESSION['password']}</h2>";

        }else{
            header("Location:login.php");
        }
        ?> 
        
        <table>
            <tr>
             <th>ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Address</th>
             <th>Country</th>
             <th>Gender</th>
             <th>Username</th>
             <th>Password</th>
             <th>Department</th>
             <th>Email</th>
             <th>ImageName</th>


             </tr>
       

<?php
try{

//connect
$connection = new pdo("mysql:host=localhost;dbname=phpLab","root","W@ssam12");

//Query
$AllStudent=$connection->query("select * from student");
while($row=$AllStudent->fetch(PDO::FETCH_ASSOC)){
    echo"<tr>";
    //foreach of the all row 
    foreach($row as $value){
        echo"<td>$value</td>";
    }
    echo"<td><a href='studentControler.php?id={$row['id']}&delete'>Delete</a></td>";
    echo"<td><a href='studentControler.php?id={$row['id']}&show'>Show</a></td>";
    echo"<td><a href='studentControler.php?id={$row['id']}&edit'>Edit</a></td>";


    echo"</tr>";

}
echo"<a href='page1.php'>Add student</a>";

//catch ay error lw ma7slh connect 
}catch(PDOException $e){
    echo $e->getMessage();
    }

    //close connect
    $connection=null;
?>

 </table>
 
    </body>
</html>