<?php

require_once('DB.php');
require_once('Verification.php');

class Token{
    
    /**
     * Funcion que se encarga de obtener toda la informacion
     * de la tabla Token y enviarla al controlador
     * 
     * @return array
     */
    public static function getInfo(){
        $db = new DB;
        $dbh = $db->connection();
        
        try {
            $stmt = $dbh->prepare("SELECT * FROM Token;");
            $stmt->execute();
            $allinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        }

        $db->closeConnection($dbh);
        return $allinfo;
    }

    /**
     * Funcion que se encarga de realizar un update 
     * dentro de la tabla token
     * 
     * @param mixed $token
     * @param mixed $id
     * @return $message
     */
    public static function updInfo($token,$id){
        $db = new DB;
        $dbh = $db->connection();

        try {
            $stmt = $dbh->prepare("UPDATE `Token` SET `Token`= ? WHERE `idToken` = ?");
            $stmt->execute([$token,$id]);

            Verification::change();

        } catch (\Throwable $th) {
            throw $th;
            $db->closeConnection($dbh);
            return ["title" => "Error", "Hubo un error al intentar modificar la informacion" => "El numero serial se modifico con exito", "class" => "bg-danger text-white", "icon" => "<i class='fas fa-times'></i>"];
        }
        $db->closeConnection($dbh);
        return ["title" => "Exito", "description" => "El token se modifico con exito", "class" => "bg-success text-white", "icon" => "<i class='fas fa-check-circle'></i>"];
    }
}