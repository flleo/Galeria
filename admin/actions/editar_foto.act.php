<?php

include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/utils.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/config.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/mysql.php';

debug( $_POST );
debug( $_FILES );

$id = $_POST['id'];
$author_id = $_POST['author_id'];
$name = $_POST['name'];
$text = $_POST['text'];

if ( isset( $_GET['enabled'] ) )
 {
    if ( $_GET['enabled'] == 1 )
    $enabled = 0;
    else $enabled = 1;
    $id = $_GET['id'];
    $sql  = 'update images set enabled='.$enabled.' where id='.$id;
    echo '<script language="javascript">alert("'.$enabled.$id.$sql.'");</script>';

} else {
    if ( isset( $_POST['enabled'] ) )
 {
        $enabled = 1;
    } else {
        $enabled = 0;
    }
    if ( isset( $_FILES['fichero']['name'] ) && $_FILES['fichero']['name'] != '' )
 {
        move_uploaded_file( $_FILES['fichero']['tmp_name'], '../../images/'.$_FILES['fichero']['name'] );
        $fichero = $_FILES['fichero']['name'];
        $size = $_FILES['fichero']['size'];
        $sql  = 'update images set author_id='.$author_id.', name="'.$name.'",file="'.$fichero.'",size='.$size.',text="'.$text.'"
           ,enabled='.$enabled.' where id='.$id;
    } else {
        $sql  = 'update images set author_id='.$author_id.', name="'.$name.'",text="'.$text.'"
               ,enabled='.$enabled.' where id='.$id;
    }
}

# conectamos con la base de datos
$connection = Connect( $config['database'] );
$return = Execute( $sql, $connection );
Close( $connection );

header( 'location: ../home.php?page=listado' );