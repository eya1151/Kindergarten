<?php 
require 'config.php' ;


$sql = 'select * from utilisateur' ; 

$query = $conn->query($sql) ; 


$data = array() ; 

while($item = $query->fetch_assoc()){
    $data[] = $item ; 
}


if(count($data)>0){
    $output = array('msg' => 'data here' , 'data' => $data) ; 
} else {
    $output = array('msg' => 'data not here') ; 
}


echo json_encode($output) ; 




?>