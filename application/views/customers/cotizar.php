<?php $this->load->view("partial/header"); ?>

<script src="<?php echo base_url();?>js/lib/travel.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
                <?php
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; //posibles caracteres a usar
                    $numerodeletras=4; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                            for($i=0;$i<$numerodeletras;$i++) {
                                        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                                    }
                    $fecha = date("dm");
                    $estatus = "C";
                    $asesor_id = $this->lang->lin.strtoupper("$user_info->person_id");
                    $asesor = $this->lang->lin.strtoupper("$user_info->first_name");
                    $cotizacion_id = $asesor."-".$cadena."-".$fecha;
                ?>

        <h4 class="modal-title">Cotizacion Nro: <span id="modal-title-coti"><?php echo $cotizacion_id."-".$estatus; ?></span></h4>
        </div>
    </div>
</div>
<hr/>
<div class="row">
        <div class="col-md-12">
                <fieldset>
                    <legend>Datos del Cliente</legend>
                </fieldset>
    <?php if (isset($datos)): ?>
            <form role="form" id="datos_cotizacion">
                <div class="col-md-2" class="form-group">
                    <label>Nro. de Identificacion</label>

                    <?php 
                   

                  //      print_r($datos);
                     ?>
                    <input type="text" id="customer_documents" name="customer_document" value="<?php echo $datos["documents"] //echo $datos['person_id']; ?>" class="form-control" disabled/>
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Nombres y Apellidos</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo $datos['firstname']; ?> <?php echo $datos['middlename']; ?> <?php echo $datos['lastname']; ?> <?php echo $datos['mother_lastname']; ?>" class="form-control" disabled/>
                </div>
                <div class="col-md-4" class="form-group">
                    <label>Email</label>
                    <input id="emails" name="emails" class="form-control" value="<?php echo $datos['emails']; ?>" disabled/>
                </div>
                <div class="col-md-2" class="form-group">
                    <label>Telefono</label>
                    <input id="phones" name="phones" class="form-control" value="<?php echo $datos['phones']; ?>" disabled="true">
                </div><br>
                <div class="col-md-12">
                     <label>Observaciones</label>
                        <div class="form-group">
                           <input disabled id="description" name="description" class="form-control" style="height: 90px;" value="<?php echo $datos['description'];?>" >
                        </div>
                </div>
            </form>
    <?php else: echo 'La entrada no existe.'; endif; ?>
        </div>
</div>
<hr/>



<div class="row">
    <div class="col-md-12">
        <?php echo form_open('travel/cotizaciones'); ?>
            <input type="hidden" name="cotizacion_id" id="cotizacion_id" value="<?php echo $cotizacion_id ?>">
            <input type="hidden" name="estatus" id="estatus" value="<?php echo $estatus ?>">
            <input type="hidden" name="asesor" id="asesor" value="<?php echo $asesor_id ?>">
            <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $datos['person_id']; ?>" />
            <fieldset>
                <legend>Registro de Servicios</legend>
                  <div class="col-md-3">
                    <select id="cbo_comision_payment" name="cbo_comision_payment" class="form-control">
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
                <div class="">
                   <input type="number" id="amount_travel" name="amount_travel" class="form-control" value="0" style="display: none"/>
                </div>
                  <div class="col-md-2" class="form-group">
                    <input type="button" id="btn_save_com" class="btn btn-primary" value="Agregar Servicio" />
                  </div>
                    
            <script language="javascript" type="text/javascript">
                // function popitup(url) {
                //     newwindow=window.open(url,'name','height=200,width=400');
                //     if (window.focus) {newwindow.focus()}
                //     return false;
                // }
            </script>


            <div class="col-md-6" align="center"> 
                <a class="btn btn-primary" href="javascript:void(0)" onClick="email=window.open('http://34.203.202.3/pruebamail?id=<?php echo $cotizacion_id;?>','buscador','scrollbars=yes,width=680,h eight=500'); return false;">Enviar Correo</a>
                <a class="a.active.botonete" href="javascript:void(0)" onClick="email.close()"></a>
            </div> 

            <button type="button" value="Abrir modal éxito" name="registrar" id="btnExito" class="btn btn-primary">Guardar</button>


            <div class="modal fade" id="modal_exito" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Se ha generado Nueva cotizacion</h3>
                            <dir class="form-group">
                                <button id="btn_add_coti" type="button" class="btn btn-primary">Siguiente</button>                    
                                <a class="btn btn-primary" href="javascript:void(0)" onClick="email=window.open('http://34.203.202.3/pruebamail?id=<?php echo $cotizacion_id;?>','buscador','scrollbars=yes,width=680,h eight=500'); return false;">Enviar Correo</a>
                                <a class="a.active.botonete" href="javascript:void(0)" onClick="email.close()"></a>
                                <a type="button" href="http://localhost/pdf/pdf.php?id=<?php echo $cotizacion_id;?>" class="btn btn-primary">Imprimir</a> 
                            </dir>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>

            <script language="JavaScript">
                $(function() {
                    $("#btnExito").click(function(){        
                        //$('#modal_exito').modal('show');
                        if(travel.list_comision.length > 0){
                            travel.saveAddCotizacion();
                        }
                    });
                    $("#btnFalla").click(function(){        
                        $('#modal_falla').modal('show');
                    });
                    $("#btn_add_coti").click(function(){
                        // if(travel.list_comision.length > 0){
                        //     travel.saveAddCotizacion();
                        // }
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
                        <td>
                            <span id="total_pago" class="pull-right">
                            </span>
                        </td>
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
                    </div>
                        <div class="col-md-5" class="form-group">
                        <label for="name_travel">Codigo:</label>
                        <input type="text" name="name_travel" id="name_travel" class="form-control" />
                    </div>
                    <div class="col-md-4" class="form-group">
                        <label for="total_servicios">Monto:</label>
                        <input type="number" name="total_servicios" id="total_servicios" name="height" step="0.1" class="form-control"/>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <legend>&nbsp;</legend>
                            <div class="form-group">
                                <textarea id="descripcion" class="form-control" style="height: 250px;"></textarea>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-3">
                        <select id="cbo_comision_payment_children" name="cbo_comision_payment_children" class="form-control">
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
                    <div class="col-md-3">
                        <input type="text" name="cbo_code_comision_payment_children" id="cbo_code_comision_payment_children" class="form-control"
                            placeholder="Ingresar código"/>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="cbo_amount_comision_payment_children" id="cbo_amount_comision_payment_children" class="form-control"
                            step="0.1" placeholder="Ingresar monto"/>
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="btn_save_com_children" class="btn btn-primary" value="Agregar Sub-Servicio"/>
                    </div>
                    <br/><br/><br/>
                    <div class="col-md-12">
                        <table id="table_customer_travel_children" class="table table-hover table-bordered" >
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
                                    <td colspan=2>
                                        <span class="pull-right">MONTO TOTAL</span>
                                    </td>
                                    <td>
                                        <span id="total_pago_children" class="pull-right"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php echo form_close(); ?>
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

<!-- MODAL DE CONFIRMACIÓN -->
<div id="modal_error" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
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

<?php $this->load->view("travel/modal"); ?>
<!-- ====================== -->
<script type="text/javascript">
    $(document).ready(function(){

        travel.current_url = "<?= base_url(); ?>";

        $(".error_comision").hide();
        travel.setTravelCode();
        
        $("#search_value").on('input', function () {
           travel.setCustomerFilter();
        });

        $("#btn_save_com").click(function(){
            travel.addComision();
        });

        $("#btn_save_com_children").click(function(){
            travel.addComisionChildren();
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
















