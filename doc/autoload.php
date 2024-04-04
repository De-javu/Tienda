<?php
function controllers_autoload($classname){
    include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoload');

/*
Diccionario de terminos
function = Se utilizan para llammar codigo que hace algo, de esta forma no estar re escribiendo, solo se llama la function
inlcude = Se eutiliza para incluir ficheros  externos demtro del fichero actual oel que se desea, evitando re escribir mas cosigo
spl_autoload_register = SE utiliza para auto cargar las calses que tiene un nombe no definido, evitando que sea necesario re escribir codigo

Nota: El auto load se encarga de crear los parametros para cargaar automaticamente las clases
      que se neceitan en los fichero, sin estar haciendo una por una.

*/