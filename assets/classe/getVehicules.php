<?php
require_once 'vehicule.php';
require_once 'db.php';
try {
    $database = new Database();
    $db = $database->connect();

    $vehicule = new vehicule($db);
  if(isset($_GET['idCategorie']))
  {
    $idCategorie=$_GET['idCategorie'];
    if( $idCategorie =="all"){
        $vehicules=$vehicule->afficheVehicule(); 
    }else{
        $vehicules=$vehicule->getVehiculeByCategorie($idCategorie); 
    }
  }
   echo json_encode($vehicules);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
