<?php
   session_start();
   @$email=$_POST["email"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateurs where email=? and pass=? limit 1");
      $sel->execute(array($email,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $erreur="Mauvais e-mail ou mot de passe!";
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
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

<section id="hero">
    <div class="hero-container

      <a href="#about" class="btn-scroll scrollto" title=""><i class="bx bx-chevron-down"></i></a>

   </body>
</html>

   <body onLoad="document.fo.login.focus()">
      <h1>Authentification </h1>
      <br>
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="email" placeholder="E-mail" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" />
      </form>
      <br>
      <br>
      <h2> [ <a href="inscription.php">Créer un compte</a> ]</h2>
   </body>
</html>