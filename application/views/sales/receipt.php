<?php $this->load->view("partial/header"); ?>
<?php
if (isset($error_message)) {
    echo '<h1 style="text-align: center;">' . $error_message . '</h1>';
    exit;
}
?>
<?php
$cotizacion_id = $_GET["cotizacion_id"];
$estatus = $_GET["estatus"];
$name_client = $_GET["name_client"];
?>


<script>
    function pulsar(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        return (tecla != 13);
    }
</script>

<script src="<?php echo base_url(); ?>js/lib/sales.js?v=0.00022" type="text/javascript" language="javascript" charset="UTF-8"></script>



<div id="title_bar">
    <div id="title" class="float_left">Venta</div>
    <div class="col-md-6"></div> 
    <button type="button" value="factura" name="registrar" id="factura" class="btn btn-primary pull-right">Agregar</button><br>
</div>

<div class="input-group"> <span class="input-group-addon">Buscar</span>
    <input id="filter" type="text" class="form-control" placeholder="Nro. Referencia">
</div>
<div id="table_holder">
    <table class="table table-bordered" id="table_clients">
        <thead>
            <tr class="well">
                <th><center>ID</center></th>
        <th><center>Nro. Referencia</center></th>
        <th><center>Nombre del Cliente</center></th>
        <th><center>Estatus</center></th>
        <th><center>Fecha</center></th>
        <th colspan="2"><center>Acción</center></th>
        </tr>
        </thead>
        <tbody class="searchable">
            <tr>
                <td colspan="6">
        <center>
            NO SE ENCONTRARON RESULTADOS
        </center>
        </td>
        </tr>
        </tbody>
    </table>
</div>


<!-- INICIO GENERAR AGREGAR -->

<div id="modal_agregar" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
            $numerodeletras = 4; //numero de letras para generar el texto
            $cadena = ""; //variable para almacenar la cadena generada
            for ($i = 0; $i < $numerodeletras; $i++) {
                $cadena .= substr($caracteres, rand(0, strlen($caracteres)), 1);
            }
            $date1 = date("dm");
            $asesor_id = $this->lang->lin . strtoupper("$user_info->person_id");
            $asesor = $this->lang->lin . strtoupper("$user_info->first_name");
            $ref_id = $asesor . "-" . $cadena . "-" . $date1;
            ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Emitir Venta: <span id="modal-title-coti"><?php echo $ref_id; ?></span><span id="modal-coti"><?php echo "-V" ?></span></h4><br>

            </div>

            <div style="background-color:#EFF0F1" class="modal-header" id="buscador"></div>  
            <?php echo form_open('sales/ventas'); ?>
            <input type="hidden" name="ref_id" value="<?php echo $ref_id; ?>">
            <div class="modal-header">
                <h5 class="modal-title">Datos del Cliente a facturar</h5>
                <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
                <input type="hidden" name="detalle_condicion_pago_json" id="detalle_condicion_pago_json">
                <div class="col-md-3" class="form-group">
                    <label for="tip_doc_rct">Tipo de Documento:</label>
                    <select name="tip_doc_rct" id="tip_doc_rct" class="form-control" required>
                        <option>Seleccione...</option>
                        <option name="1" value="1">D.N.I.</option>
                        <option name="4" value="4">CARNET DE EXTRANJERIA</option>    
                        <option name="7" value="7">PASAPORTE</option>
                        <option name="6" value="6">R.U.C.</option>
                        <option name="0" value="0">DOC.TRIB.NO.DOM.SIN.RUC</option>
                        <option name="A" value="A">CED. DIPLOMATICA DE IDENTIDAD</option>
                        <option name="B" value="B">DOC.IDENT.PAIS.RESIDENCIA-NO.D</option>
                        <option name="C" value="C">TAX TIDENTIFICATION NUMBER - TIN - DOC TRIB PP.NN</option>
                        <option name="D" value="D">IDENTIFICATION NUMBER - IN – DOC TRIB PP. JJ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="nro_doc_rct">Nro. Identidad:</label>
                    <input type="number" name="nro_doc_rct" id="nro_doc_rct"  onkeypress="return pulsar(event)" class="form-control"/>
                </div>
                <div class="col-md-6">
                    <label for="name">Apellido / Nombre:</label>
                    <input type="text" id="name" name="name"  onkeypress="return pulsar(event)" onKeyUp="document.getElementById(this.id).value = document.getElementById(this.id).value.toUpperCase()" placeholder="Nombre del Cliente" class="form-control" />
                </div><br><br><br><br>
                <div class="col-md-6">
                    <label for="dir_des_rct">Direccion:</label>
                    <input type="text" name="dir_des_rct"  onkeypress="return pulsar(event)" id="dir_des_rct" class="form-control"/>
                </div>
                <div class="col-md-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" onkeypress="return pulsar(event)" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" onkeypress="return pulsar(event)" class="form-control"/>
                </div>
            </div>

            <div class="modal-header" style="background-color:#EFF0F1">
                <h5 class="modal-title">Detalle del Servicio</h5>
                <div class="">
                    <div class="col-md-4" class="form-group">
                        <label for="tipo_servicio">Servicio:</label>
                        <select id="tipo_servicio" name="tipo_servicio" class="form-control">
                            <option value="">Seleccionar Tipo de Servicio</option>
                            <option value="Boleto Aereo">Boleto Publicado</option>
                            <option value="Boleto BT/IT">Boleto BT/IT</option>
                            <option value="Remision">Remision / Millas</option>
                            <option value="Paquete">Paquete Operador</option>
                            <option value="Paquetes Netos">Paquetes Netos</option>
                            <option value="Tarjetas de Asistencias">Tarjetas de Asistencias</option>
                            <option value="Hotel">Hotel</option>                        
                            <option value="Traslado">Traslado</option>
                            <option value="Auto">Auto</option>
                            <option value="Excursiones">Excursiones</option>
                            <option value="Crucero">Crucero</option>
                            <option value="Trenes">Trenes / Buses</option>
                            <option value="Entradas">Entradas</option>
                            <option value="Gastos Administrativos">Gastos Administrativos</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="codigo">Codigo:</label>
                        <input type="text" id="codigo" name="codigo" onkeypress="return pulsar(event)" placeholder="Codigo" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cantidad">Cant.:</label>
                        <input type="number" name="cantidad" id="cantidad" onkeypress="return pulsar(event)" class="form-control" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="valor_unitario">Valor Vta.:</label>
                        <input type="number" name="valor_unitario" onkeypress="return pulsar(event)" id="valor_unitario" class="form-control"
                               step="0.01" placeholder="0,00" autocomplete="off" />
                    </div>
                    <br><br><br><br>
                    <div class="col-md-8" class="form-group">
                        <label for="detalle">Detalle:</label>
                        <input type="text" name="detalle" id="detalle" onkeypress="return pulsar(event)" class="form-control" placeholder="Descripcion" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalDetail('');"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarDetalles('');"><i class='fa fa-angle-double-up'></i></button>  
                    </div>                    
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_factura" class="btn btn-primary" value="Agregar"/>
                    </div>
                    <div class="col-md-12 content_service_detail" class="form-group" style="display:none;">
                        <br>
                        <!-- =========== FORM DATOS CARGA DE TABLA ============ -->
                        <div class="col-md-12">
                            <fieldset>
                                <h5>Tabla</h5>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="proveedor">Proveedor</label>
                                        <input type="text" id="proveedor" name="proveedor" onkeypress="return pulsar(event)" placeholder="Proveedor" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="tarifa_neta">Tarifa Neta</label>
                                        <input type="text" step="0.01" id="tarifa_neta" name="tarifa_neta" onkeypress="return pulsar(event)" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="comi_proveedor_porcentaje">Com. %</label>
                                        <input type="text" step="0.01" id="comi_proveedor_porcentaje" name="comi_proveedor_porcentaje" onkeypress="return pulsar(event)" class="form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="comi_proveedor_fija">Com. Fija.</label>
                                        <input type="text" step="0.01" id="comi_proveedor_fija" name="comi_proveedor_fija" onkeypress="return pulsar(event)" onkeyup="sumar('');" class="monto form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="fee_proveedor">Fee Proveedor</label>
                                        <input type="text" step="0.01" id="fee_proveedor" name="fee_proveedor" onkeypress="return pulsar(event)" onkeyup="sumar('');" class="monto form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="fee_proveedor_conf">Fee x Conf.</label>
                                        <input type="text" step="0.01" id="fee_proveedor_conf" name="fee_proveedor_conf" onkeypress="return pulsar(event)" onkeyup="sumar('');" class="monto form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="fee_agencia">Fee Agencia</label>
                                        <input type="text" step="0.01" id="fee_agencia" name="fee_agencia" onkeyup="sumar();" onkeypress="return pulsar(event)" class="monto form-control" autocomplete="off">
                                    </div>  
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="impuesto">Impuestos</label>
                                        <input type="text" step="0.01" id="impuesto" name="impuesto" onkeyup="sumar();" onkeypress="return pulsar(event)" class="monto form-control" autocomplete="off" >
                                    </div>  
                                </div>
                                <div class="col-md-2" class="form-group">
                                    <label for="incentivo_add">Incen. Turifax:</label>
                                    <input type="text" name="incentivo_add" id="incentivo_add" step="0.1" onkeypress="return pulsar(event)" onkeyup="sumar('');" class="monto form-control" autocomplete="off" />
                                </div>
                                <div class="col-md-2" class="form-group">
                                    <label for="otros">Otros</label>
                                    <input type="text" name="otros" id="otros" step="0.1" onkeypress="return pulsar(event)" onkeyup="sumar('');" class="monto form-control" autocomplete="off" />
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" >
                                        <label for="costo">Costo Total</label><br>
                                        <span class="form-control" name="costo" id="costo" readonly="true"></span>
                                    </div>  
                                </div>
                                <div class="col-md-2" class="form-group">
                                    <label for="incentivo">Incentivo:</label>
                                    <input type="text" name="incentivo" id="incentivo" onkeypress="return pulsar(event)" class="monto form-control" autocomplete="off" />
                                </div>
                                <div class="col-md-12">
                                    <h5>Observaciones</h5>
                                    <div class="form-group">
                                        <textarea id="observaciones" name="observaciones" class="form-control" style="height: 50px;"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>



                    <!-- ===================================== -->



                    <br><br>
                    <br><br>
                    <div class="col-md-12">
                        <table id="table_customer_travel_children" class="table table-hover table-bordered" >
                            <thead>
                                <tr class="well">
                                    <th><center>#</center></th>
                            <th><center>Servicios</center></th>
                            <th><center>Detalle</center></th>
                            <th><center>Codigo</center></th>
                            <th><center>Cant.</center></th>
                            <th><center>Val. Total.</center></th>
                            <th><center>Proveedor</center></th>
                            <th><center>Utilidad</center></th>
                            <th colspan="2"><center>Accion</center></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="10">
                            <center>
                                No se registraron datos.
                            </center>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!--============================== INICIO SUB TOTALES======================-->

            <dir class="modal-header" style="background-color:#90B3B3">        
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="subtotal">Sub-Total</label>
                        <input type="text" step="0.01" id="subtotal" name="subtotal" onkeypress="return pulsar(event)" class="form-control"  autocomplete="off">
                    </div>  
                </div>
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="porcentaje">%</label>
                        <input type="text" step="0.01" id="porcentaje" name="porcentaje" onkeypress="return pulsar(event)" class="form-control" onChange="calculo();" autocomplete="off" >
                    </div>  
                </div>
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="utilidad1">Utilidad</label>
                        <input type="text" step="0.01" id="utilidad1" name="utilidad1" onkeypress="return pulsar(event)" class="form-control" readonly="true" autocomplete="off" >
                    </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="igv">IGV</label>
                    <input type="text" name="igv" id="igv" step="0.1" class="form-control" onkeypress="return pulsar(event)" autocomplete="off" readonly="true" />
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="total1">Total</label><br>
                        <input type="text" class="form-control" name="total1" onkeypress="return pulsar(event)" id="total1" readonly="true" autocomplete="off">
                    </div>  
                </div>
            </dir>


            <script type="text/javascript">
                function calculo() {
                    //tasa de impuesto
                    var porcentaje = $("input[name=porcentaje]").val();
                    var total1 = $("input[name=total1]").val();
                    var subtotal = $("input[name=subtotal]").val();
                    var tasa = 18;
                    var utilidad1 = (subtotal * porcentaje) / 100;
                    var igv = (utilidad1 * tasa / 100);
                    //se carga el iva en el campo correspondien te
                    $("input[name=utilidad1]").val(utilidad1.toFixed(2));
                    $("input[name=igv]").val(igv.toFixed(2));
                    $("input[name=total1]").val((parseFloat(subtotal) + parseFloat(igv) + parseFloat(utilidad1)).toFixed(2));

                }
            </script>



            <!--============================== FIN SUB TOTALES======================-->
<!--============================== INICIO DETRACCION======================-->

         <dir class="modal-header" style="background-color:#90B3B8">        
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="subtotal1">Monto Detraccion</label>
                    <input type="text" step="0.01" id="subtotal1" name="subtotal1" onkeypress="return pulsar(event)" class="form-control"  autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="porcentaje1">% Detrac.</label>
                    <input type="text" step="0.01" id="porcentaje1" name="porcentaje1" onkeypress="return pulsar(event)" class="form-control" onChange="detraccion();" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="utilidad11">Total Detraccion</label>
                    <input type="text" step="0.01" id="utilidad11" name="utilidad11" onkeypress="return pulsar(event)" class="form-control" readonly="true" autocomplete="off" >
                  </div>  
                </div>
        </dir>


<script type="text/javascript">
    function detraccion(){
    //tasa de impuesto
  var porcentaje1 = $("input[name=porcentaje1]").val();
  var total11 = $("input[name=total11]").val();
  var subtotal1 = $("input[name=subtotal1]").val();  
  var tasa1 = 18;
  var utilidad11 = (subtotal1 * porcentaje1)/100;
  var igv1 = (utilidad11 * tasa1/100);
  //se carga el iva en el campo correspondien te
  $("input[name=utilidad11]").val(utilidad11.toFixed(2));
  $("input[name=igv1]").val(igv1.toFixed(2)); 
  $("input[name=total11]").val((parseFloat(subtotal1)+parseFloat(igv1)+parseFloat(utilidad11)).toFixed(2));
   
}
</script>

<!--============================== FIN DETRACCION======================-->




            <div class="modal-header" style="background-color:#FFFFFF">
                <h5 class="modal-title">Condicion de Pago</h5>
                <div class="">
                    <br>
                    <div class="col-md-2" class="form-group">
                        <label for="condicion">Condicion:</label>
                        <select class="form-control input-sm" id="condicion" name="condicion">
                            <option value="">---SELECCIONE---</option>
                            <option value="001">CONTADO</option>
                            <option value="000">NO ASIGNADO</option>
                            <option value="002">CRÉDITO A 7 DÍAS</option>
                            <option value="003">CRÉDITO A 15 DÍAS</option>
                            <option value="008">CRÉDITO A 20 DÍAS</option>
                            <option value="010">CRÉDITO A 21 DÍAS</option>
                            <option value="011">CRÉDITO A 25 DÍAS</option>
                            <option value="004">CRÉDITO A 30 DÍAS</option>
                            <option value="005">CRÉDITO A 60 DÍAS</option>
                            <option value="006">CRÉDITO A 90 DÍAS</option>
                            <option value="007">CRÉDITO A 120 DÍAS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="forma_pago">Forma de Pago:</label>
                        <select class="form-control input-sm" id="forma_pago" name="forma_pago">
                            <option value="">---SELECCIONE---</option>
                            <option value="NO ASIGNADO">NO ASIGNADO</option>
                            <option value="EFECTIVO">EFECTIVO</option>
                            <option value="CHEQUE">CHEQUE</option>
                            <option value="LETRA">LETRA</option>
                            <option value="TARJETA DE CRÉDITO">TARJETA DE CRÉDITO</option>
                            <option value="TARJETA DE DÉBITO">TARJETA DE DÉBITO</option>
                            <option value="DEPOSITO BANCARIO">DEPOSITO BANCARIO</option>
                            <option value="TRANSFERENCIA INTERBANCARIA">TRANSFERENCIA INTERBANCARIA</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="total">Monto</label>
                        <input type="number" name="total" id="total" onkeypress="return pulsar(event)" class="form-control"
                               step="0.01" placeholder="0,00"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalPago('');"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarPago('');"><i class='fa fa-angle-double-up'></i></button>  
                    </div> 
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_pay" onkeypress="return pulsar(event)" class="btn btn-primary" value="Agregar"/>
                    </div>
                    <div class="col-md-12 content_service_pago" class="form-group" style="display:none;">

                        <br>
                        <div class="col-md-3" class="form-group">
                            <label for="banco">Banco</label>
                            <input type="text" name="banco" id="banco" onkeypress="return pulsar(event)" class="form-control">
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="tipo">Tipo</label>
                            <select class="form-control input-sm" id="tipo" name="tipo">
                                <option value="">---SELECCIONE---</option>
                                <option value="000">PLANILLA</option>
                                <option value="001">REFERENCIA</option>
                                <option value="002">VISA</option>
                                <option value="003">MASTERCARD</option>
                                <option value="004">AMERICA EXPRESS</option>
                                <option value="005">MILLAS</option>
                                <option value="007">NO ASIGNADO</option>
                            </select>
                        </div>
                        <div class="col-md-4" class="form-group">
                            <label for="referencia">Numero</label>
                            <input type="text" name="referencia" id="referencia" onkeypress="return pulsar(event)" class="form-control" placeholder="Numero"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="fecha_exp">Fecha Exp.</label>
                            <input type="text" name="fecha_exp" id="fecha_exp" onkeypress="return pulsar(event)" class="form-control" placeholder="MM/AAAA"/>
                        </div><br><br>
                        <br><br>
                        <div class="col-md-12">
                            <fieldset>
                                <h5>Observaciones</h5>
                                <div class="form-group">
                                    <textarea id="descripcion" class="form-control" style="height: 50px;"></textarea>
                                </div>
                            </fieldset>
                        </div>                   

                    </div>

                    <br><br>
                    <br><br></div>
                <div class="col-md-12">
                    <table id="table_customer_pay" class="table table-hover table-bordered" >
                        <thead>
                            <tr class="well">
                                <th><center>#</center></th>
                        <th><center>Condicion</center></th>
                        <th><center>Forma</center></th>
                        <th><center>Banco</center></th>
                        <th><center>Tipo</center></th>
                        <th><center>Numero</center></th>
                        <th><center>Estatus</center></th>
                        <th><center>Monto</center></th>
                        <th colspan="2"><center>Accion</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10">
                        <center>
                            No se registraron datos.
                        </center>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <dir class="modal-header" style="background-color:#EFF0F1">
                <h5 class="modal-title">Observaciones</h5>
                <div class="col-md-12" class="form-group">
                    <textarea  id="sale_observaciones" name="descripcion" onkeypress="return pulsar(event)" class="form-control"></textarea>
                </div>
            </dir>

            <div class="modal-footer">
                <button id="add_info_service" type="submit" class="btn btn-primary">Guardar</button> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>       
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>




<!-- ====================== -->




<!-- INICIO GENERAR EDITAR -->

<div id="edit_modal_views" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open('sales/editarventas'); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vista Venta: <span id="edit_modal-title-coti"></span><span id="edit_modal-coti"><?php echo "-V" ?></span></h4><br>

            </div>
            <input type="hidden" name="detalle_servicio_json" id="edit_detalle_servicio_json">
            <input type="hidden" name="detalle_condicion_pago_json" id="edit_detalle_condicion_pago_json">

            <div class="modal-header">
                <h5 class="modal-title">Datos del Cliente a facturar</h5>
                <input type="hidden" name="data" id="edit_data">
                <input type="hidden" name="id" id="edit_id">
                <div class="col-md-3" class="form-group">
                    <label for="tip_doc_rct">Tipo de Documento:</label>
                    <select name="tip_doc_rct" id="edit_tip_doc_rct" class="form-control" required>
                        <option>Seleccione...</option>
                        <option name="1" value="1">D.N.I.</option>
                        <option name="4" value="4">CARNET DE EXTRANJERIA</option>    
                        <option name="7" value="7">PASAPORTE</option>
                        <option name="6" value="6">R.U.C.</option>
                        <option name="0" value="0">DOC.TRIB.NO.DOM.SIN.RUC</option>
                        <option name="A" value="A">CED. DIPLOMATICA DE IDENTIDAD</option>
                        <option name="B" value="B">DOC.IDENT.PAIS.RESIDENCIA-NO.D</option>
                        <option name="C" value="C">TAX TIDENTIFICATION NUMBER - TIN - DOC TRIB PP.NN</option>
                        <option name="D" value="D">IDENTIFICATION NUMBER - IN – DOC TRIB PP. JJ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="nro_doc_rct">Nro. Identidad:</label>
                    <input type="number" name="nro_doc_rct" id="edit_nro_doc_rct" class="form-control"/>
                </div>
                <div class="col-md-6">
                    <label for="name">Apellido / Nombre:</label>
                    <input type="text" id="edit_name" name="name" placeholder="Nombre del Cliente" class="form-control" autocomplete="off" />
                </div><br><br><br><br>
                <div class="col-md-6">
                    <label for="dir_des_rct">Direccion:</label>
                    <input type="text" name="dir_des_rct" id="edit_dir_des_rct" class="form-control" autocomplete="off"/>
                </div>
                <div class="col-md-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="edit_email" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="edit_telefono" class="form-control" autocomplete="off"/>
                </div>
            </div>

            <div class="modal-header" style="background-color:#EFF0F1">
                <h5 class="modal-title">Detalle del Servicio</h5>

                <br>
                <div class="col-md-4" class="form-group">
                    <label for="tipo_servicio">Servicio:</label>
                    <select id="edit_tipo_servicio" name="tipo_servicio" class="form-control">
                        <option value="">Seleccionar Tipo de Servicio</option>
                        <option value="Boleto Aereo">Boleto Publicado</option>
                        <option value="Boleto BT/IT">Boleto BT/IT</option>
                        <option value="Remision">Remision / Millas</option>
                        <option value="Paquete">Paquete</option>
                        <option value="Paquetes Netos">Paquetes Netos</option>
                        <option value="Tarjetas de Asistencias">Tarjetas de Asistencias</option>
                        <option value="Hotel">Hotel</option>                        
                        <option value="Traslado">Traslado</option>
                        <option value="Auto">Auto</option>
                        <option value="Excursiones">Excursiones</option>
                        <option value="Crucero">Crucero</option>
                        <option value="Trenes">Trenes / Buses</option>
                        <option value="Entradas">Entradas</option>
                        <option value="Gastos Administrativos">Gastos Administrativos</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="codigo">Codigo:</label>
                    <input type="text" id="edit_codigo" name="codigo" placeholder="Codigo" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="cantidad">Cant.:</label>
                    <input type="number" name="cantidad" id="edit_cantidad" class="form-control" autocomplete="off" />
                </div>
                <div class="col-md-2">
                    <label for="valor_unitario">Valor Vta.:</label>
                    <input type="number" name="valor_unitario" id="edit_valor_unitario" class="form-control"
                           step="0.01" placeholder="0,00" autocomplete="off" />
                </div>
                <br><br><br><br>
                <div class="col-md-8" class="form-group">
                    <label for="detalle">Detalle:</label>
                    <input type="text" name="detalle" id="edit_detalle" class="form-control" placeholder="Descripcion" autocomplete="off" />
                </div>
                <div class="col-md-2">
                    <label for="code_travel">&nbsp;</label><br>
                    <button type="button" class="btn btn-primary" onclick="sales.openModalDetail('edit');"><i class='fa fa-angle-double-down'></i></button>
                    <label for="code_travel">&nbsp;</label>
                    <button type="button" class="btn btn-primary" onclick="sales.guardarDetalles('edit');"><i class='fa fa-angle-double-up'></i></button>  
                </div>                    
                <div class="col-md-2">
                    <label for="code_travel">&nbsp;</label><br>
                    <input type="button" id="edit_btn_save_factura_edit" class="btn btn-primary" value="Agregar"/>
                </div>
                <div class="col-md-12 content_service_detail" class="form-group" style="display:none;">
                    <br>
                    <!-- =========== FORM DATOS CARGA DE TABLA ============ -->
                    <div class="col-md-12">
                        <fieldset>
                            <h5>Tabla</h5>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="proveedor">Proveedor</label>
                                    <input type="text" id="edit_proveedor" name="proveedor" placeholder="Proveedor" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="tarifa_neta">Tarifa Neta</label>
                                    <input type="text" step="0.01" id="edit_tarifa_neta" name="tarifa_neta" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="comi_proveedor_porcentaje">Com. %</label>
                                    <input type="text" step="0.01" id="edit_comi_proveedor_porcentaje" name="comi_proveedor_porcentaje" class="form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="comi_proveedor_fija">Com. Fija.</label>
                                    <input type="text" step="0.01" id="edit_comi_proveedor_fija" name="comi_proveedor_fija" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_proveedor">Fee Proveedor</label>
                                    <input type="text" step="0.01" id="edit_fee_proveedor" name="fee_proveedor" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_proveedor_conf">Fee x Conf.</label>
                                    <input type="text" step="0.01" id="edit_fee_proveedor_conf" name="fee_proveedor_conf" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_agencia">Fee Agencia</label>
                                    <input type="text" step="0.01" id="edit_fee_agencia" name="fee_agencia" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="impuesto">Impuestos</label>
                                    <input type="text" step="0.01" id="edit_impuesto" name="impuesto" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off" >
                                </div>  
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="incentivo_add">Incen. Turifax:</label>
                                <input type="text" name="incentivo_add" id="edit_incentivo_add" step="0.1" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off" />
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="otros">Otros</label>
                                <input type="text" name="otros" id="edit_otros" step="0.1" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off" />
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="costo_edit">Costo Total</label><br>
                                    <span class="form-control" name="costo_edit" id="edit_costo_edit" readonly="true"></span>
                                </div>  
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="incentivo">Incentivo:</label>
                                <input type="text" name="incentivo" id="edit_incentivo" onkeyup="calcular('edit');" class="monto_edit form-control" autocomplete="off" />
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <h5>Observaciones</h5>
                            <div class="form-group">
                                <textarea id="edit_observaciones" class="form-control" style="height: 50px;"></textarea>
                            </div>
                        </fieldset>
                    </div>
                    <!-- ===================================== -->



                </div>

                <br><br>
                <br><br>
                <div class="col-md-12">
                    <table id="edit_table_customer_travel_children" class="table table-hover table-bordered" >
                        <thead>
                            <tr class="well">
                                <th><center>#</center></th>
                        <th><center>Servicios</center></th>
                        <th><center>Detalle</center></th>
                        <th><center>Codigo</center></th>
                        <th><center>Cant.</center></th>
                        <th><center>Val. Total.</center></th>
                        <th><center>Proveedor</center></th>
                        <th><center>Utilidad</center></th>
                        <th colspan="2"><center>Accion</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10">
                        <center>
                            No se registraron datos.
                        </center>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <input name="monto_pagar" id="edit_monto_pagar" class="form-control" placeholder="Total" readonly="true" type="hidden">
            <!--============================== INICIO SUB TOTALES======================-->

            <dir class="modal-header" style="background-color:#90B3B3">        
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="subtotal">Sub-Total</label>
                        <input type="text" step="0.01" id="subtotal" name="subtotal" onkeypress="return pulsar(event)" class="form-control"  autocomplete="off">
                    </div>  
                </div>
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="porcentaje">%</label>
                        <input type="text" step="0.01" id="porcentaje" name="porcentaje" onkeypress="return pulsar(event)" class="form-control" onChange="calculo();" autocomplete="off" >
                    </div>  
                </div>
                <div class="col-md-2">
                    <div class="form-group" >
                        <label for="utilidad1">Utilidad</label>
                        <input type="text" step="0.01" id="utilidad1" name="utilidad1" onkeypress="return pulsar(event)" class="form-control" readonly="true" autocomplete="off" >
                    </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="igv">IGV</label>
                    <input type="text" name="igv" id="igv" step="0.1" class="form-control" onkeypress="return pulsar(event)" autocomplete="off" readonly="true" />
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="total1">Total</label><br>
                        <input type="text" class="form-control" name="total1" onkeypress="return pulsar(event)" id="total1" readonly="true" autocomplete="off">
                    </div>  
                </div>
            </dir>


            <script type="text/javascript">
                function calculo() {
                    //tasa de impuesto
                    var porcentaje = $("input[name=porcentaje]").val();
                    var total1 = $("input[name=total1]").val();
                    var subtotal = $("input[name=subtotal]").val();
                    var tasa = 18;
                    var utilidad1 = (subtotal * porcentaje) / 100;
                    var igv = (utilidad1 * tasa / 100);
                    //se carga el iva en el campo correspondien te
                    $("input[name=utilidad1]").val(utilidad1.toFixed(2));
                    $("input[name=igv]").val(igv.toFixed(2));
                    $("input[name=total1]").val((parseFloat(subtotal) + parseFloat(igv) + parseFloat(utilidad1)).toFixed(2));

                }
            </script>



            <!--============================== FIN SUB TOTALES======================-->
<!--============================== INICIO DETRACCION======================-->

         <dir class="modal-header" style="background-color:#90B3B8">        
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="subtotal1">Monto Detraccion</label>
                    <input type="text" step="0.01" id="subtotal1" name="subtotal1" onkeypress="return pulsar(event)" class="form-control"  autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="porcentaje1">% Detrac.</label>
                    <input type="text" step="0.01" id="porcentaje1" name="porcentaje1" onkeypress="return pulsar(event)" class="form-control" onChange="detraccion();" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="utilidad11">Total Detraccion</label>
                    <input type="text" step="0.01" id="utilidad11" name="utilidad11" onkeypress="return pulsar(event)" class="form-control" readonly="true" autocomplete="off" >
                  </div>  
                </div>
        </dir>


<script type="text/javascript">
    function detraccion(){
    //tasa de impuesto
  var porcentaje1 = $("input[name=porcentaje1]").val();
  var total11 = $("input[name=total11]").val();
  var subtotal1 = $("input[name=subtotal1]").val();  
  var tasa1 = 18;
  var utilidad11 = (subtotal1 * porcentaje1)/100;
  var igv1 = (utilidad11 * tasa1/100);
  //se carga el iva en el campo correspondien te
  $("input[name=utilidad11]").val(utilidad11.toFixed(2));
  $("input[name=igv1]").val(igv1.toFixed(2)); 
  $("input[name=total11]").val((parseFloat(subtotal1)+parseFloat(igv1)+parseFloat(utilidad11)).toFixed(2));
   
}
</script>

<!--============================== FIN DETRACCION======================-->

            <div class="modal-header" style="background-color:#FFFFFF">
                <h5 class="modal-title">Condicion de Pago</h5>
                <div class="">
                    <br>
                    <div class="col-md-2" class="form-group">
                        <label for="condicion">Condicion:</label>
                        <select class="form-control input-sm" id="edit_condicion" name="condicion">
                            <option value="">---SELECCIONE---</option>
                            <option value="001">CONTADO</option>
                            <option value="000">NO ASIGNADO</option>
                            <option value="002">CRÉDITO A 7 DÍAS</option>
                            <option value="003">CRÉDITO A 15 DÍAS</option>
                            <option value="008">CRÉDITO A 20 DÍAS</option>
                            <option value="010">CRÉDITO A 21 DÍAS</option>
                            <option value="011">CRÉDITO A 25 DÍAS</option>
                            <option value="004">CRÉDITO A 30 DÍAS</option>
                            <option value="005">CRÉDITO A 60 DÍAS</option>
                            <option value="006">CRÉDITO A 90 DÍAS</option>
                            <option value="007">CRÉDITO A 120 DÍAS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="forma_pago">Forma de Pago:</label>
                        <select class="form-control input-sm" id="edit_forma_pago" name="forma_pago">
                            <option value="">---SELECCIONE---</option>
                            <option value="NO ASIGNADO">NO ASIGNADO</option>
                            <option value="EFECTIVO">EFECTIVO</option>
                            <option value="CHEQUE">CHEQUE</option>
                            <option value="LETRA">LETRA</option>
                            <option value="TARJETA DE CRÉDITO">TARJETA DE CRÉDITO</option>
                            <option value="TARJETA DE DÉBITO">TARJETA DE DÉBITO</option>
                            <option value="DEPOSITO BANCARIO">DEPOSITO BANCARIO</option>
                            <option value="TRANSFERENCIA INTERBANCARIA">TRANSFERENCIA INTERBANCARIA</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="total">Monto</label>
                        <input type="number" name="total" id="edit_total" class="form-control"
                               step="0.01" placeholder="0,00"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalPago('edit');"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarPago('edit');"><i class='fa fa-angle-double-up'></i></button>  
                    </div> 
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="edit_btn_save_pay_edit" class="btn btn-primary" value="Agregar"/>
                    </div>
                    <div class="col-md-12 content_service_pago" class="form-group" style="display:none;">

                        <br>
                        <div class="col-md-3" class="form-group">
                            <label for="banco">Banco</label>
                            <input type="text" name="banco" id="edit_banco" class="form-control">
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="tipo">Tipo</label>
                            <select class="form-control input-sm" id="edit_tipo" name="tipo">
                                <option value="">---SELECCIONE---</option>
                                <option value="000">PLANILLA</option>
                                <option value="001">REFERENCIA</option>
                                <option value="002">VISA</option>
                                <option value="003">MASTERCARD</option>
                                <option value="004">AMERICA EXPRESS</option>
                                <option value="005">MILLAS</option>
                                <option value="007">NO ASIGNADO</option>
                            </select>
                        </div>
                        <div class="col-md-4" class="form-group">
                            <label for="referencia">Numero</label>
                            <input type="text" name="referencia" id="edit_referencia" class="form-control" placeholder="Numero"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="fecha_exp">Fecha Exp.</label>
                            <input type="text" name="fecha_exp" id="edit_fecha_exp" class="form-control" placeholder="MM/AAAA"/>
                        </div><br><br>
                        <br><br>
                        <div class="col-md-12">
                            <fieldset>
                                <h5>Observaciones</h5>
                                <div class="form-group">
                                    <textarea id="edit_descripcion" class="form-control" style="height: 50px;"></textarea>
                                </div>
                            </fieldset>
                        </div>                   

                    </div>

                    <br><br>
                    <br><br></div>
                <div class="col-md-12">
                    <table id="edit_table_customer_pay" class="table table-hover table-bordered" >
                        <thead>
                            <tr class="well">
                                <th><center>#</center></th>
                        <th><center>Condicion</center></th>
                        <th><center>Forma</center></th>
                        <th><center>Banco</center></th>
                        <th><center>Tipo</center></th>
                        <th><center>Numero</center></th>
                        <th><center>Estatus</center></th>
                        <th><center>Monto</center></th>
                        <th colspan="2"><center>Accion</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10">
                        <center>
                            No se registraron datos.
                        </center>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <dir class="modal-header" style="background-color:#EFF0F1">
                <h5 class="modal-title">Observaciones</h5>
                <div class="col-md-12" class="form-group">
                    <textarea name="descripcion" id="edit_sale_observaciones" class="form-control"></textarea>
                </div>
            </dir>

            <div class="modal-footer">
                <button id="edit_add_info_service" type="submit" class="btn btn-primary">Guardar</button> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>




<!-- ====================== -->



<!-------------MODAL SERVICIOS----------->

<div id="modal_servicios" class="modal fade" role="dialog" aria-hidden="true" style="z-index: 1200;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">TABLA DE SERVICIOS</h4>
            </div>
            <?php echo form_open(''); ?>
            <div class="modal-body" style="background-color:#EFF0F1">
                <input type="hidden" id="index_servicio" name="index_servicio" value="">
                <input type="hidden" id="method_prefix" name="method_prefix" value="">
                <div class="row">
                    <!-- =========== FORM DATOS DEL SERVICIO ============ -->
                    <div class="col-md-12">
                        <fieldset>
                            <h5>Servicio</h5>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="tipo_servicio">Servicio</label>
                                    <input type="text" id="tipo_servicio_servicios" name="tipo_servicio" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="codigo">Codigo</label>
                                    <input type="text" id="codigo_servicios" name="codigo" class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" id="cantidad_servicios" name="cantidad" class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="valor_unitario">Valor Unit.</label>
                                    <input type="text" id="valor_unitario_servicios" name="valor_unitario" class="form-control" name="">
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label for="fee_agencia">Detalle</label>
                                    <input type="text" id="detalle_servicios" name="detalle" class="form-control">
                                </div>  
                            </div>

                        </fieldset>
                    </div>
                    <!-- ============FIN DATOS DEL SERVICIO========================= -->


                    <!-- =========== FORM DATOS CARGA DE TABLA ============ -->
                    <div class="col-md-12">
                        <fieldset>
                            <h5>Tabla</h5>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="proveedor">Proveedor</label>
                                    <input type="text" id="proveedor_servicios" name="proveedor" placeholder="Proveedor" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="tarifa_neta">Tarifa Neta</label>
                                    <input type="text" step="0.01" id="tarifa_neta_servicios" name="tarifa_neta" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="comi_proveedor_porcentaje">Com. %</label>
                                    <input type="text" step="0.01" id="comi_proveedor_porcentaje_servicios" name="comi_proveedor_porcentaje" class="form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="comi_proveedor_fija">Com. Fija.</label>
                                    <input type="text" step="0.01" id="comi_proveedor_fija_servicios" name="comi_proveedor_fija" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_proveedor">Fee Proveedor</label>
                                    <input type="text" step="0.01" id="fee_proveedor_servicios" name="fee_proveedor" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_proveedor_conf">Fee x Conf.</label>
                                    <input type="text" step="0.01" id="fee_proveedor_conf_servicios" name="fee_proveedor_conf" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="fee_agencia">Fee Agencia</label>
                                    <input type="text" step="0.01" id="fee_agencia_servicios" name="fee_agencia" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="impuesto">Impuestos</label>
                                    <input type="text" step="0.01" id="impuesto_servicios" name="impuesto" onkeyup="sumar();" class="monto form-control" autocomplete="off" >
                                </div>  
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="incentivo_add">Incen. Turifax:</label>
                                <input type="text" name="incentivo_add" id="incentivo_add_servicios" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="otros">Otros</label>
                                <input type="text" name="otros" id="otros_servicios" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label for="costo">Costo Total</label><br>
                                    <input type="text" class="form-control" id="costo_servicios" name="costo" autocomplete="off" >
                                </div>  
                            </div>
                            <div class="col-md-2" class="form-group">
                                <label for="incentivo">Incentivo:</label>
                                <input type="text" name="incentivo" id="incentivo_servicios" class="monto form-control" autocomplete="off" />
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <!-- ================================================== -->
            <dir class="modal-header" >
                <h5 class="modal-title">Datos Financieros del Servicio</h5>

                <div class="main">
                    <div class="col-md-2" class="form-group">
                        <label for="dfs_tarifa_neta">Tarifa:</label>
                        <input type="text" id="dfs_tarifa_neta_servicios" name="dfs_tarifa_neta" class="form-control" onchange="return onKeyPressBlockChars(event, this.value);" onKeyUp="calculaPorcentajes(this.value)"  autocomplete="off"/>
                    </div>
                    <div class="col-md-1" class="form-group">
                        <label for="quue">QUUE:</label>
                        <input type="text" id="quue_servicios" name="quue" class="form-control" onchange="SumarAutomatico(this.value);"  autocomplete="off"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="imp_extranjero">Imp. Extranjero:</label>
                        <input type="text" id="imp_extranjero_servicios" name="imp_extranjero" class="form-control" onchange="SumarAutomatico(this.value);"  autocomplete="off" />
                    </div>
                    <div class="col-md-1" class="form-group">
                        <label for="dfs_otros">Otros:</label>
                        <input type="text" name="dfs_otros" id="dfs_otros_servicios" class="form-control"  autocomplete="off" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="exento_fee">Extento FEE:</label>
                        <input type="checkbox" name="exento_fee" id="exento_fee_servicios"  />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="dfs_inafecto">Inafecto:</label>                      
                        <input  id='dfs_inafecto_servicios'  type='checkbox' name='dfs_inafecto' value='0'>
                    </div>
                    <div class="contentM" style="display:block" class="col-md-2" class="form-group">
                        <label for="porcent18">IGV:</label>
                        <input class="col-md-2" type="text" name="porcent18" id="porcent18_servicios" class="form-control"  autocomplete="off"/>
                    </div>
                </div>

            </dir>

            <div class="target" >
                <dir class="modal-header" >
                    <div class="col-md-2" class="form-group">
                        <label for="credit_card">CreditCard:</label>
                        <input type="text" name="credit_card" id="credit_card" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="serv_esp">Serv.Esp:</label>
                        <input type="text" name="serv_esp" id="serv_esp" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="tua">TUA:</label>
                        <input type="text" id="tua" class="form-control" name="tua" size="5" >
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="dfs_otros">Otros:</label>
                        <select class="form-control" name="dfs_otros" id="dfs_otros" >
                            <option value="0" selected>Ninguna</option>
                            <option value="16">16</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="col-md-1" class="form-group">
                        <label for="fee">FEE:</label>
                        <input type="text" class="form-control" name="fee" value="" id="fee" size="3">
                    </div>
                    <div class="col-md-1" class="form-group">
                        <label for="dfs_igv">IGV:</label>
                        <input type="text" name="dfs_igv" id="dfs_igv" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="dfs_total_fee">Total FEE:</label>
                        <input type="text" name="dfs_total_fee" id="dfs_total_fee" class="form-control" />
                    </div>
                </dir>
                <dir class="modal-header" >
                    <h5 class="modal-title">Comision de la Agencia y el Vendedor</h5>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_agencia">% Agencia:</label>
                        <input type="text" name="cav_agencia" id="cav_agencia" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_igual_agencia">Igual a:</label>
                        <input type="text" name="cav_igual_agencia" id="cav_igual_agencia" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_over">Over:</label>
                        <input type="number" name="cav_over" id="cav_over" name="height" step="0.1" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_igual_cover">Igual a:</label>
                        <input type="text" name="cav_igual_cover" id="cav_igual_cover" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_inafecto">Inafecto:</label>
                        <input type="checkbox" name="cav_inafecto" id="cav_inafecto" name="height" />
                    </div>
                </dir>
                <dir class="modal-header" >
                    <div class="col-md-2" class="form-group">
                        <label for="cav_vendedor">Vendedor:</label>
                        <select class="form-control" id="cav_vendedor">
                            <option>Opcion1</option>
                            <option>Opcion1</option>
                            <option>Opcion1</option>
                        </select>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_incentivo">Incentivo:</label>
                        <input type="text" name="cav_incentivo" id="cav_incentivo" class="form-control" />
                    </div>
                    <div class="col-md-3" class="form-group">
                        <label for="cav_incentivo_counter">Incentivo Counter:</label>
                        <input type="number" name="cav_incentivo_counter" id="cav_incentivo_counter" name="height" step="0.1" class="form-control"/>
                    </div>
                </dir>
                <dir class="modal-header" >
                    <div class="col-md-2" class="form-group">
                        <label for="cav_per_vendedor">% Vendedor:</label>
                        <input type="text" name="cav_per_vendedor" id="cav_per_vendedor" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_igual_per_vendedor">Igual a:</label>
                        <input type="text" name="cav_igual_per_vendedor" id="cav_igual_per_vendedor" class="form-control" />
                    </div>
                    <div class="col-md-3" class="form-group">
                        <label for="cav_f_salida">F.Salida:</label>
                        <input type="date" name="cav_f_salida" id="cav_f_salida" name="height" step="0.1" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_horasalida">Hora:</label>
                        <input type="time" name="cav_horasalida" id="cav_horasalida" class="form-control"/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                </dir>
                <dir class="modal-header" >
                    <div class="col-md-3" class="form-group">
                        <label for="cav_nro_vuelo">Nro. Vuelo:</label>
                        <input type="text" name="cav_nro_vuelo" id="cav_nro_vuelo" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_clase">Clase:</label>
                        <input type="text" name="cav_clase" id="cav_clase" class="form-control" />
                    </div>
                    <div class="col-md-3" class="form-group">
                        <label for="cav_f_retorno">F.Retorno:</label>
                        <input type="date" name="cav_f_retorno" id="cav_f_retorno" name="height" step="0.1" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cav_hora_retorno">Hora:</label>
                        <input type="time" name="cav_hora_retorno" id="cav_hora_retorno" class="form-control"/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                </dir>
                <dir class="modal-header" >
                    <h5 class="modal-title">Observaciones</h5>
                    <div class="form-group">
                        <label for="obs_observaciones">Observ.:</label>
                        <textarea id="obs_observaciones" name="obs_observaciones" class="form-control" style="height: 50px;"></textarea>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="obs_f_solicitada">F.Solicitada:</label>
                        <input type="date" name="obs_f_solicitada" id="obs_f_solicitada" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="obs_monto">Monto:</label>
                        <input type="number" name="obs_monto" id="obs_monto" name="height" step="0.1" class="form-control"/>
                    </div>
                </dir>
                <dir class="modal-header" >
                    <h5 class="modal-title">Forma de Pago a la Aerolinea o Mayorista</h5>
                    <div class="col-md-3" class="form-group">
                        <label for="fpa_monto_pago">Modo de Pago:</label>
                        <input type="text" name="fpa_monto_pago" id="fpa_monto_pago" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="fpa_contacto">Contado:</label>
                        <input type="text" name="fpa_contacto" id="fpa_contacto" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="fpa_credito">Credito:</label>
                        <input type="number" name="fpa_credito" id="fpa_credito" name="height" step="0.1" class="form-control"/>
                    </div>
                </dir>
                <dir class="modal-header" >
                    <div class="col-md-2" class="form-group">
                        <label for="fpa_tarjeta">Tarjeta:</label>
                        <input type="text" name="fpa_tarjeta" id="fpa_tarjeta" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-3" class="form-group">
                        <label for="fpa_nro_cheque">Nro. Cheque:</label>
                        <input type="text" name="fpa_nro_cheque" id="fpa_nro_cheque" class="form-control" />
                    </div>
                </dir>
                <dir class="modal-header" >
                    <h5 class="modal-title">Estado del Boleto</h5>
                    <div class="col-md-2" class="form-group">
                        <label for="eb_agencia">% Agencia:</label>
                        <input type="text" name="eb_agencia" id="eb_agencia" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="eb_igual_agencia">Igual a:</label>
                        <input type="text" name="eb_igual_agencia" id="eb_igual_agencia" class="form-control" />
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="eb_over">Over:</label>
                        <input type="number" name="eb_over" id="eb_over" name="height" step="0.1" class="form-control"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="eb_gual_over">Igual a:</label>
                        <input type="text" name="eb_gual_over" id="eb_gual_over" class="form-control" disabled/>
                        <!-- value="<?php //echo $travelid        ?>" -->
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="eb_inafecto">Inafecto:</label>
                        <input type="checkbox" name="eb_inafecto" id="eb_inafecto" name="height" />
                    </div>
                </dir>
            </div> 
            <div class="modal-footer">
                <div class="form-group"></div>
                <button type="button" class="btn btn-primary" onclick="sales.addServicioDetalle()">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<script>
    function onKeyPressBlockChars(e, numero) {
        var key = window.event ? e.keyCode : e.which;
        var keychar = String.fromCharCode(key);
        reg = /\d|\./;
        if (numero.indexOf(".") != -1 && keychar == ".") {
            return false;
        } else {
            return reg.test(keychar);
        }
    }
    function calculaPorcentajes(numero) {
        document.getElementById("porcent18_servicios").value = Math.floor(numero * 18) / 100;
    }

    $(document).ready(function () {
        $('.fantasma').click(function () {
            if ($(this).is(':checked')) {
                $('.contentM').css('display', 'none');
            } else {
                $('.contentM').css('display', 'block');
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".error_comision").hide();
        sales.setTravelCode();
        //dibujar buscador        
        $('#buscador').html('<div class="col-md-6" ></div><div class="col-md-6" class="inline-form-group"><form id="form_travel_search" action="index.php/travel/suggest" class="form-inline"><label for="search_value"><i style="color:#337ab7" class="fa fa-search"></i>&nbsp;</label><input placeholder="Buscar Cliente..." type="text" class="inline-form-control" id="search_value" onkeyup="travel.suggest(this);" style="width: 380px;" list="list_travel_search" autocomplete="off"/><datalist id="list_travel_search"></datalist></form></div>');
        //fin dibujar buscador
        $("#search_value").on('input', function () {
            sales.setCustomerFilter();
        });
        $("#btn_save_com").click(function () {
            sales.addComision();
        });
        $(".btn_success").click(function () {
            location.reload();
        });
        $('.btn_save_travel').on("click", function () {
                        var validator = $('#form_travel_save').data('bootstrapValidator');
            validator.validate();
            return validator.isValid();
                });
        $('.btn_update_comision').on("click", function () {
                        var validator = $('#form_travel_comision_update').data('bootstrapValidator');
            validator.validate();
            return validator.isValid();
                });

        $('.btn_cotizacion').on("click", function () {
            $("#modal_cotizacion").modal("hide");
            sales.saveInfoTablas();
                });

        $('#showLastTravel').hide();

        $('form input').on('keypress', function (e) {
            return e.which !== 13;
        });

        $('#div_penalidad').hide();
        $('#div_feepenalidad').hide();

        sales.saveCustomer();
        //travel.addComision('fee');
        sales.validateFormTravel();
        sales.validateFormUpdateComision();
        sales.formCotizacion();
        sales.getViajes();

        $('#btn_nuevo_cliente2').click(function () {
            $('#modal_cotizacion').modal('show');
        });


        sales.current_url = "<?= base_url(); ?>";
        /* LISTANDO CLIENTES */
        sales.listCotizacion();
    });
    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
</script>

<script language="JavaScript">
    $(function () {
        $("#btnExito").click(function () {
            $('#modal_ticket').modal('show');
        });
        $("#btnFalla").click(function () {
            $('#modal_falla').modal('show');
        });
        $("#print").click(function () {
            $('#modal_print').modal('show');
        });
        $("#factura").click(function () {
            $('#modal_agregar').modal('show');
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        sales.current_url = "<?= base_url(); ?>";
        $("#btn_save_factura").click(function () {
            //travel.addServicio();
            console.log("btn_save_factura");
            sales.addServiceDoc("");
        });
        $("#edit_btn_save_factura_edit").click(function () {
            //travel.addServicio();
            sales.addServiceDoc("edit_");
        });
        $("#btn_save_pay").click(function () {
            //travel.addServicio();
            sales.saveCustomerPay("");
        });
        $("#edit_btn_save_pay_edit").click(function () {
            //travel.addServicio();
            sales.saveCustomerPay("edit_");
        });
        $("#btn_save_description_detail").click(function () {
            sales.guardarDetalles();
        });
    });
</script>

<script type="text/javascript">
    function sumar() {
        var total = 0;
        $(".monto").each(function () {

            if (isNaN(parseFloat($(this).val()))) {
                total += 0;
            } else {
                total += parseFloat($(this).val());
            }
        });
        //alert(total);
        document.getElementById('costo').innerHTML = total;
    }
</script>


<script type="text/javascript">
    function calcular() {
        var total = 0;
        $(".monto_edit").each(function () {

            if (isNaN(parseFloat($(this).val()))) {
                total += 0;
            } else {
                total += parseFloat($(this).val());
            }
        });
        //alert(total);
        document.getElementById('edit_costo_edit').innerHTML = total;
    }
</script>

