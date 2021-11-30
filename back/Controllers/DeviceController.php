<?php

require("../back/Models/Device.php");

class DeviceController extends Device{

    /**
     * Funcion que se encarga de obtener la informacion de la base de datos,
     * ordenarla y enviarla a la vista correspondiente
     * 
     * @return array
     */
    public static function index(){
        $info = Device::getInfo();

        // echo "<pre>"; 
        // print_r($info); 
        // echo "</pre>";
        // die();

        return $info;
    }

    /**
     * Funcion que se encarga de recibir la informacion del formulario
     * validarla que este correcta
     * y enviarla al modelo en caso de estar correcta
     * 
     * @param mixed $serial
     * @param mixed $newSerial
     * @param mixed $newStatus 
     * @return $message 
     */
    public static function store($serial,$newSerial,$newStatus){

        $info = Device::getInfo();

        foreach ($info as $data) {
            if ($data['Serie'] == $serial) {
                $mySerial = $data['Serie'];
                $myStatus = $data['Estatus'];
                $id = $data['ID'];
                break;
            }
        }

        if (!isset($mySerial)) {
            return ["title" => "Problema", "description" => "Hubo un problema, por favor vuelva a intentarlo", "class" => "bg-secondary text-white", "icon" => "<i class='fas fa-bug'></i>"];
        }

        if ($newSerial != null) {
            foreach ($info as $data) {
                if ($newSerial == $data['Serie']) {
                    return ["title" => "Problema", "description" => "El nuevo numero serial ya existe, por favor ingrese uno diferente", "class" => "bg-warning", "icon" => "<i class='fas fa-exclamation-triangle'></i>"];
                }
            }
        }else{
            $newSerial = $mySerial;
        }
        if ($newStatus != null) {
            $newStatus = "Enable";
        }else{
            $newStatus = "Disable";
        }

        if($newSerial !== $mySerial || $newStatus !== $myStatus){
            return Device::updInfo(strtoupper($newSerial),$newStatus,$id);
        }else {
            return ["title" => "Sin cambios", "description" => "No hubo ninguna modificacion", "class" => "bg-light", "icon" => "<i class='fas fa-check-square'></i>"];
        }
    }
}