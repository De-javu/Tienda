<?php

require_once 'models/pedido.php';

class PedidoController
{
    //Metodo para listar los pedidos y llenado de formulario de pedido
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';

    }

    // Metodo para guardar el pedido que realiza el usuario en la base de datos
    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($provincia && $localidad && $direccion) {

                $pedido = new Pedido();
                $pedido->setUsuario_Id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // Linea pedido

                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }

            header("Location:" . base_url . 'pedido/confirmado');


        } else {
            // redirigir al index
            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_Id($identity->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedidos($pedido->id);

        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuario_Id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        utils::isIdentity();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Sacar los datos  del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // Sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedidos($id);

            require_once 'views/pedido/detalle.php';

        } else {
            header('Location:' . base_url . 'pedido/mis_pedidos');
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function estado(){
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //Recoger datos de formulario
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            //Update del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header("Location:" .base_url.'pedido/detalle&id='.$id);

        }else{
            header("Location:" .base_url);
        }

    }

}
