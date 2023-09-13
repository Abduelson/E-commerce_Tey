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
    <link rel="stylesheet" href="Css/Service.css">
    <style>
        .avatar {
        border-radius: 50%;
        }
        </style>
    <title>Service_client</title>
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
     
    <section class="client">
        <div class="client1">
        <h1>SERVICE CLIENT</h1>
        <P>La satisfaction de nos clients est notre priorité absolue. Nous nous engageons à traiter chaque 
            demande avec rapidité, efficacité et courtoisie. Si vous rencontrez un problème avec votre commande, 
            notre équipe fera tout son possible pour le résoudre rapidement et vous assurer une expérience d'achat sans souci. 
            Votre satisfaction est notre réussite N'hésitez pas à contacter notre service client via notre formulaire de contact, par e-mail ou par téléphone.</P>
        </div>
        <div class="line2"></div>
        
        <div class="client_contact">
            <div class="client_info">
            <div class="paragraphe">
            <p>Vous avez des questions?</p>
            <p> Nous sommes là pour vous répondre !</p>
            </div>
            <h3>Appelez-nous au</h3>
            <p>+ 509 3427 6734</p>
            <p>ou envoyez-nous un e-mail sur</p>
            <p>sterlinesagesse@gmail.com</p>
            </div>
             
            <div class="client_formumlaire">
                <form action="email.php" method="post">
                    <input type="text" name="Nom" placeholder="Nom">
                    <input type="text" name="Email" placeholder="Email">
                    <input type="text" name="Object" placeholder="Object">
                    <textarea id="my-textarea" name="my-textarea" rows="8" cols="50" placeholder="Message" style="resize: none; padding: 10px"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
        <div class="line3"></div>
        
        <h1 style="text-align: center;">FAQ</h1>
        <div class="client_recommandation">
            <div class="recommandation_left">
                 <div class="suivre_commande">
                    <h1>Comment suivre ma commande ?</h1>
                    <p>Une fois que le client a trouvé le produit qu'il souhaite acheter, 
                        il l'ajoute à son panier. Il peut également modifier la quantité 
                        ou supprimer le produit du panier si nécessaire.</p>
                 </div>

                 <div class="suivre_commande">
                    <h1>Quelle est la politique de retour ?</h1>
                    <p>Les politiques de retour spécifient souvent une période pendant laquelle
                         les clients peuvent retourner un produit, généralement entre 7 et 30 jours après la réception du produit</p>
                 </div>
            </div>

            <div class="recommandation_right">
                <div class="livraison">
                    <h1>Comment fonctionne les livraisons ?</h1>
                    <p> Le site web expédie le produit au client, en utilisant le mode de livraison choisi par le client lors de l'achat. 
                        Le client peut également suivre l'état de la livraison en utilisant un numéro de suivi fourni par le site web.</p>
                </div>

                <div class="livraison">
                    <h1>Comment retourner un article ?</h1>
                    <p> Si votre article est éligible pour un retour, contactez le service client du site web ou du vendeur pour informer votre demande de retour. 
                        Vous pouvez généralement contacter le service client par téléphone, email, ou via un formulaire de contact en ligne.</p>
                </div>
            </div>
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
</body>
</html>