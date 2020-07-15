<script type="text/javascript">
    function delete_post(id) {
        var ok = confirm("¿ Seguro de borrar esta imagen ? ");
        if (!ok) {
            return false;
        } else {
            location.href = "actions/delete_foto.act.php?id=" + id;
        }
    }
</script>

<div class="container">
    <div class="row">

        <div class="col-lg-12 text-lett">
            <h2 class="mt-5 text-primary">Listado de Fotos</h2>
        </div>

    </div>
    <div class="row">

        <div class="col-lg-12 text-lett">
            <a class="btn btn-lg btn-warning" href="home.php?page=new">Nueva foto</a>
        </div>

    </div>
    <br>
    <div class="row cuadro_listado_fotos">
        <div class="col-lg-12">

            <table class="table">
                <thead class="text-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Fichero</th>
                        <th scope="col">Creado</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </tr>
                </thead>

                <tbody class="scrollingArea">
                    <?php
                    if (!empty($rows)) {
                        echo '';
                        foreach ($rows as $row) {
                            if ($row['enabled'] == "1") {
                                $enabled = "<img src='../assets/img/activo.png'  width=20px>";
                            } else {
                                $enabled = "<img src='../assets/img/no_activo.png' width=20px>";
                            }
                            echo '
                
                <tr class="text-white">              
                  <td>' . $row['id'] . '</td>
                  <td>' . $row['autor'] . '</td>
                  <td>' . $row['file'] . '</td>
                  <td>' . date("d/m/Y H:s:i", strtotime($row['created'])) . '</td>
                  <td class="text-center" type="submit">               
                    <a href="actions/editar_foto.act.php?id=' . $row['id'] . '&enabled=' . $row['enabled'] . '">' .
                                $enabled . '
                    </a>                  
                  </td>';
                            // Confirmar que es dueño de foto                             
                            if ($row['email'] == $_SESSION['email'])
                                echo '              
                                    <td class="text-center"><a href="home.php?page=edit&id=' . $row['id'] . '"><img src="../assets/img/edit.png" width=20px></a></td>
                                    <td class="text-center"><a href="#" OnClick="delete_post(' . $row['id'] . ')"><img src="../assets/img/delete_2.png"  width=20px></a></td>
                                    </tr>
                                ';
                        }
                        echo '';
                    } else {
                        echo "<tr><td colspan=7> No hay registros</td></tr>";
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>

</div>