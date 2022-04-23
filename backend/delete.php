<?php
include 'config.php' ; 
$postdata=file_get_contents("php://input");

if(isset($postdata) && ! empty($postdata)){
    $request = json_decode($postdata) ; 
    $id = trim($request->id) ; 

    $sql="delete from utilisateur where id_user='$id'" ; 
    
    $query = $conn->query($sql) ; 


    if($query){
        $output = array('msg' => 'data deleted successfully') ; 
        echo json_encode($output) ; 
    } else {
        $output = array('msg' => 'data not deleted') ; 
        echo json_encode($output) ;

    }

}



?>