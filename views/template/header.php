<?php  ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION['email'])) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="../controllers/index.php">Se connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controllers/register.php">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <?php 
          } ?>
            <?php if(isset($_SESSION['email'])){ ?>
              <li class="nav-item">
              <a class="nav-link" href="../controllers/recipe.php">Les recettes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../controllers/registerRecipe.php">Enregistrer une recette</a>
            </li>
            <div class="d-flex justify-content-center">
              <form action="index.php" method="post">
                <input class="btn btn-danger" type="submit" name="deconnexion" value="Deconnexion">  
              </form>
            </div>
            <?php } ?>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
  
