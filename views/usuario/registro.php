<h1>Registrarse</h1>

<!-- // se evalua si la session esta abierta correctamente, lo cual lanza unas alertas de colores -->
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 <strong class="alerts_green">El registro sea completado correctamente</strong>
 <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong class="alerts_red">El Registro a fallado</strong>
<?php endif?>

<!-- // se en carga de cerrar la session -->
<?php Utils::deleteSession('register'); ?>

<!-- indica que es el inicio del formulario -->
<form action="<?=base_url?>usuario/save" method="POST">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" required>

<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos" required>

<label for="email">Email</label>
<input type="email" name="email" required>

<label for="password">Cosntraseña</label>
<input type="password" name="password" required>

<input type="submit" value="registrarse" required>

</form>
 

