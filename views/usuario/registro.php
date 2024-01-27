<h1>Registrarse</h1>

<!-- // se evalua si la session esta abierta correctamente, lo cual lanza unas alertas de colores -->
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 <strong class="alerts_green">El registro sea completado correctamente</strong>
 <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong class="alerts_red">El Registro a fallado</strong>
<?php endif?>

<!-- // se en carga de cerrar la session -->
<?php Utils::deleteSession('register'); ?>

<!-- indica que es el inicin del formulario -->
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
<!--
h1 = Se utiliza para indicar que se trabajara con titulos tipo uno. 
strong = Se utiliza para brindar un enfoque especial a las palabras que encierra la etiqueta strong
class="alerts_green" = Indica que es una clase de alertas en color verde.
class="alerts_red" = Indica que es una calse de alertas en color rojo.

/*
if = Se utiliza como condicional.
isset = Se encarga de evaluar si una variable ya fue declara y si su valor es nulo.
$_SESSION = Es una variable super global que se encarga de encerra los datos de la seccion
            atravez de varias paginas web de esta forma logra mantener la seccion abierta
            donde el usuario lo necesita.
&& = Es un operador de comparacion en el caul ya evaluo una operacion y pregunta de nuevo
     si esta otra condicoon tambien se cuemple el programa ejecutara algo. 
== = Se utiliza para validar si los valores son lo mismo y devulve falso o verdadero, pero 
     no funciona para evaluar si las varaibles son igual, en ese caso debemos usar ===
:? = Es la forma como se utiliza los valores ternarios, para simplificar la escritura de codigo
elseif = Funciona igual que if y el else la diferencia radica en que cuando el if es falso 
         la opracion else if vuelve a evaluar pero se valida si se ejecuta como verdadero,
         se puede realizar varias cadenas de ifelse para evaluar.
endif = Indica que es el fin.
Utils::deleteSession('register') = Esta clase se utiliza para cerrar la session.
form action = Indica la ruta a la cual nos llevara la logica del programa a recojer los datos
?=base_url? usuario/save"  = Es una ruta predefinida que se encarga de ejecutar una accion
method = Indica el tipo de metodo el cual enviara los datos a la base de datos 
POST = Indica que los datos recopilados por el formulario seran envidos por este metodo
label for = Se utiliza para indicar el tipo de entrada que tendra y asociara el nombre 
input type = hace referencia al tipo de datos
required_once = Se utliza oara incluir y evaluar un archivo para este caso lo hace una unica vez

NOTA: La primera parte se evalua si la session esta abierta correctamnete, lo cual lanza unas 
      alerta de en colores indicando segun sea la condicion, luego llega a la funcion de cierre
      de session.
      ya por ultimo nos trae el formulario el cual se encarga decapturar los datos y almacenar
      la informacion.
*/

