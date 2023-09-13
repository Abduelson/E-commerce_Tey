<?php
require("commande.php");

function addToCart($idProd, $qte, $userId){
    if(verifyItem($userId, $idProd) > 0){
        echo "This item already exists in cart!";
    }else{
         if(require("connexion_config.php")){
        $stmt = $acess->prepare("INSERT INTO cart_items (idProduit, user_id, quantite) VALUES(:idProduit, :userId, :quantite)");
        $stmt->bindParam(':idProduit',$idProd);
        $stmt->bindParam(':userId',$userId);
        $stmt->bindParam(':quantite',$qte);

            if($stmt->execute()){
                echo "Added to cart successfully!";
            }

    }
}
}


function commander($user_id)
{
    if (require("connexion_config.php")) {
        $cart_array = getCartItems($user_id);
        $total = 0;
        foreach ($cart_array as $product) {
            $image = $product['Image'];
            $quantite = $product['quantite'];
            $prix = $product['quantite'] * $product['Prix'];
            $dates = $product['Dates'];
            $idprod=$product['idProduit'];
            $iduser=$product['user_id'];
            // $total += 
        
            // Insérer les éléments dans une autre table
            $insertReq = $acess->prepare("INSERT INTO Commander (Images, Quantite, Prix, Dates, Id_user ,id_prod) VALUES (:images, :quantite, :prix, :dates, :iduser ,:idpro )");
            $insertReq->bindParam(':images', $image);
            $insertReq->bindParam(':quantite', $quantite);
            $insertReq->bindParam(':prix', $prix);
            $insertReq->bindParam(':dates', $dates);
            $insertReq->bindParam(':iduser', $iduser);
            $insertReq->bindParam(':idpro', $idprod);
            $insertReq->execute();
        }
        // $message .= "Total: $". $total;
        echo "Merci d'avoir choisi TeyouShop";

        deleteAllItem($user_id);
    }
}

function deleteItem($itemId){
    if(require("connexion_config.php")){
        $stmt = $acess->prepare("DELETE FROM cart_items WHERE id =:id");
        $stmt->bindParam(":id", $itemId);
        if($stmt->execute()){
            echo "Deleted successfully!";
        }
    }
}

function deleteAllItem($user_id){
    if(require("connexion_config.php")){
        $stmt = $acess->prepare("DELETE FROM cart_items WHERE user_id =:user_id");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
    }
}
?>