<?php

include  'common/utils.php';
include  'common/config.php';
include  'common/mysql.php';

$conn = Connect($config['database']);
$sql = "select a.* from images as a inner join authors as b on a.author_id=b.id where a.enabled = 1 and b.enabled=1 order by b.email asc";

$rows = ExecuteQuery($sql,$conn);
//debug($rows);
Close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Galeria - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets\bootstrap\css\bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets\css\galeria.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a class="navbar-brand" href="#">Galeria</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <?php
          session_start();
          if(isset($_SESSION['id']))
            echo'
            <li id="index-listado" class="nav-item ">
              <a class="nav-link" href="admin/home.php?page=listado">[Listado]</a>
            </li>';       
        ?>
          <li class="nav-item">
            <a class="nav-link" href="admin/index.php?page=login">[admin]</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Fotos -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Galeria</h1>
      </div>
      <?php
    if($rows > 0)
      foreach($rows as $row)
      {
        echo '<div class="col-lg-2 col-md-4 col-xs-6 thumb>
                <a class="thumbnail" href="#">
                  <img class="img-responsive css_img" src="images/'.$row['file'].'" alt="">
                </a>'.$row['name'].'
              </div>';
      }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <div class="row fixed-bottom justify-content-center">
    <footer>
      <div class="row ">
        <div class="col-lg-12 ">
          <p>Copyright &copy; Galeria 2020</p>
        </div>
      </div>
    </footer>
  </div>

  <script src="assets\bootstrap\vendor\jquery\jquery.min.js"></script>
  <script src="assets\bootstrap\vendor\bootstrap\js\bootstrap.min.js"></script>
  </div>

</body>

</html>