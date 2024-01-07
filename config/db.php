<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        $db->query("SET NAMES 'utf8'");
        return $db;        
    
    
    }
}

/*
class = Se utiliza para crear la plantilla qu contiene los metodos y atributos de los objetos de la clase}
Database = Es el nombre con el cual se bautiza esta clase. 
public = Indica que se puede acceder desde cualquier parte del programa 
static = Indica que son calses estatitas las cuales se puede acceder sin necesidad de instanciar el objeto 
function = Una funcion es un metodo en la cual cumple con una tarea espesifica
connect = Es el nombre que utilizaremos para esta funcion si se desea llamar desde otro fichero
$ = Indica que se declara una variable 
new = Es el metodo el cual permiete instanciar una clase y volverla un objeto 
mysqli = SE utiliza para realizara conexion a la base dec datos
-> = Es un apuntador que nos permiete conocer el valor actual de los metodos y objetos
query = Se utiliza como consultas en sql, la cual tiene una gran variedad de propoiedades
return = Se utiliza en una funcion para indicar que termino, devolviendo el valor de la funcion

NOTA: Es una clase que tiene el metod estatico Datase el cual se encarga de arealizar una conexion
      a la base de datso por medio de mysqli, donde se instancian los parametros de conexion 
      y se convierten en objetos (db), que posteriomente sera utlizada para realizar mas cossultas
      del tipo sql.    

*/

?>