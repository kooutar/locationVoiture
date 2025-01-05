<?php 
require_once '../classe/db.php';
require_once '../classe/reservation.php';
 session_start();
 $sessionActive= isset($_SESSION['id_user']) ;
 if($sessionActive){


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        .navbar li {
            margin: 0 15px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #4e4ffa;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color:rgb(151, 151, 214);
            color: white;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .edit {
            background-color: green;
        }
        .remove{
            background-color: red;
        }
        .btn:hover {
            background-color: #3c3ccf;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100">

<nav class="bg-black shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-blue-600">Drive & Loc</h1>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="../index.php" class="text-white hover:text-blue-600">Accueil</a>
                    <a href="cars.php" class="text-white hover:text-blue-600">Véhicules</a>
                    <a href="registre.php" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Registre</a>
                </div>
            </div>
        </div>
    </nav>

<div class="container">
    <h1>My Reservations</h1>
    <table>
        <tr>
            <th>Vehicule</th>
            <!-- <th>Vehicule</th> -->
            <th>Image Vehicule</th>
            <th>Date de Rendre</th>
            <th>Date de Reservation</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
        try{
        $database = new Database();
        $db =$database->connect();   
        }catch(PDOException $e){
            $e->getMessage();
        }
         $reservation= new reservation($db);
         $reservations=$reservation->showALLreservationCleint($_SESSION['id_user']);
           
          foreach($reservations as $reservation){
            ?>
             <tr>
             <td><?= $reservation['nom']?></td>
             <!-- <td>Renault Clio</td> -->
             <td><img src='<?=$reservation['path_image']?>' alt="Clio" style="width:100px;"></td>
             <td><?=$reservation['date_fin'] ?></td>
             <td><?=$reservation['date_debut'] ?></td>
             <td><?=$reservation['status']?></td>
             <td>
                 <button  class="btn edit ">Edit</button>
                 <button class="btn remove ">Remove</button>
             </td>
         </tr>
         <?php
          }
        ?>
       
    </table>
</div>
<?php 
 }
?>
</body>
</html>
