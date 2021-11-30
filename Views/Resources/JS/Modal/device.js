    /**
     * funcion que se encarga de cargar la 
     * informacion correspondiente en el modal
     * 
     * @param {*} data 
     * @param {*} status 
     */
    function infoModal_D(data,status){
        let oldInput = document.getElementById("serial");

        let newinput = document.getElementById("newInput");
        let Serial = document.getElementById("newSerial");

        let check = document.getElementById("inputCheck");

        if (status == "Enable") {
            check.setAttribute("checked","");
        } else {
            if (check.hasAttribute("checked")) {
                check.removeAttribute("checked");
            }
        }

        if (oldInput.hasAttribute('value')) {
            oldInput.removeAttribute('value');
        }
        oldInput.setAttribute("value",data);

       
    }

    /**
     * funcion para validar y permitir solo el acceso de 
     * numeros Hexadecimales
     * 
     * @param {*} keyPress 
     * @returns 
     */
    function hexa(keyPress){
        key = keyPress.keyCode || keyPress.which;
        tecla = String.fromCharCode(key).toString();
        keys = "0123456789aAbBcCdDeEfF"
        
        if (keys.indexOf(tecla) == -1) {
            return false;
        }
    }

    /**
     * 
     */
    function closeModal(){
        let modal = document.getElementById("Device_Modal");

        modal.classList.add('d-none');
    }