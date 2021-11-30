<?php

require($_SERVER['DOCUMENT_ROOT'].'\Proyecto-Rfid/back/Models/User.php'); ///

class LoginController {

    /**
     * Funcion que se encarga de recibir las credenciales 
     * ingresadas por el usuario, verificar si son validas y
     * en caso de serlo crear una nueva session
     * 
     * @param string $user
     * @param string $password
     * 
     * @return array $message
     */
    public static function login($user,$password){
        $password = hash("sha512",$password);

        $info = User::search($user,$password);

        if (!empty($info)) {
            session_start();
            $_SESSION['start'] = $user;
            $_SESSION['time'] = time();
            header('Location: Views/Home');
        }

        if (!isset($_SESSION['start'])) {
            return ["title" => "Incorrecto", "description" => "Usuario y/o Contraseña son incorrectos", "class" => "bg-danger", "icon" => "<i class='fas fa-exclamation-triangle'></i>"];
        }
    }

    /**
     * funcion que valida si existe o no una session,
     * en caso de no existir o de haber caducado retorna un 1,
     * en caso de existir retorna un 0 y actualiza el campo $_SESSION['time']
     * 
     * @return int 0 exist / 1 not exist
     */
    public static function validation(){
        $tiempo = 3600; //cantidad de segundos para que caduque una session
        session_start();

        if (!isset($_SESSION['start']) ) {
            return 1;
        }elseif(time() - $_SESSION['time'] > $tiempo){
            return 1;
        }else {
            $_SESSION['time'] = time();
            return 0;
        }
    }

    /**
     * funcion que se encarga de terminar una session
     * y redirigir la pestaña al login
     */
    public static function log_out(){
        session_start();

        session_unset();
        session_destroy();
        
        header("location: http://localhost/Proyecto-Rfid/index");
    }

    /**
     * funcion que se encarga de redirigir la pestaña
     * al Home
     */
    public static function redirect(){
        header("location: http://localhost/Proyecto-Rfid/Views/Home");
    }
}