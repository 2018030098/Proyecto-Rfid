<?php

require_once('DB.php');

class Verification{
    public static function change(){
        
        try {
            $db = new DB;
            $dbh = $db->connection();
            $stmt2 = $dbh->prepare("UPDATE `Verificacion` SET `Changes`= '1' WHERE ID = 1;");
            $stmt2->execute();
        } catch (\Throwable $th) {
            throw $th;
            $db->closeConnection($dbh);
        }

    $db->closeConnection($dbh);
    }
}