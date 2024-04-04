<?php
require_once 'models/usuario.php';
require_once 'helpers/utils.php';

// Iniciamos creando la clase UsuarioController
class UsuarioController{
    // Creamos el método index
     public function index(){
        echo "Controlador Usuario, Accion index";
    }

    // Creamos el método registro
    public function registro(){
        require_once 'views/usuario/registro.php';
        
    }
    // Creamos el método save
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

    
    //Metodo para mostrar el formulario de login
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

    
    // Método para cerrar la sesión de un usuario. 

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
