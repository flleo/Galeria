<?php
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/utils.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/config.php';
include dirname( dirname( dirname( __FILE__ ) ) ) . '/common/mysql.php';

$conn = Connect( $config['database'] );
$sql = 'select * from images where id='.$_GET['id'];
$row = ExecuteQuery( $sql, $conn );
//debug( $rows );
Close( $conn );
$id = $row[0]['id'];
$author_id = $row[0]['author_id'];
$nombre = $row[0]['name'];
$file = $row[0]['file'];
$size = $row[0]['size'];
$text = $row[0]['text'];
$enabled =  $row[0]['enabled'];
$checked = '';
if($enabled == 1)
{
    $checked = 'checked';
}
  /*// Confirmar que es dueño de foto
  $sqlmail = "SELECT email from authors where id = ".$author_id;
  $rows = ExecuteQuery($sqlmail, $conn);
  session_start();
  if ($rows[0]['email'] != $_SESSION['email']) 
    header("location: home.php?page=listado");*/
?>
<div class='container'>
    <div class='row'>
        <div class='col-lg-12 text-lett'>
            <h2 class='mt-5'>Editar Foto</h2>
        </div>
    </div>
    <br>
    <div class='row form_new'>
        <div class='col-lg-2 text-left'></div>
        <div class='col-lg-10 text-left'>

            <form role='form' action='actions/editar_foto.act.php' method='post' enctype='multipart/form-data'>     
                    <input name='id' value='<?php echo $id; ?>' type='hidden'>
                    <input name='author_id' value='<?php echo $author_id; ?>' type='hidden'>
                    <input name='name' value='<?php echo $nombre; ?>' type='hidden'>

                <div class='form-group row'>
                    <label for='name' class='col-lg-2 col-form-label'>Nombre</label>

                    <div class='col-lg-4 text-lett'>
                        <input type='text' class='form-control' id='name' name='name' placeholder=''
                            value="<?php echo $nombre; ?>">
                    </div>

                </div>

                <div class='form-group row'>
                    <label for='fichero' class='col-lg-2 col-form-label'>Fichero</label>

                    <div class='col-lg-4 text-lett'>
                        
                        <input type='file' class='form-control' id='fichero' name='fichero' placeholder='' value='<?php echo $file; ?>'>
                        <?php echo $file; ?>
                    
                    </div>

                </div>

                <div class='form-group row'>
                    <label for='size' class='col-lg-2 col-form-label'>Texto</label>

                    <div class='col-lg-4 text-lett'>
                        <textarea rows='5' cols='60' id='text' name='text' > <?php echo $text; ?></textarea>
                    </div>

                </div>

                <div class='form-group row'>
                    <label for='enabled' class='col-lg-2 col-form-label'>Activado</label>

                    <div class='col-lg-3 text-lett'>
                        <input type='checkbox' id='enabled' name='enabled' <?php echo $checked; ?>>
                    </div>

                </div>

                <br><br>
                <button type='submit' class='btn btn-primary'>Enviar</button>

            </form>

            <br><br>
        </div>
        <div class='col-lg-2 text-left'></div>
    </div>
</div>