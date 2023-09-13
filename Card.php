<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    
    <link rel="stylesheet" href="Css/Service.css">
    <title>Card</title>
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
                            <li><a href="About.php">About</a></li>
                            <li><a href="Boutique.php">Boutique</a></li>
                            <li><a href="Service_client.php">Service client</a></li>
                        </ul>
                    </nav>

            </header>
            </section>
             
            <?php
            if (isset($_GET['produit']) || isset($_POST['bouton_submit']) && $_POST['bouton_submit'] === 'click2') {
                $_SESSION['estClique'] = true;
            ?>
            <section class="contenaire_affichage">
                   <div class="Ensemble_element">
                      <h1 style="text-align: center;">Votre carte</h1>
                        <div class="card_content">
                            <?php 
                            require("configuration/commande.php");
                            if (isset($_GET['produit'])) {
                                $id = $_GET['produit'];
                                $produit = Rechercher($id);
                                if (!empty($produit)) {
                            ?>
                              <div class="card-box">
                                 <img src="Images/<?=$produit['Image']; ?>" class="images">
                                 <div class="card_details">
                                 <div class="card_title"><?=$produit['Nom']; ?></div>
                                 <div class="card_prix">$<?=$produit['Prix']/2; ?></div>
                                <input type="number" value="" class="card_qte" placeholder="<?=$produit['Quantite']?>">
                            </div>
                            <img src="Images/trash-alt-solid-24.png" class="card_remove" alt="">
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
                   <div class="total">
                      <div class="totale_title">Total</div>
                      <div class="total_prix">$0</div>
                   </div>
                   <button type="button" class="btn">Buy now</button>
            </section>
             <?php } 
             else{
                echo 'pas de donne pour maintenant';
             }
             ?>
            <footer>
        <div class="footer_1">

             <div class="footer_left">
                <p>RESTEZ CONNECTEE</p>
                 <div class="footer_logo">
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-twitter"></i></a>
                 </div>
             </div>

             <div class="footer_center">
                <h1>Adresse</h1>
                 <p>Carradeux rue Anbroise</p>
                 <p>Croix des bouquet</p>
             </div>
             <div class="footer_right">
                <h1>Baision d'aide??</h1>
                <p>+509 3437 6724</p>
                <p>Teyou@gmail.com</p>
             </div>
        </div>

        <div class="footer_2">
            <div class="footer_2_title">
            <a href=""><p>Mention legale</p></a>
            <a href=""><p>Politique de confidentialite</p></a>
            <a href=""><p>Polotique de cookies</p></a>
            </div>
            <p>© 2035 par Abduelson Lyvert. Créé avec Wix.com</p>
        </div>
    </footer> 

    <script>
        humberger=document.querySelector(".humberger");
        humberger.onclick= function(){
          navbar=document.querySelector(".nav-bar");
          navbar.classList.toggle("active");
        }
    </script> 

    <script src="Javascript/card.js"></script>
</body>
</html>