<script type="text/javascript">
    function delete_post(email) {
        var ok = confirm("¿ Deseas eliminar tu perfil, y todas tus fotos ? ");
        if (!ok) {
            return false;
        } else {
            location.href = "actions/delete_autor.act.php?email=" + email;
        }
    }
</script>

<div class = 'container'>
<div class = 'row'>

<div class = 'col-lg-12 text-lett'>
<h2 class = 'mt-5 text-primary'>Listado de Autores</h2>
</div>

</div>

<br>
<div class = 'row cuadro_listado_autores'>
<div class = 'col-lg-12'>

<table class = 'table'>
<thead class = 'text-primary'>
<tr>
<th scope = 'col'>#</th>
<th scope = 'col'>Nombre autor</th>
<th scope = 'col'>Email</th>
<th scope = 'col'>Created</th>
<th scope = 'col'>Enabled</th>
<th scope = 'col'>Eliminar</th>
</tr>
</tr>
</thead>
<tbody>

<?php
session_start();
if ( !empty( $rows ) )
 {
    foreach ( $rows as $row ) 
    {
        if ( $row['enabled'] == '1' )
        {
            $enabled = "<img src='../assets/img/activo.png'  width=20px>";
        } else {
            $enabled = "<img src='../assets/img/no_activo.png' width=20px>";
        }

        echo '
                <tr class="text-white">
                  <td>'.$row['id'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.date( 'd/m/Y H:s:i', strtotime( $row['created'] ) ).'</td>
                  <td class="text-center"> 
                    <a href="actions/editar_autor.act.php?id=' . $row['id'] . '&enabled=' . $row['enabled'] . '">' . $enabled . '</a>          
                  </td>';
                  // Confirmar que es dueño de foto                             
                  if ($row['email'] == $_SESSION['email'])
                    echo '<td class="text-center"><a href="#" OnClick="delete_post('.$row['email'].')"><img src="../assets/img/delete_2.png"  width=20px></a></td>';
        echo'   </tr>';

  }
} else {
    echo '<tr><td colspan=7> No hay registros</td></tr>';
}
?>

</tbody>
</table>

</div>
</div>

</div>