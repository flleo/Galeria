<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Galeria - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="..\assets\bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="..\assets\css\galeria.css">
</head>

<body>
    <?php

    include 'includes/menu.php';

    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if($error == 1)
        {
            header("location: ./index.php?page=login");
        }
    }
    
    $page = $_GET['page'];
                  

    switch($page)
    {
        case 'listado':
            include "actions/listado.act.php";
            include "includes/listado.inc.php";
           
        break;
        case 'new':       
            include "includes/new_foto.inc.php";
        break;
        case 'listado_autores':
            include "actions/listado_autores.act.php";
            include "includes/listado_autores.inc.php";
        break;
        case 'añadir_foto':
            include "includes/new_foto.inc.php";
        break;
        case 'edit':
            include "includes/editar_foto.inc.php";
        break;
        case 'delete':
            include "actions/eliminar_foto.act.php";
        break;
    }


?>
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
    <script src="..\assets\bootstrap\vendor\jquery\jquery.min.js"></script>
    <script src="..\assets\bootstrap\vendor\bootstrap\js\bootstrap.min.js"></script>
    </div>
</body>

</html>