<?php
require_once 'models/producto.php';

class CarritoController
{
    public function index()
    {
        $carrito = $_SESSION['carrito'];

        require_once 'views/carrito/index.php';
    }


    public function add()
    {
        //Obtiene el id del producto
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }
        //Evalua si existe el carrito
        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
      // si no existe el carrito los trae de la base de datos
            if (!isset($counter) || $counter == 0) {    
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            
    // si el producto es un objeto lo agrega al carrito
            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        //Redirige al carrito.
        header("Location:" . base_url . "carrito/index");
    }
    public function remove()
    {

    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");


    }
}
