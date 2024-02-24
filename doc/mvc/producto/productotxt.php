<?php
class Producto
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    //Metodo constructor que cocenta a la base de datos
    public function __construct()
    {
        $this->db = Database::connect();

    }

    // Se crean los getter, que permiten obtener la propriedad actual de la clase
    public function getId()
    {
        return $this->id;
    }

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public function getOferta()
    {
        return $this->oferta;
    }
    public function getFecha()
    {
        return $this->fecha;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($description)
    {
        $this->descripcion = $this->db->real_escape_string($description);

    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;


    }



    // Este metodo permiete optener todos los productos en orden descendente que estan en la base de datos
    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;

    }

    public function getOne()
    {
        $producto = $this->db->query("SELECT *FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }


    // Este metodo permiete instar un producto a la base de datos, con los parametros que lo componen
    public function save()
    {
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()},  categoria_id={$this->getCategoria_id()}";
        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }
        $sql .= " WHERE id={$this->id};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }
}

//DICCIONARIO DE FUNCIONES PARA ESTA PRACTICA 

/*
class = Se utiliza para indicar que se crea la plantilla que contendra los metodos y propiedades de la clase
private = Se utiliza para indicar que sol se puede acceder desde la misma clase
public = indica que se puede utilizar desde cualquier parte del codigo
function __construct = Es metodo especial que se ejecuta auytomaticamnete cuando se eintancai la clase
$this = Se utiliza para indicar que el valor actul de la propiedad de la clase
-> = Se utiliza para acceder a los metodos y propiedades de la clase
Database::connect = Es un metodo estatico que se utiliza para realizar la conexion con la base de datos
return = Se utiliza para retornar un valor 
getter = Se encarga de optener el valor actual de la propiedad de la clase 
setter  = Se utiliza para actualizar el valor de la propiedad de una clase
real_escape_string = Se utiliza para hacer segura la consulta a la base de datos ya que protege limpiando una serie de carateres que pueden crear una inyecciond e datos
query = Se utiliza para realizar una consulta a la base de datos
SELECT * FROM = Se utiliza para realizar una consulta epesifica de una tabla de la base de datos 
ORDER BY id DESC = Se utiliza pata organizar los datos de forma desendente para esye caso 
WHERE = Se utiuliza para realizzar una consulta a la base d edatos con una condicion espesifica 
fetch_object = Se utiliza para optener un los objetos de una consulta a la base de datos
INSERT INTO = Se uitiliza para iniciar el insercioin de datos a la base de datos 
VALUES = Se utiliza para indicar los valores que se van a insertar en la base de datos
CURDATE = Se utiliza para optener la fecha actual  e inserta a la base de datos
false = Se utiliza para indicar que algo es falso
true = Se utiliza para indicar que algo es verdadero    
UPDATE = Se utiliza para indicar que se realizara una actualizacio  de alguna tabla de la base de datos
SET = Se encarga de seleccinar las columnas que se van a actualizar
if = Se utiliza para realizar una condicion, si esta se cumple se ejecutara un codigo espesifico 
!= = Se utiliza para indicar que algo es diferente
null = Se utiliza para indicar que algo no tiene valor
DELETE FROM = Se utiliza para indicar que se eliminara un registro de la base de datos se gun se la tabla seleccionada

1)METODO CONSTRUCTOR = Se crea el metodo magico cosntyrucutor elk cual se encarga de realizara la conexion a la base de datos
                     esto sera muy util ya qye se podra utilizara rn otras partes del codigo $this->db para interactuar
                     con la base de datos.
2) METODO getAll = Es metodo se encarga de realizar una consulta a la base de datos donde se solicita listar la tabla
                   de los productos de forma desendente, de esta forma se pone en la variable $productos cada vez que 
                   se llame el metodo getAll, se podra optener todos los productos de la base de datos
3) METODO getOne = Este metodo se encarga de realizar una consulta a  la base de datos donde seleciona la tabla de producto
                   solicita comparar el id del producto con el id que se esta utilizando en el momento,
                   de esta forma retorna la variable $pruducto y se utiliza la funcion fetch_object para optenerlo
                   como un objeto, de tal forma cuando se llame el metodo getOne se podra optener un producto en espesifico como
                   un objeto
4) METODO save = Este metodo se encarga de insertar en la tabla de productos  nuevos valores que se pasan por los
                 parametros getter de la clase, se guarda en la variable $sql, luego se realiza una consulta a la base de datos
                 donde se pasan los parametros de de la variable $sql y se asigna la variable $save, si se guarda
                 corectamnete se retorna true, de lo contrario retorna false
5) METODO edit = Este metodo realiza una consulta de actualizacion a la base de datos, en la tabla productos selcciona los
                 campos que se van actualizar y se pasan por los parametros getter de la clase, para la imagen se realiza
                 un proceso mas complejo, se evalua si la imagen es diferenre a null, si es asi la imagen se actualizara y se tomara
                el valor actual, por medio del condicional WHERE id={$this->id} se evalua los id de la tabla productos, pero solo se actualizara 
                el id que se esta utiulizando en el momento, luego se valida si la consulta $sql qye se guarda en la variable
                $save se ejecuta correctamente,si es asi retorna true, de lo contrario false
6) METODO delete = Este metodo realiza una consulta a la base de datos a la fila productos para eliminar un producto que 
                   concida con el id que sea igual al actual, si la consulta $sql  se ejecuta correctamente el valor sera puesto en la $ variable $delete, si retorna que fue exitoso su valor sera true, de lo
                   contrario sera false, de esta forma se podra eliminar un producto de la base de datos
                   
 */

