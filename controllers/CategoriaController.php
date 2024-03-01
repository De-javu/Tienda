<?php
require_once 'models/categoria.php';
require_once 'helpers/utils.php'; // Import the Utils class
require_once 'models/producto.php';
// Clase controladora de categorias
 
class CategoriaController{
    
    //Método para mostrar la página de inicio de categorías.
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            // Conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
        }
        require_once 'views/categoria/ver.php';
    }

    // Método para mostrar el formulario de creación de categorías.
    public function crear(){
        Utils::isAdmin();   
        require_once 'views/categoria/crear.php';
    }

    // Método para guardar una categoría en la base de datos.
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){

            // Guardar la categoria en la base de datos
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
            
        } 

        header("Location:".base_url."categoria/index");
    }
}

/*
DICIONARIO DE FUNCIONES:
require_once = Se utilizara para incluir ficheros que contienen funciones,una unica vez y si el fichero ya ha sido incluido no se volvera a incluir.
class = Se utiliza para crear las platillas que se utilizaran para crear los objetos
class CategoriaController = Indica que se crera la clase catagoria controller. 
public = Indica que es una funcion publica la cual se puede acceder desdw cualquier parte del programa 
function = Indica que se creara una funcion o metodo.
Utils::isAdmin(); = Se utiliza para verificar si el usuario es administrador.
$ = Se utiliza para declarar variables
new = Se utiuliza para instanciar una clase, de esta forma la vilvenos un objeto.
Utils:: = Se utliza para llamara una funcio de la clase Utils
if = Se utiliza como condicional, si se cumple se ejecutara el codigo dentro
isset = Se utiliza para validara si una variable esta definida o es null
$_POST = Se utiliza para indicar el metodo sera oculto para  enviar los datos del foemulario.
&& = Se utiliza como condicional donde se valuan dos condiciones y se deben cumplir.
setter = Se utiliza para asignar un valor a una variable privada. 
header = SDe utiliza para redireccionar a otras paginas.

En resumen = El fuchero contyrolador se encarga de evaluar las interacciones que tenga el usuario con la pagina y de esta forma
            ejecutar las acciones consultando el modelo que se encraga de obtener los datos de la base de datos y de esta forma
            terna una respuesta para el usuario modificando la vista segun sea la solitud del usuario.

*/

?>