<?php
session_start();
require("configuration/commande.php");
if(isset($_SESSION['initiale_nom']) && isset($_SESSION['initiale_prenom']) && isset($_SESSION['user']))
{
    $initiale_nom = $_SESSION['initiale_nom'];
    $initiale_prenom= $_SESSION['initiale_prenom'];
    $intial_user= $_SESSION['user'];
    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($initiale_nom . ' ' . $initiale_prenom) . "&background=random";
    $cartNumber = countItems($_SESSION['user']);
}

// Afficher Produits
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Miao&display=swap" rel="stylesheet">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="Css/Produit.css">
    <script src="Javascript/card.js"></script>
    <script src="jquery.min.js"></script>
    <script src="jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Produits</title>
    <style>
        .avatar {
        border-radius: 50%;
        }
        </style>
</head>
<body>
<section class="section_3" style="background-color: #3b3d3b;">
    <header>
                <div class="logo">
                  <a href="index.php" style="display: flex; text-decoration: none;"><h1 style="color: black;">Teyou<span>Shop</span></h1>
                  <img src="Images/shopping-bag.png" alt="" width="30px" height="40px"></a>
              </div>
              <div class="humberger">
                  <div class="line"></div>
                  <div class="line"></div>
                  <div class="line"></div>
              </div>

              <nav class="nav-bar">
                  <ul>
                      <li><a href="index.php" class="active">Acceuil</a></li>
                      <li><a href="Boutique.php">Boutique</a></li>
                      <li><a href="About.php">About</a></li>
                      <li><a href="Service_client.php">Service client</a></li>
                      <li>
                            <?php 
                            if(isset($_SESSION['initiale_nom']) && isset($_SESSION['initiale_prenom']) && isset($_SESSION['user'])){
                                ?>
                                <div class="dropdown">
                                <button class="dropdown-btn">
                                <img src="<?php echo $avatarUrl; ?>" alt="<?php echo $initiale_nom . ' ' . $initiale_prenom; ?>" class="avatar" style="height: 30px; width: 30px;">
                                </button>
                                <div class="dropdown-content" style="background-color: black;">
                                  <a href="deconexion.php" style="color: white;">Déconnexion</a>
                                </div>
                              </div>
                              <?php
                            }
                            else{
                                ?>
                                <li class="log"><a href="login.php">login</a></li>
                                <?php
                            }
                            
                            ?>
                            <?php if(isset($_SESSION['user'])){   ?>
                      </li>

                        <li class="imjcart">
                            <a href="myCart.php">
                                <span style="position: absolute; color: red;"><?php echo $cartNumber; ?></span>
                                <img src="Images/offer.png" alt="">
                            </a>
                       </li>
                  </ul>

                  <?php } ?>

              </nav>

    </header>
    </section>
    
      <main>
      <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $produit = Rechercher($id);
    if (!empty($produit)) {
?>
        <div class="main_left">
            <div class="image_content">
                <?php if (!empty($produit['Image'])) { ?>
                    <img src="Images/<?php echo $produit['Image']; ?>" alt="">
                <?php } else { ?>
                    <p>Aucune image disponible</p>
                <?php } ?>
            </div>
        </div>

        <div class="main_right">
            <div class="main_content">
                <p style="padding-bottom: 10px; color: rgb(29, 234, 234);">Teyou conpany</p>
                <h1 style="padding-bottom: 15px;"><?php echo $produit['Nom']; ?></h1>
                <p style="padding-bottom: 15px;"><?php echo $produit['Description']; ?></p>

                <div class="main_price">
                    <h1>$<?php echo $produit['Prix']; ?></h1>
                    <p>50%</p>
                </div>
                <p style="padding-bottom: 20px; text-decoration: line-through;">$<?php echo $produit['Prix']/2; ?></p>

                <div class="main_botom">
                    <div class="main_controle">
                        <input type="number" id="qteProd" name="nombre" min=1 value="1" >
                        <button>
                                <?php if (isset($_SESSION['user'])) { ?>
                                    <li style="list-style: none;">
                                    <input type="button" class="bouton" value="Add to cart" onclick="addToCart(<?=$produit['Id_prod']?>,<?= $intial_user ?>)" >
                                    </li>
                                <?php } else { ?>
                                    <li class="liClass"><a href="login.php">login</a></li>
                                <?php } ?>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Aucun produit trouvé avec l'ID spécifié.";
    }
} else {
    echo "L'ID n'a pas été transmis dans l'URL.";
}
?>

      </main>

      
      <footer>
        <div class="footer_1">
             <div class="footer_center">
                <h1>Company</h1>
                <div class="trace"></div>
                 <p>About us</p>
                 <p>Our services</p>
                 <p>Privacy policy</p>
                 <p>Affilate program</p>
             </div>

             <div class="footer_center">
                <h1>Get help</h1>
                <div class="trace"></div>
                <p>FAQ</p>
                <p>shipping</p>
                <p>Returns</p>
                <p>Order status</p>
             </div>

             <div class="footer_center">
                <h1>Online shop</h1>
                <div class="trace"></div>
                <p>Groceries</p>
                <p>Electronic</p>
                <p>Dress</p>
                <p>Smartphone</p>
             </div>
             <div class="footer_center">
                <h1>Suivez-nous</h1>
                 <div class="footer_logo">
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-twitter"></i></a>
                 </div>
             </div>
        </div>

        <div class="footer_2">
            <p>© 2035 par Abduelson Lyvert. Droit reserver</p>
        </div>
    </footer> 

    <script>
        humberger=document.querySelector(".humberger");
        humberger.onclick= function(){
          navbar=document.querySelector(".nav-bar");
          navbar.classList.toggle("active");
        }
    </script> 
    <!-- <script src="card.js"></script> -->
</body>
</html>