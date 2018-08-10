<?php $this->load->view("partial/header"); ?>

<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<?php
$cotizacion_id = $_GET["cotizacion_id"];
$estatus = $_GET["estatus"];
$name_client = $_GET["name_client"];
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
        <h4 class="modal-title">Cotizacion Nro: <?php echo $cotizacion_id."-".$estatus; ?></h4>
        </div> <button type="button" value="factura" name="registrar" id="factura" class="btn btn-primary pull-right">Emitir Documento</button>       
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
            <fieldset>
                <legend>Servicios Registrados: <?php echo $name_client; ?></legend>
<!--            <button type="button" name="print" id="print" class="btn btn-primary">Imprimir</button>-->
            </fieldset>
    </div>
<!-- ================================ INICIO MODAL GENERAR ======================================= -->

<div id="modal_ticket" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informacion del Documento - Cotizacion Nro: <?php echo $cotizacion_id ?>-<?php echo "$estatus" ?></h4>
            </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button id="add_info_service" type="button" class="btn btn-primary">Aceptar</button> 
                            <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </div>
        </div>
    </div>
</div>


<!-- ================================== FIN MODAL GENERAR ========================================-->

            <script language="JavaScript">
                $(function() {
                    $("#btnExito").click(function(){        
                        $('#modal_ticket').modal('show');
                    });
                    $("#btnFalla").click(function(){        
                        $('#modal_falla').modal('show');
                    });
                    $("#print").click(function(){        
                        $('#modal_print').modal('show');
                    });
                    $("#factura").click(function(){        
                        $('#modal_factura').modal('show');
                    });
                });
            </script>




<br>

<script type="text/javascript" >

function tab(tab_id) {//funcion tab que recibe el parametro del id
    var tab_contenido = document.getElementsByTagName("div");//definimos el elemento que sera devuelto
        for(var x=0; x<tab_contenido.length; x++) {//almacenamos los elementos divs
            name = tab_contenido[x].getAttribute("name");//recibimos el nombre de la clase
            if (name == 'tab_contenido') {//comparamos el valor del nombre
                if (tab_contenido[x].id == tab_id) {//comparamos el numero de contenido
                tab_contenido[x].style.display = 'block';//mostramos el contenido correspondiente
            }else {
                tab_contenido[x].style.display = 'none';//ocultamos los otros contenidos.
            }
        }
    }
}
</script>


<style>
*{ margin:0; padding:0; }
#content{
    width: auto;
    margin: 0 auto;
    border: 0px solid #000;
}
#menu{
    list-style-type: none;
    margin: none;
    width: 100%;
}
#menu li{
    display: inline-block;
    background-color: #337ab7;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
        border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
#menu li a{ color: #fff; }
 
#menu .selected{
    background-color: #ccc;
    border-bottom: none;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
#menu .selected a{ color: #000; }
#menu .rest{
    width: 105px;
    border-right: none;
}
</style>
<div id="content">
<?php if(empty($_GET['tab'])){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
    <div name="tab_contenido" id="tab_contenido1" class="tab_contenido"style="display: block;">
            <div id="table_holder">
                <table class="table table-bordered" id="table_boleto">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 2){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido2" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_hotel">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    </div>

    </div>
<?php }elseif($_GET['tab'] == 3){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li  class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_auto">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 4){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?&=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_tarjeta">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 5){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_paquete">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 6){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_excursion">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 7){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_entrada">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 8){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_tren">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 9){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_crucero">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php }elseif($_GET['tab'] == 10){ ?>
    <ul id="menu">
        <li class="rest">&nbsp;</li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Boletos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=2&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Hotel</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=3&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Autos</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=4&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Tarjeta de Asistencia</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=5&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Paquetes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=6&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Excursiones</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=7&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Entradas</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=8&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Trenes</a></li><li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=9&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Cruceros</a></li><li class="selected"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tab=10&id=<?php echo $_GET["id"];?>&cotizacion_id=<?php echo $_GET["cotizacion_id"];?>&estatus=<?php echo $_GET["estatus"];?>&name_client=<?php echo $_GET["name_client"];?>">Gastos Administrativos / Otros</a></li><li class="rest">&nbsp;</li>
    </ul>
    <div id="message">
        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
    <div class="col-md-12">
            <div id="table_holder">
                <table class="table table-bordered" id="table_otro">
                    <thead>
                        <tr class="well">
                            <th><center>#</center></th>
                            <th><center>Nro.</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Monto</center></th>
                            <th><center>Observ.</center></th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="searchable">
                        <tr>
                            <td colspan="8">
                                <center>
                                    NO SE ENCONTRARON RESULTADOS
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   </div>
    </div>
    </div>
<?php } ?>
</div>
 


        </div>


<!-- MODAL DE CONFIRMACIÓN -->

<div id="modal_success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h3 class="modal-title messages_modal">Operación Correcta</h3>
                    <br/>
                    <button type="button" class="btn btn-primary btn_success" data-dismiss="modal">Aceptar</button>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- ===================== INICIO PRINT ======================= --> 

<div id="modal_print" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Imprimir</h4>
                  <dir class="col-md-8"></dir>
                  <div class="col-md-4">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
                        <option value="">Seleccionar Tipo de Documento</option>
                        <option value="ticket">Documento de Cobranza</option>
                        <option value="factura">Factura</option>
                        <option value="boleta">Boleta</option>
                    </select>
                  </div>
            </div>
            <dir class="modal-header" >
                <h5 class="modal-title">Datos del Cliente</h5>
                <div class="main">
                    <div class="col-md-6" class="form-group">
                            <label for="code_travel">Cliente:</label>
                            <input type="text" id="name" value="<?php echo $name_client; ?>" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">RUC / DNI:</label>
                            <input type="text" id="minumero3" onchange="SumarAutomatico(this.value);" class="form-control" 
                                    value="<?= $datos['documents']; ?>"/>
                    </div><br/ >
                </div>
            </dir>
<form name="funcion">
<dir class="modal-header" >
<h5 class="modal-title">Detalle del Servicio</h5>
<div id="table_holder">
    <table class="table table-bordered" id="table_service_select">
        <thead>
            <tr class="well">
                <th><center>#</center></th>
                <th><center>Nro.</center></th>
                <th><center>Servicios</center></th>
                <th><center>Codigo</center></th>
                <th><center>Monto</center></th>
            </tr>
        </thead>
        <tbody class="searchable">
            <tr>
                <td colspan="8">
                    <center>
                        NO SE ENCONTRARON RESULTADOS
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</dir><br>

                    <div class="col-md-4" class="form-group">
                            <input type="text" id="name" value="" placeholder="Campo Adicional 1" class="form-control"/>
                    </div>
                    <div class="col-md-3" class="form-group">
                        <select placeholder="Funcion" class="form-control">
                            <option>Seleccione Funcion</option>
                            <option value="+">Suma</option>
                            <option value="-">Resta</option>
                            <option value="=">Solo Vista</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <input type="number" step="0.1" name="monto2" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br>
                    <div class="col-md-4" class="form-group">
                            <input type="text" id="name" value="" placeholder="Campo Adicional 2" class="form-control"/>
                    </div>
                    <div class="col-md-3" class="form-group">
                        <select placeholder="Funcion" class="form-control">
                            <option>Seleccione Funcion</option>
                            <option value="+">Suma</option>
                            <option value="-">Resta</option>
                            <option value="=">Solo Vista</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <input type="number" step="0.1" name="monto3" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br>
                <div class="main">
                    <div class="col-md-3" class="form-group">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="code_travel">SUBTOTAL:</label>
                            <input type="text" name="subtotal" readonly="readonly" class="form-control"/>
                    </div>
                    <div class="col-md-1" class="form-group">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">I.G.V.:</label>
                            <input type="text" name="iva" class="form-control" placeholder="IVA" readonly>
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="total" class="form-control" placeholder="Total" readonly>
                    </div><br><br>
                </div></br><br>

                    <div class="col-md-3" class="form-group">
                            <label for="form_pago">Forma de Pago:</label>
                        <select name="form_pago" id="form_pago" class="form-control">
                            <option>Seleccione...</option>
                            <option value="+">Contado</option>
                            <option value="-">Cheque</option>
                            <option value="=">Tarjeta de Credito</option>
                            <option value="">Mixto</option>
                            <option value="">Puntos</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="tipo_pago">Tipo:</label>
                            <input type="text" id="tipo_pago" name="tipo_pago" placeholder="Tipo" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="banco_pago">Banco:</label>
                            <input type="text" name="banco_pago" id="banco_pago" class="form-control" placeholder="Banco">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="nro_pago">Nro:</label>
                            <input type="text" name="nro_pago" id="nro_pago" class="form-control" placeholder="Nro.">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="mnt_tot_pago">Monto:</label>
                            <input type="number" step="0.1" name="mnt_tot_pago" id="mnt_tot_pago" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br><br></br>
                    <div class="col-md-3" class="form-group">
                        <select name="form_pago" id="form_pago" class="form-control">
                            <option>Seleccione...</option>
                            <option value="+">Contado</option>
                            <option value="-">Cheque</option>
                            <option value="=">Tarjeta de Credito</option>
                            <option value="">Mixto</option>
                            <option value="">Puntos</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="tipo_pago">Tipo:</label>
                            <input type="text" id="tipo_pago" name="tipo_pago" placeholder="Tipo" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="banco_pago">Banco:</label>
                            <input type="text" name="banco_pago" id="banco_pago" class="form-control" placeholder="Banco">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="nro_pago">Nro:</label>
                            <input type="text" name="nro_pago" id="nro_pago" class="form-control" placeholder="Nro.">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="mnt_tot_pago">Monto:</label>
                            <input type="number" step="0.1" name="mnt_tot_pago" id="mnt_tot_pago" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br>
                    <dir class="col-md-9"></dir>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="total3" class="form-control" placeholder="Total">
                    </div><br></br>

<dir class="modal-header"><br>
<h5 class="modal-title">Observaciones</h5>
                        <div class="col-md-102" class="form-group">
                            <input type="text" name="travelid" id="travelid" class="form-control" />
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
</dir>


</form>


<script type="text/javascript">
    function calculo(){
    //tasa de impuesto
  var tasa = 18;
  
  //monto a calcular el impuesto
  var monto2 = $("input[name=monto2]").val();
  var monto3 = $("input[name=monto3]").val();  
  var monto4 = $("input[name=monto4]").val();
  var monto5 = $("input[name=monto5]").val(); 
  //calculo del impuesto
  var iva = ((monto2 + monto3) * tasa)/100;

  var total1 = monto2 + monto3;
  var total2 = (monto2 + monto3 - monto4 - monto5); 
  //Subtotal
  $("input[name=subtotal]").val(parseInt(total1));

  //se carga el iva en el campo correspondien te
  $("input[name=iva]").val(iva);
  
  //se carga el total en el campo correspondiente
  $("input[name=total]").val(parseInt(total1)+parseInt(iva));
  $("input[name=total3]").val(parseInt(total2)+parseInt(iva));   
}
</script>





                    <div class="modal-footer">
                        <div class="form-group">
                            <button id="add_info_service" type="button" class="btn btn-primary">Aceptar</button> 
                            <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- FIN PRINT  -->

<!-- MODAL DE CONFIRMACIÓN -->

<div id="modal_success" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h3 class="modal-title messages_modal">Operación Correcta</h3>
                    <br/>
                    <button type="button" class="btn btn-primary btn_success" data-dismiss="modal">Aceptar</button>
                </center>
            </div>
        </div>
    </div>
</div>


<!-- INICIO GENERAR FACTURA -->




<div id="modal_factura" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

                <?php
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                    $numerodeletras=4; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                            for($i=0;$i<$numerodeletras;$i++) {
                                        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                                    }
                    $date1 = date("dm");
                    $asesor_id = $this->lang->lin.strtoupper("$user_info->person_id");
                    $asesor = $this->lang->lin.strtoupper("$user_info->first_name");
                    $ref_id = $asesor."-".$cadena."-".$date1;
                ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php echo form_open('sales/factura'); ?>
                <h4 class="modal-title">Documento</h4>
                        <h4 class="modal-title">Nro Control: <span id="modal-title-coti"><?php echo $ref_id;?></span><span id="modal-coti"><?php echo "-V"?></span></h4>
                        <input type="hidden" name="ref_id" value="<?php echo $ref_id;?>">
                    <div class="col-md-3" class="form-group">
                            <input type="text" name="num_corre_cpe_ref" id="num_corre_cpe_ref" class="form-control" placeholder="Nro. Correlativo" style="color:red;" >
                    </div>
                    <div class="col-md-1" class="form-group">
                    </div>


                  <div class="col-md-4">
                        <select id="serie" onchange="h()" name="cod_tip_otr_doc_ref" class="form-control">
                         <option value="">Tipo de Documento</option>
                         <option name="cod_tip_otr_doc_ref" value="01" data-hab="h1">Factura</option>
                         <option name="cod_tip_otr_doc_ref" value="03" data-hab="h2">Boleta de Venta</option>
                         <option name="cod_tip_otr_doc_ref" value="07" data-hab="h3">Nota de Credito</option>
                         <option name="cod_tip_otr_doc_ref" value="08" data-hab="h4">Nota de Debito</option>
                        </select>
                 </div>
                  <div class="col-md-2">
                        <select id="serie" name="serie" class="form-control">
                         <option value="">Serie</option>
                         <option name="serie" value="F001" class="Factura h1">F001</option>
                         <option name="serie" value="B001" class="Factura h2">B001</option>
                         <option name="serie" value="NC" class="Factura h3">NC</option>
                         <option name="serie" value="ND" class="Factura h4">ND</option>
                        </select>
                 </div>



                  <div class="col-md-2">
                    <select id="cod_tip_moneda" name="cod_tip_moneda" class="form-control">
                        <option value="">Moneda</option>
                        <option value="PEN">Soles S/</option>
                        <option value="USD">Dolares Us$</option>
                    </select>
                  </div>
            </div>
            <dir class="modal-header" >
                <h5 class="modal-title">Datos del Cliente</h5>
                <div class="main">
                    <div class="col-md-6" class="form-group">
                            <label for="code_travel">Cliente:</label>
                            <input type="text" id="name" name="name" value="<?php echo $name_client; ?>" class="form-control"/>
                    </div>
                    <div class="col-md-3" class="form-group">                        
                            <label for="code_travel">Documento de Identidad:</label>
                        <select name="tip_doc_rct" id="tip_doc_rct" class="form-control">
                            <option name="0" value="0">DOC.TRIB.NO.DOM.SIN.RUC</option>
                            <option name="1" value="1">DOC. NACIONAL DE IDENTIDAD</option>
                            <option name="4" value="4">CARNET DE EXTRANJERIA</option>    
                            <option name="6" value="6">REG. UNICO DE CONTRIBUYENTES</option>
                            <option name="7" value="7">PASAPORTE</option>
                            <option name="A" value="A">CED. DIPLOMATICA DE IDENTIDAD</option>
                            <option name="B" value="B">DOC.IDENT.PAIS.RESIDENCIA-NO.D</option>
                            <option name="C" value="C">Tax Identification Number - TIN – Doc Trib PP.NN</option>
                            <option name="D" value="D">Identification Number - IN – Doc Trib PP. JJ</option>
                        </select>
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">Nro de Identidad:</label>
                            <input type="text" id="nro_doc_rct" name="nro_doc_rct" value="<?php echo $datos['documents']; ?>" class="form-control"/>
                    </div><br/ >
                </div><br></br>
                        <div class="col-md-8" class="form-group"><br>
                            <input type="text" placeholder="Direccion" name="dir_des_rct" id="dir_des_rct" class="form-control" />
                        </div>
                        <div class="col-md-4" class="form-group"><br>
                            <input type="email" placeholder="Correo Electronico" id="email" name="email" value="<?php echo $datos['emails']; ?>" class="form-control"/>
                        </div>
            </dir>
    <div class=""  style="background-color:#EFF0F1">
        <div class="modal-header">
            <h5 class="modal-title">Detalle del Servicio</h5>
            <div class="">
                <?php echo form_open('sales/factura',array('id'=>'employee_form')); ?>
                    <br/>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
                    <div class="col-md-11" class="form-group">
                        <label for="code_travel">Detalle:</label>
                        <input type="text" name="detalle_servicio" id="detalle_servicio" class="form-control" placeholder="Descripcion"/>
                    </div>
                    <div class="col-md-1">
                        <label for="code_travel">&nbsp;</label><br>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#comentario_item">+</button>
                    </div>
                    <br><br><br/><br/>
                    <div class="col-md-3" class="form-group">
                        <label for="code_travel">Servicio:</label>
                    <select id="cbo_comision_payment_servicio" name="cbo_comision_payment_servicio" class="form-control">
                        <option value="">Seleccionar Tipo de Servicio</option>
                        <option value="Boleto Aereo">Boleto Aereo</option>
                        <option value="Boleto BT/IT">Boleto BT/IT</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Auto">Auto</option>
                        <option value="Tarjetas de Asistencias">Tarjetas de Asistencias</option>
                        <option value="Paquete">Paquete</option>
                        <option value="Paquetes Netos">Paquetes Netos</option>
                        <option value="Excursiones">Excursiones</option>
                        <option value="Crucero">Crucero</option>
                        <option value="Trenes">Trenes</option>
                        <option value="Entradas">Entradas</option>
                        <option value="Gastos Administrativos">Gastos Administrativos</option>
                        <option value="Otros">Otros</option>
                    </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tributo_travel">Afectacion:</label>
                        <select id="tributo_travel" name="tributo_travel" placeholder="Funcion" class="form-control">
                            <option>Seleccione...</option>
                            <option value="10">Gravado - Operación onerosa</option>
                            <option value="11">Gravado - Retiro por premio</option>
                            <option value="12">Gravado - Retiro por donación</option>
                            <option value="14">Gravado - Retiro</option>
                            <option value="15">Gravado - Bonificaciones</option>
                            <option value="16">Gravado - Retiro por entrega a trabajadores</option>
                            <option value="17">Gravado - IVAP</option>
                            <option value="20">Exonerado - Operación onerosa</option>
                            <option value="21">Exonerado - Operación onerosa</option>
                            <option value="30">Inafecto - Operación onerosa</option>
                            <option value="40">Exportación</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="code_travel">Cant.:</label>
                        <input type="number" name="travel_cantidad" id="travel_cantidad" class="form-control"/>
                    </div>
                    <div class="col-md-2">
                        <label for="total_servicios">Valor Vta.:</label>
                        <input type="number" name="cbo_amount_comision_payment_children" id="cbo_amount_comision_payment_children" class="form-control"
                            step="0.01" placeholder="0,00"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_factura" class="btn btn-primary" value="Agregar"/>
                    </div>




  <!-- Modal -->
  <div class="modal fade" id="comentario_item" style="overflow-y: scroll;" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal adicionar coemntario a items-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <textarea style="padding:40px 190px;" ></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>


                    <br><br>
                    <br/><br/><br/>
                    <div class="col-md-12">
                        <table id="table_customer_travel_children" class="table table-hover table-bordered" >
                            <thead>
                                <tr class="well">
                                    <th><center>#</center></th>
                                    <th><center>Detalle</center></th>
                                    <th><center>Servicios</center></th>
                                    <th><center>Afectacion</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center>Prc. Unit.</center></th>
                                    <th><center>Val. Unit.</center></th>
                                    <th><center>Val. Total.</center></th>
                                    <th><center>Accion</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9">
                                        <center>
                                            No se registraron datos.
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<!--                        <table class="table table-hover table-bordered"   style="background-color:#FFFFFF" >
                            <tbody>
                                <tr>
                                    <td colspan=2>
                                        <span class="pull-right">SUB TOTAL</span>
                                    </td>
                                    <td>
                                        <span id="total_pago_children" class="pull-right"></span><br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
-->
                    </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){

        travel.current_url = "<?= base_url(); ?>";

        $("#btn_save_factura").click(function(){
            //travel.addServicio();
            travel.addServiceDoc();
        });

    });

</script>
<br>

                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Exonerada</label>
                            <input type="number" id="mnt_tot_exr" step="0.01" name="mnt_tot_exr" placeholder="0,00" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Inafecto</label>
                            <input type="number" name="mnt_tot_inf" step="0.01" id="mnt_tot_inf" class="form-control" placeholder="0,00">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Exonerada</label>
                            <input type="number" name="mnt_tot_exp" step="0.01" id="mnt_tot_exp" class="form-control" placeholder="0,00">
                    </div>
                   <div class="col-md-2" class="form-group">
                            <label for="name_travel">Gravada</label>
                         <p><span id="mnt_tot_grv"></span></p>  
                        <input type="hidden" id="mnt_tot_grv" step="0.01" name="mnt_tot_grv" placeholder="0,00" class="form-control" />
                   </div>
                   <div class="col-md-2" class="form-group">
                            <label for="name_travel">Gratuita</label>
                         <p><span id="mnt_tot_grt"></span></p>  
                        <input type="hidden" id="mnt_tot_grt" step="0.01" name="mnt_tot_grt" placeholder="0,00" class="form-control" />
                   </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total IGV</label>
                            <input type="number" name="mnt_tot_imp" step="0.01" id="mnt_tot_imp" class="form-control" placeholder="0,00">
                    </div>
                    <br></br><br></br>

                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">Detraccion:</label>
                                <input name="pago1" type="radio" value="Ventanilla"/>
                                    <span class="auto-style4">No</span>
                                <input checked="checked" name="pago1" type="radio" value="Deposito"/>
                                    <span class="auto-style4">Si</span>
                                <div id="div1" style="display:;">
                                        <select name="segundo" id="segundo" class="form-control" >
                                            <option value=''>Seleccione...</option>
                                            <option value='10.00'>10.00 %</option>
                                            <option value='4.00'>4.00 %</option>
                                            <option value='12.00'>12.00 %</option>
                                        </select>
                                </div>
                    </div>


                <div class="col-md-6"></div>

                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="mnt_tot" step="0.01" id="mnt_tot" class="form-control" placeholder="Total">
                    </div><br><br>
                </br><br>
<!---------------------FORMA DE PAGO GENERAR FACTURA------------------------>
                    <div class="col-md-3" class="form-group">
                            <label for="form_pago">Tipo de Pago:</label>
                        <select name="tipo_pago" class="form-control">
                            <option>Seleccione...</option>
                            <option value="000">NO ASIGNADO</option>
                            <option value="001">CONTADO</option>
                            <option value="002">CRÉDITO A 7 DÍAS</option>
                            <option value="003">CRÉDITO A 15 DÍAS</option>
                            <option value="004">CRÉDITO A 30 DÍAS</option>
                            <option value="005">CRÉDITO A 60 DÍAS</option>
                            <option value="006">CRÉDITO A 90 DÍAS</option>
                            <option value="007">CRÉDITO A 120 DÍAS</option>
                            <option value="008">CRÉDITO A 20 DÍAS</option>
                            <option value="009">CRÉDITO A 45 DÍAS</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="form_pago">Forma:</label>
                        <select name="form_pago" class="form-control">
                            <option>Seleccione...</option>
                            <option value="000">NO ASIGNADO</option>
                            <option value="001">EFECTIVO</option>
                            <option value="002">CHEQUE</option>
                            <option value="003">LETRA</option>
                            <option value="004">TARJETA DE CRÉDITO</option>
                            <option value="005">TARJETA DE DÉBITO</option>
                            <option value="006">DEPOSITO BANCARIO</option>
                            <option value="007">TRANSFERENCIA INTERBANCARIA</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="banco_pago">Banco:</label>
                            <input type="text" name="banco_pago" id="banco_pago" class="form-control" placeholder="Banco">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="nro_pago">Nro:</label>
                            <input type="text" name="nro_pago" id="nro_pago" class="form-control" placeholder="Nro.">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="mnt_tot_pago">Monto:</label>
                            <input type="number" step="0.1" name="mnt_tot_pago" id="mnt_tot_pago" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br><br></br>

                    <dir class="col-md-9"></dir>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="total3" class="form-control" placeholder="Total">
                    </div><br></br>

<dir class="modal-header"><br>
<h5 class="modal-title">Observaciones</h5>
                        <div class="col-md-102" class="form-group">
                            <input type="text" name="travelid" id="travelid" class="form-control" />
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
</dir>
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
        </div>
    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button id="add_info_service" type="submit" class="btn btn-primary">Generar</button> 
                            <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </div>
        <?php echo form_close(); ?>
                </div>
            </div>
        </div>

<script type='text/javascript'>

//validation and submit handling
$(document).ready(function(){

    $('#employee_form').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('common_first_name_required'); ?>"
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('common_last_name_required'); ?>"
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: { message: "<?php echo $this->lang->line('employees_username_required'); ?>"
                    }
                }
            },
            password:{
                 validators: {
                    notEmpty: {
                        message: '<?php 
                            echo $this->lang->line('employees_password_required'); 
                        ?>'
                    }
                }
            },
            repeat_password:{
                validators: {
                    notEmpty: {
                        message: '<?php 
                            echo $this->lang->line('employees_password_required'); 
                        ?>'
                    },
                    identical: {
                        field: 'password',
                        message: '<?php echo $this->lang->line('employees_password_must_match'); ?>'
                    }
                }
            },
            email:{
                validators: {
                    notEmpty: {
                        message: '<?php echo $this->lang->line('common_email_invalid_format'); ?>'
                    },
                     emailAddress: {
                        message: '<?php echo $this->lang->line('common_email_invalid_format'); ?>'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        $( "#submit" ).prop("disabled", false);
        var msg = "";
        $.ajax({
            type:"POST",
            url:$("#employee_form").attr('action'),
            data:$("#employee_form").serialize(),
            success:function(response){
                var employees = JSON.parse(response);
                if(employees.success == true){
                    msg = getMessageSuccess('Operación realizada con exito...');
                    $("#messages").html(msg);   
                    location.reload();              
                }else{
                    if(employees.message !== ""){
                         msg = getMessageError(employees.message);
                        $("#messages").html(msg);
                    }                   
                }
            }
        });
    });
});
</script>


<!-- FIN GENERAR FACTURA  -->


<?php $this->load->view("travel/modal"); ?>

<script type="text/javascript">
    $(document).ready(function(){

        /* LISTANDO SERVICIOS DEL CLIENTES Nro COTIZACION vs VENTA*/
        travel.listServiciosVenta();

        /* LISTANDO SERVICIOS SELECCIONADOS FILTRADOS */
        travel.listServicios(); 
        /* LISTANDO SERVICIOS SELECCIONADOS FILTRADOS A IMPRIMIR */    
        //travel.listServiciosSelect();     
    });
</script>

<script type="text/javascript">
    function h(){
opt = document.getElementsByClassName("Factura");
 for (i=0; i<opt.length; i++) {
 opt[i].style.display = "none";
 }

e = document.getElementById("serie")
e = e[e.selectedIndex].dataset.hab.split(" ");
for (x=0;x<e.length;x++){
 opt = document.getElementsByClassName(e[x]);
  if (opt.length) {
   for (i=0; i<opt.length; i++) {
    opt[i].style.display = "";
   }
  }
 }
}
h("");
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="Deposito"){
            $("#div1").show();
            $("#div2").hide();
        } else if (valor == "Ventanilla") {
            $("#div1").hide();
            $("#div2").show();
        } else { 
            // Otra cosa
        }
    });
});
</script>




<?php $this->load->view("partial/footer"); ?>
















