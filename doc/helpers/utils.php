<?php
// se crea la clase Utils
class Utils
{
    // Se crea el metodo delateSession
    public static function deleteSession($name)
    {
        if (isset ($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    //Se crea el metodo isAdmin
    public static function isAdmin()
    {
        if (!isset ($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    //Se crea el metodo isIdentity
    public static function isIdentity()
    {
        if (!isset ($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    //Se crea el metodo swhocategorias
    public static function showCategorias()
    {
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    //Se crea el metodo statsCarrito
    public static function statsCarrito()
    {
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if (isset ($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }

    //Se crea el metodo showStatus

    public static function showStatus($status)
    {
        $value = 'Pendiente';

        if ($status == 'confirm') {
            $value = 'Pendiente';
        } elseif ($status == 'preparation') {
            $value = 'En preparation';
        } elseif ($status == 'ready') {
            $value = 'Preparado para enviar';
        } elseif ($status == 'sended') {
            $value = 'Enviado';

        }
        return $value;
    }
}

/*
Class = Se encragad crera la plantilla que se utilizara para los objetos de la clase 
public = indica que s epuede accedere desde cualquier parte del programa 
static = Se utiliza para poder acceder a la calse sin necesidad de que esta sea instanciada
funtion = Se encarga de anteceder el nombre con la logica de la funcion 
if = Es un condicional 
isset = Se encarga de validar si una variable fue declara o si su valor es nulo
$_SESSION = Es un avriable super global que se encarga de almacenar los datos de session y permiete 
            navegar entre paginas con los datos de las misma session sin necesidad de estarse}
            registrando cada vez que accede algo nuevo
null = Se utiliza para evaluar si el valor es nulo 
unset = Esta funcion se utiliza para eliminar variables, las cuales desoues llamaremos y ya no estan 
return = Se encraga de devolver el valor final de la funcion 

NOTA: Esta es la forma como se crea una clase con la funcion de finida para eliminar las sessiones
       que estan abiertas y se desean  cerrar de esta forma lo unico que se haces llamar los metodos
       desde el fichero que se desea.
       Se crea el metodo isAdmin que se encarga de verificar si el usuario es administrador
       Se crea el metodo shocategorias que se encarga de mostrar las categorias que se encuentran en la base de datos
 */


?>