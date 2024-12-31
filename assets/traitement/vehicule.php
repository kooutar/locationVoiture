<?php
require_once '../classe/db.php';
require_once '../classe/vehicule.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
   $selectCategorie=$_POST['selectCategorie'];
    $lieu=$_POST['lieu'];
    $dir='../uplods';
    if(isset($_FILES['image_path']) && !empty($_FILES["image_path"]["name"])  ){
        $path=basename($_FILES['image_path']['name']);
        $finalPath=$dir."".uniqid()."".$path;
        $arrayExtentionImag=array('png','jpg','jpge','jpeg','gif','svg');
        $extention=pathinfo( $finalPath,PATHINFO_EXTENSION);//retourn extention de image 
        if(in_array(strtolower($extention),$arrayExtentionImag)){
            move_uploaded_file($_FILES["image_path"]["tmp_name"],$finalPath);
            $database= new Database();
            $db=$database->connect();
            $vehicule= new vehicule($db);
            $vehicule->ajouterVehicule($nom,$prix,$finalPath,$lieu,$selectCategorie);
            header('location:../pages/admin.php');
            exit();
        }else{
            echo "c'est pas une image";
        }
    }else{
        echo "hjhgjh";
    }
   
   
    
}