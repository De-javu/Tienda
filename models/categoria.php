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

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()}");
        return $categoria->fetch_object();
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

}