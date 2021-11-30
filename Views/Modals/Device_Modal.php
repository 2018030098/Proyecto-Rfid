<div class="modal fade" id="Device_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="Devices.php" method="post">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalLabelTitle">Modificar Serial</h3>
                    <button type="button" class="close" onclick="closeModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="serial">Antigua Serie</label>
                            <input type="text" id="serial" name="serial" class="form-control" readonly>
                        </div>
                        <div class="col-sm-12 form-group" id="newInput">
                            <label for="serial">Nueva Serie</label>
                            <input type="text" id="newSerial" name="newSerial" class="form-control text-uppercase" onkeypress="return hexa(event)" maxlength="8" minlength="8" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Inactivo</label>
                        </div>
                        <div class="switch col-sm-6 d-flex justify-content-center">
                            <div class="onoffswitch mt-3">
                                <input type="checkbox" class="onoffswitch-checkbox" name="inputCheck" id="inputCheck">
                                <label class="onoffswitch-label" for="inputCheck">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Activo</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
