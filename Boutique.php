<?php 
require("configuration/commande.php");
$produits= Afficher();

session_start();
if(isset($_SESSION['initiale_nom']) && isset($_SESSION['initiale_prenom']) && isset($_SESSION['user']))
{
    $initiale_nom = $_SESSION['initiale_nom'];
    $initiale_prenom= $_SESSION['initiale_prenom'];
    $intial_user= $_SESSION['user'];
    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($initiale_nom . ' ' . $initiale_prenom) . "&background=random";
    $cartNumber = countItems($_SESSION['user']);
}
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
     <!-- Lien popups -->
     <link rel="stylesheet" href="path/to/magnific-popup.css">
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/jquery.magnific-popup.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Css/style.css">
    <title>Boutique</title>
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
                            if(isset($_SESSION['initiale_nom']) && isset($_SESSION['user'])){
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
   
    <section>
        <div class="Les_titre">
             <!-- filtre pour les produits -->
             <?php 
              if(isset($_POST['nom'])){
                  $nom=$_POST['nom'];
                  $Les_produits= filter($nom);
                  if(!empty($Les_produits)){
                      ?>
                       <div class="contanaire">
                      <?php foreach($Les_produits as $prods): ?>
                       <div class="card">
                        <div class="Card_image">
                            <a href="Images/<?=$prods['Image']?>" class="image">
                                <img src="Images/<?=$prods['Image']?>" alt="">
                            </a>
                        </div>
            
                        <div class="Card_body">
                             <div class="title">
                                <h3>Nom: <?=$prods['Nom']?></h3>
                            </div>
                            <div class="Price">
                                <h4>Price: $<?=$prods['Prix']?></h4>
                            </div>
                
                            <div class="Buttom">
                               <form action="Acheter.php" method="GET">
                                <input type="hidden" name="id" value="<?=$prods['Id_prod']?>">
                               <button style="cursor: pointer;" type="submit">Voir</button>
                               </form>
                            </div>
                        </div>
                </div>

        <?php endforeach ?>
        </div>
                  <?php
                  }else{
                    echo "Aucun produits n'est present pour ce nom";
                  }

              }else{
              
             ?>
            <div class="recher">
                <div class="div-text">
                <h1>DISPONIBLE</h1>
                <p>Les plus recents</p>
                </div>
                 <form action="Boutique.php" method="POST">
                  <input type="text" style="width: 340px; border: none; outline: none; background-color: #3b3d3b; padding:  7px 7px 7px 13px; border-radius: 20px 0px 0 20px; color: white;" name="nom" placeholder="Type...">
                  <input type="submit" style="padding:7px; border-radius: 0px 20px 20px 0px; border: none; outline: none; cursor: pointer;" value="Search">
                 </form>
            </div>
        </div>
          
        <div class="contanaire">
        <?php foreach($produits as $prod): ?>
            <div class="card">
                        <div class="Card_image">
                            <a href="Images/<?=$prod->Image?>" class="image">
                                <img src="Images/<?=$prod->Image?>" alt="">
                            </a>
                        </div>
            
                        <div class="Card_body">
                             <div class="title">
                                <h3>Nom: <?=$prod->Nom?></h3>
                            </div> 
                            <div class="Price">
                                <h4>Price: $<?=$prod->Prix?></h4>
                            </div>
                            
                            <div class="Buttom">
                               <form action="Acheter.php" method="GET">
                                <input type="hidden" name="id" value="<?=$prod->Id_prod?>">
                               <button style="cursor: pointer;" type="submit">Voir</button>
                               </form>
                            </div>
                        </div>
                </div>

        <?php endforeach ?>
        <?php }?>
        </div>
    </section>

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
                    <a href="https://wa.me/50934276734"><i class="bi bi-whatsapp"></i></a>
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
</body>
</html>