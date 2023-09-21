<?php 
try {
    $acess = new PDO("mysql:host=localhost;dbname=ecommerce_tey;charset=utf8", "root", "");
    $acess->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
