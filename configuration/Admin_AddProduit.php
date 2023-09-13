<?php 
  if(require("connexion_config.php")){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Récupérer les données du formulaire
        $nom = $_POST['Name'];
        $description = $_POST['Description'];
        $prix = $_POST['Price'];
        $qte = $_POST['Quantity'];
        $date = $_POST['Date'];
        
        $date_heure_mysql = date('Y-m-d H:i:s', strtotime($date));

        // Récupérer le fichier image téléchargé
        $nom_image = $_FILES['Image']['name'];
        $nom_image = str_replace(' ', '-', $nom_image);
        $nom_image = preg_replace('/[^A-Za-z0-9\-]/', '', $nom_image);
        $chemin_image_temporaire = $_FILES['Image']['tmp_name'];
    
        // Définir le dossier de destination pour enregistrer l'image
        $dossier_destination = $_SERVER['DOCUMENT_ROOT'] . "/E-commerce_Tey/E-commerce_Tey/Images/";
        if (move_uploaded_file($chemin_image_temporaire, $dossier_destination . $nom_image)) {
          
            // Requête pour insérer les données dans la table produit
            $requete = $acess->prepare("INSERT INTO produits (Nom,Prix,Description, Quantite, Dates, Image) VALUES (:nom, :prix, :description, :qte, :dates, :image)");
    
            // Liaison des valeurs avec les paramètres de la requête
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prix', $prix);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':qte', $qte);
            $requete->bindParam(':dates', $date_heure_mysql);
            $requete->bindParam(':image', $nom_image);
    
            // Exécution de la requête
            $requete->execute();
            header("Location: reussi.php");
        } else {
          header("Location: echec.php");
        }
      }
  }
?>