<?php 
  function Afficher(){
    if(require("connexion_config.php")){
         $reqette= $acess->prepare("SELECT * FROM Produits ORDER BY Dates DESC");
         $reqette->execute();

         $data= $reqette->fetchAll(PDO::FETCH_OBJ);
         return $data;

         $reqette->closeCursor();
    }
  }

  function Afficher_4(){
    if(require("connexion_config.php")){
        if($acess){
          $reqette= $acess->prepare("SELECT * FROM Produits ORDER BY Dates DESC LIMIT 7");
          $reqette->execute();
 
          $data= $reqette->fetchAll(PDO::FETCH_OBJ);
          return $data;
 
          $reqette->closeCursor();
        }
    }
  }

  function Rechercher($id) {
    if(require("connexion_config.php")){
    $stmt = $acess->prepare("SELECT * FROM Produits WHERE Id_prod = ?");
    $params = array($id);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
    }
}

function filter($Nom){
    if(require("connexion_config.php")){
    $stmt = $acess->prepare("SELECT * FROM Produits WHERE Nom LIKE ?");
    $params = array('%'.$Nom.'%');
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
    }
}

function countItems($user_id){
  if(require("connexion_config.php")){
        $stmt = $acess->prepare("SELECT COUNT(*) AS total FROM cart_items WHERE user_id = :user_id");
        $stmt->bindParam("user_id",$user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
  }
}

function getCartItems($user_id) {
  require("connexion_config.php");

  if ($acess) {
      $stmt = $acess->prepare("SELECT p.* ,ci.id, ci.quantite, ci.date, ci.idProduit, ci.user_id FROM cart_items ci
                              JOIN produits p ON ci.idProduit = p.Id_prod
                              WHERE ci.user_id = :user_id");
      $stmt->bindParam(":user_id", $user_id);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }
}


function verifyItem($user_id, $ProductId){

  if(require("connexion_config.php")){
    $stmt = $acess->prepare("SELECT COUNT(*) AS total FROM cart_items WHERE user_id = :user_id AND idProduit = :idProduit");
    $stmt->bindParam("user_id",$user_id);
    $stmt->bindParam("idProduit",$ProductId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];

}
}

// Count of product for Dashboard
 function countProduct()
 {
   if(require("connexion_config.php")){
    $stmt= $acess->prepare("SELECT COUNT(Id_prod) as totalProduct from produits ORDER BY Dates DESC LIMIT 5");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['totalProduct'];
   }
 }

//  Count of productOrder for Dashboard
 function SumProductOrder()
 {
   if(require("connexion_config.php")){
    $stmt= $acess->prepare("SELECT SUM(Quantite) as totalProduct from Commander");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['totalProduct'];
   }
 }

// List all order
function ListOrder($statut)
{
  if (require("connexion_config.php")) {
    $req = $acess->prepare("SELECT utilisateurs.Nom, utilisateurs.Prenom, produits.Image,Commander.id, Commander.Prix, Commander.Id_user, Commander.id_prod, Commander.Quantite, Commander.Dates, Commander.statut
                           FROM utilisateurs 
                           INNER JOIN Commander ON utilisateurs.Id_user = Commander.Id_user 
                           INNER JOIN produits ON produits.Id_prod = Commander.id_prod where statut = :statut");
    $req->bindParam(":statut", $statut); 
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

function Vente($statut){
  if (require("connexion_config.php")) {
    $req = $acess->prepare("SELECT utilisateurs.Nom, utilisateurs.Prenom, produits.Image, Commander.Prix, Commander.Id_user, Commander.id_prod, Commander.Quantite
                           FROM utilisateurs 
                           INNER JOIN Commander ON utilisateurs.Id_user = Commander.Id_user 
                           INNER JOIN produits ON produits.Id_prod = Commander.id_prod where statut = :statut");
    $req->bindParam(":statut", $statut); 
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

function countVente($statut){
  if(require("connexion_config.php")){
    $req= $acess->prepare("SELECT COUNT(id) as totalVente from Commander where statut = :statut");
    $req->bindParam(":statut", $statut); 
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    return $result['totalVente'];
   }
}

function countPending($statut){
  if(require("connexion_config.php")){
    $req= $acess->prepare("SELECT COUNT(id) as totalPending from Commander where statut = :statut");
    $req->bindParam(":statut", $statut); 
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    return $result['totalPending'];
   }
}


function UpdateStatutCommande($idCom){
   if (require("connexion_config.php")) {
      $req = $acess->prepare("UPDATE Commander SET statut = 'Done' WHERE id = :id");
      $req->bindParam(":id", $idCom);
      $req->execute();
   }
}

function InfoUser($statut){
  if(require("connexion_config.php")){
    $req= $acess->prepare("SELECT utilisateurs.Nom, utilisateurs.Prenom, utilisateurs.Commune from utilisateurs
                            INNER JOIN Commander on utilisateurs.Id_user = Commander.Id_user where statut = :statut GROUP BY utilisateurs.Nom, utilisateurs.Commune ORDER BY Dates DESC LIMIT 4;");
    $req->bindParam(":statut", $statut);
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

?> 