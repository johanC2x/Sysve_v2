var util = util || {};

util.ResponseJson = function () {

    var ERROR = 0;
    var WARNING = -2;
    var EXCEPTION = -3;
    var MSJ = 2;
    var SUCCESS = 1;
    var TXTMSJ = new Array();
    TXTMSJ[ERROR] = "Error";
    TXTMSJ[WARNING] = "Aviso";
    TXTMSJ[MSJ] = "Mensaje";
    TXTMSJ[EXCEPTION] = "Excepcion";
    var ETIQUETA_NUMROWS = "total";
    var ETIQUETA_DATOS = "datos";
    var MSJ_ERROR_DEVELOP = "Vuelva a intentar, si el error persiste comuniquese con el adminsitrador.";
    //para los .getForm().load({success:function(form,action)});
    //y para los ajax.request({success:function(response){}});
    this.verificarResponseJson = function (datos) {
        
        datos = datos.trim();
        if (datos !== "" && /^[\[{]+.*[\]}]+$/.test(datos)) {
            datos = JSON.parse(datos);
            if (datos["success"] === SUCCESS) {
                return datos;
            }
            if (TXTMSJ[datos["success"]] !== undefined) {
                util.msjLabel.warning(datos["response"]);
                return false;
            }
        }
        util.msjLabel.warning(MSJ_ERROR_DEVELOP);
        console.log("--datos recibidos con error--");
        console.log(datos);
        return false;
    };
    this.failedResponse = function (datos, msg, idx) {//idx=9
        var msgError = datos.responseText.replace('<p>', "").split('</p>');
        if (idx === -1) {
            util.msjLabel.danger(msg + msgError);
            return false;
        }
        util.msjLabel.danger(msg + msgError[idx]);
    };
};

util.ResponseJson = new util.ResponseJson();