<?php
/**
 * Clase Categoria
 * 
 * Esta clase representa una categoría en el sistema.
 * Contiene métodos para obtener y establecer el ID y el nombre de la categoría,
 * así como para obtener todas las categorías y guardar una nueva categoría en la base de datos.
 */
class Categoria
{
    private $id;
    private $nombre;
    private $db;

    /**
     * Constructor de la clase Categoria.
     * 
     * Crea una nueva instancia de la clase y establece la conexión a la base de datos.
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Obtiene el ID de la categoría.
    
    public function getId()
    {
        return $this->id;
    }

    //Obtiene el nombre de la categoría.
     
    public function getNombre()
    {
        return $this->nombre;
    }

    //Establece el ID de la categoría.
    public function setId($id)
    {
        $this->id = $id;
    }

    // Establece el nombre de la categoría.
     
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    //Obtiene todas las categorías.
    public function getAll()
    {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
    }

    //Guarda una nueva categoría en la base de datos.
     
    public function save()
    {
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }




/*
DICIONARIO DE FUNCIONES:
class = Se utiliza para crear las platillas que se utilizaran para crear los objetos
class Categoria = Indica que se crera la clase catagoria.
private = Indica que es una clase privada la cual inicamnete se puede acceder desde la misma clase.
$ = Se utiliza para indicar que se declara una variable
public = Indica que es una funccio  la cual se puede utiulizara desde cualquier parte del programa.
public function __construct() = Se encarga de inicializar los atributos de la clase. 
$this = Se utiliza para hacer referencia a los atributos y metodos de la clase.
-> = Se utiliza para acceder a los atributos y metodos de la clase y conocer su valor actual    
Database::connect(); = Es un metodo estatico que se engarga de conectarse a la base de datos.
public = Indica que es una funcion publica la cual se puede accerder desde cualquier parte del programa.
getter = Se utiliza para accerder a los atributos privados de la clase y conocer su valor actual.
return = Se utiliza para retornar un valor.
setter = Se utiliza para asignar un valor a una variable privada y modificar su valor.
real_escape_string = Se utiliza para limpiar los datos que se ingresan a la base de datos.
public function getAll() = Se encarga de obtener todos los datos de la tabla categorias.
query = Se utiliza para realizar consultas a la base de datos.
SELECT * FROM = Se utiliza para seleccionar todos los datos de una tabla en espesifico
ORDER BY id DESC = Se utiliza para ordenar los datos de forma descendente.
public function save() = Se encarga de guardar los datos en la base de datos.
INSERT INTO  =  Se encarga de inmsertar datos a la base de datso de una tabla en espesifico.
VALUES = Es donde se definen los valores que se insertaran a la tabla de datos
false = Se utiliza para indicar que una variable es falsa.
if = Se utiliza como condicional, si se cumple se ejecutara el codigo dentro
true = Se utiliza para indicar que una variable es verdadera.

En resumen = Esta clase se encarga de crear la plantilla que se utilizara para crear los objetos de la clase categoria
            y se encarga de crear los metodos que se utilizaran para obtener los datos de la base de datos y guardar los datos
            en la base de datos.
*/
}