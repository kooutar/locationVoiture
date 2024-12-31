
<?php 
// session_start();
// if(!isset($_SESSION['iduser']) || $_SESSION['idrole']!=1){
//     header("location: login.php");
//     exit();
// }
?>
<?php
    require_once '../classe/db.php';
    require_once '../classe/categorie.php';                            
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
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Add Vehicle Form -->
        <div id="addVehicule" class="section hidden">
            <h2 class="text-2xl font-bold mb-6">Ajouter un Véhicule</h2>
            <form class="max-w-lg bg-white p-6 rounded-lg shadow-md">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nom</label>
                        <input type="text" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Prix par jour</label>
                        <input type="number" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Image</label>
                        <input type="file" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Lieu</label>
                        <input type="text" class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Catégorie</label>
                        <select class="w-full p-2 border rounded">
                           <?php
                              try{
                                $database = new Database();
                                $db = $database->connect();
                                $categorie=new categorie($db);
                                $categorie->afficheCategorie();
                                
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
                        <tr>
                            <td class="px-6 py-4">
                                <img src="/api/placeholder/50/50" alt="voiture" class="w-12 h-12 rounded object-cover">
                            </td>
                            <td class="px-6 py-4">BMW X5</td>
                            <td class="px-6 py-4">SUV</td>
                            <td class="px-6 py-4">200€</td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Modifier
                                </button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
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
                        <tr>
                            <td class="px-6 py-4">SUV</td>
                            <td class="px-6 py-4">Véhicules sportifs utilitaires</td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Modifier
                                </button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Show/Hide sections
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }

        // Show first section by default
        showSection('addVehicule');
    </script>
</body>
</html>