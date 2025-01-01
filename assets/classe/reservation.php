<?php
 
require_once '../classe/db.php';
 class reservation{
    private PDO $db;
    function __construct($db)
    {
        $this->db=$db;
    }
    function ajouterResrvation($id_user,$id_vehicule,$date_debut,$date_fin) :bool{
     $stmt=$this->db->prepare("INSERT INTO reservation(iduser,idVehicule,date_debut,date_fin) VALUES(:iduser,:id_vehicule,:datedebut,:datefin)");
    $result= $stmt->execute([
           'iduser'=> $id_user,
            'id_vehicule'=>$id_vehicule,
            'datedebut'=>$date_debut,
            'datefin'=>$date_fin
     ]);
     $stmt2=$this->db->prepare("Update vehicule set disponsible=true where idVehicule=:idvehicule");
     $stmt2->execute(['idvehicule'=>$id_vehicule]);
     if($result) return true;
     else false;

    }
 }
?>