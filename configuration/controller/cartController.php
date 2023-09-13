<?php
    require("../cart.php");
    if(isset($_POST['id'] ) && isset($_POST['qteProd']) && isset($_POST['function'])){
        $user_id = verify($_POST['user_id']);
        $qte = verify($_POST['qteProd']);
        $idProd = verify($_POST['id']);
        addToCart($idProd,$qte, $user_id);
    }


    function verify($data){
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
?>