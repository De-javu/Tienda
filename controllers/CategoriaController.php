<?php
require_once 'models/categoria.php';
require_once 'helpers/utils.php'; 
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

