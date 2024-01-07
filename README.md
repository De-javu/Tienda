# Tienda
pruebas tienda:
1) Creamos la logica de la base de datos
2) Creamos la base de datos por medio de sql y a su vez las diferentes tabls que se usa en  el proyecto
3) Se crearon cada una de las tablas desde la interface de mysql como prueba, para validar que reecibe cada una de las tablas 
4) Nos encargamos de crear la maqueta de html la cual sera la encargada de interactuar con el usuario y tendra la maqueta basica de las acciones que se desea.
5) Se realizaron todos los ajustes en la hoja de estilos para ponerle vida al html y de tal forma sea mas, amiable a la hora de interactuar con el usuraio too el entorno.
6) Se crean las carpetas, assets, config, controllers, models, views, autoload, index
7) Se crea el archivo spl autoload donde se configura para crear las autocargas automaticas de los controladores.
8) Se creaun index.php para que este sea el cargador frontal, el primer index se etiqueta de otra forma para tener referencia de la maqueta que se realizo.
9) Ahora creamos el fichero de conexion a la base de datos, el cual nos permite interactuar y estar conectados a la base de datos.
10) Se crean la carpeta controllers, se evalua las tablas y bases de datos para identificar cuantos controladores se podrian tener.
11) Se crea la carpeta de views/layaut dentro de ella los ficheros footer, header, sidebar, los cuales serasn las vistas iguales que se veran en diferentes paginas de nuestra web.
12) Del index que tiene la logica de html , vamos a quitar lo correspondeinte al header,
 sidebar, footer y no lo llevamos a los ficheros que se crearon dentro de las carpetas de views,segun sea el caso.
 13) Ahaora vamos al index e incluimos los ficheros que se crearon en la carpeta de   views/layout concatenado la ruta del fichero.
 14) En vista se creao un carpeta llamada productos con un fichero destacados, el cual se
 ubica en el coentrolador pruducts y se crea una ruta de visualizacion, se corta el htm y se pone en este fichero y nos muestra exactamente lo que se desea.
 15) Creamos un metodo registro y el metodo save para guardar el usuraio 
 16) Se crea views/usuario/registro.php, en este fichero se crea la ruta del formulario donde se recojen los datos que se van a procesar antes de entrar a la base de datos.
 17) Creamos en cofig/parameters.php , un fichero dodne se diefiniran los cosntantes y sus valores que se utilizaran en las rutas.
 18) Activamos en el apache el modulo rewrite_module.
 19) Creamos un fichero .htaccess, encargador de simplificar el tamaño de las rutas por la url
 20) Creamos un fichero de errorController en la carpeta controller y ponemos una vita con mesaje de error"no existe la pagina"
 21) Desde el index incluimos el fichero config/paramters.php, para poder incluir la ruta de 
 22) Dontro de los fichero las rutas del html que permitan cargar una ruta o un fichero vamos a poner la base_url, lo cualpermitira cargar los estilos correctamente al momento de entrar a ese fichero.
 23) Dentro de la pagina de index, cargo el controlador de error dende deseo que este se muestre segun la  logica de accesos y restricciones.
 24) Como se repetia tantas veces el copiar todo el metodo de error, mejor optamos por crear una funcion y luego llamamos solo la funcion en este caso show_error en el fichero index.
 25) En el fichero index.php se crean las rutas y y se define la carga de la pagina ya que el sistema es los primero  que llama a la hora de cargar la pagina web y se le conoce como controlador frontal.
 26) Cramos el modelo de la entidad de usuarios, lo cual respresenta un registro dentro de la base de datos
 27) Se crea la clase con los objetos y se cream los getter y los setter de una vez
 28) Definicmos un costructor para la conexio  a la base de datos en el modelo usuario
 29) Se crea un metodo llamado save, el cual sera el encargado de guardar los nuevos usuarios que se que se capturan por medio de este metodo de usuraio y se validan en usario controles para presentar como registro completo a la base de datos.
 30) Ahora pasamos a configurar la session de usurios despues de registro, vamos index, creamos la sesion_star(), en el controlador creamos las condicionales que evaluan si el controlador registro bien y de una vez que captire la variable session, en la vista/registro php. se crea una serie de coindcionales que se encragan de valuar y avisar al usraio que se encuntra logueado segun los pasos anteriormente diseñados.
 31) Creamos la carpeta helpers, la cual nos ayudara con tareas espesificas.
 32) Creamos un fichero llamado utils.php, el cual es el encargado de eliminar la session que esta abierta, llamando este metodo se controla el como y cuando debe estar la session abierta.
 33) Se crea la funcion login en el modelo usuario.php
 34) Dentro de la funcion se realiza una validacion a la db, consultando si el usuario existe suegun los parametros que pasamo que son $email ,$paswword.
 35) Si los datos se logran validar correctamente se sacaremos por medio de un num_rows el que sea solo uno y luego pasaremos a realizar la validacion de la $password la cual debe concidir con la ingresada por el usaurio como la registrada en la base de datso segun nuestra consulta, de los contrario no validara la contrasela el valor sera falso y si logra validra la contraseña el valor sera true el cual permitira el login.
 36) Creamos en fichero UserController.php la finction login la cual evalua si los datos enviados por el metood $_POST son estan definidos 
 se crea una isntancia de la clase usuario la convertimos en un objeto 
 ahora evaluamos los datos que se teiene actualmete por medio de los setter, lugo se llama al metodo login de objeto $usario para validar los datos de los setter y almacenarlos en la variable $identity.
 37) luego evaluamos si la $identity es un objeto, de ser asi ceamos la $_SESSION['$identity'].
 38) Tambien vamosa a evaluart  la sesion que rol cuemple, si es admin. se creara una $_SESSION['admin'].
 39) de no cumplirse nada de los anterior con la sesion $identity, se creara unmensaje de error
 40) Por ultimo nos redireccionara a la base.url.
 41) Luego ingresamos a la fichero de views/layout/sidebar.php en este vamos a realizara la conficuguracion correspondiente para que la session no presente el nombre y elpallido del usuario logeado.
 42) Cramos el nuevo metodo logou en el UserController.php
 43) 







