<!-- BARRA LATERAL-->

 <!-- Se encarga de mostrar la barra lateral de la pagina web -->
<aside id="lateral">
    <div id="login" class="block_aside">

<!-- se encarga de validar si la sesio no se cumple y se muestra el formulario de inicio de sesion -->
        <?php if(!isset($_SESSION['identity'])): ?>
        <h3>Entrar a la web</h3>
        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Enviar">
        </form>

<!-- se encarga de validar si la sesio se cumple y se muestra el nombre del usuario y apellido  -->
        <?php else: ?>
            <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
            <?php endif; ?>

<!-- Otros menus de la barra lateral -->

        <ul>
            <li>
                <a href="">Mis pedidos</a>
            </li>
            <li>
                <a href="">Gestionar pedidos</a>
            </li>
            <li>
                <a href="">Gestionar categorias</a>
            </li>

            <li>
                <a href="<?=base_url?>usuario/logout">Cerrar sesion</a>  
            </li>
        </ul>

    </div>
</aside>


<!-- CONTENIDO CENTRAL -->
<div id="central">


<!-- Diccinario de funciones utlizadas para este fichero
 div = se encarga de crear un contenedor
 if = Se encargad de evaluar una condicion 
 ! = se encarga de negar una condicion
 isset = se encarga de verificar si una variable existe
 $_SESSION = Es una variable super global que se encarga de almacenar informacion del usuario 
 : ?> = Se una forma de cerrar un if
 else = se encarga de evaluar una condicion contraria a la que se esta evaluando
 <h3> = se encarga de crear un titulo TIPO 3
form action=  = se encarga de crear un formulario
method = Se encarga de indicar el tipo de metodo que se utilizara para enviar los datos del formulario
Post = Se encarga de enviar los datos del formulario de forma oculta
label for = se encarga de crear un label para el formulario
input type = se encarga de crear un input para el formulario
submit value = se encarga de crear un boton para enviar los datos del formulario
else = se encarga de evaluar una condicion contraria a la que se esta evaluando
endif = se encarga de cerrar un if
ul = se encarga de crear una lista
li = se encarga de crear un elemento de lista
a href = se encarga de crear un enlace

Nota: Este ficchero se encarga en mostrar la barra lateral de la pagina web y de validar si el usuario esta logueado o no
      de estar loguado poresentara sus  nombre y apellkido como usuario logeado y de no estar logueado presentara el
     formulario de nuevo para que este ponga sus datos de neuvo.
     Por utlimo muetsra una serie de acciones que puede realizar el usuario logueado como ver sus pedidos, gestionar pedidos
     de igual forma para el usuario admin y tambien permiete cerra la sesion del usuario.


!-->
