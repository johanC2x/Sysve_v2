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

            <button type="button" value="Abrir modal éxito" name="registrar" id="btnExito" class="btn btn-primary">Generar</button>

            <button type="button" name="print" id="print" class="btn btn-primary">Imprimir</button>
            </fieldset>

    </div>
<!---------------INICIO MODAL GENERAR------------------->

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


<!---------------FIN MODAL GENERAR------------------->

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

<!----------INICIO PRINT ---------> 

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
                            <input type="text" id="minumero3" onchange="SumarAutomatico(this.value);" class="form-control" />
                    </div><br/ >
                </div>
            </dir>
<form name="funcion">
<dir class="modal-header" >
<h5 class="modal-title">Detalle del Servicio</h5>
<div id="table_holder">
    <table class="table table-bordered" id="table_clients">
        <thead>
            <tr class="well">
                <th><center>#</center></th>
                <th><center>Nro.</center></th>
                <th><center>Servicios</center></th>
                <th><center>Codigo</center></th>
                <th><center>Monto</center></th>
                <th><center>Fecha</center></th>
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
                            <label for="name_travel">Forma de Pago:</label>
                        <select placeholder="Funcion" class="form-control">
                            <option>Seleccione...</option>
                            <option value="+">Contado</option>
                            <option value="-">Cheque</option>
                            <option value="=">Tarjeta de Credito</option>
                            <option value="">Mixto</option>
                            <option value="">Puntos</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Tipo:</label>
                            <input type="text" id="name" value="" placeholder="Tipo" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Banco:</label>
                            <input type="text" name="monto2" class="form-control" placeholder="Banco">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <label for="name_travel">Nro:</label>
                            <input type="text" name="monto2" class="form-control" placeholder="Nro.">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">Monto:</label>
                            <input type="number" step="0.1" name="monto4" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br><br></br>
                    <div class="col-md-3" class="form-group">
                        <select placeholder="Funcion" class="form-control">
                            <option>Seleccione...</option>
                            <option value="+">Contado</option>
                            <option value="-">Cheque</option>
                            <option value="=">Tarjeta de Credito</option>
                            <option value="">Mixto</option>
                            <option value="">Puntos</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <input type="text" id="name" value="" placeholder="Tipo" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                            <input type="text" name="monto2" class="form-control" placeholder="Banco">
                    </div>
                    <div class="col-md-2" class="form-group">
                            <input type="text" name="monto2" class="form-control" placeholder="Nro.">
                    </div>
                    <div class="col-md-3" class="form-group">
                            <input type="number" step="0.1" name="monto5" class="form-control" placeholder="Monto" onChange="calculo();">
                    </div><br></br>
                    <dir class="col-md-9"></dir>
                    <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                            <input type="text" name="total3" class="form-control" placeholder="Total" readonly>
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


<?php $this->load->view("travel/modal"); ?>

<script type="text/javascript">
    $(document).ready(function(){

        /* LISTANDO SERVICIOS DEL CLIENTES Nro COTIZACION vs VENTA*/
        travel.listServiciosVenta();

        /* LISTANDO SERVICIOS SELECCIONADOS FILTRADOS */
        travel.listServiciosSelect();        
    });
</script>

<?php $this->load->view("partial/footer"); ?>
















