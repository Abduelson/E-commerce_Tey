<?php
require("configuration/commande.php");
session_start();
if(isset($_SESSION['initiale_nom']) && isset($_SESSION['initiale_prenom']) && isset($_SESSION['user']))
{
    $initiale_nom = $_SESSION['initiale_nom'];
    $initiale_prenom= $_SESSION['initiale_prenom'];
    $intial_user= $_SESSION['user'];
    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($initiale_nom . ' ' . $initiale_prenom) . "&background=random";
    $cartNumber = countItems($_SESSION['user']);
}

$produits= Afficher_4();

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
            <script src="jquery.min.js"></script>
            <script src="jquery-3.6.4.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="Css/style.css">

            <title>Acceuil</title>
            
                <style>
                .avatar {
                border-radius: 50%;
                }
                </style>
</head>
<body>
    <section class="section_2">
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
                                <div class="dropdown-content">
                                  <a href="deconexion.php">Déconnexion</a>
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

                        <?php 
                          if($_SESSION['Etat'] !== "Admin"){
                            ?>
                            <li class="imjcart">
                            <a href="myCart.php">
                                <span style="position: absolute; color: red;"><?php echo $cartNumber; ?></span>
                                <img src="Images/offer.png" alt="">
                            </a>
                       </li>
                          <?php 
                          }
                          else{
                            ?>
                            <li class="log"><a href="Admin.php">Admin</a></li>
                            <?php
                          }
                        ?>
                  </ul>

                  <?php } ?>

              </nav>
    </header>
     <div class="Relative">
        <div class="Absolute">
        <h1>Bienvenue chez Teyou<span>Shop</span>!<br>
            Jusqu'a <span>80% de reduction</span><br>
            sur nos offres de la semaine</h1>
        <button style="cursor: pointer;"><a href="Boutique.php" style="color: white; text-decoration: none;">Acheter Maintenant</a></button>
        </div>
     </div>
    </section>
     <div class="livrason">
         <h1>LIVRAISON PAYANT</h1>
    </div>

    <section>
        <div class="Les_titre">
            <h1>INTEMPORELS</h1>
            <div class="line"></div>
            <p>Les indispensables</p>
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
                                <h3>NOM: <?=$prod->Nom?></h3>
                            </div>
                            <div class="Price">
                                <h4>PRICE: $<?=$prod->Prix?></h4>
                            </div>
                            <div class="etoile">
                                    <img src="Images/star-solid-24.png" alt="">
                                    <img src="Images/star-solid-24.png" alt="">
                                    <img src="Images/star-solid-24.png" alt="">
                                    <img src="Images/star-solid-24.png" alt="">
                                    <img src="Images/star-half-solid-24.png" alt="">
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

        </div>
    </section>

    <!-- footer -->
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


    <!-- Added by Jameson Innocent -->
<div id="myModal" class="modal">
        <div class="modal-content">
          <a href="#" class="close-button" onclick="closePreview()">&times;</a>
          <iframe id="modal-iframe" name="modal-iframe" style="width:100%;height:100%;border:none;"></iframe>
        </div>
      </div>
      </div>



      <script>
        function showPreview() {
          console.log("My modal");
          document.getElementById("myModal").style.display = "block";
          document.getElementById("modal-iframe").src = "myCart.html";
        }

        function closePreview() {
          // Hide the modal by calling the hide() method on the modal element
        //   $('#myModal').modal('hide');
        document.getElementById("myModal").style.display = "none";
        }
      </script>


<style>
    .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    height: 100%;
    left: 0;
    top: 0;
    width: 100%;
    overflow: auto;
    background-color: #333;
}

.modal-content {
    background-color: #333;
    margin: 1em auto;
    padding: 1em;
    border: 1px solid var(--sidebar-color);
    max-width: 90%;
    height: 100%;
    position: relative;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    animation-name: modalopen;
    animation-duration: 0.5s;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 5px 10px;
    background-color: red;
    border-radius: 5px;
    text-decoration: none;
    color: var(--primary-color-light);
    font-weight: bold;
    z-index: 9999;
    cursor: pointer;
}

@keyframes modalopen {
    from {opacity: 0;}
    to {opacity: 1;}
}

/* Responsive  */

@media screen and (min-width: 768px) {
    .content {
        flex-direction: row;
    }

    .modal-content {
        background-color: var(--sidebar-color);
        margin: 1em auto;
        padding: 1em;
        border: 1px solid var(--sidebar-color);
        max-width: 50%;
        height: 100%;
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        animation-name: modalopen;
        animation-duration: 0.5s;
    }
}
</style>

</body>
</html>