<?php


$erreurs = "";
$db = new PDO('mysql:host=localhost;dbname=to_Do_List;charset=utf8', 'root', '');
$taches=$db->query('SELECT tache from liste');


if (isset($_POST['creer_tache'])) { // On vérifie que la variable POST existe
    if (empty($_POST['creer_tache'])) {  // On vérifie qu'elle as une valeur
        $erreurs = 'Vous devez indiquer la valeur de la tâche';
    } else

        if ($_POST['creer_tache']=="test1") { // On vérifie que la variable POST exist
              $erreurs = 'Le mot test1 n est pas autorisé';
    } else {
        $tache = $_POST['creer_tache'];
        $db->exec("INSERT INTO liste(tache) VALUES('$tache')"); // On insère la tâche dans la base de donnée
} 
}

if(isset($_GET['supprimer_tache'])) {
    $id = $_GET['supprimer_tache'];
    $db->exec("DELETE FROM liste WHERE id=$id");
}

if(isset($_GET['modifier_tache'])) {
    $modif = $db->query('Select * from liste'); // On exécute une requête visant à récupérer les tâches
  $id = $_GET['modifier_tache'];
  $modif = $_GET['modifier_tache'];
  $db->exec("UPDATE liste SET tache= $modif('tache') where id=$id");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Laura - v4.7.0
  * Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

<header id="header" class="fixed-top d-flex justify-content-center align-items-center header-transparent">

<nav id="navbar" class="navbar">
  <ul>
    <li><a class="nav-link scrollto active" href="index.html#hero">Accueil</a></li>
    <a class="nav-link scrollto" href="#about">Mieux me connaitre</a></li>
    <li><a class="nav-link scrollto" href="index.html#resume">C.V</a></li>
    <li><a class="nav-link scrollto" href="#testimonials">Ils témoignent</a></li>
    <li><a class="nav-link scrollto" href="toDoListe.php">Ma ToDo Liste</a></li>

   <!--<li><a class="nav-link scrollto" href="#services">Services</a></li>-->
    <!--<li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>-->
    <!--<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
      <ul>
        <li><a href="#">Drop Down 1</a></li>
        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
          <ul>
            <li><a href="#">Deep Drop Down 1</a></li>
            <li><a href="#">Deep Drop Down 2</a></li>
            <li><a href="#">Deep Drop Down 3</a></li>
            <li><a href="#">Deep Drop Down 4</a></li>
            <li><a href="#">Deep Drop Down 5</a></li>
          </ul>
        </li>
        <li><a href="#">Drop Down 2</a></li>
        <li><a href="#">Drop Down 3</a></li>
        <li><a href="#">Drop Down 4</a></li>
      </ul>
    </li>-->
    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
<!-- .navbar -->

</header><!-- End Header -->

<body>

<section id="hero">
    <div class="hero-container

      <a href="#about" class="btn-scroll scrollto" title=""><i class="bx bx-chevron-down"></i></a>


    <div>
        <p class="header_title">Ma super Todo List ! </p>
    </div>

    <form class="taches_input" method="post" action="toDoListe.php">
        <input id="inserer" type="text" name="creer_tache" />
        <button id="envoyer">Créer</button>
    </form>

    <table class="header_title">
        <tr>
            <th>
                Numéro tâche
            </th>
            <th>
                Description
            </th>
            <th>
                Modifier
            </th>
            <th>
                Suppression
            </th>
        </tr>
</div>

        <?php
        $reponse = $db->query('Select * from liste'); // On exécute une requête visant à récupérer les tâches
        while ($taches = $reponse->fetch()) { // On initialise une boucle
        ?>
            <tr>
                <td  class="border_table"><?php echo $taches['id'] ?></td>
                <td><?php echo $taches['tache'] ?></td>
                <td><a class="suppr" href="toDoListe.php?modifier_tache=<?php echo $taches['id']?>"> modifier</a>

                <td><a class="suppr" href="toDoListe.php?supprimer_tache=<?php echo $taches['id'] ?>"> &#x1F5D1;</a>
            </tr>
        <?php
        }


        ?>

    </table>

        <?php
    if (isset($erreurs))
    ?>
    <p class= "messageVide"><?php echo $erreurs ?></p>

    <?php
    ?>
    </section><!-- End Hero -->






</body>

</html>