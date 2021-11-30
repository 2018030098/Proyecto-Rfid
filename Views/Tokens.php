<?php
    $locate = 1;
    require('../back/Controllers/TokenController.php');
    if (isset($_POST['token'])) {
        $message = TokenController::store($_POST['token'],$_POST['oldtoken']);
    }
    $allData = TokenController::index();
    $inc = 0;

    include_once('Navigation_bar/navbar_header.php');

?>
<div class="col-lg animated fadeInUp">
    <div class="ibox shadow">
        <div class="ibox-title">
            <h5>Tabla de Tokens </h5>
        </div>
        <div class="ibox-content">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-1">#</th>
                        <th class="col-10">Token</th>
                        <th class="col-1">Editar</th>
                    </tr>
                </thead>
                <tbody>
        <?php   foreach ($allData as $data) {   ?>
                    <tr style="font-size: medium;">
                        <td><?php   echo $inc;   ?></td>
                        <td><span class="line"><?php   echo $data['Token'];    ?></span></td>
                        <td><button type="button" onclick="infoModal_T('<?php    echo $data['Token'];   ?>')" class="btn" id="Token_Button" data-toggle="modal" data-target="#Token_Modal"><i class="fas fa-edit"></i></button></td>
                    </tr>
        <?php   $inc++;  }   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
//  <!-- Modal -->
    include_once('Modals/Token_Modal.php');

    include_once('Navigation_bar/navbar_footer.php');

?>