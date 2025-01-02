
<?php 
session_start();
if(!isset($_SESSION['id_user']) || $_SESSION['idrole']!="admin"){
    header("location: login.php");
    exit();
}
?>
<?php
    require_once '../classe/db.php';
    require_once '../classe/categorie.php';  
    require_once '../classe/vehicule.php';
    require_once '../classe/admin.php';
    try{
       $database = new Database();
       $db=$database->connect();
    }catch(PDOException $e){$e->getMessage();}
    $admin =new admin($db); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Admin - Drive & Loc</title>
   
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-screen w-64 bg-blue-800 text-white p-4">
        <h1 class="text-2xl font-bold mb-8">Drive & Loc Admin</h1>
        <nav class="space-y-4">

            <button onclick="showSection('addVehicule')" class="w-full text-left p-3 hover:bg-blue-700 rounded">
                ➕ Ajouter Véhicule
            </button>
            <button onclick="showSection('addCategorie')" class="w-full text-left p-3 hover:bg-blue-700 rounded">
                ➕ Ajouter Catégorie
            </button>
            <button onclick="showSection('reservations')" class="w-full text-left p-3 hover:bg-blue-700 rounded">
                📋 Voir Réservations
            </button>
            <button onclick="showSection('vehicules')" class="w-full text-left p-3 hover:bg-blue-700 rounded">
                🚗 Tous les Véhicules
            </button>
            <button onclick="showSection('categories')" class="w-full text-left p-3 hover:bg-blue-700 rounded">
                📑 Toutes les Catégories
            </button>
            <button onclick=""
            class="w-full text-left p-3 hover:bg-blue-700 rounded">
                📑 Deconnexion
            </button>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Add Vehicle Form -->
        <div id="addVehicule" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Ajouter un Véhicule</h2>
            <form class="max-w-lg bg-white p-6 rounded-lg shadow-md" action="../traitement/vehicule.php" method="POST" enctype="multipart/form-data">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nom</label>
                        <input type="text" name="nom" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Prix par jour</label>
                        <input type="number" name="prix" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Image</label>
                        <input type="file" name="image_path" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Lieu</label>
                        <input type="text" name="lieu" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Catégorie</label>
                        <select id="categorie" name="selectCategorie" class="w-full p-2 border rounded">
                           <?php
                              try{
                                $database = new Database();
                                $db = $database->connect();
                                $categorie=new categorie($db);
                                $array= $categorie->afficheCategorie();
                                 foreach($array as $row)
                                 {
                                   echo "<option class='optionCategorie' value=".$row['idCategorie'].">".$row['nom']."</option>";
                                 }
                              }catch(PDOException $e){

                              }
                           ?>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Ajouter le véhicule
                    </button>
                </div>
            </form>
        </div>

        <!-- Add Category Form -->
        <div id="addCategorie" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Ajouter une Catégorie</h2>
            <form class="max-w-lg bg-white p-6 rounded-lg shadow-md" action="../traitement/categorie.php" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nom de la catégorie</label>
                        <input type="text" name="nomCategorie" class="w-full p-2 border rounded" require>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Description</label>
                        <textarea class="w-full p-2 border rounded h-24"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Ajouter la catégorie
                    </button>
                </div>
            </form>
        </div>

        <!-- Reservations Table -->
        <div id="reservations" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Réservations</h2>
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Client</th>
                            <th class="px-6 py-3 text-left">Véhicule</th>
                            <th class="px-6 py-3 text-left">Date début</th>
                            <th class="px-6 py-3 text-left">Date fin</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr>
                            <td class="px-6 py-4">John Doe</td>
                            <td class="px-6 py-4">BMW X5</td>
                            <td class="px-6 py-4">01/01/2024</td>
                            <td class="px-6 py-4">05/01/2024</td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Accepter
                                </button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Refuser
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Vehicles Table -->
        <div id="vehicules" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Tous les Véhicules</h2>
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Image</th>
                            <th class="px-6 py-3 text-left">Nom</th>
                            <th class="px-6 py-3 text-left">Catégorie</th>
                            <th class="px-6 py-3 text-left">Prix/Jour</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                    <?php
                    $vehicule = new vehicule($db); 
                    $vehicules = $vehicule->afficheVehicule(); 
                    foreach ($vehicules as $row) { 
                        echo "<tr>
                            <td class='px-6 py-4'>
                                <img src='" . htmlspecialchars($row['path_image']) . "' alt='voiture' class='w-12 h-12 rounded object-cover'>
                            </td>
                            <td class='px-6 py-4'>" . htmlspecialchars($row['nom']) . " X5</td>
                            <td class='px-6 py-4'>" . htmlspecialchars($row['idCategorie']) . "</td>
                            <td class='px-6 py-4'>" . htmlspecialchars($row['prix']) . "</td>
                            <td class='flex px-6 py-4 space-x-2'>
                       
                                <button data-id='{$row['idVehicule']}'
                                        data-nom='{$row['nom']}'
                                        data-prix='{$row['prix']}'
                                        data-categorie='{$row['idCategorie']}'
                                        data-path='{{$row['path_image']}}' name='' class='bteModifier bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600'>
                                    Modifier
                                </button>
                           
                            <form action='../traitement/removevehicule.php' method='POST'>
                                <input type='hidden' name='idvehicule' value={$row['idVehicule']}>
                                <button class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>
                                    Supprimer
                                </button>
                            </form>
                            </td>
                        </tr>";
                    }
                    ?>

                       
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Categories Table -->
        <div id="categories" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Toutes les Catégories</h2>
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Nom</th>
                            <th class="px-6 py-3 text-left">Description</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        
                           <?php 
                            foreach($array as $row)
                            {
                             echo " <tr>
                                 <td>".$row['nom']."</td>
                                  <td>".$row['description']."</td>
                                  <td class='px-6 py-4 space-x-2'>
                                <button class='bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600'>
                                    Modifier
                                </button>
                                <button class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>
                                    Supprimer
                                </button>
                            </td>
                            </tr> ";
                            }
                           ?>
                            
                            
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-96 mx-auto mt-20 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Edit Vehicle</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form action="update_vehicle.php" method="POST" enctype="multipart/form-data">
            
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="modal-nom"name="name" value="<?php echo $car['nom']?>" class="w-full border rounded-lg px-3 py-2" required>
                </div>

                <!-- Price per day -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price per day</label>
                    <input type="number" id="modal-prix" name="price" value=" <?php echo $car['prix']?>" class="w-full border rounded-lg px-3 py-2" required>
                </div>

                <!-- Image --> 
               <!-- <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" name="image" id="modal-path"value="<?php echo $car['path_image']?>" class="w-full border rounded-lg px-3 py-2" accept="image/*">
                    <img id="image-preview" alt="Aperçu de l'image" style="max-width: 100px;">
                </div> -->

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" id="modal-categorie" class="w-full border rounded-lg px-3 py-2" required>
                        <?php  foreach($array as $row)
                                 {
                                   echo "<option class='optionCategorie' value=".$row['idCategorie'].">".$row['nom']."</option>";
                                 } ?>
                          
                       
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
</div>
    <script>
 
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }
        let allOption = document.querySelectorAll(".optionCategorie");

        showSection('addVehicule');



function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
}
const modifyButtons = document.querySelectorAll('.bteModifier');
const editModal=document.getElementById('editModal');
const modalId = document.querySelector('#modal-id');
const modalNom = document.querySelector('#modal-nom');
const modalPrix = document.querySelector('#modal-prix');
const modalCategorie = document.querySelector('#modal-categorie');
const modalpath= document.querySelector('#modal-path');
const imagePreview = document.querySelector('#image-preview');
modifyButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        
        const idVehicule = button.dataset.id;
        const nom = button.dataset.nom;
        const prix = button.dataset.prix;
        const categorie = button.dataset.categorie;
    //   const path=button.dataset.path;
        // Remplir la modal avec les informations du véhicule
       
        modalNom.value = nom;
        modalPrix.value = prix;
        modalCategorie.value = categorie;
        // imagePreview.src =path;
        // Afficher la modal
        editModal.classList.remove('hidden');
    });
});

// modalpath.addEventListener('change', (event) => {
//     const file = event.target.files[0];
//     if (file) {
//         const reader = new FileReader();
//         reader.onload = (e) => {
//             imagePreview.src = e.target.result;
//         };
//         reader.readAsDataURL(file);
//     }
// });
    </script>
</body>
</html>