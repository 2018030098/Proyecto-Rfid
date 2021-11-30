    /**
     * funcion que se encarga de cargar la 
     * informacion correspondiente en el modal
     * 
     * @param {*} data
     */
     function infoModal_T(data){
        let token = document.getElementById("token");
        let oldtoken = document.getElementById("oldtoken");

        if (token.hasAttribute('value')) {
            token.removeAttribute('value');
        }
        if (oldtoken.hasAttribute('value')) {
            oldtoken.removeAttribute('value');
        }

        token.setAttribute("value",data);
        oldtoken.setAttribute("value",data);

    }

    /**
     * funcion que genera nuevos token 
     * y lo coloca en el input
     */
    function newToken(){
        let token = document.getElementById("token");

        if (token.hasAttribute('value')) {
            token.removeAttribute('value');
        }

        token.setAttribute("value",rndToken());
    }
    
    /** genera una cadena random */
    function random()   {       return Math.random().toString(36).substr(2);                                                        }
    /** crea una cadena random de 30 caracteres */
    function rndToken() {       return ( (random()).substring(0,10) + (random()).substring(0,10) + (random()).substring(0,10) );    }