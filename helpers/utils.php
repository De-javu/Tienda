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


?>