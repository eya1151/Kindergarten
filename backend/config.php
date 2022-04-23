<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

$servername = 'localhost' ; 
$username = 'root' ; 
$password = '' ; 
$database = 'kindergarden' ; 

//coordonnés base de donnés 

$conn = mysqli_connect($servername , $username , $password , $database , 3306) ;

//$conn = new mysqli($servername , $username , $password , $database , 3306);


if(mysqli_connect_errno()){
    die("failed to connect".mysqli_connect_errno());
    
}

//test connexion 

?>