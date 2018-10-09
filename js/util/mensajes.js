var util = util || {};
util.MsjLabel = function () {
    var etiquetaPrincipal = "msjBox";
    var msjBox = '<div id="' + etiquetaPrincipal + '"  style="position: fixed;right: 0px;top: 50px;z-index: 1100;"></div>';
    var btnCerrar = '<button type="button"  class="close" aria-label="Close" ><span aria-hidden="true">&times;</span></button>';
    
    this.init = function () {
        $("body").append(msjBox);
    };

    this.warning = function (mensaje) {
        var id=Math.round((Math.random()*10000)%10000);
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append('<div id="alertWarning'+id+'" class="alert alert-warning" role="alert" onclick="util.msjLabel.hide(this);">' +btnCerrar + mensaje + '</div>').show("slow");
        setTimeout(function(){$("#alertWarning"+id).remove();}, 4000);
    };
    this.success = function (mensaje,timeout) {
        timeout=timeout || 10000;
        var id=Math.round((Math.random()*10000)%10000);
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append('<div id="alertSuccess'+id+'" class="alert alert-success" role="alert" onclick="util.msjLabel.hide(this);">' +btnCerrar + mensaje + '</div>').show("slow");
        setTimeout(function(){$("#alertSuccess"+id).remove();}, timeout);
    };
    this.info = function (mensaje) {
        var id=Math.round((Math.random()*10000)%10000);
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append('<div id="alertInfo'+id+'" class="alert alert-info" role="alert" onclick="util.msjLabel.hide(this);">'+btnCerrar + mensaje + '</div>').show("slow");
        setTimeout(function(){$("#alertInfo"+id).remove();}, 4000);
    };
    this.danger = function (mensaje) {
        var id=Math.round((Math.random()*10000)%10000);
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append('<div id="alertDanger'+id+'" class="alert alert-danger" role="alert" onclick="util.msjLabel.hide(this);">' +btnCerrar + mensaje + '</div>').show("slow");
        setTimeout(function(){$("#alertDanger"+id).remove();}, 5000);
    };
    this.primary = function (mensaje) {
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append( '<div class="alert alert-primary" role="alert" onclick="util.msjLabel.hide(this);">' +btnCerrar + mensaje + '</div>').show("slow");
    };
    this.default = function (mensaje) {
        console.log(mensaje);
        $("#"+etiquetaPrincipal).append( '<div class="alert alert-default" role="alert" onclick="util.msjLabel.hide(this);">' +btnCerrar + mensaje + '</div>').show("slow");
    };    
    this.hide = function (alert) {
        $(alert).remove();
    };
    this.clean = function () {
        $("#"+etiquetaPrincipal).html("");
    };
};

util.msjLabel = new util.MsjLabel();
$(document).ready(function ()
{
    util.msjLabel.init();
});