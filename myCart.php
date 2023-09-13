<?php
require("configuration/commande.php");
session_start();
if(isset($_SESSION['initiale_nom']) && isset($_SESSION['user'])){
   $cartItems = getCartItems($_SESSION['user']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/Produit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="Javascript/card.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </head>
<body>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
      
              <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="Boutique.php" class="btn btn-warning">Retour</a>
                <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                <!-- <div>
                  <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                        class="fas fa-angle-down mt-1"></i></a></p>
                </div> -->
              </div>
        <?php
        if(!empty($cartItems)){
          $total = 0;
          foreach ($cartItems as $product) {  
            $total += $product['quantite'] * $product['Prix'];
        ?>
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="Images/<?= $product['Image'] ?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"> <?= $product['Nom'] ?> </p>
                      <!-- <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p> -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>
      
                      <input id="form1" min="0" name="quantity" disabled value="<?= $product['quantite'] ?>" type="number"
                        class="form-control form-control-sm" />
      
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0 price">$<?= $product['quantite'] * $product['Prix'] ?></h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                      <button onclick="deleteItem(<?= $product['id'] ?>)" type="button" class="btn btn-danger">Delete</button>
                    </div>

                    <!-- <div class="card"> -->
                      <!-- <div class="card-body"> -->
                        <!-- <button type="button" class="btn btn-danger">Delete Item</button> -->
                      <!-- </div> -->
                  <!-- </div> -->
                  </div>
                </div>
              </div>
      
            <?php } ?>

              <div class="card">
                <div class="card-body">
                  <h3>Total : <span>$ <?= $total ?></span></h3>
                </div>

                <div class="card-body">
                  <button type="button" onclick="commander('<?= $_SESSION['user'] ?>')" class="btn btn-warning btn-block btn-lg">Commander</button>
                </div>
              </div>
              <?php } ?>
              <!-- error message -->
              <?php 
                 if(empty($cartItems)){
                ?>
                <div class="response">
                    <img src="Images/error-regular-24 (1).png" alt="" width="50px" height="50px">
                    <h1>Vous n'avez pas encore de produits dans votre cart! </h1>
                </div>
                <?php
                }
                ?>
      
            </div>
          </div>
        </div>
      </section>

</body>
</html>