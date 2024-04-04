<?php
require_once 'models/usuario.php';
require_once 'helpers/utils.php';
class UsuarioController{
     public function index(){
        echo "Controlador Usuario, Accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
        
    }
    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']: false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false; 


           if($nombre && $apellidos && $email && $password){  
            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setPassword($password);       

            $save = $usuario->save();

            if($save){
                $_SESSION['register'] = "complete";
            }else{
                $_SESSION['register'] = "failed";
            }
            
        }else{
            $_SESSION['register'] = "failed";
             }

        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }

    /*
    Metodo para mostrar el formulario de login
    Método para realizar el inicio de sesión de un usuario.
    Este método recibe los datos del formulario de inicio de sesión, 
    consulta la base de datos para verificar la identidad del usuario 
    y crea una sesión si la identificación es exitosa. 
    */
    public function login() {

        if(isset($_POST)){
            //Identificar al usuario
            //Consultar a la base de datos desde el modelo usuario

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            // consulta la base de datos para verificar la identidad del usuario
            $identity= $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin' ){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificacion Fallida';
            }

            //Crear una session
        }

        header("Location:".base_url);
    

    }

    /*
    
     Método para cerrar la sesión de un usuario.
     Este método elimina las variables de sesión relacionadas con la identidad 
     y el rol de usuario, y redirige al usuario a la página de inicio.
    
     */
    

    public function logout(){

    
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){    
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);

        
    }

}


/*

require_once = indica que se incluira una inica vez informacion de optro fichero 
class = Se utiliza para definir las paltillas donde se utilizaran los mtodos y propiedades de las clases
UsuarioController = Nombre de la clase
public = indica que se puede acceder desde cualquier parte del programa 
public function index() = una funcion publica creada que imprime un texto por pantalla
echo = Se utiliza para imprimir por pantalla
public function registro() = Una funcion publica creada con el fin de incluir la vista del formulario de registro
require_once 'views/usuario/registro.php'; = ruta incluida una nica vez por medio del metodo include_require
public function save() = Una funcion publica creada que se encarga de evaluar los datos pustos en el formulario
                          de limpiar y autoizar que estos sean tomados por la based e datos 
                          indicando si se registro exitosamnete y se la seesion fue correcta
if = Se utiliza como condicional
isset = SE encarga de evaluar si una variable fue declara y si su valor es nulo
$_POST = Es el metodo por el cual se enviara la informacion al formulario
$ = Se utiliza para inficar que declara una variable
? = Es un operador ternario (condicion) que funciona como if-else pero abreviado
false = Valor que púede tomar una funcion 
-> = Este operador se utiliza para acceder a las propiedades y metodos de un objeto 
$_SESSION = Es una variable super global que seencarga de enviar informacion al servidor de
            la session actual y estpo servira para nacegar en varias paginas
else = Es un cndicina que encaso de que no se cumpla el if se evaluara else y ejecutara una accion
header = Se utiliza para indicar la ruta a donde se desea llegar despues de que este controlador
         ya ejecuto todas las acciones que se utilizaron.
new = Se utiliza para crear un objeto de una clase.
getter = Se utiliza para optener el valor actual de una propíedad de una clase
setter =  Se utiliza para modificar el valor de una propridad en una clase de manera controlada.
is_object = Se utiliza para saber si un a varibale es un objeto.
unset = Se utiliza para destruir una variable especifica.


NOTA: El UsuarioController Se creo para que por medio de esta clase se controlara los datos 
      que van a ingresar a la base de datos de una forma controlada y depurada controlando
      ciertas caracteristicas y condiciones antes de guardar la informacion que es la operacion
      que se encarga de realizar el controlador, a su vez conecta con la clase model Usuario que
      es la encargada de fijar la informacio recojida por el la vista usuario y depuarada por la
      clasee controlador.

      Se el metodo login que se encarga de validar que el usuario este registrado en la base de datos 
      que rol cumple para crearla sesion de login y asi poder acceder a la pagina de administrador o de usuario.

      Se crea el metodo logout que se encarga de cerrar la session del usuario y redirigirlo a la pagina de inicio.
*/