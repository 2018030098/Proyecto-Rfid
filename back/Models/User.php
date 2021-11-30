<?php

require_once('DB.php');

class User{

    /**
     * Busca en la tabla de usuarios un registro
     * que coincida con ambas credenciales
     * 
     * @param string $user
     * @param string $pass
     */
    public static function search($user,$pass){
        $db = new DB;
        $dbh = $db->connection();

    // PDO        
        try {
            $stmt = $dbh->prepare("SELECT * FROM Usuarios WHERE `Username`  = ? AND `Password` = ?;"); 
            $stmt->execute([$user,$pass]);
            $allinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        }

        $db->closeConnection($dbh);
        return $allinfo;
    }
}