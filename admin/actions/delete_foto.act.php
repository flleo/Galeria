<?php
include dirname(dirname(dirname(__FILE__))) . '/common/utils.php';
include dirname(dirname(dirname(__FILE__))) . '/common/config.php';
include dirname(dirname(dirname(__FILE__))) . '/common/mysql.php';

debug($_GET);
$id = $_GET['id'];
/*$author_id = $row['author_id'];
$sqlmail = "SELECT email from authors where id = " . $author_id;
$conn = Connect($config['database']);
$rows = ExecuteQuery($sqlmail, $conn);
session_start();
if ($rows[0]['email'] ==  $_SESSION['email']) 
{
    echo '<script>alert('. $_SESSION['email'].');</script>';*/
    $sql = "DELETE FROM `images` WHERE id=" . $id;
    $conn = Connect($config['database']);
    $rows = Execute($sql, $conn);
    //debug($rows);
    Close($conn);
//}
header("location: ../home.php?page=listado");
