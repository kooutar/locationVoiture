<?php
    require_once '../classe/db.php';
    require_once '../classe/categorie.php';  
    require_once '../classe/vehicule.php'; 
    try{

        $database = new Database();
        $db = $database->connect();
    } catch(PDOException $e){
        $e->getMessage();
    }
                          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>CarVilla</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="../logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="../css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="../css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="../css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="../css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
		<link rel="stylesheet" href="../css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="../css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="../css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="../css/responsive.css">
        <style>
    .featured-cars {
    padding: 80px 0;
    background: #f8f9fa;
}

.single-featured-cars {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.single-featured-cars:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.featured-cars-img img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px 5px 0 0;
}

.featured-model-info {
    padding: 10px;
    background: rgba(0,0,0,0.05);
}

.featured-cars-txt {
    padding: 20px;
}

.featured-cars-txt h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.featured-cars-txt h3 {
    color: #4e4ffa;
    margin-bottom: 15px;
}

.featured-mi-span, .featured-hp-span {
    margin: 0 10px;
    padding: 2px 8px;
    background: #4e4ffa;
    color: white;
    border-radius: 3px;
}

.welcome-btn {
    background: #4e4ffa;
    color: white;
    padding: 10px 30px;
    border: none;
    transition: all 0.3s ease;
}

.welcome-btn:hover {
    background: #0102fa;
    color: white;
}
.vehicle-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .vehicle-card {
            width: 300px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .vehicle-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .vehicle-details {
            padding: 15px;
        }

        .vehicle-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .vehicle-title {
            font-size: 18px;
            font-weight: bold;
        }

        .vehicle-price {
            color: #4e4ffa;
            font-weight: bold;
        }

        .tags {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .tag {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 14px;
        }

        .tag-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .tag-family {
            background: #ffebee;
            color: #c62828;
        }

        .reserve-button {
            width: 100%;
            padding: 10px;
            background: #4e4ffa;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .reserve-button:hover {
            background: #3a3bc7;
        }
        </style>
</head>
<body>
   <!-- top-area Start -->
   <section id="home" class="welcome-hero">

    <!-- top-area Start -->
    <div class="top-area">
        <div class="header-area">
            <!-- Start Navigation -->
            <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                <div class="container">

                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html">carvilla<span></span></a>

                    </div><!--/.navbar-header-->
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class=" scroll active"><a href="#home">home</a></li>
                            <li class="scroll"><a href="#service">service</a></li>
                            <li class="scroll"><a href="#featured-cars">featured cars</a></li>
                            <li><a href="./assets/pages/cars.html">cars</a></li>
                            <li class="scroll"><a href="#brand">brands</a></li>
                            <li class="scroll"><a href="#contact">contact</a></li>
                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container-->
            </nav><!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix"></div>

    </div><!-- /.top-area-->
    <!-- top-area End -->

    <div class="container">
        <div class="welcome-hero-txt">
            <h2>get your desired car in resonable price</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore   magna aliqua. 
            </p>
           
        </div>
    </div>
    <!-- section affiche vehicules -->
</section>

<section class="featured-cars" style="margin-top: 50px;">
    <div class="container">
        <!-- Search and Filter Section -->
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un véhicule..." style="height: 45px;">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" style="height: 45px; background: #4e4ffa; color: white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-control" style="height: 45px;">
                    <option value="">Toutes les catégories</option>
                    <?php
                                $categorie=new categorie($db);
                                $array= $categorie->afficheCategorie();
                                 foreach($array as $row)
                                 {
                                   echo "<option class='optionCategorie' value=".$row['idCategorie'].">".$row['nom']."</option>";
                                 }
                            
                           ?>
                </select>
            </div>
        </div>

        <!-- Vehicles Cards -->
        <div class="vehicle-grid">
        <?php 
         $vehicle=new vehicule($db);
         $vehicles= $vehicle->afficheVehicule();
        foreach( $vehicles as $row): ?>
            <div class="vehicle-card">
                <img src="<?= $row['path_image'] ?>" alt="" class="vehicle-image">
                <div class="vehicle-details">
                    <div class="vehicle-header">
                        <h2 class="vehicle-title"><?= $row['nom']  ?> </h2>
                        <span class="vehicle-price"><?= $row['prix']  ?></span>
                    </div>
                    <div class="tags">
                            <span class="tag tag-active"><?= $row['categorie']?></span>
                            <span class="tag tag-family"><?= $row['lieu']?></span>
                       
                    </div>
                    <form action="detaille.php" method="POST">
                        <input type="hidden" name="idvehicule" value="<?=$row['idVehicule']?>">
                    <button class="reserve-button" id="">Voir plus</button>
                    </form>
                   

                </div>
            </div>
            
        <?php endforeach; ?>
    </div>
    

        <!-- Load More Button -->
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 40px;">
                <button class="btn welcome-btn">Voir plus de véhicules</button>
            </div>
        </div>
    </div>
</section>


<script src="../js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="../js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="../js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="../js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="../js/custom.js"></script>
        <script>
        // function fetchVehicules(idCategorie = '') {
        //     $.ajax({
        //         url: 'getVehicules.php',
        //         type: 'POST',
        //         data: { idCategorie: idCategorie },
        //         success: function(data) {
        //             let html = '';
        //             if (data.length > 0) {
        //                 data.forEach(vehicule => {
        //                     html += `
        //                         <div class="card">
        //                             <h3>${vehicule.nom}</h3>
        //                             <p>Prix : ${vehicule.prix}€</p>
        //                             <p>Lieu : ${vehicule.lieu}</p>
        //                             <img src="${vehicule.path_image}" alt="${vehicule.nom}" style="width:100px; height:auto;">
        //                         </div>
        //                     `;
        //                 });
        //             } else {
        //                 html = '<p>Aucun véhicule trouvé.</p>';
        //             }
        //             $('#vehicules').html(html);
        //         },
        //         error: function(err) {
        //             console.error('Erreur:', err);
        //         }
        //     });
        // }

        // // Charger tous les véhicules au chargement de la page
        // $(document).ready(function() {
        //     fetchVehicules();

        //     // Recharger les véhicules à chaque changement de catégorie
        //     $('#categorie').change(function() {
        //         const idCategorie = $(this).val();
        //         fetchVehicules(idCategorie);
        //     });
        // });
    </script>
</body>
</html>