<?php 
class vehicule{
    private PDO $db;
  function __construct(PDO $db)
  {
    $this->db=$db;
  }
  function ajouterVehicule($nom,$prix,$path_image,$lieu,$idCategorie):bool{
    $stmt=$this->db->prepare("INSERT INTO vehicule(nom,prix,path_image,lieu,idCategorie) values(:nom,:prix,:path_image,:lieu,:idCategorie);");
    $bool=$stmt->execute([':nom'=>$nom,
                    ':prix'=>$prix,
                    ':path_image'=>$path_image,
                    ':lieu'=>$lieu,
                ':idCategorie'=>$idCategorie]);
    if($bool){return true;}
    else{return false;}
  }



}

?>