<?php 
include_once 'config.php' ; 
$postdata = file_get_contents("php://input") ; 
if (isset($postdata) && ! empty($postdata)){
    $request = json_decode($postdata) ; 
    $nom = trim($request->nom) ; 
    $prenom = trim($request->prenom) ; 
    $email=mysqli_real_escape_string($conn,trim($request->email));
    $password=mysqli_real_escape_string($conn,trim($request->password));
    $cpassword = trim($request->cpassword) ; 
    $genre = trim($request->genre) ; 
    $date = trim($request->date) ; 
    $niveau = trim($request->niveau) ; 
    $tel = trim($request->tel) ; 
    $adresse = trim($request->adresse) ; 
    $code_postal = trim($request->code_postal) ; 

    $trysql = "select * from utilisateur where email='$email'" ; 

    $trysql = $conn->query($trysql) ;

    $tab = array() ; 

    while($item = $trysql->fetch_assoc()){
        $tab[] = $item ;
    }

    if(count($tab)>0){
        $output = array('msg' => "email exists please change !! !!") ; 
        echo json_encode($output) ; 
        
    } else if(strlen($password)<5) {
        $output = array('msg' => "password length should be higher than 5 letters !!") ; 
        echo json_encode($output) ; 
    
    }
    else {
     $sql = "INSERT INTO utilisateur (
        nom , 
        prenom , 
        email , 
        password , 
        cpassword , 
        genre , 
        date , 
        niveau , 
        tel , 
        adresse , 
        code_postal
        ) 
        VALUES (
        '$nom' , 
        '$prenom' , 
        '$email' , 
        '$password' , 
        '$cpassword' , 
        '$genre' , 
        '$date' , 
        '$niveau' , 
        '$tel' , 
        '$adresse' , 
        '$code_postal')" ; 


        $query = $conn->query($sql) ; 

        

        if($query){
            $output = array('msg'=>'success') ; 
            echo json_encode($output) ; 

        }
        else {
            $output = array('msg'=>"data not inserted !!");
            echo json_encode($output) ; 

        }

    }



}







?>