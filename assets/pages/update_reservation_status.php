<?php
 require_once '../classe/db.php';
 $database=new Database();
 $db= $database->connect(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification de la présence des paramètres
    if (isset($_POST['iduser'], $_POST['idvehicule'], $_POST['status'])) {
        $iduser = $_POST['iduser'];
        $idvehicule = $_POST['idvehicule'];
        $status = $_POST['status'];

        // Préparer la requête SQL pour mettre à jour le statut
        $stmt = $db->prepare("UPDATE reservation SET status = :status WHERE iduser = :iduser AND idVehicule = :idvehicule");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':iduser', $iduser);
        $stmt->bindParam(':idvehicule', $idvehicule);

        // Exécuter la requête et vérifier si elle a réussi
        if ($stmt->execute()) {
            // Redirection vers la page des réservations avec un message de succès
            header('Location: admin.php?status=success');
            exit;
        } else {
            // En cas d'échec, redirection avec un message d'erreur
            header('Location: admin.php?status=error');
            exit;
        }
    } else {
        // Si les paramètres sont manquants
        header('Location: admin.php?status=missing_params');
        exit;
    }
}
?>
