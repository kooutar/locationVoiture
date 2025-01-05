<?php
 
require_once '../classe/db.php';
 class reservation{
    private PDO $db;
    function __construct($db)
    {
        $this->db=$db;
    }
    function ajouterResrvation($id_user,$id_vehicule,$date_debut,$date_fin) :bool{
     $stmt=$this->db->prepare("CALL AjouterReservation(:iduser,:id_vehicule,:datedebut,:datefin)");
    $result= $stmt->execute([
           'iduser'=> $id_user,
            'id_vehicule'=>$id_vehicule,
            'datedebut'=>$date_debut,
            'datefin'=>$date_fin
     ]);
     if($result) return true;
     else false;

    }

    function showAllreservation($id_user,$id_vehicule){
       $stmt= $this->db->prepare("SELECT * from reservation where iduser=:iduser and idVehicule=:idVehicule");
       $resrvations=$stmt->execute(['iduser'=>$id_user,
                                     'idVehicule'=>$id_vehicule]);
       if($resrvations)
        return $stmt->fetch();
       else return [];

    }
    function showALLreservationCleint($id_user){
       $stmt = $this->db->prepare("SELECT r.date_debut ,r.date_fin , r.status, v.path_image ,v.nom 
       FROM reservation r
       inner join vehicule v
       on r.idVehicule=v.idVehicule
        WHERE iduser=:iduser ");
       $resrvations =$stmt->execute(['iduser'=>$id_user]);
       if($resrvations){
         return $stmt->fetchALL();
       }else{
         return [];
       }
    }
 }

?>