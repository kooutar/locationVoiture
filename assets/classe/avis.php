<?php 
 require_once 'db.php'; 
class avis {
    private $idavis;
    private $commentaire;
    private $note;
    private $iduser;
    private $idvehicule;
    private PDO $db;
    function __construct($db)
    {
        $this->db=$db;
    }
    function ajoutAvis($commentaire, $note, $id_user, $id_vehicule) {
        $stmt = $this->db->prepare("INSERT INTO avis (commentaire, note, iduser, idVehicule) 
                                    VALUES (:commentaire, :note, :iduser, :idVehicule)");
        $stmt->execute([
            'commentaire' => $commentaire,
            'note' => $note,
            'iduser' => $id_user,
            'idVehicule' => $id_vehicule
        ]);
    }

    function afficheAvis($idavis){
        $req="select * from avis_user where idAvis=:idAvis ";
        $stmt=$this->db->prepare($req);
        $result=$stmt->execute(['idAvis'=>$idavis]);
        if($result){
            return $stmt->fetch();
        }else{
            return [];
        }

    }




    
}


?>