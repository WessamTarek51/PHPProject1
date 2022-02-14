<?php
echo $_GET["row"];

//read
$data=file("db.txt");
// next($data);
unset($data[$_GET["row"]]);
// echo"<pre>";
// var_dump($data);
// echo"</pre>";

//write
// $fileDate = implode("\n",$data);
// file_put_contents("db.txt",$fileDate);

// file_put_contents("db.txt",$fileDate, str_replace($line . "\r\n", "", file_get_contents($fileDate)));

$output = array();

     foreach($data as $line) {
         if(trim($line) != $DELETE) {
             $output[] = $line;
         }
     }

     $fp = fopen("db.txt", "w+");
     foreach($output as $line) {
         fwrite($fp, $line);
     }
     fclose($fp);


?>
