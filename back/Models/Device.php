<?php

require_once('DB.php');
require_once('Verification.php');

class Device{
    
    /**
     * Funcion que se encarga de obtener toda la informacion
     * de la tabla Dispositivos y enviarla al controlador
     * 
     * @return array
     */
    public static function getInfo(){
        $db = new DB;
        $dbh = $db->connection();
        
        try {
            $stmt = $dbh->prepare("SELECT * FROM Dispositivos;");
            $stmt->execute();
            $allinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        }

        $db->closeConnection($dbh);
        return $allinfo;
    }

    /**
     * 
     * Funcion que se encarga de realizar un update 
     * dentro de la tabla Dispositivos
     * 
     * @param mixed $serial
     * @param mixed $status
     * @param mixed $id
     * @return $message
     */
    public static function updInfo($serial,$status,$id){
        $db = new DB;
        $dbh = $db->connection();

        try {
            if (isset($id)) {
                if (isset($serial) && isset($status)) {
                    $stmt = $dbh->prepare("UPDATE `Dispositivos` SET `Serie`=?,`Estatus`=? WHERE `ID` = ?");
                    $stmt->execute([$serial,$status,$id]);
                } elseif (isset($serial) || isset($status)) {
                    if (isset($serial)) {
                        $stmt = $dbh->prepare("UPDATE `Dispositivos` SET `Serie`=? WHERE `ID` = ?");
                        $stmt->execute([$serial,$id]);
                    }elseif (isset($status)) {
                        $stmt = $dbh->prepare("UPDATE `Dispositivos` SET `Estatus`=? WHERE `ID` = ?");
                        $stmt->execute([$status,$id]);
                    }
                }
                
                Verification::change();

            }else {
                echo "Hubo un problema con el ID";
                $db->closeConnection($dbh);
                return $message = ["title" => "Problema", "description" => "Hubo un problema, por favor vuelva a intentarlo", "class" => "bg-secondary text-white", "icon" => "<i class='fas fa-bug'></i>"];
            }
        } catch (\Throwable $th) {
            throw $th;
            $db->closeConnection($dbh);
            return $message = ["title" => "Error", "Hubo un error al intentar modificar la informacion" => "El numero serial se modifico con exito", "class" => "bg-danger text-white", "icon" => "<i class='fas fa-times'></i>"];
        }
        $db->closeConnection($dbh);
        return $message = ["title" => "Exito", "description" => "El serial se modifico con exito", "class" => "bg-success text-white", "icon" => "<i class='fas fa-check-circle'></i>"];
    }

}