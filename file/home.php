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
     <table> 
         <tr>
             <th>ID</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Address</th>
             <th>Country</th>
             <th>Username</th>
             <th>Password</th>
             <th>Department</th>




         </tr>
   
<?php
// var_dump($_POST);

$student= $_POST['fname'].",".$_POST['lname'].",".$_POST['address'].",".$_POST['country'].",".$_POST['username'].",".$_POST['password'].",".$_POST['department'];
file_put_contents("db.txt",$student."\n",FILE_APPEND);

$studentData=file("db.txt");
foreach($studentData as $key=>$student){
    echo"<tr>";
    $studentInfo=explode(",",$student);
    echo"<td>".($key+1)."</td>";
    foreach($studentInfo as $value){
        echo"<td>$value</td>";
    }
    echo"<td><a href='deleteFromFile.php?row=$key'> Delete</td>";

    echo"</tr>";
}

?>
</table>  
   </body>
  </html>