<?php
 session_start(); 
  require("configuration/commande.php");
    $_SESSION['statut'] = "Pending";
    $ListOrder= ListOrder("Pending");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="stylesheet" href="Css/style_admin.css">
</head>
<body>
   <h1 class="h1commabde">Orders</h1>
    <div class="Commande_container">
    <table>
                <tr>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Check</th>
                </tr>
                <tr>
                
                <?php foreach($ListOrder as $listp): ?>
                    <td><?=$listp['Nom']?></td>
                    <td><?=$listp['Prenom']?></td>
                    <td> <img src="Images/<?=$listp['Image']?>" alt="" width="35px" height="45px"></td>
                    <td><?="$" .$listp['Prix']?></td>
                    <td><?=$listp['Quantite']?></td>
                    <td><?=$listp['Dates']?></td>
                    <td><?=$listp['statut']?></td>
                    <td>
                        <form action="configuration\controller\updateCommande.php"  method="post">
                        <input type="hidden" name="idCom" value="<?=$listp['id']?>"> 
                        <button type="submit" name="valider">Valider</button>
                        </form>
                    </td>
                </tr>
                 <?php endforeach ?>  
                    
        </table>
    </div>
    
</body>
</html>