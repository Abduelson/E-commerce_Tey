<!-- Code PHP -->
<?php 
   require("configuration/commande.php");
   $TotalProduct=countProduct();
   $TotalProductOrder=SumProductOrder();

   $_SESSION['statut'] = "Done";
   $_SESSION['statut1']= "Pending";
    $vente= Vente($_SESSION['statut']);  

   $countVente= countVente($_SESSION['statut']);

   $countPending= countPending($_SESSION['statut1']);

   $infoUser= InfoUser($_SESSION['statut']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is the dashboard page</title>
    <link rel="stylesheet" href="Css/style_admin.css">
</head>

<body>
    <main class="main_dash">
        <h1>Analytics Overview</h1>
        <div class="container_dash">
            <div class="cart_dash cart1">
                 <div class="cart-content">
                    <p>Article</p>
                    <i class='bx bxs-folder-plus'></i>
                 </div>
                <p><?php 
                    if($TotalProduct>0){
                        echo $TotalProduct;
                    }
                    else{
                        echo '0';
                    }
                 ?></p>
            </div>

            <div class="cart_dash cart2">
                 <div class="cart-content">
                    <p>On order</p>
                    <i class='bx bx-cart-download'></i>
                 </div>
                <p><?php if($TotalProductOrder > 0)
                         {
                            echo $TotalProductOrder;
                        } 
                         else{
                            echo '0';
                         }
                 ?></p>
            </div>

            <div class="cart_dash cart3">
                 <div class="cart-content">
                    <p>Ventes</p>
                    <i class='bx bxs-message-square-check'></i>
                 </div>
                <p>
                <?php if($countVente > 0)
                         {
                            echo $countVente;
                        } 
                         else{
                            echo '0';
                         }
                 ?>
                </p>
            </div>

            <div class="cart_dash cart4">
                  <div class="cart-content">
                    <p>Pending</p>
                    <i class='bx bxs-message-x'></i>
                 </div>
                <p>
                <?php if($countPending > 0)
                         {
                            echo $countPending;
                        } 
                         else{
                            echo '0';
                         }
                 ?>
                </p>
            </div>

            <div class="cart_Mvente cart5">
                    <div class="title_view">
                        <p class="title">Recent Ventes</p>
                        <input type="button" value="View All">
                    </div>

                    <div id="chart-bar">
                       <table>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Prix</th>
                                    <th>Quantite</th>
                                </tr>
                                <?php foreach($vente as $vent): ?>
                                <tr>
                                    <td><?=$vent['Nom']?></td>
                                    <td><?=$vent['Prenom']?></td>
                                    <td><?="$" .$vent['Prix']?></td>
                                    <td><?=$vent['Quantite']?></td>
                                </tr>
                                <?php endforeach ?>  
                            </table>

                    </div>
            </div>
                
            <div class="cart_Mvente cart6">
                    <p class="title">Recent Customers</p>
                    <div id="chart-area">
                      <?php foreach($infoUser as $infoU): ?>
                        <div class="chart_profil">
                           <?php $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($infoU["Nom"] . ' ' . $infoU["Prenom"]) . "&background=random";?>
                           <img src="<?php echo $avatarUrl; ?>" alt="<?php echo $infoU["Nom"] . ' ' . $infoU["Prenom"]; ?>" class="avatar" style="height: 30px; width: 30px;">
                            <div class="info_user">
                                <p6><?=$infoU["Nom"] ?></p6>
                                <p6 class="pays"><?=$infoU["Commune"] ?></p6>
                            </div>
        
                        </div>
                        <?php endforeach ?>
                    </div>
             </div>
             
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.1"></script>
    <script src="Javascript/dash.js"></script>
</body>
</html>