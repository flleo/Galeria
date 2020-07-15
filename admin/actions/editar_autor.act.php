<?php

include dirname(dirname(dirname(__FILE__))) . '/common/utils.php';
include dirname(dirname(dirname(__FILE__))) . '/common/config.php';
include dirname(dirname(dirname(__FILE__))) . '/common/mysql.php';

$id = $_GET['id'];


if ($_GET['enabled'] == 1)
    $enabled = 0;
else $enabled = 1;
$sql  = 'update authors set enabled=' . $enabled . ' where id=' . $id;
$conn = Connect($config['database']);
echo '<script language="javascript">alert("' . $enabled . $id . $sql . '");</script>';
Execute($sql, $conn);
Close($conn);



header('location: ../home.php?page=listado_autores');
