<?php 
    session_start();

    // Vérifiez si l'utilisateur n'a pas le statut approprié pour accéder à la page
    if ($_SESSION['Etat'] !== 'Admin') {
        // Redirigez l'utilisateur vers la page où il est actuellement
        header('Location: index.php');
        exit; // Assurez-vous de quitter le script ici pour empêcher toute autre exécution
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Admin</title>
  <link rel="stylesheet" href="Css/style_admin.css">

  <!-- <script src="Javascript/code.jquery.com_jquery-3.7.0.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script>
    $(function () {
      $("#tableauBord").load("TableauBord.php");
      $("#AjoutProduit").load("Ajoutproduit.php");
      $("#Commande").load("Commande.php");
      $("#Profiluser").load("ProfilUser.php");
    });
  </script>
</head>

<body>
  <div class="container">
    <!-- Header -->
    <header class="header">
      <div class="date">
      <?php
       date_default_timezone_set('America/Port-au-Prince');
        $heure_actuelle = date('Y-m-d H:i:s');
        echo $heure_actuelle;
      ?>
      </div>

      <div class="profile">
        <h4 class="h4">Hello, Teyou</h4>
        <img src="Images/WhatsApp Image 2023-06-04 à 17.03.48.jpg" alt="" width="30px" height="35px">
      </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">

      <nav id="sidebar">
        <ul class="tabs">
          <li class="logo">
            <h1>Teyou<span>Shop</span></h1>
            <img src="Images/shopping-bag-solid-24.png" alt="" width="30px" height="35px">
          </li>

          <li class="tab is-active">
            <a data-switcher data-tab="1"><i class='bx bxs bxs-dashboard'>
              </i> <span class="nav-item">Tableau bord</span>
            </a>
          </li>

          <li class="tabli">
            <a href="index.php"><i class='bx bxs bx-shopping-bag'>
              </i> <span class="nav-item">TeyouShop</span>
            </a>
          </li>

          <li class="tab">
            <a data-switcher data-tab="3"><i class='bx bxs bx-add-to-queue'>
              </i> <span class="nav-item">Ajout Produit</span>
            </a>
          </li>

          <li class="tab">
            <a data-switcher data-tab="4"><i class='bx bxs bx-command'>
              </i> <span class="nav-item">Commande</span>
            </a>
          </li>

          <li class="tab">
            <a data-switcher data-tab="5"><i class='bx bxs bx-user'>
              </i> <span class="nav-item">Profil Admin</span>
            </a>
          </li>

          <li class="log tab">
            <a href="index.php"><i class='bx bxs bx-log-out'>
              </i> <span class="nav-item">Log out</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- main -->
    <main class="main">
      <section class="pages">
        <div class="page is-active" data-page="1">
          <div id="tableauBord"></div>
        </div>

        <div class="page" data-page="3">
          <div id="AjoutProduit"></div>
        </div>

        <div class="page" data-page="4">
          <div id="Commande"></div>
        </div>

        <div class="page" data-page="5">
          <div id="Profiluser"></div>
        </div>

        <div class="page" data-page="6">
          <!-- <h2>Log out</h2>
                <p>Thanks you</p> -->
        </div>
      </section>
    </main>
  </div>

  <!-- script to stay in the same tab even you relaad the page  -->
  <script>
    let activeTabIndex = localStorage.getItem("activeTabIndex");

    if (activeTabIndex === null || activeTabIndex === undefined) {
      activeTabIndex = 0;
    }

    const tabs = document.querySelectorAll(".tabs .tab");
    tabs[activeTabIndex].classList.add("is-active");
    const pages = document.querySelectorAll(".pages .page");
    pages[activeTabIndex].classList.add("is-active");

    tabs.forEach((tab, index) => {
      tab.addEventListener("click", () => {
        // Remove the active class from all tabs and pages
        tabs.forEach((tab) => tab.classList.remove("is-active"));
        pages.forEach((page) => page.classList.remove("is-active"));

        // Add the active class to the clicked tab and show the corresponding page
        tab.classList.add("is-active");
        pages[index].classList.add("is-active");

        // Store the active tab index in localStorage
        localStorage.setItem("activeTabIndex", index);
      });
    });
  </script>

  <!-- lien js -->

  <script src="Javascript/sidebare.js"></script>
  <!-- <script src="Javascript/realod.js"></script> -->
</body>

</html>