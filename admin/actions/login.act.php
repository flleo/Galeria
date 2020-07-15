<?php

include "../../common/utils.php";
include "../../common/config.php";
include "../../common/mysql.php";

//Para comprobar
//debug ($_POST);

$email = $_POST['email'];
$password = md5($_POST['password']);

$conn = Connect($config['database']);
$sql = "select * from authors where email = '".$email."' and password = '".$password."'";
$usuario = ExecuteQuery($sql,$conn);
Close($conn);

//Para comporobar
//debug($usuario);

if(empty($usuario))
{
    header("location: ../home.php?error=1");
}
else
{
    session_start();
    $_SESSION['id'] = $usuario[0]['id'];
    $_SESSION['email'] = $email;
    $_SESSION['session_id'] = session_id();
 
    //echo $email.$_SESSION['email'];
    header("location: ../home.php?page=listado");
 }
