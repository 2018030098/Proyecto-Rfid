</div>     
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mensaje -->
    <?php if (isset($message)) { ?>
    <div class="alert alert-dismissible animated d-none shadow-sm <?php    echo $message['class'];    ?>" role="alert" aria-live="assertive" aria-atomic="true" id="loadToast" style="position: absolute; top: 20px; right: 20px;">
        <div class="alert-heading">
            <?php   echo $message['icon']   ?>
            <strong class="mr-auto m-l-sm"><?php    echo $message['title'];    ?></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="closeToast()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <hr>
        <div class="">
            <?php   echo $message['description']   ?>
        </div>

    </div>
    <?php    }   ?>

    <!-- recursos dependiendo de donde se este -->
    <?php   if($locate == 0)        {   ?>
        <script src="Resources/JS/Modal/device.js"></script>
    <?php   } elseif ($locate == 1) {   ?>
        <script src="Resources/JS/Modal/token.js"></script>
    <?php   }   ?>

    <!-- Mainly scripts -->
    <script src="Resources/JS/jquery-3.1.1.min.js"></script>
    <script src="Resources/JS/popper.min.js"></script>
    <script src="Resources/JS/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6aa6c40f89.js" crossorigin="anonymous"></script>

    <!-- Custom and plugin javascript -->
    <script src="Resources/JS/inspinia.js"></script>
    <script src="Resources/JS/plugins/pace/pace.min.js"></script>
    <script src="Resources/JS/pace.min.js"></script>
    <script src="Resources/JS/toast-message.js"></script>

</body>
</html>
