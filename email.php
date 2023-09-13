<?php 
  $nom=$_POST['Nom'];
  $email=$_POST['Email'];
  $object=$_POST['Object'];
  $message=$_POST['my-textarea'];

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(!empty($nom) && !empty($email) && !empty($object) && !empty($message) || filter_var($email, FILTER_VALIDATE_EMAIL)){

        $headers = "From: $nom <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        
        // Envoyer l'e-mail
        mail('abdueljhon@gmail.com', $objet, $message, $headers);
        
        // Rediriger l'utilisateur vers une page de confirmation
        header("Location: confirmation.html");
        exit();
      }else{
         echo 'veiller renseigner sur les champs';
      }
  }
  else{
    echo 'il y a une erreur dans la methode';
  }
?>