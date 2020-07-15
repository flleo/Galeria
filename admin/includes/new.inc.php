<?php
if(isset($_GET['conn']))
{
    if($_GET['conn'] == "Duplicate entry '".$_GET['name']."' for key 'authors.name'")
        echo '<script>alert("El nombre de usuario ya existe");</script>';
    else echo '<script>alert("Ese correo electronico ya existe, recupera tu contraseña");</script>';
}
?>
<div id="new-user" class='container'>
    <div class='d-flex justify-content-center h-100'>
        <div class='card'>
            <form role='form' action='actions/new.act.php' method=post>
                <div class='form-group'>
                    <label for='nombre'>Nombre:</label>
                    <input type='text' class='form-control' name='name'>
                </div>
                <div class='form-group'>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' name='email'>
                </div>
                <div class='form-group'>
                    <label for='password'>Password:</label>
                    <input type='password' class='form-control' name='password'>
                </div>
                <div class='row align-items-center remember'>
                    <input type='checkbox' name="enabled">Enabled
                </div>
                <button type='submit' class='btn btn-default bg-primary'>Submit</button>
            </form>
        </div>
    </div>
</div>