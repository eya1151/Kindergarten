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
        $output = array('msg' => "email exists or you are puting the same email !!") ; 
        echo json_encode($output) ; 
        
    } else if(strlen($password)<5) {
        $output = array('msg' => "password length should be higher than 5 letters !!") ; 
        echo json_encode($output) ; 
    
    }
    else {
     $sql = "UPDATE utilisateur SET 
        nom='$nom' , 
        prenom='$prenom', 
        email='$email' , 
        password='$password' , 
        cpassword='$cpassword', 
        genre='$genre' , 
        date='$date', 
        niveau='$niveau' , 
        tel='$tel' , 
        adresse='$adresse', 
        code_postal='$code_postal'" ;  


        $query = $conn->query($sql) ; 

        

        if($query){
            $output = array('msg' => "data updated successfully !!") ; 
            echo json_encode($output) ; 

        }
        else {
            $output = array('msg'=>"data not updated !!");
            echo json_encode($output) ; 

        }

    }



}







?>