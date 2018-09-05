<?php $this->load->view("partial/header"); ?>
<?php
if (isset($error_message)){
	echo '<h1 style="text-align: center;">'.$error_message.'</h1>';
	exit;
}?>
<?php
$cotizacion_id = $_GET["cotizacion_id"];
$estatus = $_GET["estatus"];
$name_client = $_GET["name_client"];
?>


<script src="<?php echo base_url();?>js/lib/sales.js" type="text/javascript" language="javascript" charset="UTF-8"></script>



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
                <th><center>Monto</center></th>
                <th colspan="2"><center>Acción</center></th>
            </tr>
        </thead>
        <tbody class="searchable">
            <tr>
                <td colspan="7">
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
        <?php echo form_open('sales/ventas'); ?>
                        <h4 class="modal-title">Emitir Venta: <span id="modal-title-coti"><?php echo $ref_id;?></span><span id="modal-coti"><?php echo "-V"?></span></h4><br>
                        <input type="hidden" name="ref_id" value="<?php echo $ref_id;?>">
            </div>
                  
        <div style="background-color:#EFF0F1" class="modal-header" id="buscador"></div>   

        <div class="modal-header">
            <h5 class="modal-title">Datos del Cliente a facturar</h5>
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
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
                        <input type="number" name="nro_doc_rct" id="nro_doc_rct" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Apellido / Nombre:</label>
                        <input type="text" id="name" name="name" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Nombre del Cliente" class="form-control" />
                    </div><br><br><br><br>
                    <div class="col-md-6">
                        <label for="dir_des_rct">Direccion:</label>
                        <input type="text" name="dir_des_rct" id="dir_des_rct" class="form-control"/>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control"/>
                    </div>
        </div>

        <div class="modal-header" style="background-color:#EFF0F1">
            <h5 class="modal-title">Detalle del Servicio</h5>
            <div class="">
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <br>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
                    <div class="col-md-4" class="form-group">
                        <label for="tipo_servicio">Servicio:</label>
                    <select id="tipo_servicio" name="tipo_servicio" class="form-control">
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
                        <input type="text" id="codigo" name="codigo" placeholder="Codigo" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cantidad">Cant.:</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="valor_unitario">Valor Vta.:</label>
                        <input type="number" name="valor_unitario" id="valor_unitario" class="form-control"
                            step="0.01" placeholder="0,00" autocomplete="off" />
                    </div>
                    <br><br><br><br>
                    <div class="col-md-8" class="form-group">
                        <label for="detalle">Detalle:</label>
                        <input type="text" name="detalle" id="detalle" class="form-control" placeholder="Descripcion" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalDetail();"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarDetalles();"><i class='fa fa-angle-double-up'></i></button>  
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
                    <input type="text" id="proveedor" name="proveedor" placeholder="Proveedor" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Tarifa Neta</label>
                    <input type="text" step="0.01" id="tarifa_neta" name="tarifa_neta" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_porcentaje">Com. %</label>
                    <input type="text" step="0.01" id="comi_proveedor_porcentaje" name="comi_proveedor_porcentaje" class="form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_fija">Com. Fija.</label>
                    <input type="text" step="0.01" id="comi_proveedor_fija" name="comi_proveedor_fija" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor">Fee Proveedor</label>
                    <input type="text" step="0.01" id="fee_proveedor" name="fee_proveedor" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor_conf">Fee x Conf.</label>
                    <input type="text" step="0.01" id="fee_proveedor_conf" name="fee_proveedor_conf" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_agencia">Fee Agencia</label>
                    <input type="text" step="0.01" id="fee_agencia" name="fee_agencia" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="impuesto">Impuestos</label>
                    <input type="text" step="0.01" id="impuesto" name="impuesto" onkeyup="sumar();" class="monto form-control" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo_add">Incen. Turifax:</label>
                    <input type="text" name="incentivo_add" id="incentivo_add" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="otros">Otros</label>
                    <input type="text" name="otros" id="otros" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="costo">Costo Total</label><br>
                    <span class="form-control" name="costo" id="costo" readonly="true"></span>
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo">Incentivo:</label>
                    <input type="text" name="incentivo" id="incentivo" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                </div>
                <div class="col-md-12">
                  <h5>Observaciones</h5>
                    <div class="form-group">
                      <textarea id="observaciones" name="observaciones" class="form-control" style="height: 50px;"></textarea>
                    </div>
                </div>
              </fieldset>
            </div>





            <!-- ===================================== -->
                        
                

                    </div>

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
  

        <div class="modal-header" style="background-color:#FFFFFF">
            <h5 class="modal-title">Condicion de Pago</h5>
            <div class="">
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <br>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
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
                                <option value="ASIGNADO">NO ASIGNADO</option>
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
                        <input type="number" name="total" id="total" class="form-control"
                            step="0.01" placeholder="0,00"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalPago();"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarPago();"><i class='fa fa-angle-double-up'></i></button>  
                    </div> 
                                        <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_pay" class="btn btn-primary" value="Agregar"/>
                    </div>
                    <div class="col-md-12 content_service_pago" class="form-group" style="display:none;">

                    <br>
                    <div class="col-md-3" class="form-group">
                        <label for="banco">Banco</label>
                             <input type="text" name="banco" id="banco" class="form-control">
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
                        <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Numero"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="fecha_exp">Fecha Exp.</label>
                        <input type="text" name="fecha_exp" id="fecha_exp" class="form-control" placeholder="MM/AAAA"/>
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
                        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
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





<!-------------MODAL VENTA----------->

<div id="modal_servicios" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TABLA DE SERVICIOS</h4>
      </div>
      <div class="modal-body" style="background-color:#EFF0F1">
        <?php echo form_open('sales/saveService'); ?>
          <div class="row">
            <!-- =========== FORM DATOS DEL SERVICIO ============ -->
            <div class="col-md-12">
              <fieldset>
                <h5>Servicio</h5>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tipo_servicio">Servicio</label>
                    <input type="text" id="tipo_servicio" name="tipo_servicio" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Codigo</label>
                    <input type="text" id="codigo" name="codigo" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor">Cantidad</label>
                    <input type="text" id="cantidad" name="cantidad" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="valor_unitario">Valor Unit.</label>
                    <input type="text" id="valor_unitario" name="valor_unitario" class="form-control" name="">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="fee_agencia">Detalle</label>
                    <input type="text" id="detalle" name="detalle" class="form-control">
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
                    <input type="text" id="proveedor" name="proveedor" placeholder="Proveedor" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Tarifa Neta</label>
                    <input type="text" step="0.01" id="tarifa_neta" name="tarifa_neta" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_porcentaje">Com. %</label>
                    <input type="text" step="0.01" id="comi_proveedor_porcentaje" name="comi_proveedor_porcentaje" class="form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_fija">Com. Fija.</label>
                    <input type="text" step="0.01" id="comi_proveedor_fija" name="comi_proveedor_fija" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor">Fee Proveedor</label>
                    <input type="text" step="0.01" id="fee_proveedor" name="fee_proveedor" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor_conf">Fee x Conf.</label>
                    <input type="text" step="0.01" id="fee_proveedor_conf" name="fee_proveedor_conf" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_agencia">Fee Agencia</label>
                    <input type="text" step="0.01" id="fee_agencia" name="fee_agencia" onkeyup="sumar();" class="monto form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="impuesto">Impuestos</label>
                    <input type="text" step="0.01" id="impuesto" name="impuesto" onkeyup="sumar();" class="monto form-control" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo_add">Incen. Turifax:</label>
                    <input type="text" name="incentivo_add" id="incentivo_add" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="otros">Otros</label>
                    <input type="text" name="otros" id="otros" step="0.1" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="costo">Costo Total</label><br>
                    <input type="text" class="form-control" id="costo" name="costo" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo">Incentivo:</label>
                    <input type="text" name="incentivo" id="incentivo" onkeyup="sumar();" class="monto form-control" autocomplete="off" />
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
                      <label for="code_travel">Tarifa:</label>
                      <input type="text" id="tarifa_neta" name="tarifa_neta" class="form-control" onchange="return onKeyPressBlockChars(event,this.value);" onKeyUp="calculaPorcentajes(this.value)"  autocomplete="off"/>
              </div>
              <div class="col-md-1" class="form-group">
                      <label for="code_travel">QUUE:</label>
                      <input type="text" id="minumero2" class="form-control" onchange="SumarAutomatico(this.value);"  autocomplete="off"/>
              </div>
              <div class="col-md-2" class="form-group">
                      <label for="name_travel">Imp. Extranjero:</label>
                      <input type="text" id="minumero3" class="form-control" onchange="SumarAutomatico(this.value);"  autocomplete="off" />
              </div>
              <div class="col-md-1" class="form-group">
                      <label for="code_travel">Otros:</label>
                      <input type="text" name="travelid" id="travelid" class="form-control"  autocomplete="off" />
              </div>
              <div class="col-md-2" class="form-group">
                      <label for="total_servicios">Extento FEE:</label>
                      <input type="checkbox" name="total_servicios" id="total_servicios" name="height" />
              </div>
              <div class="col-md-2" class="form-group">
                      <label for="total_servicios">Inafecto:</label>                      
                      <input  id='bmm" + (i + 1) + "' rel='canvas" + (i + 1) + "' type='checkbox' class='squaredThreex fantasma hh' name='check' value='0'>
              </div>
              <div class="contentM" style="display:block" class="col-md-2" class="form-group">
                      <label for="porcent18">IGV:</label>
                      <input class="col-md-2" type="text" name="porcent18" id="porcent18" class="form-control"  autocomplete="off"/>
              </div>
          </div>

</dir>

<div class="target" >
<dir class="modal-header" >
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">CreditCard:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Serv.Esp:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">TUA:</label>
                            <input type="text" id="precio_no_tax" class="form-control" name="price_notax" size="5" onkeyup="calcular();">
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Otros:</label>
                                <select class="form-control" name="tax" id="tax" onchange="calcular();">
                                    <option value="0" selected>Ninguna</option>
                                    <option value="16">16</option>
                                    <option value="30">30</option>
                                </select>
                        </div>
                        <div class="col-md-1" class="form-group">
                            <label for="name_travel">FEE:</label>
                            <input type="text" class="form-control" name="total" value="" id="total" size="3">
                        </div>
                        <div class="col-md-1" class="form-group">
                            <label for="name_travel">IGV:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total FEE:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
</dir>
<dir class="modal-header" >
<h5 class="modal-title">Comision de la Agencia y el Vendedor</h5>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">% Agencia:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Igual a:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Over:</label>
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Igual a:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Inafecto:</label>
                            <input type="checkbox" name="total_servicios" id="total_servicios" name="height" />
                        </div>
</dir>
<dir class="modal-header" >
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Vendedor:</label>
                            <select class="form-control">
                                <option>Opcion1</option>
                                <option>Opcion1</option>
                                <option>Opcion1</option>
                            </select>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Incentivo:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="total_servicios">Incentivo Counter:</label>
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
</dir>
<dir class="modal-header" >
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">% Vendedor:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Igual a:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="total_servicios">F.Salida:</label>
                            <input type="date" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Hora:</label>
                            <input type="time" name="travelid" id="travelid" class="form-control"/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
</dir>
<dir class="modal-header" >
                        <div class="col-md-3" class="form-group">
                            <label for="code_travel">Nro. Vuelo:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Clase:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="total_servicios">F.Retorno:</label>
                            <input type="date" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Hora:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control"/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
</dir>
<dir class="modal-header" >
<h5 class="modal-title">Observaciones</h5>
                        <div class="form-group">
                            <label for="observaciones">Observ.:</label>
                      <textarea id="observaciones" name="observaciones" class="form-control" style="height: 50px;"></textarea>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="fec_doc_ref">F.Solicitada:</label>
                            <input type="date" name="fec_doc_ref" id="fec_doc_ref" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="mnt_tot">Monto:</label>
                            <input type="number" name="mnt_tot" id="mnt_tot" name="height" step="0.1" class="form-control"/>
                        </div>
</dir>
<dir class="modal-header" >
<h5 class="modal-title">Forma de Pago a la Aerolinea o Mayorista</h5>
                        <div class="col-md-3" class="form-group">
                            <label for="code_travel">Mode de Pago:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Contado:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Credito:</label>
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
</dir>
<dir class="modal-header" >
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Tarjeta:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="name_travel">Nro. Cheque:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
</dir>
<dir class="modal-header" >
<h5 class="modal-title">Estado del Boleto</h5>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">% Agencia:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                            <div class="col-md-2" class="form-group">
                            <label for="name_travel">Igual a:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Over:</label>
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Igual a:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Inafecto:</label>
                            <input type="checkbox" name="total_servicios" id="total_servicios" name="height" />
                        </div>
</dir>
</div> 
    <div class="modal-footer">
      <div class="form-group"></div>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
    </div>
          <?php echo form_close(); ?>
        </div>
    </div>
</div>


<!-- INICIO GENERAR EDITAR -->

<div id="modal_views" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php echo form_open('sales/ventas'); ?>
                        <h4 class="modal-title">Vista Venta: <span id="modal-title-coti"><?php echo $ref_id;?></span><span id="modal-coti"><?php echo "-V"?></span></h4><br>
                        <input type="hidden" name="ref_id" value="<?php echo $ref_id;?>">

            </div>
                  
        <div class="modal-header">
            <h5 class="modal-title">Datos del Cliente a facturar</h5>
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <input type="hidden" name="data" id="data">
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
                        <input type="number" name="nro_doc_rct" id="nro_doc_rct" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Apellido / Nombre:</label>
                        <input type="text" id="name" name="name" placeholder="Nombre del Cliente" class="form-control" autocomplete="off" />
                    </div><br><br><br><br>
                    <div class="col-md-6">
                        <label for="dir_des_rct">Direccion:</label>
                        <input type="text" name="dir_des_rct" id="dir_des_rct" class="form-control" autocomplete="off"/>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" autocomplete="off"/>
                    </div>
        </div>

        <div class="modal-header" style="background-color:#EFF0F1">
            <h5 class="modal-title">Detalle del Servicio</h5>
            <div class="">
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <br>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
                    <div class="col-md-4" class="form-group">
                        <label for="tipo_servicio">Servicio:</label>
                    <select id="tipo_servicio" name="tipo_servicio" class="form-control">
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
                        <input type="text" id="codigo" name="codigo" placeholder="Codigo" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="cantidad">Cant.:</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="valor_unitario">Valor Vta.:</label>
                        <input type="number" name="valor_unitario" id="valor_unitario" class="form-control"
                            step="0.01" placeholder="0,00" autocomplete="off" />
                    </div>
                    <br><br><br><br>
                    <div class="col-md-8" class="form-group">
                        <label for="detalle">Detalle:</label>
                        <input type="text" name="detalle" id="detalle" class="form-control" placeholder="Descripcion" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalDetail();"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarDetalles();"><i class='fa fa-angle-double-up'></i></button>  
                    </div>                    
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_factura_edit" class="btn btn-primary" value="Agregar"/>
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
                    <input type="text" id="proveedor" name="proveedor" placeholder="Proveedor" class="form-control" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Tarifa Neta</label>
                    <input type="text" step="0.01" id="tarifa_neta" name="tarifa_neta" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_porcentaje">Com. %</label>
                    <input type="text" step="0.01" id="comi_proveedor_porcentaje" name="comi_proveedor_porcentaje" class="form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor_fija">Com. Fija.</label>
                    <input type="text" step="0.01" id="comi_proveedor_fija" name="comi_proveedor_fija" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor">Fee Proveedor</label>
                    <input type="text" step="0.01" id="fee_proveedor" name="fee_proveedor" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor_conf">Fee x Conf.</label>
                    <input type="text" step="0.01" id="fee_proveedor_conf" name="fee_proveedor_conf" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_agencia">Fee Agencia</label>
                    <input type="text" step="0.01" id="fee_agencia" name="fee_agencia" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="impuesto">Impuestos</label>
                    <input type="text" step="0.01" id="impuesto" name="impuesto" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off" >
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo_add">Incen. Turifax:</label>
                    <input type="text" name="incentivo_add" id="incentivo_add" step="0.1" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off" />
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="otros">Otros</label>
                    <input type="text" name="otros" id="otros" step="0.1" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off" />
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="costo_edit">Costo Total</label><br>
                    <span class="form-control" name="costo_edit" id="costo_edit" readonly="true"></span>
                  </div>  
                </div>
                <div class="col-md-2" class="form-group">
                    <label for="incentivo">Incentivo:</label>
                    <input type="text" name="incentivo" id="incentivo" onkeyup="calcular();" class="monto_edit form-control" autocomplete="off" />
                </div>
              </fieldset>
            </div>

            <div class="col-md-12">
              <fieldset>
                <h5>Observaciones</h5>
                <div class="form-group">
                  <textarea id="descripcion" class="form-control" style="height: 50px;"></textarea>
                </div>
              </fieldset>
            </div>
            <!-- ===================================== -->
                        
                

                    </div>

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
  <input name="monto_pagar" id="monto_pagar" class="form-control" placeholder="Total" readonly="true" type="hidden">

        <div class="modal-header" style="background-color:#FFFFFF">
            <h5 class="modal-title">Condicion de Pago</h5>
            <div class="">
                <?php echo form_open('sales/ventas',array('id'=>'employee_form')); ?>
                    <br>
                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
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
                                <option value="ASIGNADO">NO ASIGNADO</option>
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
                        <input type="number" name="total" id="total" class="form-control"
                            step="0.01" placeholder="0,00"/>
                    </div>
                    <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <button type="button" class="btn btn-primary" onclick="sales.openModalPago();"><i class='fa fa-angle-double-down'></i></button>
                        <label for="code_travel">&nbsp;</label>
                        <button type="button" class="btn btn-primary" onclick="sales.guardarPago();"><i class='fa fa-angle-double-up'></i></button>  
                    </div> 
                                        <div class="col-md-2">
                        <label for="code_travel">&nbsp;</label><br>
                        <input type="button" id="btn_save_pay_edit" class="btn btn-primary" value="Agregar"/>
                    </div>
                    <div class="col-md-12 content_service_pago" class="form-group" style="display:none;">

                    <br>
                    <div class="col-md-3" class="form-group">
                        <label for="banco">Banco</label>
                             <input type="text" name="banco" id="banco" class="form-control">
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
                        <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Numero"/>
                    </div>
                    <div class="col-md-2" class="form-group">
                        <label for="fecha_exp">Fecha Exp.</label>
                        <input type="text" name="fecha_exp" id="fecha_exp" class="form-control" placeholder="MM/AAAA"/>
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
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
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



<script>
function onKeyPressBlockChars(e,numero){                
    var key = window.event ? e.keyCode : e.which;
    var keychar = String.fromCharCode(key);
    reg = /\d|\./;
    if (numero.indexOf(".")!=-1 && keychar=="."){
        return false;
    }else{
        return reg.test(keychar);
    }               
}
function calculaPorcentajes(numero){
    document.getElementById("porcent18").value=Math.floor(numero*18)/100;
}

$(document).ready(function(){
 $('.fantasma').click(function(){
  if($(this).is(':checked')){
   $('.contentM').css('display', 'none');
  }else{
   $('.contentM').css('display', 'block');
  }
 });
});
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $(".error_comision").hide();
        sales.setTravelCode();
        //dibujar buscador
        $('#buscador').html('<div class="col-md-6" ></div><div class="col-md-6" class="form-group"><form id="form_travel_search" action="index.php/travel/suggest" class="form-inline"><label for="search_value"><i style="color:#337ab7" class="fa fa-search"></i>&nbsp;</label><input placeholder="Buscar Cliente..." type="text" class="form-control" id="search_value" onkeyup="travel.suggest(this);" style="width: 380px;" list="list_travel_search" autocomplete="off"/><datalist id="list_travel_search"></datalist></form></div>');
        //fin dibujar buscador
        $("#search_value").on('input', function () {
           sales.setCustomerFilter();
        });
        $("#btn_save_com").click(function(){
            sales.addComision();
        });
        $(".btn_success").click(function(){
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

        $('form input').on('keypress', function(e) {
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

        $('#btn_nuevo_cliente2').click(function(){
            $('#modal_cotizacion').modal('show');
        });


        sales.current_url = "<?= base_url();?>";
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
                        $('#modal_agregar').modal('show');
                    });
                });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        sales.current_url = "<?= base_url(); ?>";
        $("#btn_save_factura").click(function(){
            //travel.addServicio();
            sales.addServiceDoc();
        });
        $("#btn_save_factura_edit").click(function(){
            //travel.addServicio();
            sales.addServiceDoc();
        });
        $("#btn_save_pay").click(function(){
            //travel.addServicio();
            sales.saveCustomerPay();
        });
        $("#btn_save_pay_edit").click(function(){
            //travel.addServicio();
            sales.saveCustomerPay();
        });
        $("#btn_save_description_detail").click(function(){
            sales.guardarDetalles();
        });
    });
</script>

<script type="text/javascript">
    function sumar() {
  var total = 0;
  $(".monto").each(function() {

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
  $(".monto_edit").each(function() {

    if (isNaN(parseFloat($(this).val()))) {
      total += 0;
    } else {
      total += parseFloat($(this).val());
    }
  });
  //alert(total);
  document.getElementById('costo_edit').innerHTML = total;
}
</script>

