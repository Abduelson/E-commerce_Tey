<?php 
session_start(); // Démarrer la session

session_destroy(); // Supprimer la session

header('Location: index.php');
?>