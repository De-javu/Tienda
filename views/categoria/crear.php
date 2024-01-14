<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categoria/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <input type="submit" value="Guardar">
</form>

<!-- DICIONARIO DE FUNCIONES:
<h1> = Indica que se utilizaran titulos tipo h1
form action= Se utiliza para indicar la ruta a donde sera enviada la informacion del formulario
method = indica el tipo de metodo que se utiolizara para el evio de la informacion puede ser get o post
POST = Se utiliza para indicar el metodo sera oculto para  enviar los datos del foemulario.
label for = Se utiliza para indicar el nombre de la etiqueta
input type = Se utiliza para indicar el tipo de entrada que se utilizara en el formulario
required = Se utiliza para indcar que el campo debe ser obligatorio
submit = Se utiliza para indicar que el boton sera el encargado de envar los datos del formulario
value = Se utiliza para indicar el valor que tendra el boton


E resumen = Este ficchero se encarga de crear el formulario para crear una nueva categoria

-->