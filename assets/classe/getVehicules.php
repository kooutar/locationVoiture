<?php
require_once 'vehicule.php';
require_once 'db.php';
try {
    $database = new Database();
    $db = $database->connect();

    $vehicule = new vehicule($db);

    $idCategorie = isset($_GET['idCategorie']) ? intval($_GET['idCategorie']) : null;
    $vehicules = $vehicule->afficheVehicule($idCategorie);

    header('Content-Type: application/json');
    echo json_encode($vehicules);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
