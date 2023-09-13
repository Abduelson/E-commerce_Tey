<?php
if(isset($_POST['valider']))
{
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ville']))
    {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['ville']))
        {
            $nom = $_POST['nom'];
            $prenom=$_POST['prenom'];
            $ville=$_POST['ville'];
            $email = $_POST['email'];
            $mode_pass = $_POST['password'];
            $erreur="";

            $nom_serveur = "localhost";
            $user = "root";
            $pass_word = "";
            $database_name = "Ecommerce_Tey";

            $con = mysqli_connect($nom_serveur, $user, $pass_word, $database_name);

            // Vérification de l'email
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Vérification de l'email dans la base de données
                $req = mysqli_prepare($con, "SELECT * FROM utilisateurs WHERE Email = ?");
                mysqli_stmt_bind_param($req, "s", $email);
                mysqli_stmt_execute($req);
                $result = mysqli_stmt_get_result($req);

                if(mysqli_num_rows($result) > 0)
                {
                    $erreur="L'email est déjà utilisé.";
                }
                else
                {
                    // Insertion de l'utilisateur
                    $req = mysqli_prepare($con, "INSERT INTO utilisateurs(Nom, Prenom, Ville, Email, Mode_passe) VALUES (?, ?, ?, ?,?)");
                    mysqli_stmt_bind_param($req, "sssss", $nom, $prenom, $ville, $email, $mode_pass);
                    mysqli_stmt_execute($req);

                    if(mysqli_stmt_affected_rows($req) > 0)
                    {
                        echo "Nouvelle ligne insérée avec succès.";
                        $id_personne = mysqli_insert_id($con); // Récupération de l'ID de l'utilisateur inséré

                        // Mise à jour de l'état à "User"
                        $sql_update = "UPDATE utilisateurs SET Etat = 'User' WHERE Id_user = ?";
                        $stmt_update = mysqli_prepare($con, $sql_update);
                        mysqli_stmt_bind_param($stmt_update, "i", $id_personne);
                        mysqli_stmt_execute($stmt_update);

                        mysqli_stmt_close($req);
                        mysqli_stmt_close($stmt_update);
                        header("Location: login.php");
                    }
                    else
                    {
                        $erreur="Insertion a échoué.";
                    }
                }

                mysqli_stmt_close($req);
            }
            else
            {
                $erreur="L'adresse e-mail n'est pas valide.";
            }

            mysqli_close($con);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Sign_Style.css">
    <title>Sign</title>
</head>
<body style="background-color: #e5dfd3;">
       <div class="forme">
                <form action="" method="post">
                <h1>SIGN UP</h1>
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom">
                    <input type="text" name="ville" id="ville" placeholder="ville">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="password" placeholder="Password" >
                    <button type="submit" name="valider">Valider</button>
                    <a href="login.php">avez vous deja un compte???</a>
                    <?php if(isset($erreur)){
                       echo "<p class='para'>" .$erreur. "<p>";
                   }
                    ?>
                </form>
       </div>
</body>
</html>