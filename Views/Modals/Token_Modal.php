<div class="modal fade" id="Token_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="Tokens.php" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title" id="ModalLabelTitle">Generar nuevo Token</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8 form-group">
                            <input type="text" id="oldtoken" name="oldtoken" class="form-control" hidden readonly>
                            <label for="token">Token</label>
                            <input type="text" id="token" name="token" class="form-control" readonly>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <button type="button" onclick="newToken()" class="btn btn-primary">Generar nuevo Token</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="Tokens.php"><button type="button" class="btn btn-secondary text-decoration-none text-white" data-dismiss="modal">Cancelar</button></a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
