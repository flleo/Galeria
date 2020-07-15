<?php
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/utils.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/config.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/mysql.php';


session_start();
$conn = Connect($config['database']);
$sql = "select a.*, b.name as autor, b.email  from images as a inner join authors as b on a.author_id=b.id where b.enabled=1 order by b.name asc";
$rows = ExecuteQuery($sql,$conn);
//debug($rows);
Close($conn);