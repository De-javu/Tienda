<?php

class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }
}

/*
Class = Se encragad crera la plantilla que se utilizara para los objetos de la clase 
public = indica que s epuede accedere desde cualquier parte del programa 
static = Se utiliza para poder acceder a la calse sin necesidad de que esta sea instanciada
funtion = Se encarga de anteceder el nombre con la logica de la funcion 
if = Es un condicional 
isset = SE encraga de validar si una variable fue declara o si su valor es nulo
$_SESSION = Es un avriable super global que se encarga de almacenar los datos de session y permiete 
            navegar entre paginas con los datos de las misma session sin necesidad de estarse}
            registrando cada vez que accede algo nuevo
null = Se utiliza para evaluar si el valor es nulo 
unset = Esta funcion se utiliza para eliminar variables, las cuales desoues llamaremos y ya no estan 
return = Se encraga de devolver el valor final de la funcion 

NOTA: Esta es la forma com se crea una calse con la funcion de finida para eliminar las sessiones
       que estan abiertas y se desean  cerrar de esta forma lo unico que se hacees llamara la funcion
       desde el fichero que se desea.

 */


?>