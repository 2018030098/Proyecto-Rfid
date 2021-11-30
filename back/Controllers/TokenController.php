<?php

require('../back/Models/Token.php');

class TokenController extends Token{
    
    /**
     * Funcion que se encarga de obtener la informacion de la base de datos,
     * ordenarla y enviarla a la vista correspondiente
     */
    public static function index(){
        $info = Token::getInfo();
        return $info;
    }

    /**
     * Funcion que se encarga de recibir la informacion del formulario
     * validarla que este correcta
     * y enviarla al modelo en caso de estar correcta
     * 
     * @param mixed $newToken
     * @param mixed $oldToken
     * @return $message 
     */
    public static function store($newToken,$oldToken){
        $info = Token::getInfo();
        
        if ($oldToken == $newToken) {
            return ["title" => "Sin cambios", "description" => "No hubo ninguna modificacion", "class" => "bg-light", "icon" => "<i class='fas fa-check-square'></i>"];
        }
        foreach ($info as $data) {
            if ($data['Token'] == $newToken) {
                return ["title" => "Vaya suerte", "description" => "El token generado es igual a uno ya existente <br> Por favor intentelo de nuevo", "class" => "bg-warning", "icon" => "<i class='fas fa-exclamation-triangle'></i>"];
            }
            if ($data['Token'] == $oldToken) {
                $id = $data['idToken'];
            }
        }

        return Token::updInfo($newToken,$id);
    }
}
