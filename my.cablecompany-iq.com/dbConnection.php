<?php
//data base conection handeler 
$host = "localhost";
$port = "3306";
$socket = "";
$user = "root";
$password = "";
$dbname = "cablecompany_cabeldb";


$connerct = mysqli_connect($host, $user, $password, $dbname, $port, $socket);
if (!$connerct) {
    die("Connection failed: ". mysqli_connect_error());
}
 ?>