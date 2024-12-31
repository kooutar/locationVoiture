<?php
require_once '../classe/db.php';
require_once '../classe/client.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $nom=$_POST['Nom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $password=$_POST['password'];
    $dateNaissance=$_POST['dateNaissance'];
    $gender=$_POST['gender'];
    try {
    $database = new Database();
    $db = $database->connect();
    
    $client = new Client($db);
    
    // Exemple d'inscription
    $client->register([
        'nom' => $nom,
        'email' => $email,
        'telephone'=>$tel,
        'date_Naissance'=>$dateNaissance,
        'gender'=>$gender,
        'password' => $password
    ]);
    
    // Exemple de connexion

    //   // $client->reserverVehicule([
        //     'vehicule_id' => 1,
        //     'date_debut' => '2024-01-01',
        //     'date_fin' => '2024-01-05',
        //     'lieu_prise' => 'Paris'
        // ]);
   
} catch (Exception $e) {
    echo $e->getMessage();
}
}