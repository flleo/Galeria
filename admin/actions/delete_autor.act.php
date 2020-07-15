<?php
include dirname(dirname(dirname(__FILE__))) . '/common/utils.php';
include dirname(dirname(dirname(__FILE__))) . '/common/config.php';
include dirname(dirname(dirname(__FILE__))) . '/common/mysql.php';

debug($_GET);
session_start();
if ($_GET['email'] == $_SESSION['email']) 
{
    $sql = "DELETE FROM `authors` WHERE id=" . $_SESSION['id'];
    $conn = Connect($config['database']);
    $rows = Execute($sql, $conn);
    if ($rows > 0) {
        $sql = "DELETE FROM `images` WHERE author_id=" . $_SESSION['id'];
        $conn = Connect($config['database']);
        Execute($sql, $conn);
    }
}
//debug($rows);
Close($conn);

header("location: ../home.php?page=listado_autores");
