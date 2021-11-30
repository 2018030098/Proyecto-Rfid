<?php

class DB {
    
    /**
     * Funcion que se encarga de establecer una conexion
     * con la base de datos
     * 
     * @return PDO $conexion 
     */
    public function connection(){
        
        $host = "192.168.1.67";     // 192.168.1.67 // localhost
        $db_username = "abdiel";    // abdiel // root
        $db_password = "123456";    // 123456
        $db_name = "ProyectoRfid";

        try {
            $dsn = "mysql:host=$host;dbname=$db_name";
            $dbh = new PDO($dsn,$db_username,$db_password);
            return $dbh;
        } catch (PDOException $th) {
            echo "Problema al crear la conexion a la base de datos";
            throw $th;
        }
    }

    /**
     * Funcion para cerrar la conexion 
     * a la base de datos
     * 
     * @param \PDO $dbh
     */
    public function closeConnection(PDO $dbh){
        try {
            $dbh = null;
        } catch (\Throwable $th) {
            echo "Problema al intentar cerrar la conexion a la base de datos";
            throw $th;
        }
    }
}