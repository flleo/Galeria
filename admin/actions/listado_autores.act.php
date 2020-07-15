<?php
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/utils.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/config.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/mysql.php';



$conn = Connect( $config['database'] );

$sql = 'select * from authors order by name asc';

$rows = ExecuteQuery( $sql, $conn );
//debug( $rows );
Close( $conn );