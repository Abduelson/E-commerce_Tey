<?php
require('../commande.php');
    if(isset($_POST['valider'])){
        $idUser = $_POST['idCom'];
           UpdateStatutCommande($idUser);
             echo $idUser;
             header("Location:../../Admin.php");
        }

?>