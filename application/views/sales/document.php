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
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
            <fieldset>
                <legend>Servicios Registrados: <?php echo $name_client; ?></legend>
                  <div class="col-md-3">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
                        <option value="">Seleccionar Tipo de Documento</option>
                        <option value="ticket">Documento de Cobranza</option>
                        <option value="factura">Factura</option>
                        <option value="boleta">Boleta</option>
                    </select>
                  </div>

            <button type="button" value="factura" name="registrar" id="factura" class="btn btn-primary">Generar Factura</button>

            <button type="button" name="print" id="print" class="btn btn-primary">Imprimir</button>
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
/*----clase pra las pestañas---*/
#tab{
padding:5px;
text-decoration:none;
color:#ffffff;
font: 14px/100% Arial, Helvetica, sans-serif;
 background: #337ab7;
 border: 6px solid #337ab7;
-webkit-border-top-left-radius: 10px;
-webkit-border-top-right-radius: 10px;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
border-top-left-radius: 3px;
border-top-right-radius: 3px;
}

/*----clase para las pestañas activadas----*/
#tab:active{ 
color:#000;
background:#ccc;
}
/*----clase para el contenido------*/
.tab_contenido{
text-align:left;
padding: 8px;
display:none;
width:auto;
height: 500px;
color:#000;
background:#fff;
border:dimgray 0px solid;
}
</style>


 
 <br><br>
 <br><br><br>
    <dir class="col-md-1"></dir>
    <!-----pestañas de la tab--->
    <a id="tab" href="javascript:tab('tab_contenido1');" >Boletos</a>
    <a id="tab" href="javascript:tab('tab_contenido2');" >Hotel</a>
    <a id="tab" href="javascript:tab('tab_contenido3');" >Auto</a>
    <a id="tab" href="javascript:tab('tab_contenido4');" >Tarjeta de Asistencia</a>
    <a id="tab" href="javascript:tab('tab_contenido5');" >Paquetes</a>
    <a id="tab" href="javascript:tab('tab_contenido6');" >Excursiones</a>
    <a id="tab" href="javascript:tab('tab_contenido7');" >Entradas</a>
    <a id="tab" href="javascript:tab('tab_contenido8');" >Trenes</a>
    <a id="tab" href="javascript:tab('tab_contenido9');" >Cruceros</a>
    <a id="tab" href="javascript:tab('tab_contenido10');" >Gastos Administrativos / Otros</a>
    <!----contenidos de la tab--->

    <div class="col-md-12"><br/>
            <form>

    <div name="tab_contenido" id="tab_contenido1" class="tab_contenido"style="display: block;">
<h5 class="modal-title">Boletos Aereos - Boletos BT/IT</h5>
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


        <div name="tab_contenido" id="tab_contenido2" class="tab_contenido">
<h5 class="modal-title">Hoteles</h5>
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



        <div name="tab_contenido" id="tab_contenido3" class="tab_contenido">
<h5 class="modal-title">Autos</h5>
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


        <div name="tab_contenido" id="tab_contenido4" class="tab_contenido">
<h5 class="modal-title">Tarjetas de Asistencias</h5>
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

            <div name="tab_contenido" id="tab_contenido5" class="tab_contenido">
<h5 class="modal-title">Paquetes - Paquetes Netos</h5>
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

            <div name="tab_contenido" id="tab_contenido6" class="tab_contenido">
<h5 class="modal-title">Excursiones</h5>
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

            <div name="tab_contenido" id="tab_contenido7" class="tab_contenido">
<h5 class="modal-title">Entradas</h5>
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

            <div name="tab_contenido" id="tab_contenido8" class="tab_contenido">
<h5 class="modal-title">Trenes</h5>
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

            <div name="tab_contenido" id="tab_contenido9" class="tab_contenido">
<h5 class="modal-title">Cruceros</h5>
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

            <div name="tab_contenido" id="tab_contenido10" class="tab_contenido">
<h5 class="modal-title">Gastos Administrativos - Otros</h5>
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
                <h4 class="modal-title">Factura</h4>
                        <h4 class="modal-title">Nro Control: <span id="modal-title-coti"><?php echo $ref_id;?></span><span id="modal-coti"><?php echo "-V"?></span></h4>
                        <input type="hidden" name="ref_id" value="<?php echo $ref_id;?>">
                    <div class="col-md-3" class="form-group">
                            <input type="text" name="num_corre_cpe_ref" id="num_corre_cpe_ref" class="form-control" placeholder="Nro. Correlativo">
                    </div>
                  <div class="col-md-4">
                    <select id="cod_tip_otr_doc_ref" name="cod_tip_otr_doc_ref" class="form-control">
                        <option value="">Seleccionar Tipo de Documento</option>
                        <option name="01" value="01">Factura</option>
                        <option name="02" value="02">Boleta de Venta</option>
                        <option name="07" value="07">Nota de Credito</option>
                        <option name="08" value="08">Nota de debito</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select id="serie" name="serie" class="form-control">
                        <option value="">Seleccionar Serie</option>
                        <option name="F004" value="F004">F004</option>
                        <option name="B004" value="B004">B004</option>
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
                            <label for="code_travel">Tipo de Documento:</label>
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
                            <input type="number" id="nro_doc_rct" name="nro_doc_rct" class="form-control" />
                    </div><br/ >
                </div><br></br>
                        <div class="col-md-102" class="form-group"><br>
                            <input type="text" placeholder="Direccion" name="dir_des_rct" id="dir_des_rct" class="form-control" />
                        </div>
            </dir>
    <div class="">
        <div class="modal-header">
            <h5 class="modal-title">Detalle del Servicio</h5>
            <div class="">
                <?php echo form_open('sales/factura',array('id'=>'employee_form')); ?>
                    <br/>
                    <div class="col-md-3" class="form-group">
                        <label for="code_travel">Detalle:</label>
                        <input type="text" name="detalle_servicio" id="detalle_servicio" class="form-control" placeholder="Descripcion"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="code_travel">Servicio:</label>
                    <select id="cbo_comision_payment_servicio" name="cbo_comision_payment_servicio" class="form-control">
                        <option value="">Seleccionar Tipo de Servicio</option>
                        <option value="vuelo">Boleto Aereo</option>
                        <option value="vuelo">Boleto BT/IT</option>
                        <option value="hotel">Hotel</option>
                        <option value="auto">Auto</option>
                        <option value="seguro">Tarjetas de Asistencias</option>
                        <option value="paquete">Paquete</option>
                        <option value="paquetes_netos">Paquetes Netos</option>
                        <option value="tours">Excursiones</option>
                        <option value="crucero">Crucero</option>
                        <option value="trenes">Trenes</option>
                        <option value="entradas">Entradas</option>
                        <option value="gastos">Gastos Administrativos</option>
                        <option value="otros">Otros</option>
                    </select>
                    </div>
                    <div class="col-md-2">
                        <label for="tributo_travel">Tributo:</label>
                        <select id="tributo_travel" name="tributo_travel" placeholder="Funcion" class="form-control">
                            <option>Seleccione...</option>
                            <option value="1000">IGV IMPUESTO GENERAL A LAS VENTAS</option>
                            <option value="2000">ISC IMPUESTO SELECTIVO AL CONSUMO</option>
                            <option value="9995">EXPORTACIÓN</option>
                            <option value="9996">GRATUITO</option>
                            <option value="9997">EXONERADO</option>
                            <option value="9998">INAFECTO</option>
                            <option value="9999">OTROS CONCEPTOS DE PAGO</option>
                        </select>
                    </div>
                    <div class="col-md-1" class="form-group">
                        <label for="code_travel">Cant.:</label>
                        <input type="text" name="travel_cantidad" id="travel_cantidad" class="form-control"/>
                    </div>
                    <div class="col-md-2">
                        <label for="total_servicios">Precio Unit.:</label>
                        <input type="number" name="cbo_amount_comision_payment_children" id="cbo_amount_comision_payment_children" class="form-control"
                            step="0.1" placeholder="Ingresar monto"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_factura" class="btn btn-primary" value="Agregar"/>
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
                                    <th><center>Tributo</center></th>
                                    <th><center>Cant.</center></th>
                                    <th><center>Precio Unit.</center></th>
                                    <th><center>Sub Total</center></th>
                                    <th><center>Total</center></th>
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
                        <table class="table table-hover table-bordered" >
                            <tbody>
                                <tr>
                                    <td colspan=2>
                                        <span class="pull-right">SUB TOTAL</span>
                                    </td>
                                    <td>
                                        <span id="total_pago_children" class="pull-right"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button id="add_info_service" type="button" class="btn btn-primary">Aceptar</button> 
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){

        travel.current_url = "<?= base_url(); ?>";

        $("#btn_save_factura").click(function(){
            travel.addServicio();
        });

    });

</script>
<br>

                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total Exon.</label>
                            <input type="number" id="mnt_tot_exr" name="mnt_tot_exr" placeholder="0,00" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total Inaf.</label>
                            <input type="number" name="mnt_tot_inf" id="mnt_tot_inf" class="form-control" placeholder="0,00">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total Expo.</label>
                            <input type="number" name="mnt_tot_exp" id="mnt_tot_exp" class="form-control" placeholder="0,00">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total IGV</label>
                            <input type="number" name="mnt_tot_imp" id="mnt_tot_imp" class="form-control" placeholder="0,00">
                    </div>
                   <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total Grav.</label>
                        <input type="number" id="mnt_tot_grv" name="mnt_tot_grv" placeholder="0,00" class="form-control" />
                    </div>
                   <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total Grat.</label>
                        <input type="number" id="mnt_tot_grt" name="mnt_tot_grt" placeholder="0,00" class="form-control" />
                   </div>
                    <br></br><br></br>

                    <div class="col-md-5" class="form-group">
                        

                    </div>
 
                <div class="col-md-4"></div>

                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="mnt_tot" id="mnt_tot" class="form-control" placeholder="Total">
                    </div><br><br>
                </br><br>
<!---------------------FORMA DE PAGO GENERAR FACTURA------------------------>
                    <div class="col-md-3" class="form-group">
                            <label for="form_pago">Forma de Pago:</label>
                        <select class="form-control">
                            <option>Seleccione...</option>
                            <option value="000">NO ASIGNADO</option>
                            <option value="001">EFECTIVO</option>
                            <option value="002">CHEQUE</option>
                            <option value="004">TARJETA DE CREDITO</option>                            
                            <option value="005">TARJETA DE DEBITO</option>
                            <option value="006">DEPOSITO BANCARIO</option>                            
                            <option value="007">TRANSFERENCIA INTERBANCARIA</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="tipo_pago">Tipo:</label>
                            <input type="text" id="tipo_pago" name="tipo_pago" value="" placeholder="Tipo" class="form-control"/>
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







<?php $this->load->view("partial/footer"); ?>
















