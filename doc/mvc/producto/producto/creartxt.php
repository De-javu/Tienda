
<!-- 1) validacion y redireccionn de las URL para editar o crear productos -->
<?php if(isset($edit) && isset($pro) && is_object($pro)):?>
    <h1>Editar producto <?=$pro->nombre?></h1> 
    <?php $url_action = base_url."producto/save&id=".$pro->id; ?>
<?php else:?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>

<!--  2) Creacion del formulario para crear o editar productos    -->
<div class="form_container">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" cols="10" rows= "3"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="precio">Precio Del Prodcuto</label>
        <input type="number" id="precio" name="precio" min="0" step="0.01" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id ==$pro->categoria_id ? 'selected': ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <label for="fecha">FECHA</label>
        <input type="date" name="fecha">

        <label for="imagen">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb">
        <?php endif; ?>

        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>

<!--
               DICCIMARIO DE FUNCIONES UTILIZADAS PARA ESTA PRACTICA

if = Es un concional el cual se encarga de evaluar , si se cumple la condicion se ejecutara una accion.
isset = Se utiliza para compronar si una variable esta definida y si su valor no es nulo
$edit = Es una variabla asignada por el desarrollador para saber si se esta editando un producto.
&& = Es un operador de comparacion el cual se encarga de evaluar una condicion o varias y todas se deben de cumplir 
$pro = Es una variable definida por el desarrollador que guarda el metodo de getOne.
is_object = S utiliza para indntificar si la variable que se desea evaluar es una objeto.
h1 = Se utiliza para indicar que se trabajaran titulos de formato h1 que son los mas grandes
<?=$pro->nombre?> = Se utiliza para mostrar el nombre del producto
$url_action = Indica que la ruta de la URL tendra el valor de la varaible, segun sea el caso
base_url."producto/save&id=".$pro->id = Es una ruta con la cual se indica que se guardara el producto con el id que se le asigne
else = Es un condicinal que se ejecutara si no se cumple la condicion if.
endif; indica que se hace cierre de la condicion if.
div = Se utiliza para indicar que se trabajara con divisiones de la pagina.
class= Se utiliza para asignar una clase a un elemento.
form action = Indica la url a donde se redirigira el formulario
<?=$url_action?> = Se utiliza para mostrar la url de la accion
method = indica el metodo por elcual se psaran los paametros del formulario sea por $_GET o $_POST 
POST = Indica que los datso recogidos por el formulario s eenviaran ocultos y no se veran en la URL.
enctype = Se utiliza para idicar como se codificara los dsatos que se estan enviando por el formulario, en especial
        cuando se envia archivos, encintramos 3 posible valores segun sea lo requerido.
multipart/form-data = Se utiliza para espesificar que se recojera un archivo por el input type file.
label for = Se utiliza para indicar que se trabajara con etiquetas de formulario.   
input type= Se utiliza para indicar que se trabajara con un input de tipo, segun sea el caso text, number, file, submit.
text = Es un timpo de dato de entrada para el input del formulario
value = Se utililiza para controlar el elemnto de entrada alñ servidor
textarea = Se utiliza para indicar que se podra anexar una serie de caracteres los caule spueden describir algo.
Cols = Se utiliza para indicar el abcho que pede llegar a tener la textarea
rows = Se utiliza para indicar cuantas lineas se pueden visualizar a la vez, sin limitar la cantidda que se desea escribir
min = Se utiliza para indicar o restringir el minimo de numero que puede tener una entrada 
step = Se utiliza para restringir el ingreso o seleccion del usuraio como mejor se nos acople a nuestros programas 
Utils::showCategorias(); = Es un metood estatico que trae todas la categorias de la base de datos
select = Se utiliza en html para indicar que se trabajara con selcciones y se podra escoger una de las opciones
while = Se utiliza para indicar que se trabajara con un bucle que se ejecutara mientras se cumpla la condicion
$cat = Es una variable que crea el desarrolldor para capatar los datos de la base de datos.
fetch_object = Se utiliza para traer los datos de la base de datos en forma de objeto
option = es el complemento que se utiliza para indicar que se trabajara con opciones de seleccion
selected = se utiliza para indicar que una opcion esta seleccionada por defecto
endwhile =  Se utiliza para indicar que se hace cierre del bucle while
date = SE utiuliza para indicar que se utilizara fechas
!= Es un operaodr de negacion
empty = Se utiliza para validar si una variable esta vasia, de ser asi devulve true o se ejecuta una accio segun sea el caso
img src = se utiliza para indicar que se trabajara con imagenes y se mostrara la ruta de la imagen
input type="file"  = Se utiliza para indicar que se trabajara con un input de tipo file
input type="submit"  = Se utiliza para indicar que se trabajara con un input de tipo submit que enviara los datos al servidor

NOTA:Se crean dos bloques de codigos estructurados en este fichero los cuales realizan acciones diferentes:
1)  validacion y redireccionn de las URL para editar o crear productos: Este fragmneto de codigo en php se encarga de validar
    si las variables $edit y $pro estan definidas y si pro es un objeto, de cumplirse las cosndiciones se mostrara un titulo
    de editar productos y se pasara el parametros nombre del producto que esta en objeto $pro, tambien se ejecuatar
    la rediredirecion de la url, que tiene la ruta para identificar el id que se editara el cual tambien esta en objeto de $pro.
    De no cumplirse las condiciones se mostrara un titulo de crear nuevos productos y se ejecutara la redireccion de la url



2) Creacion del formulario para crear o editar productos:
   Secrea el fomulario y lo primero es la redireccion que recoje por la pagina web por medio del paramegtro $_POST 
   se crea un variable $url_action que se encarga de recojer la url de la accion que se ejecutara, segun sea el caso
   asignando una ruta para gurdar o una ruta para editar,redirecicinando al metodo save del controlador producto.
   Se validan los datos que se recojen por el fomulario, se utiliza la funcion value para recojer y evaluar los datos
   si cumple con las condiociones  se mostrara el nombre del producto, si esta creado de lo contrario
   se mostrara un campo vacio, esto es parctico para la edicion de prodcuto pues nos trae el dato que esta  en la base de datos.
   para el campo de la categoria se utiliza un select que lista las categorias que se encuntran en la base de datos.
   utilizamos el metodo estatico utils::showCategorias(); que nos trae todas las categorias de la base de datos.
   lo alojamos enla variable $categorias y con un bucle while recorremos todas las categorias y las mostramos en el select
   si el producto esta creado y la categoria es igual a la categoria que se esta recorriendo se mostrara seleccionada por defecto.
   luego esta el input de la fecha que tiene un proceso normal.
   pasamos al campo de la imagen, el cual evalua 3 parametros, si el producto esta creado, si es un objeto y si la imagen no esta vacia
   de cumplirse las condiciones se mostrara la imagen que esta en la base de datos en la ruta espesificada 
   de lo contrario mostrara un  campo vacio tiene una classe ccs que pone estilos. por ultimo  se crea un campo para subir la imagen
   y un boton para guardar los datos.
   
 
-->