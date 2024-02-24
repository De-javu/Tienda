<?php

require_once 'models/producto.php';
require_once 'helpers/utils.php';

// Se crea la clas productoController
class ProductoController
{
    public function index()
    {

        // renderizar la vista
        require_once 'views/producto/destacados.php';
    }

    //Se crea el metodo para ver los detalles de un producto
    public function gestion()
    {
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    // Este metodo se encarga de crear un nuevo producto
    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';

    }

    // Este metodo se encarga de guardar los detalles del producto en la base de datos
    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // Guardar la imagen
              if(isset($_FILES['imagen'])){
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];



                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif");{ 


                if (!is_dir('uploads/images')) {
                    mkdir('uploads/images', 0777, true);
                }

                $producto->setImagen($filename);

                move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);

                }
            }

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $producto->setId($id);
                $save = $producto->edit();
            }else{
                $save = $producto->save();
            }

               
                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
        header("Location:" . base_url . "producto/gestion");
    }

    public function editar()
    {  Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

        }
    


        require_once 'views/producto/crear.php';
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header("Location:" . base_url . "producto/gestion");
    }

}

/*
DICIIOANRIO DE TERMINOS PARA ESTA PARCTICA 

require_once = Se utiliza para incluir ficheros con el que se desea interactuar uan unica vez
class = Se utliza como plantilla para crear los objetos que tendra la clase 
public function = Se utiliza para crear un metodo publico que se utilizara en cualquierparte del codigo
                  cuando se llame por el nombre que se asigno al metodo.
Utils::isAdmin = Es un metodo estatico que se utiliza para verificar si el usuario es administrador
new = Se utiliza para instanciar una clase y volverla un objeto
Utils::isAdmin = Es unmetoido estatico que se utiliza para verificar si el usuario es administrador
if = Se utiliza como condicional, si se cumple se ejecutara una serie de acciones
isset = Se utiuliza para validar si una variable fue definida y si su valor no es nulo.
$_POST = Es una varibale super global la cual se encarga de regoger los datos del formularios y enviarlos
            al servidor es un array asociativo.
false = Se utiliza para definir un valor falso
&& = Se utiliza como condicional entre minimo dos condiciones, donde si las dos se cumplen se ejecutara una serie de acciones 
-> = Se utiliza para acceder a los metodos y propiedades de un objeto
setter = Se utiuliza para asignar un valor a los atributos de u  objeto en una calse.
$_FILES = Es una variable super global que se utiliza para recoger los datos de un archivo que se envia al servidor
type = Se utiliza para definir el tipo de dato que se almacenara en una variable
== = Se utiliza para comparar dos valores y si son iguales se ejecutara una serie de acciones
|| = Se utiliza como condicioanl tipo or , si se cumple una de las dos condiciones se ejecura una serie de acciones
! = Es un operador que se encaga de negar una condicion.
is_dir = Se utiliza para verificar si un directorio existe
mkdir = Se utiliza para crear un directorio
0777 = Se utiliza para dar permisos a un directorio
true = Se utilñiza para indocar que se definira un valor como verdadero
move_uploaded_file = Se utiliza para subir archivos al servidor si esto sucede con exito devolvera true 
                     de lo contrariosera false. 
$_GET =  Es una variable super globa que se encarga de recoger los datos que se envian por la url
else = Se utiliza como condicional, el cual se evalua al identificar que la condicional if es falsa, se ejecutara
       una serie de acciones.
$_SESSION = Se utiliza para mantener la session del usroario activa
header = Se utiliza para enviar formatos HTTP al anveggador por lo general se utiliza para realizar redirecciones
         a otras paginas.
Location = Se utiliza para redireccionar a otra pagina
base_url = Esta funcion fue creada en el archivo config.php y se utiliza para definir la url base del proyecto
            para que sea mas facil de acceder a las rutas de los archivos.
            
1) Se crea la clase ProductoController
2) Se crea el metodo index: Se encarga de rendirizar una vista llamada destacados.php , para los que debe incluir
                            la ruta de las vista la carpeta de productos y por utilo el fecero que interactua con el
                            usuario final.
3) Se crea el metodo gestion:Se encarga de evaluar si el usuario es administrador, para esto realiza la validacion 
                             con un metodo estatico creado en la carpeta helpers en el archivo utils.php, si es usuario
                             administrador, se crea una instancia de la clase Producto y y se llama al metodo getAll
                             que es el encargado de realizar la consulta a la base de datos, para listar todos los
                             productos de la tabla productos de formadesendente para presentralos en la vista 
                             que se incluye en el metodo con la ruta del fichero gestion.php.
4) Se crea el metodo crear: Se encarga de vaidar so el usuario es administrador, desde un metod estatico creado en 
                            la carpta helpers en el archivo utils.php, de validar ques administrador se incluye una
                            ruta desde la crapeta vista/prodcutos hasta el fichero crear.php. que es el encargado de
                            recoger los datos del formulario para crear un nuevo producto.
5) Se crea el metodo save: Esta funcion utiliza el metodo estatico utils.php creado en la carpeta helpers el cual se
                           encarga de evaluar si el usuario tiene permisos de administrador, de ser asi se recogen los
                           datos enviados por el formulario, se evalua si los datos estan definidos y llegan por la variable
                           $_POST, de ser a asi se crea una operacion ternaria para cada uno de los datos que se recogen del
                           formulario, si su valor corresponde a la operacion ternaria se asigna su valor a una variable con 
                           el nombre de la variable que se recoge,de lo contrario se asigna un false a la variable, luego
                           se crea un condicional tipo if que pregunta si todas las variables son true por medio de &&,si si
                           se cumple se creara una instancia de la clase Producto y se asignara a la variable producto, por 
                           el metodo setter se asigna el valor que llega del formulario a cada uno de los atributos de la clase.
                           La imagen se evalua por aprte ya qye tieene unos filtros de informacion los cuales debe ser validado.
                           Se crea una condicion las cual pregusnta si no, existe un directorio de imagenes con una ruta expesifica
                           si esta afirmacion se cumple se creael direcotiro con el metodo mkdir y se asigna la ruta deseada 
                           y se dan permisos de 0777, se utiliza el metodo setter para asignar el nombre de la imagen qe se envia por
                           el formulario utilizando la estructura que se tiene en la clase Producto, utilizamos el metodo
                           move_uploaded_file el se encargara de subier la imagen a la base de datos y se le asigna la ruta y
                           concatenamos el nombre.
                           ahora pasamos a evaluar una condicion que verifica si se ha pasado por la url un id de un producto
                           si es asi se asigna el id a la variable $id, se asigna el id al objeto producto, se llama al metodo edit,
                           el cual actualizara la informacion de la base de datos,  pero si esta condicion no se cumple se llama al
                           metodo save, el cual se encarga de guardar la informacon e la base de datos como producto nuevo y se guarda
                           en la variable $save.
                           Luego evaluamos la variable $save, si es true se asigna a la variable $_SESSION['producto'] el valor de complete
                           de los contrario la condicion no se cumple se asigna el valor de failed a la variable $_SESSION['producto'].
                           por ultimo se encraga de redireccinar a la ruta de la gestion de productos, por medio de header.
6) Se crea el metodo editar: Esta metodo utiliza un metodo estatico creado en la carpeta helpers en el fichero utils.php que se 
                             encarga de evaluar si el usuarios es administrador, de ser asi se crea un condicional el cual evalua si
                             se pasa un parameros por la url y si este esta definido, de ser asi asigna el valor que se recibe por $_GET
                             a una variable $id, se asigna una variable de nombre $edit a la cual se inicializa con un valor de true
                             Se crea la instancia de la clase producto y por medio del metodo setter se asigna el valor
                             del atributo $id, se realiza un llamado al metodo getOne, el cual se encarga de realizar una consulta
                             a la base de datos y evalua los id que se tiene  en la base de datos  con el que pasamos por la url y nos trae solo
                             ese prodcuto, ha este valor se le asigna a la variable $pro, por ultimo se incluye la vista crear.php donde utilizaremos
                             las variables que inicializamos en esta parte del programa.
7) Se crea el metodo eliminar: Esta metodo utiliza un metodo estatico creado en la carpeta helpers en el fichero utils.php que se 
                             encarga de evaluar si el usuarios es administrador, de ser asi se crea un condicional el cual evalua si
                             se pasa un parametro por la url y si este esta definido, de ser asi asigna el valor que se recibe por $_GET
                             a una variable $id, Se crea la instancia de la clase producto y por medio del metodo setter se asigna el valor
                             del atributo en la variable $id, luego se hace el llamado al metodo delete el cual es el encargado
                             de realizar una consulta a la base de datos para eliminar el producto que concida con el id que se eavlua en 
                             esta parte del codigo, este resultado se almacena en la variable $delete, se crea un nuevo condicional que evalua si el
                             valor de la $delete es true, se se cumpla la condicion se asigna a la variable $_SESSION['delete'] el valor de complete de lo 
                             contrario se asigna el valor de failed a la variable $_SESSION['delete'], por ultimo se redireccina a la ruta de la gestion de productos

*/                       