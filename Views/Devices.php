
<?php
    $locate = 0;
    require('../back/Controllers/DeviceController.php');
    if (isset($_POST['newSerial']) || isset($_POST['inputCheck'])) {
        if (!isset($_POST['inputCheck'])) {
            $_POST['inputCheck'] = null;
        }
        $message = DeviceController::store($_POST['serial'],$_POST['newSerial'],$_POST['inputCheck']);
    }
    $allData = DeviceController::index();
    $inc = 0;
    include_once('Navigation_bar/navbar_header.php');

?>
<div class="col-lg animated fadeInUp">
    <div class="ibox shadow">
        <div class="ibox-title">
            <h5>Tabla Dispositivos</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-1">#</th> 
                    <th class="col-9">Serie</th>
                    <th class="col-1">Lado</th>
                    <th class="col-1">Estatus</th>
                    <th class="">Editar</th>
                </tr>
                </thead>
                <tbody>
        <?php   foreach ($allData as $data) {   ?>
                    <tr style="font-size: medium;">
                        <td><?php   echo $inc;   ?></td>
                        <td><?php   echo $data['Serie'];    ?></td>
                        <td><?php   echo $data['Lado'];   ?></td>
                        <td class="tooltip-demo"><?php   if ($data['Estatus'] == 'Enable') { ?> <button class="btn btn-transparent" data-toggle="tooltip" data-placement="top" title="Activo"><i class="fa fa-check text-navy"></i> <?php   }else{   ?> <button class="btn btn-transparent" data-toggle="tooltip" data-placement="top" title="Inactivo"><i class="fa fa-times text-danger"></i><?php   }   ?> </button></td>
                        <td><button type="button" onclick="infoModal_D('<?php    echo $data['Serie'];   ?>','<?php echo $data['Estatus'] ?>')" class="btn" id="Device_Button" data-toggle="modal" data-target="#Device_Modal"><i class="fas fa-edit"></i></button></td>
                    </tr>
        <?php   $inc++;  }   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
//  <!-- Modal -->
    include_once('Modals/Device_Modal.php');

    include_once('Navigation_bar/navbar_footer.php');
?>