<?php

class db{
private $host="localhost";
private $dbname="phpLab";
private $user="root";
private $password="W@ssam12";
private $dbtype="mysql";
private $connection;

public function __construct(){
    $this->connection=new pdo("$this->dbtype:
    host=$this->host;
    dbname=$this->dbname;",
    $this->user,
    $this->password 
);
}
function get_connection(){
    return $this->connection;
}
function select($cols,$table,$condition=1){
    return $this->connection->query("select $cols from $table where $condition");
}
function delete($table,$condition){
    return $this->connection->query("delete from $table where $condition");
}
function insert($table,$cols){
    return $this->connection->query("insert into  $table set $cols");
}
function update($table,$cols,$condition){
    return $this->connection->query("UPDATE $table SET $cols WHERE $condition");
}




}




?>