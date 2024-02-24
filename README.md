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
 41) Luego ingresamos a la fichero de views/layout/sidebar.php en este vamos a realizara la conficuguracion correspondiente para que la session nos presente el nombre y el pallido del usuario logeado.
 42) Cramos el nuevo metodo logout en el UserController.php, el cual es el encargado de eliminar la sesion de usuario
 43) Pasamos a la creacion de las categorias 
 44) Creamos una ruta en el fichero de categoriaCotroller
 45) vamos a la carpeta views y creamos el fichero categorias.php y el fichero index.php
 46) Creeamos en la carpeta model y fichero categoria.php
 47) En el fichero de models categorias.php, creamos la clase categorias con los datso que se estan agendado en la base de datos, luego creamos los getter y los setter de para estos  datos, cremos un metodo que llamaremos getAll elcual se encargara de realizar la consulta a la base de datos seleccioando las categorias.
 48) En el fichero de CategoriasController.php, por medio de requiere_once conectamos el fichero de models/categorias.php, aca llamamos el metodo getALL anterior mente creado y lo instanciamos.
 49) vamos al fichero wiews/categoria/index.php, aca creamos una vista la cual nos listara las categoria que contiene la base de datos,tambien creamos hipervinculo por medio de un boton el cual se encargara de redirecciinarnos al fichero encargado de crear las categorias.
 50) En el ficherode sidebar.php nos encragamos de ajustar correctamnete las rutas de los enlaces para que nos lleven a donde se desea
 51) En controlador de CategoriaController.php, nos encargamos de crear un metodo llamado crear el cual tiene un require_once que nos conecta con las views/categoria/crear.php
donde tendremos u formulario listo para capturar los datos de la categoria que se desea crear.
52) En las vistas en el fichero.php creamos el formulario, el cual lleva la informacion de capturada al metodo categoria/save
53)  luego  vamos al la carpeta fichero utils.php, creamos un metodo para identificar cuando el usuario sea administrador y de esta forma tenga permisos para las acciones selecionadas.
54) Creamos en el models de catgoria.php, cfear un metodo save para que inserte en el base de datos, la categoria que se desea crear, tambien reforzamos la seguridad en los setter con os real_scape_string, para evitar inyeccion de datos
55) En el contolador de categoriaConroller.php, Se hace el metodo save elñ cual se encarga de instanciar la clase categoria y de esta forma sacar los datos que se guardan en la base de datos.
56) en el fichero utils.php, creamos un metodo llamado showcategorisas y con un requiere_onces de models/categoria.php y la losgica para que nos instancie las categorias.
57) En el fichero header.php, llamamos el metodo showcategorias, creamosd un bucle while el cual nos va listar las categorias , pero en este caso se veran reflejado en la barras del menu.
58) Fin categorias
59) Utilizamos el fichero de ProdcutosController que creamos anteriormente y creamos una nuevo metodo gestion y creamos la ruta en la vista require_once 'viesw/producto/gestion.php' en la carpeta de views, creamos la carpeta que se llame productos y dentro el fichero gestion.php, ponemos inicialmete un titulo por el momento.
60) En el fichero sidenar.php cambiamos la url y ponemos la ruta del fichero de gestion.php.
61) Creamos el archivo prodcuto en la la carpeta de los modelos.
62) Creamos una clase que se llama producto y ponemos los campos que estan en la base de datos.
63) traemos el cosntructor que permiete la conexion a la base de datos
64) creamos los getter y los setter de cada una de las propiedades de la clase
65) Creamos una nuevo metodo y lo llamamos getAll, el cual realiza una cosnulta a la base de datos solicitando listar todos los prodcutos de forma desendiente y almacena esta consulta en la la variable $prodcutos.
66) Nos vamos  ahora para el controlador, ProductoController, primero incluimos el modelo de la clase prodcutos con el requiere_once, luego en el metodo de gestion validamos con un metod estatico que el usuario tenga permisos admin, ahora si pasamos a crear la instancia de la calse prodcutos, llamamos el metodo getAll que creamos hace poco en el fichero del modelo lo cual va recibier la vista de gestion.php que le pasamos por medio del controlador.
67) Ahora nos vamos para el fichero de la vista en gestion.php y en este ponemos la URL que apuenta al fichero de crear productos, creamos una tabla para listar los prodcutos y con un metodo while, pasamos la variable que trabjamos en el modelo y en el controlador $producto utilizamos un fetch_objet para que nos traiga los atributos de la base de datos y los podamos listar.
68) En el ProductoController creamos un  nuevo metodo que los llamamos crear y dentro 
ponems la validacion del metodo estatico que valida si el usuario es admin y creamos una nueva ruta de vista lacual nos llevara a un archivo crear.php.
69) En el fichero de la vista cear.php, listamos un formulario iniciamos con las action la cual nos lleva a la base_url y creamos una ruta que se llama productos/save la cual nos llevara a un nuevo metodo que vamos a crear en el fichero de ProdcutoController.
70) En el fichero de vista crear.php creamos cada uno de los campos de ingreos de los datos que vamos a recibier y los codificamos acorde  a lo que necesitamos poniendo los filtros necesarios para validar el datos que se recojen.
71) Para el campos de descripcion utilizamos una textarea la cual nos permite ingresar mas campoc a nuestra descripcion.
72) En el campo del formulario de categorias utilizamos un metodo estatico de la carpeta helpers, utils::showcategorias que se encarga de listar todas las categorias que tenemos a la fecha y lo guardamos en la variable $categorias, para crear un bucle while y con la funcion fetch_object nos trae todos los campos de la base de datos como un objeto y los podemos listar, utilizamos la funcion select en php, que nos permite listar, y la funcion option en html que nos permite seleccionar asi que pasoamos el vaorlor que nos devolvio el ciclo con la categorias pero pedimos el id y el nombre cat->id, cat->nombre, de esta forma el foemulario nos mostrar las categorias para realizar la seleccion y la listara fenalizamos ecrrando el ciclo while.
73) creamos un nuevo campo para recojer un archivo tipo file para la imagen, se añade el un boton con la funcionde guardar.
74) Ahora  nos vamos de nuevo al ProdcutoController, vamos hacer que la url_base/prodcuto/save, se recoja correctamente con el formulario asociado que creamos, entonces en el metodo save, primero utilizamos el metodo estatico utils::Admin, para validar que es usuario administrador, si se cumple evaluamos si la variable $_POST, trae la informacion del formulario o si la variable esta vacia o es nula.
75) Ahora no s vamos para el fichero de la carpeta models y en el fichero     producto.php creamos el metodo save, que es el encargado de insertar por medio de una colsulta a la base de datos los valores de la clase producto, para ello utilzamos un intsert de la tabla de prodcutos y pasamos cada uno de los valores por medio de los getter guardando esto en una variable $sql, para poseterior mente lanzar la consulta query y el resutado se guardara en una variable nueva que llamaremos $save.
76) En este mismo fichero de prodcutos.php vamos a realizar un filtado de los datos con un real_escape_string el cual nos permitira proteger en cado de ataques esto lo ponemos e las todos los metodos setter que tiene nuestra clase omitimo fecha e imagen.
77) Ahora nos vamos para el fichero de ProductoController, en el metodo save, creamos una variabe por cada uno de los datos que nos llega por el metodo $_POST, y con la tecnica ternaria le preguntamos si el valor de de $_POSt de la variable que llega, si es verdad le asignamos el nombre de la variable $_POST que estamos utilizando actaulmente de lo contrario leasignamos false y asi para cada una de las variables a excepcion de la imagne la cual teien un tratamiento diferente.
78) Luego realizamos una comprobacion  por medio de un if y condicionamos que todas las variables lleguen y su valor no sean false, si esto se cumple verificamos que el fichero del models/producto.php, este incluido en el fichero de prodcutoController.php.
79) Luego creamos la instancia de la clase Producto para volverla un objeto  y pasamos los datos por medio del metodo setter para almacenar en cada una de las variables ejemplo $producto->setNombre($nombre) y asi para cada una de las propiedades.
80) Nos encargamos de llamar al metodo save de la clase producto y lo almacenamos en la variable $save, con if validamos si $save es true entonces hacemos  la $_SESSION['producto] y la = a un complete, para indicar que la insercion del uevo prodcuto se ha completado de lo contrario utilizamos la misma variable pero laigualamos a faile, que indica que la insercion del nuevo prodcuto ha fallado, y si no llega ninguno de estos datos utilizamos la misma varible la igualamos a false para indicar que la insercion fallo por que no llegaron los datos.
81) Por ultimo por medio de un header fijamos la ruta a donde nos debe redireccinar la pagina, para este caso producto/gestion.
82) Ahora nos vamos para el fichero de gestion.php, en este fichero vamos a recibir la variable especial de $_SESSION con el parametro 'producto' y con un condicional evaluamos si la variable esta definina y si su valor es igula a complete, de ser asi mostrara un mesaje que ponemos con las etiquetas strong que indica que el prodcuto se añadio correctamente.
82) utilizamos la condicional elseif pero en esta ocacion solictamos que producto sea diferenete a complete, si se cumplen las dos consiciones nos mostrara un  mensaje en strong indicando qieel prodcuto n o se ha creado 
83) por ultimo despues de realizar las validaciones utilizamos el metodo estatico creado en la carpeta de helpers en el fichero utils.php el metodo Utils::deleteSession('producto') para cerra la session.
84) En el Fichero de crear.php  ponemos en el formualrio el permiso para enviar archivos enctype="multipart/form-data"
85) Ahora nos vamos al controlador de ProductoController, recibimos con la variable super global $_FILES que son las encargadas de recibier los archivos y le pasamos el nombre que le dimos al archivo desde el formularo, para este caso imagen, solicitamos el npmbre original del archivo y solicitamos rl type de archivo lo cual lo guardamos en una variable $mimetype.
86) Ahora vamos  a crear un condicional que evaluara los tipos de archivo que admite el sistema con  un operador or el cual evalua es uno o es el otro.
87) si se cumple el formato de archivo a recibir, creamos un nuevo condicional el cual se encarga de evaluar si el directoro de destino donde se almacenaran las imagenes esta creado, si no esta creado se creara.
88) Utilizamos el move_uploaded_file, el cual se encarga de recibir los datos del archivo el, nombre y la nueva ruta, llamamos el metodo setimagen, de la clase producto y le indicamosel nuevo valor con el argumento que pasamos enter parantesis el cuallleva la informacio  del nombre de que se implantara en la en la imagen.
89) Validamos que en el modelo producto.php, este el metodo save y este este configurada la imagen para que la guarde en la base de datos.
90) Ahora  nos vamos para el fichero e gestion.php en los titulos de la tabla creamos un nuevo campo para poner acciones. y para la seleccion ponemos dos url las cuales tendran la ruta de editar y eliminar configuramos los botones y le damos unos estilos espesificos desde el fichero de style.css.
91) Configuramos la url ponemos la base de la base_url con la extencion del controlador y el metodo pero tambien le pasamos el id, del producto que se editar o borrara quedando asi,<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
la cual se encarga de redireccionar a una url o a la otra.
92) Ahora nos vamos para el ProductoController.php y aca creamos los dos metodos el metodo de editar y el metodo de eliminar, inicialmente hacenmos una prueba con un var_dump($_GET), para validar si llega el valor que se desea desde las url creadas anteriormente
93) Ahora  ns vamos para el fichero del ProdcutosCotroller y en el metodo eliminar lo primero que hacemos es llamar al metodo estatico Utils::isAdmin(); por que los unicos que estan autorizados para elimiar son los administradores.
94) Se valida ppor con un condicional el parametro que llega por la url en la variable $_GET['id'], que este definido.
95) Ahora nos vamos para el modelo de la calse prodcuto.php en este creamos el metodo delete el cual se encarga de interactuar directamente con la base de datos para buscar el id que se requiere y en este caso eliminarlo.
96) Ahora volvems al fichero de ControllerProdcuto en este en el metodo eliminar almacenamos el parametro $_GET en la un variable $id, creamos la intancia de la clase producto para volverla un objeto y le pasamos elvalor de $id, por parametro del metodo setter para rescribir su valor en el modelo $id, llamamos el metodo delete que se encarga de realizar el borrado a la db y luego ponemos un condicional que evalua si el valor donde se almacena el metodo eliminar para este caso $delete si su valor es true, creara la session con el paramtro delete = complete, de lo contrario session delete sera failed, por ultimo redirecciona a la locacion, baseurl.prodcutos /gestionar.
97) Ahora nos vamos para el fichero de gestion.php y reutilizamos el codigo de producto,  que se encarga de crear el prodcuto y representar las alertas, pero en este caso le pasamos la session['delete'] para validar las alertas de elimnado o de no se elimina el prodcuto.
96) Ahora nos vamos para el metodo editar en el ProductoController, en el cual vamos poner el requiere_once 'views/producto/crear.php,' para que nos redireccione a la vista, pero primero se crea la $edit = true; el cual nos permitira en la vista crear.php,  identificar para  editar o crear se gun la variable que se resiva.
97) Ahora nos vamos para el fichero de crear.php ene ste recibimos la variable de $editar y con un condicional evaluamos si la variable $editar este definida y que su valor no sea nulo, si se cumple creamos un titulo para el usuarioel cual indique que stamos en el formulario de editar, si esta condicion no se cumple entonces el titulo que se mostrara en el formulario sera el de Crea nuevos produtos.
98) En este mismos fichero realizamos un movimiento magico, puies encerramos la action del formulario en una variable, pero como ahora es una variable esta la ubicamos en la url completa, pero la varaible la cargamos con dos rutas una de editar y la otra de guardar, dependindoel condicional anterior que evalua la $editar, cuando enter al formualrio de editar o de guaradar ya tendran una ruta diferente que tendra la accion a ejecutar, ejemplo de las dos rutas :
<?php $url_action = base_url."producto/save&id=".$pro->id; ?>
<?php $url_action = base_url."producto/save"; ?>.
99) Ahora nos vamos para el modelo en el fichero de producto y creamo un metodo que nos consiga la informacion de id, que estamos pasando por la url este metodo le pusimos el nombre de getOne.
100) Ahora nos vamos para el ProductoController en emetodo que se creo anteriormente de editar, validamos que el usuario se administrador, valoidamos que se reciba un id por la url y este lvalor lo pasamos a una variable $id paramanipular mas adelante, validamos que la variable $edit = true; creamos la instancias de la calse Prodcuto y utilizamos un setter para pasar el valor del $id que nos llego por la url, llamamos al metodo getOne el cual nos trae la infoirmacion de ese $id, que estamos pasando y esta informacion que nos llega la almacenamos en una variable que llamaremos $pro.
101) Ahora nos vamos para el formulario de crear.php en este vamos a modificar el if que recibe la variable $edit y ahora validamos qe tambien reciba la variable $pro y que sean un objeto, de cumplicer en el campo del tituolo , concatenamos el nombre del id del producto que se editara, pasamos a al formulario para sacar los datos y que estos se vean en el formulario en cada campo para que el usuario le quede mas sencillo validar que va a modificar esto lo hacemos por medio de un value y ponemos una ternaria la cual valida si la variable $pro  esta declarada si es un objeto, si se cumple en cada valor que lleva en el formulario de lo contrario que lo deje vacio.
realizamos este mismos procedimiento para los diferentes campo obviamente revisando como sacara cada parametro segun la funccion que sae realiza.
102) Ahora  nos vamos para el metodo en la clase producto.php y vamos a crear un metodo llamado edit en este metodo realizamos la consulta a la base de datos utilizamos el update para indicar que se actualizara y el argumento set para se leccionar los campos que se actualizaran comprobams con un if , si la imagen que llega es diferenrente a null de ser asi pedimos que se guare la imagendel resto se realiza la cosnulta igual a como se realiza en el metood save.
103) Ahora nos vamos para el productoController.php, en el metodo save ponemos un condicional el cual evaluara si llega un parametro por la url y esta trae consigo un id del prodcuto que se editara, asi que evalua sie llega este parametro $_GET['id] se llamaa el metodo setter para pasar los valores de la varible $id y llamamos el metodo edit que se encarga de pasar la informacion al modelo para que este lamacene la nueva informacion realacionada con el id que se deas actualizar y esto lo guardamos en una variable $save. 
de no cumpirec esta conndicion se sobre entiende que nos es un prodcuto a editar es un producto nuevo y en este caso se realiza las validaciones para almacenar  el prodcuto nuevo.
104) Ahora nos vamos para el modelo producto.php en el metodo edit la cinsulta que tenemos le agregamos una condiconal WHERE para que nos traiga el edit que tiene actualmente  ese prodcuto.
105) Ahora nos vamos para la vista crear.php en la urlque re direccioan editar cambiamos la ruta, por que la tenemos en edit,. pero como reutilizamos el codigo y los estructuramos para seleccionar el metod que se desea , se debe dejar que redirecione al metodo save , quedano la ruta asi: 
<?php $url_action = base_url."producto/save&id=".$pro->id; ?>
106)   FIN PRODUCTOS MVC




















