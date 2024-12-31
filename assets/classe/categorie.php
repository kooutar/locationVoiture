<?php
class categorie{
   private int $id ;
   private String $name;
   private String $description;
   private PDO $db;
   public function __construct(PDO $db) {
    $this->db = $db;
}
   function ajouterCategorie($name) {
       $stmt=$this->db->prepare("INSERT INTO categorie(nom) Values(:name)");
     return $stmt->execute([':name'=>$name]);  
   }
   function afficheCategorie(){
      $stmt=$this->db->prepare("SELECT * FROM categorie;");
      $stmt->execute();
      if($stmt->rowCount() > 0){
        while($row = $stmt->fetch()){
            echo "<option>". $row['nom'] ."</option>";
        }
    }
   }
}