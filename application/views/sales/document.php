<?php $this->load->view("partial/header"); ?>

<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

 <?php echo $data; ?> 
 
<script type="text/javascript">
/* Funcion suma. */
function SumarAutomatico (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
    TotalSuma = document.getElementById('MiTotal').innerHTML;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable genrando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en una etiqueta "span".
    document.getElementById('MiTotal').innerHTML = TotalSuma;
}
function calcular() {
    var precio=  parseFloat( document.getElementById("precio_no_tax").value);   
    var tax = parseFloat( document.getElementById("tax").value);            
    var total = document.getElementById("total").value = precio*tax*0.01 + precio;              
}  

</script>



<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
        <h4 class="modal-title">Cotizacion Nro: <?php echo $cotizacion_id."-".$estatus."-".$datos['firstname']." ".$datos['middlename']." ".$datos['lastname']." ".$datos['mother_lastname']; ?></h4>
        </div>
    </div>
</div>
<hr/>


                    <input type="hidden" id="customer_documents" name="customer_document" value="<?php echo $datos['person_id']; ?>" class="form-control" disabled />
                    <input type="hidden" id="customer_name" name="customer_name" value="<?php echo $datos['firstname']; ?> <?php echo $datos['middlename']; ?> <?php echo $datos['lastname']; ?> <?php echo $datos['mother_lastname']; ?>" class="form-control" disabled/>
                    <input type="hidden" id="emails" name="emails" class="form-control" value="<?php echo $datos['emails']; ?>" disabled/>
                    <input type="hidden" id="phones" name="phones" class="form-control" value="<?php echo $datos['phones']; ?>" disabled="true">





<div class="row">
    <div class="col-md-12">
        <?php echo form_open('travel/cotizaciones'); ?>
            <input type="hidden" name="cotizacion_id" id="cotizacion_id" value="<?php echo $cotizacion_id ?>">
            <input type="hidden" name="estatus" id="estatus" value="<?php echo $estatus ?>">
            <input type="hidden" name="asesor" id="asesor" value="<?php echo $asesor_id ?>">
            <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $datos['person_id']; ?>" />
            <fieldset>
                <legend>Servicios Registrados</legend>
                  <div class="col-md-3">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
                        <option value="">Seleccionar Tipo de Documento</option>
                        <option value="ticket">Documento de Cobranza</option>
                        <option value="factura">Factura</option>
                        <option value="boleta">Boleta</option>
                    </select>
                  </div>
                   


            <button type="button" value="Abrir modal éxito" name="registrar" id="btnExito" class="btn btn-primary">Generar</button>


<div id="modal_ticket" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informacion del Documento - Cotizacion Nro: <?php echo $cotizacion_id ?>-<?php echo "$estatus" ?></h4>
            </div>
<dir class="modal-header" >
<h5 class="modal-title">Datos Financieros del Boleto</h5>
<div class="main">
    <div class="col-md-1" class="form-group">
            <label for="code_travel">Tarifa:</label>
            <input type="text" id="minumero1" onchange="SumarAutomatico(this.value);" class="form-control"/>
    </div>
    <div class="col-md-2" class="form-group">
            <label for="code_travel">QUUE:</label>
            <input type="text" id="minumero2" onchange="SumarAutomatico(this.value);" class="form-control"/>
    </div>
    <div class="col-md-2" class="form-group">
            <label for="name_travel">Imp. Extranjero :</label>
            <input type="text" id="minumero3" onchange="SumarAutomatico(this.value);" class="form-control" />
    </div>
    <div class="col-md-1" class="form-group">
                            <label for="code_travel">Otros:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">IGV:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Extento FEE:</label>
                            <input type="checkbox" name="total_servicios" id="total_servicios" name="height" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Inafecto:</label>
                            <input type="checkbox" name="total_servicios" id="total_servicios" name="height" />
                        </div>
                        <br/ >
<span>Total FEE: </span> <span id="MiTotal"></span>
<span>TOTAL: </span> <span id="Total"></span>
</div>

</dir>

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
                        <div class="col-md-2" class="form-group">
                            <label for="code_travel">Observ.:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                            <div class="col-md-2" class="form-group">
                            <label for="name_travel">F.Solicitada:</label>
                            <input type="date" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="total_servicios">Monto:</label>
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
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

                    <div class="modal-footer">
                        <div class="form-group">
                            <button id="add_info_service" type="button" class="btn btn-primary">Aceptar</button> 
                            <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <script language="JavaScript">
                $(function() {
                    $("#btnExito").click(function(){        
                        $('#modal_ticket').modal('show');
                    });
                    $("#btnFalla").click(function(){        
                        $('#modal_falla').modal('show');
                    });
                });
            </script>
            </fieldset>
            <div class="alert alert-danger alert-dismissible error_comision"></div>
        <?php echo form_close(); ?>
    </div>

    <div class="col-md-12">
        <br/>
        <form>
            <table id="table_customer_travel" class="table table-hover table-bordered" >
                <thead>
                    <tr>
                        <th class="col-md-1"><center>Nro.</center></th>
                        <th class="col-md-4"><center>Servicios</center></th>
                        <th class="col-md-4"><center>Codigo</center></th>
                        <th class="col-md-2"><center>Monto</center></th> 
                        <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">
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
                        <td colspan=2><span class="pull-right">MONTO TOTAL</span></td>
                        <td><span class="pull-right"><?php echo number_format($sumador_total,2);?></span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
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


<div id="modal_detail_comision" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informacion del Servicio - Cotizacion Nro: <?php echo $cotizacion_id ?>-<?php echo "$estatus" ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('travel/updateDetailComision',array('id'=>'form_travel_comision_update')); ?>
                    <br/>
                        <div class="col-md-3" class="form-group">
                            <label for="code_travel">Servicio:</label>
                            <input type="text" name="travelid" id="travelid" class="form-control" disabled/>
                            <!-- value="<?php //echo $travelid ?>" -->
                        </div>
                            <div class="col-md-5" class="form-group">
                            <label for="name_travel">Codigo:</label>
                            <input type="text" name="name_travel" id="name_travel" class="form-control" />
                        </div>
                            <div class="col-md-4" class="form-group">
                            <label for="total_servicios">Monto:</label>
                            <!--
                            <input type="text" id="total_servicios" name="total_servicios" class="form-control" />
                            -->
                            <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                        </div>


                    <!-- =========== FORM ADDRESS ============ -->
                    <div class="col-md-12">
                    <fieldset>
                        <legend>&nbsp;</legend>
                        <div class="form-group">
                        <textarea id="descripcion" class="form-control" style="height: 250px;"></textarea>
                        </div>
                    </fieldset>
                    </div>
                    <!-- ===================================== -->

                    <!--
                    <div class="form-group">
                        <input type="file" name="">
                    </div>
                    -->
                    <?php echo form_close(); ?>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button id="add_info_service" type="button" class="btn btn-primary">Aceptar</button> 
                            <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



 




<?php $this->load->view("travel/modal"); ?>
<!-- ====================== -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".error_comision").hide();
        travel.setTravelCode();
        $("#search_value").on('input', function () {
           travel.setCustomerFilter();
        });
        $("#btn_save_com").click(function(){
            travel.addComision();
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
            travel.saveInfoTablas();
        });

        $('#showLastTravel').hide();

        $('form input').on('keypress', function(e) {
            return e.which !== 13;
        });

        $('#div_penalidad').hide();
        $('#div_feepenalidad').hide();

        travel.saveCustomer();
        //travel.addComision('fee');
        travel.validateFormTravel();
        travel.validateFormUpdateComision();
        travel.formCotizacion();
        travel.getViajes();

        $('#btn_nuevo_cliente2').click(function(){
            $('#modal_cotizacion').modal('show');
        });

        /* BOTON DE AGREGADO DE DIRECCIONES */
        if(document.getElementById("btn_add_customer_travel") !== null){
            const btn_add_customer_travel = document.getElementById("btn_add_customer_travel");
            btn_add_customer_travel.addEventListener("click" ,() => {
                travel.saveCustomerAddress();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_passport") !== null){
            const btn_add_customer_passport = document.getElementById("btn_add_customer_passport");
            btn_add_customer_passport.addEventListener("click" ,() => {
                travel.saveCustomerPassport();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_card") !== null){
            const btn_add_customer_card = document.getElementById("btn_add_customer_card");
            btn_add_customer_card.addEventListener("click" ,() => {
                travel.saveCustomerCard();
            });
        }

        /* BOTON DE AGREGADO DE PASAPORTES */
        if(document.getElementById("btn_add_customer_company") !== null){
            const btn_add_customer_company = document.getElementById("btn_add_customer_company");
            btn_add_customer_company.addEventListener("click" ,() => {
                travel.saveCustomerCompany();
            });
        }

        if(document.getElementById("add_info_service") !== null){
            const add_info_service = document.getElementById("add_info_service");
            add_info_service.addEventListener("click" ,() => {
                travel.saveInfoService();
            });
        }

        function imprimir_cotizacion(){
            VentanaCentrada('./pdf/documentos/ver_factura.php?id_factura='+id_cotizacion,'Factura','','1024','768','true');
        }


    });

</script>
<?php $this->load->view("partial/footer"); ?>
















