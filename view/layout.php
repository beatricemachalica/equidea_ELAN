<!DOCTYPE html>
<!-- http://localhost/equidea/ -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font-awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- CSS stylesheet -->
  <!-- ajout du fichier à la l'aide de CSS_PATH define dans l'index -->
  <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">

  <title>Equidea</title>
</head>

<body>
  <!-- Backgrounds -->

  <!-- Video Home page -->
  <?php if (!isset($_GET['ctrl']) || $_GET['ctrl'] == 'home') {
  ?>
    <video src="<?= VIDEO_PATH ?>pexels-horses.mp4" muted loop autoplay></video>
    <div class="overlay"></div>
    <!-- Login and Signup background -->
  <?php } elseif (!isset($_GET['method']) || $_GET['method'] == 'login' || $_GET['method'] == 'signup') {
  ?>
    <div class="backgroundHorse">
      <!-- default background -->
    <?php } else { ?>
      <!-- <div class="defaultBackground"> -->
      <div class="backgroundHorse">

      <?php } ?>

      <div class="container">

        <!-- Website Header -->
        <header>
          <div class="row">

            <!-- logo -->
            <div class="col">
              <a href="?ctrl=home&method=index" style="color: white;" class="logoEquidea nounderline">Equidea <i class="fas fa-horse-head" style="color:tomato;"></i></a>
            </div>

            <!-- nav -->
            <nav class="col-7 mainNav">
              <?php
              if (App\Session::getUser()) {
              ?>
                <a href="?ctrl=theme&method=themeList" style="color:white;" class="nounderline nav-link">All themes</a>
                <a href="?ctrl=user&method=usersList" style="color:white;" class="nounderline nav-link">All users</a>
                <a href="?ctrl=###&method=####" style="color:white;" class="nounderline nav-link">
                  <i class="fas fa-user"></i> My account
                </a>
                <a href="?ctrl=security&method=logout" style="color:white;" class="nounderline nav-link">Log Out</a>
                <?php
                // } elseif (App\Session::getUser() == 'admin') {
                // rajouter les boutons uniquement pour l'admin
                ?>
              <?php } else { ?>
                <nav class="col mainNav">
                  <button type="button" class="myButton">
                    <a href="?ctrl=user&method=login" style="color:white;" class="nounderline">Log in</a>
                  </button>
                  <button type="button" class="myButton">
                    <a href="?ctrl=user&method=signup" style="color:white;" class="nounderline">Sign up</a>
                  </button>
                <?php } ?>
                </nav>

                <!-- <a href="#" style="color:white;" class="nounderline">My Account</a> -->
                <!-- <a href="#" style="color:white;" class="nounderline">Log out</a> -->

          </div>
        </header>

        <!-- Main Content -->
        <main class="row">
          <div id="page" class="mainContent">
            <?= $page ?>
          </div>
        </main>

        <!-- footer -->
        <footer class="flex">
          <article class="Copyright">
            Copyright © 2021 Béatrice Machalica
          </article>
          <div class="otherLinks">
            <a href="https://www.youtube.com/" style="color: white;"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/?hl=fr" style="color: white;"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/" style="color: white;"><i class="fab fa-facebook-square"></i></a>
          </div>
        </footer>

      </div>
      </div>

      <!-- jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>