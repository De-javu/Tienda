<h1>Gestion de productos</h1>

<!-- 
1) Se encarga de crear un enlace para crear productos y de mostrar mensajes de alerta si se creo o no el producto. -->
<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
     <strong class="alerts_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'):?>
    <strong class="alerts_red">El producto no se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<!--
2) Se encarga de mostrar mensajes de alerta si se elimino o no el producto.-->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
     <strong class="alerts_green">El producto se ha eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'):?>
    <strong class="alerts_red">El producto no se ha eliminado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
<!-- 
3) Se crea la tabla que mostrara los productos -->
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>

    </tr>
    <!-- 
    4) Se crea un bucle para mostrar los productos que se encuentran en la base de datos -->
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->stock;?></td>    
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
</table>


<!-- 
                               FUNCIONES UTILIZADAS PARA ESTA PRACTICA
                            
h1 = Se utiliza para indicar que se trabajara con tituilos de formato h1 que son los mas grandes.
a href= = Se utiliza para indicar que se utilizaran enlaces.
<?=base_url?> = Es la ruta general de la pagina
class= =Se utiliza para indicar que se pondran estilos en el archico css al alemento
if =Se utiliza como condicional para evaluar si se cumple una condicion.
isset = Se encarga de evaluar si una variable esta definida y si su valor no es nulo.
$_SESSION = Es una variable siper global que se utiliza para guardar informacion de la sesion del usuario.  
&& = es un operador que se utiliza para evaluar que se cumplan varias condiciones y todas se deben cumplir
== = Es un operador que se encarga de compara silos valores son iguales entre si.
strong = Es una etiqte que se utiliza para indicar que se trabajara con textos en negritas.
elseif = Es un condiconal que se utiliza para evaluar si no se cumple la primera condicion se ejecutara otra.
endif = Se utiliza para indicar que cerrar una if condicional que se debio abrir antes.
Utils::deleteSession('producto') = Es un metodo estatioc que se encarda de eliminar la session que se encuentra abierta.
Utils::deleteSession('delete'); = Es un metodo estattico que se encarga de eliminar la session que se encuentra abierta.
table = Se utiliza para indicar que se trabajara con tablas.
tr = Se utiliza para indicar que se trabajara con filas de tablas.
th = Se utiliza para indicar que se trabajara con titulos de tablas.
while = Se utiliza uin bucle que se encraga de ejecutarce mientras se cumpla la condicion
$pro = Es una variable que se encarga de guardar el metodo de getOne.
-> = Se utiliza para apuntar al valor actual de la variable.
fetch_object = Se utiliza para traer el objeto de la base de datos.
td = Se utiliza para indicar que se trabajara con celdas de tablas.
<?=$pro->id;?> = Se encarga de traer el valor de la variable id desde la base de datos por medio de la varaible $pro
<?=$pro->nombre;?> = Se encarga de traer el valor de la variable nombre desde la base de datos por medio de la varaible $pro
<?=$pro->precio;?> = Se encarga de traer el valor de la variable precio desde la base de datos por medio de la varaible $pro
<?=$pro->stock;?> = Se encarga de traer el valor de la variable stock desde la base de datos por medio de la varaible $pro
endwhile =  Se encarga de cerrar el nucle while que se abrio anteriormente.

1) Se crea un enlace que va a la ruta base_url."producto/crear" y se le asigna una clase de boton y boton pequeño,
   luego se evalua por medio de un if si la variable de sesion con el parametro de productoes igual a complete,si es asi
   se crea un mensaje de alerta en color verde que indica que el producto se ha creado correctamente, de lo contrario,
   ahora se evalua nuevamente los mismo pero se se pide que sea diferente de complete, si es asi se crea un mensaje de
   alerta en color rojo que indica que el producto no se ha creado correctamente, luego se llama al metodo deleteSession
   el cual es un metodo estatico creado en la carpéta de helpers y se le pasa como parametro el nombre de la session 
   el cual se encarga de cerrar la sessionque se encuentra abierta.

2) Se evalua si la variable de sesion con el parametro de delete es igual a complete, si es asi se crea un mensaje de 
   alerta en color verde que indica que el producto se ha eliminado correctamente, de lo contrario, ahora se evalua nuevamente
    los mismo pero se se pide que sea diferente de complete, si es asi se crea un mensaje de alerta en color rojo que indica
    que el producto no se ha eliminado correctamente, luego se llama al metodo deleteSession el cual es un metodo estatico
    que se encuentra en la carpeta de helpers y se le pasa como parametro el nombre de la session el cual se encarga de cerrar
    la session que se encuentra abierta.

3) Se crea la tabla y se define las columnas que se van a mostrar en la tabla, con su respectivos titulos.
4) Se crea un blucle del while el cuals e encarga de sacar los productos que se encuentran en la base de datos y se 
   guarda en la variable $pro, luego se crea una fila de tabla y se le asigna el valor de la variable $pro->id, $pro->nombre,
   $pro->precio, $pro->stock, para conocer los valores que tienen las variables,
   luego se crea una columna de tabla y se le asigna un enlace que va a la ruta base_url."producto/editar&id=".$pro->id y se pasa
   la variable $pro->id como parametro, para conocer cual es el id del producto que se desea editar, luego se crea otra columna
   de tabla y se le asigna un enlace que va a la ruta base_url."producto/eliminar&id=".$pro->id y se pasa la variable $pro->id
   para conocer cual es el id del producto que se desea eliminar, luego se cierra la fila de la tabla y se cierra el bucle while.
-->

.