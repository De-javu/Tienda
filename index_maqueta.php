<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teinda de Camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css?">
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">Tienda camisetas</a>
            </div>
        </header>

        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <li>
                    <a href="">Categoria 1</a>
                </li>
                <li>
                    <a href="">Categoria 2</a>
                </li>
                <li>
                    <a href="">Categoria 3</a>
                </li>
                <li>
                    <a href="">Categoria 4</a>
                </li>
                <li>
                    <a href="">Categoria 5</a>
                </li>
            </ul>
        </nav>

        <!-- BARRA LATERAL -->
        <div id="content">
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>

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
                    </ul>

                </div>
            </aside>


            <!-- CONTENIDO CENTRAL -->
            <div id="central">
                <h1>Productos destacados</h1>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Roja Ancha</h2>
                    <p>$50.000 pesos</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Roja Ancha</h2>
                    <p>$50.000 pesos</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Roja Ancha</h2>
                    <p>$50.000 pesos</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <!-- PIE DE PAGINA -->

        <footer id="footer">
            <p>Desarrollado por Imperio_Bit&copy;2023</p>
        </footer>
    </div>

</body>

</html>

<!-- 
DOCTYPE = Se utiliza para determinar el tipo de dosumento y la version que se utiliza 
html = Se utiliza como etiqueta general para indicar que es una maqueta en html
lang = Se utiliza para defiir el idioma el caul debe y se acomoda mejor para interpretar la web
head = Se utiliza para propiedades de informacion general y por lo general se aloja los metadatos
<meta charset="UTF-8"> = Se utiliza esta metadata para idicar que se haga el reconocimiento de los datos y caractaeres como la ñ
<meta name="viewport" content="width=device-width, initial-scale=1.0">
title = Se utiliza para fijar el titulo que tendra a pagina web
<link rel="stylesheet" href="assets/css/styles.css?">
body = Se utiliza para indicarq que inicia el cuerpo de la web, que se desea programar
div = Se utiliza como secciones de bloques que permitiran estrrucutra la web
id = Se utiliza para asignar un valor unico a un docuemnto
header = Se utiliza como la parte principal y cabecera del documento
img src = Se utiliza para incorporar imagenes a la paginas web
alt= Se utiliza para definir el tamaño maximo que tendria la imagen 
a href = Esta etiqueta  se utiliza para incluit las url que nos envian a otras paginas web 
nav = Se utiliza para crear la barra de navegacion que etendra nuestra web 
ul = Se utiliza para indicar que se manejara un listado desordenado 
il = Se utiliza dentro de las lista il, indicando un item por cada una
aside = Se utiliza por lo general para poner cnteiodo principal , pero oque ssera ejecutado au costado de la pagina web 
form action= Se utiliza en un formulario para espesificar la ruta a donde sera enviado el foemulario
method = Se utiliza para indicar el metodo utilizado para enviar los datos al servidor bien sea por metodo $_GET o $_POST
label for = Se utiliza como una pequeña guia que permite interactuar con el usuario para que este sepa que dato se espera que ponga dentri de la casilla
input type = Se utiliza para controlar el tupo de dato que se suministra al formulario y que luego sera llevado a la abse de datos
h2 = Se utiliza para poner formato tipo texto de titulos en serie h2
p = Se utiliza para definir el metodo de parrafos que se adapta muy bien a la web 
footer = Es la etiqueta que se usa al final de una pagina web
&copy = SE utiliza para indicar que el autor tiene todos los derechos sobre la obra arealizada


NOTA: Se crea la web principal en maqueta de html con los elemetos basicos que se utilizaran
      para este proyecto.
-->