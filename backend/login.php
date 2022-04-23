<?php
include_once("config.php");
$postdata=file_get_contents("php://input");

$tab = array() ; 
if (isset($postdata)&& !empty($postdata)){
    $request = json_decode($postdata);
    $email=mysqli_real_escape_string($conn,trim($request->email));
    $password=mysqli_real_escape_string($conn,trim($request->password));
 
    $query = "select * from utilisateur where email='$email' and password='$password'";
    $sql = $conn->query($query);
    while($item = $sql->fetch_assoc()){
        $tab[] = $item;
    }

        if(count($tab)> 0) {
            $data=array('message'=>'success' , 'data'=>$tab);

            echo json_encode($data);
        }
        else{
            $data=array('message'=>'failed');
            echo json_encode($data); 
        }

}
?>