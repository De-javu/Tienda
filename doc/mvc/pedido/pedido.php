<?php
class Pedido
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;


    //Metodo constructor que cocenta a la base de datos
    public function __construct()
    {
        $this->db = Database::connect();

    }

    //Metodos getter y setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getUsuario_Id()
    {
        return $this->usuario_id;
    }
    public function setUsuario_Id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

    }
    public function getProvincia()
    {
        return $this->provincia;
    }
    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);

    }
    public function getLocalidad()
    {
        return $this->localidad;
    }
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    public function getCoste()
    {
        return $this->coste;
    }


    public function setCoste($coste)
    {
        $this->coste = $coste;
    }


    public function getEstado()
    {
        return $this->estado;
    }


    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function getFecha()
    {
        return $this->fecha;
    }


    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }


    // Este metodo permiete optener todos los productos en orden descendente que estan en la base de datos
    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;

    }

    /*Este metodo se encarga de optener un producto en espesifico con el id que se le pase
    como consulta,lo compara con el de la base de datos y nostrae ese producto en espesifico. 
    */

    public function getOne()
    {
        $productos = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }

    /*Este metodo se encarga de optener el ultimo pedido realizado por el usuario
     sacando los valores del coste y el id del usuario que realizo el pedido.
     */
    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p
                WHERE p.usuario_id = {$this->getUsuario_id()}
                ORDER BY id DESC LIMIT 1";
        $producto = $this->db->query($sql);
        return $producto->fetch_object();
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos p
                WHERE p.usuario_id = {$this->getUsuario_id()}
                ORDER BY id DESC";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    // Este metodo se encarga de llamara todos los pedidos asociados a un usuario en espesifico y sus unidades.
    public function getProductosByPedidos($id)
    {
        $sql = "SELECT pr.*, lp.unidades FROM productos pr
                INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id
                WHERE lp.pedido_id = {$id}";

        $productos = $this->db->query($sql);
        return $productos;
    }


    // Este metodo permiete instar un producto a la base de datos, con los parametros que lo componen
    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    // Este metodo permite guardar en la tabla de lineas de pedido los prodcutos que se han comprado.
    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL,{$pedido_id}, {$producto->id}, {$elemento['unidades']});";
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE pedidos SET estado= '{$this->getEstado()}'
                WHERE id={$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;

    }


}
