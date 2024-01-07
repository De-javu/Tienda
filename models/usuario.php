<?php

// se crea la clases privadas con los campos de la tabla de usuario en la db
class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
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
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return  password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 9]);
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    // Se crean los setter, que permiten asignar un nuevo valor a las clases

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password)
    {
        $this->password = $password; 
    }

    function setRol($rol)
    {
        $this->rol = $this->db->real_escape_string($rol);
    }

    function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    // Se crea la funcion para validar y guardar la informacion que se desea

    /**
     * Guarda los datos del usuario en la base de datos.
     *
     * @return bool Retorna true si se guardaron los datos correctamente, de lo contrario retorna false.
     */
    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    /**
     * Realiza el inicio de sesión del usuario.
     *
     * @return mixed Devuelve el objeto del usuario si el inicio de sesión es exitoso, de lo contrario devuelve false.
     */
    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }

        return $result;
    }



}



/*
class = Es la plantilla que se utiliza para definir  los metodos y propiedades 
private = indica que la calse es privada y solo se podra acceder desde este fichero
public function __construct() = 
$this = SE encraga de trater las propidades o metodos que tiene el elemnto actualmente
-> = Es un apuntador el cual señala el metodo actaul
Database::connect = No es un a funcion propia de php, la creamos nostros y la utilizams
                    para indicar que que se realizara la conexion a la base de datos
getter = Se utiliza para optener el valor actual de una propíedad de una clase
return = Se encarga de retornar el resultado final de una funcion
setter =  Se utiliza para modificar el valor de una propridad en una clase de manera controlada
real_escape_string = Se utiliza para controlar los datros y caracteres que se pondran en 
                     la base dedatos de sql, protegiendola de ataques
password_hash = ES una fincion la cual permiete encriptar las contraseñas por  medio del 
                metodo has, lo que la hace muy segura ya que no se podra optener ningun 
                resultado de la contraseña diectamente en eun ataque
PASSWORD_BCRYPT = Se encarga de encapsular, devulve 60 caracteres
['cost' => 8] = Indica que tiene una seguridad mayor la cual es mas dificil de romper
                pero a su vez consume mas recuersos de la compuadora.
$ = Se utiliza para declarar una variable
INSERT INTO= Indica que se insertara un datos a la base de datos
VALUES = Se utiliza para espesificar los valores que se insertaran ala tabla de datos.
NULL = Indica qie el valor es nulo
query = Se utiliza para ejecutar consultas en una base dedatos, ingresar, modoficar,actulizar y eliminar 
false = Se utiliza para indicar que un  valor es falso
if = SE utiliza como condicional 
true = Se utiliza para indicar que el valor sera verdadero.
num_rows = Se utiliza para optener el numero de filas en un resultado, de esta forma se logra conocer cuantos resultados fueron devueltos
fetch_object = Esta funcion se utiliza para obtener la fila actual de un conjunto de resultados como un objeto 
password_verify = Esta funcion se utiliza para verificar que la contraseña suministrada por el usuario coincida con el hash de la contraseña almacenada


NOTA: Este fichero se encraga de crea crear una clase que tiene unos objetos los cuales, 
      por medio de las funciones getter que permite ver su valor actual, pero con el metodoto}
      setter se modificara su valor,  posteriormente se llevara acabo un a funcion la cual
      se encargara de evaluar los datos y llevarlos a que se guarden en la base de datos.
      Tambien se utiliza una funcion adicional login la cual es la encargada de validar que
      el usuario esta registrado en la base de datos y podra ingresar bien se como administrador o 
      usuario 

      metodo constructor = Se encarga de conectar la base de datos con el fichero actual
      metodo save = Se encarga de guardar los datos en la base de datos
      metodo login = Se encarga de validar que el usuario esta registrado en la base de datos.
*/
?>