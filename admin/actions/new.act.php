<?php

include "../../common/utils.php";
include "../../common/config.php";
include "../../common/mysql.php";

debug ($_POST);


$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
if(isset($_POST['enabled']))
{
    $enabled = 1;
}
else
{
    $enabled = 0;
}

$conn = Connect($config['database']);
$sql = "insert into authors (name,email,password,enabled) values ('".$name."','".$email."','".$password."',".$enabled.")";
$row = Execute($sql,$conn);

if($row > 0)
{
    header('location: ../index.php?page=login');
} else 
{
    header('location: ../index.php?page=new&conn='.$conn->error.'&name='.$name);   
}
Close($conn);
