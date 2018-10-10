<?php $this->load->view("partial/header"); ?>

<!-- ================================ INICIO MODAL GENERAR ======================================= -->

<div id="modal_ticket" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informacion del Documento - Cotizacion Nro: <?php echo $cotizacion_cod ?>-<?php echo $estatus ?></h4>
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

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h4 class="modal-title">Venta Nro: <?php echo $cotizacion_cod . "-" . $estatus; ?></h4>
        </div> 
        <button type="button" value="factura" name="registrar" id="factura" class="btn btn-primary pull-right">Emitir Documento</button>
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
            padding: 0 4px 0 4px;
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        #menu li a{ color: #fff; }

        #menu .active{
            background-color: #ccc;
            border-bottom: none;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        #menu .active a{ 
            color: #000; 
            background-color: #ccc;
            border: 1px solid #ccc;
        }

        #menu li:hover{
            background-color: #ccc;
            border-bottom: none;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        #menu a:hover{ 
            color: #000; 
            background-color: #ccc;
            border: 1px solid #ccc;
        }
        #menu .rest{
            width: 105px;
            border-right: none;
        }
    </style>
    <div id="message">
    </div>
    <div id="content">
        <ul id="menu"  class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Boletos" aria-controls="Boletos" role="tab" data-toggle="tab">Boletos</a></li>
            <li role="presentation" ><a href="#Hotel" aria-controls="Hotel" role="tab" data-toggle="tab">Hotel</a></li>
            <li role="presentation" ><a href="#Autos" aria-controls="Autos" role="tab" data-toggle="tab">Autos</a></li>
            <li role="presentation" ><a href="#Tarjetas" aria-controls="Tarjetas" role="tab" data-toggle="tab">Tarjetas de Asistencia</a></li>
            <li role="presentation" ><a href="#Paquetes" aria-controls="Paquetes" role="tab" data-toggle="tab">Paquetes</a></li>
            <li role="presentation" ><a href="#Excursiones" aria-controls="Excursiones" role="tab" data-toggle="tab">Excursiones</a></li>
            <li role="presentation" ><a href="#Entradas" aria-controls="Entradas" role="tab" data-toggle="tab">Entradas</a></li>
            <li role="presentation" ><a href="#Trenes" aria-controls="Trenes" role="tab" data-toggle="tab">Trenes</a></li>
            <li role="presentation" ><a href="#Cruceros" aria-controls="Cruceros" role="tab" data-toggle="tab">Cruceros</a></li>
            <li role="presentation" ><a href="#Otros" aria-controls="Otros" role="tab" data-toggle="tab">Gastos Adminsitrativos/ Otros</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class=" tab-pane fade in active" id="Boletos" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Hotel" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Autos" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Tarjetas" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Paquetes" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Excursiones" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Entradas" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Trenes" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Cruceros" >
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
            <div role="tabpanel" class=" tab-pane fade  active" id="Otros" >
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
                            <input type="text" id="cliente" value="" class="form-control"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                        </div>
                        <div class="col-md-3" class="form-group">
                            <label for="name_travel">RUC / DNI:</label>
                            <input type="text" id="minumero3" onchange="SumarAutomatico(this.value);" class="form-control" 
                                   value=""/>
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
                        <input type="text" id="campoadicional1" value="" placeholder="Campo Adicional 1" class="form-control"/>
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
                        <input type="text" id="campoaadicional2" value="" placeholder="Campo Adicional 2" class="form-control"/>
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
                            <!-- value="<?php //echo $travelid                   ?>" -->
                        </div>
                    </dir>


                </form>


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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <form id="formGenerarDocumento">
                        <input type="hidden" id="sale_id" value="<?php echo $cotizacion_id ?>">
                        <input type="hidden" id="sale_cod" value="<?php echo $cotizacion_cod ?>">
                        <input type="hidden" id="data" value="">
                        <h4 class="modal-title">Nro Control: <span id="modal-title-coti"><?php echo $cotizacion_cod; ?></span><span id="modal-coti"><?php echo "-V" ?></span></h4></br>
                        <input type="hidden" id="ref_id_base" value="<?php echo $cotizacion_cod; ?>">
                        <input type="hidden" name="ref_id" id="ref_id" value="<?php echo $cotizacion_cod; ?>">
                        <div class="col-md-3" class="form-group">
                            <select required id="cod_tip_ope" name="cod_tip_ope" class="form-control">
                                <option value="">Tipo de Operacion</option>
                                <option name="cod_tip_ope" value="0101" >Venta Interna</option>
                                <option name="cod_tip_ope" value="0102" >Venta Interna - Anticipos</option>
                                <option name="cod_tip_ope" value="0103" >Venta Interna - Deduccion Anticipos</option>
                                <!--<option name="cod_tip_ope" value="0104" >Venta Itinerante</option>-->
                                <option name="cod_tip_ope" value="0200" >Exportacion de B/E</option>
                            </select>
                           <!--     <input type="text" name="num_corre_cpe_ref" id="num_corre_cpe_ref" class="form-control" placeholder="Nro. Correlativo" style="color:red;" > -->
                        </div>



                        <div class="col-md-3">
                            <select name="cod_tip_otr_doc_ref" placeholder="Tipo de Documento" class="form-control" id='sel_user' required >
                                <option value=''>Seleccione...</option>
                                <option value='01'>Factura</option>
                                <option value='03'>Boleta de Venta</option>
                                <option value='07'>Nota de Credito</option>
                                <option value='08'>Nota de Debito</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" name="serie" id="serie" class="form-control" readonly="true"/>
                            <select required id="sserie" name="sserie" class="form-control">
                                <option value="">Serie</option>
                                <option  name="serie" value="F001" class="Factura h1">F001</option>
                                <option  name="serie" value="B001" class="Factura h2">B001</option>
                                <option  name="serie" value="NC" class="Factura h3">NC</option>
                                <option  name="serie" value="ND" class="Factura h4">ND</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="num_corre_cpe_ref" id="snum_corre_cpe_ref" class="form-control" readonly="true" style="color:red; text-align:center"/>
                        </div>

                        <div class="col-md-2">
                            <select required id="cod_tip_moneda" name="cod_tip_moneda" class="form-control">
                                <option value="">Moneda</option>
                                <option value="PEN">Soles S/</option>
                                <option value="USD">Dolares Us$</option>
                            </select>
                        </div>

                        <dir class="modal-header" >
                            <h5 class="modal-title">Datos del Cliente</h5>
                            <div class="main">
                                <div class="col-md-3" class="form-group">                        
                                    <label for="code_travel">Documento de Identidad:</label>
                                    <select name="tip_doc_rct" id="tip_doc_rct" class="form-control" required>
                                        <option name="0" value="0">DOC.TRIB.NO.DOM.SIN.RUC</option>
                                        <option name="1" value="1">D.N.I.</option>
                                        <option name="4" value="4">CARNET DE EXTRANJERIA</option>    
                                        <option name="6" value="6">R.U.C.</option>
                                        <option name="7" value="7">PASAPORTE</option>
                                        <option name="A" value="A">CED. DIPLOMATICA DE IDENTIDAD</option>
                                        <option name="B" value="B">DOC.IDENT.PAIS.RESIDENCIA-NO.D</option>
                                        <option name="C" value="C">Tax Identification Number - TIN – Doc Trib PP.NN</option>
                                        <option name="D" value="D">Identification Number - IN – Doc Trib PP. JJ</option>
                                    </select>
                                </div>
                                <div class="col-md-3" class="form-group">
                                    <label for="nro_doc_rct">Nro de Identidad:</label>
                                    <input required type="text" id="nro_doc_rct" name="nro_doc_rct" value="<?php echo $datos['documents']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-6" class="form-group">
                                    <label for="name">Cliente:</label>
                                    <input required type="text" id="name" name="name" value="<?php echo $name_client; ?>" class="form-control"/>
                                </div>

                            </div><br></br>
                            <div class="col-md-8" class="form-group"><br>
                                <input required type="text" placeholder="Direccion" name="dir_des_rct" id="dir_des_rct" class="form-control" />
                            </div>
                            <div class="col-md-4" class="form-group"><br>
                                <input required type="email" placeholder="Correo Electronico" id="email" name="email" value="<?php echo $datos['emails']; ?>" class="form-control"/>
                            </div>
                        </dir>
                        <div class=""  style="background-color:#EFF0F1">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalle del Servicio</h5>
                                <div class="">
                                    <br/>
                                    <input type="hidden" name="detalle_servicio_json" id="detalle_servicio_json">
                                    <div class="col-md-11" class="form-group">
                                        <label for="code_travel">Detalle:</label>
                                        <input type="text" name="detalle_servicio" id="detalle_servicio" class="form-control" placeholder="Descripcion"/>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="code_travel">&nbsp;</label><br>
                                        <button type="button" class="btn btn-primary" onclick="ysumma.saleDocument.openModalDetail();">+</button>
                                    </div>

                                    <div class="col-md-10 content_service_detail" class="form-group" style="display:none;">
                                        <br/>
                                        <textarea name="detalle_servicio_modal" id="detalle_servicio_modal" class="form-control" placeholder="Descripcion">
                                        </textarea>
                                        <br/>
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
                                            <option value="21">Exonerado - Transferencia Gratuita</option>
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
                                    <div class="col-md-2 " >
                                        <br/>
                                        <button type="button" class="btn btn-primary" onclick="ysumma.saleDocument.addServiceDoc();">  
                                            Guardar
                                        </button>   
                                        <br/>
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
                        </div>

                        <br>

                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Exonerada</label>                            
                        <!--     <p><span id="mnt_tot_exr"></span></p>  -->
                            <input type="number" value="0.00" id="mnt_tot_exr" step="0.01" name="mnt_tot_exr" placeholder="0,00" class="form-control" readonly="true"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Inafecto</label>
                        <!--     <p><span id="mnt_tot_inf"></span></p>  -->
                            <input type="number" value="0.00" name="mnt_tot_inf" step="0.01" id="mnt_tot_inf" class="form-control" placeholder="0,00" readonly="true"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Exportacion</label>
                    <!--     <p><span id="mnt_tot_exp"></span></p>  -->
                            <input type="number" value="0.00" name="mnt_tot_exp" step="0.01" id="mnt_tot_exp" class="form-control" placeholder="0,00" readonly="true"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Gravada</label>
                        <!--     <p><span id="mnt_tot_grv"></span></p>  -->
                            <input type="number" value="0.00" id="mnt_tot_grv" step="0.01" name="mnt_tot_grv" placeholder="0,00" class="form-control" readonly="true"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Gratuita</label>
                    <!--     <p><span id="mnt_tot_grt"></span></p>  -->
                            <input type="number" value="0.00" id="mnt_tot_grt" step="0.01" name="mnt_tot_grt" placeholder="0,00" class="form-control" readonly="true"/>
                        </div>
                        <div class="col-md-2" class="form-group">
                            <label for="name_travel">Total IGV</label>
                    <!--     <p><span id="mnt_tot_imp"></span></p>  -->
                            <input type="number" value="0.00" name="mnt_tot_imp" step="0.01" id="mnt_tot_imp" class="form-control" placeholder="0,00" readonly="true"/>
                        </div>
                        <br></br><br></br>

                        <div class="col-md-3" class="form-group">
                            <label for="name_travel">Detraccion:</label>
                            <input name="pago1" type="radio" value="Ventanilla"/>
                            <span class="auto-style4">No</span>
                            <input checked="checked" name="pago1" type="radio" value="Deposito"/>
                            <span class="auto-style4">Si</span>
                            <div id="div1" >
                                <select name="segundo" id="segundo" class="form-control" >
                                    <option value=''>Seleccione...</option>
                                    <option value='10.00'>10.00 %</option>
                                    <option value='4.00'>4.00 %</option>
                                    <option value='12.00'>12.00 %</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" class="form-group">
                            <label for="form_pago">Tipo de Pago:</label>
                            <select required name="tipo_pago" class="form-control">
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
                        <div class="col-md-3" class="form-group">
                            <label for="form_pago">Forma:</label>
                            <select required name="form_pago" class="form-control">
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
                        <div class="col-md-3" class="form-group">
                            <label for="name_travel">TOTAL:</label>
                    <!--     <p><span id="mnt_tot"></span></p> -->
                            <input type="number" value="0.00" name="mnt_tot" step="0.01" id="mnt_tot" class="form-control" placeholder="Total" readonly="true"/>
                        </div><br><br>
                        </br><br>
                        <!---------------------FORMA DE PAGO GENERAR FACTURA------------------------>

                        <div class="col-md-2" class="form-group">
                            <!--   <label for="banco_pago">Banco:</label> -->
                            <input type="hidden" name="banco_pago" value="0.00" id="banco_pago" class="form-control" placeholder="Banco">
                        </div>
                        <div class="col-md-2" class="form-group">
                            <!--    <label for="nro_pago">Nro:</label> -->
                            <input type="hidden" name="nro_pago" id="nro_pago" class="form-control" placeholder="Nro.">
                        </div>
                        <div class="col-md-1" class="form-group">
                            <!--     <label for="mnt_tot_pago">Monto:</label> -->
                            <input type="hidden" step="0.1" name="mnt_tot_pago" value="0.00" id="mnt_tot_pago" class="form-control" placeholder="Monto" onChange="calculo();">
                        </div>

                        <dir class="col-md-9"></dir>
                        <div class="col-md-3" class="form-group">
                            <!--    <label for="name_travel">TOTAL:</label>  -->
                            <input type="hidden" name="total3" class="form-control" value="0.00" placeholder="Total">
                        </div>

                        <dir class="modal-header"><br>
                            <h5 class="modal-title">Observaciones</h5>
                            <div class="col-md-12" class="form-group">
                                <input type="text" name="travelid" id="travelid" class="form-control" />
                            </div>
                        </dir>

                        <div class="modal-footer">
                            <button id="add_info_service" type="button" class="btn btn-primary" onclick="ysumma.saleDocument.generarFactura();">Generar</button> 
                            <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>js/lib/saleDocument.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

    <!-- FIN GENERAR FACTURA  -->


    <?php $this->load->view("travel/modal"); ?>

    <?php $this->load->view("partial/footer"); ?>
    <script type='text/javascript'>
    $(document).ready(function () {

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
                        notEmpty: {message: "<?php echo $this->lang->line('common_first_name_required'); ?>"
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {message: "<?php echo $this->lang->line('common_last_name_required'); ?>"
                        }
                    }
                },
                username: {
                    validators: {
                        notEmpty: {message: "<?php echo $this->lang->line('employees_username_required'); ?>"
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('employees_password_required'); ?>'
                        }
                    }
                },
                repeat_password: {
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('employees_password_required'); ?>'
                        },
                        identical: {
                            field: 'password',
                            message: '<?php echo $this->lang->line('employees_password_must_match'); ?>'
                        }
                    }
                },
                email: {
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
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            $("#submit").prop("disabled", false);
            var msg = "";
            $.ajax({
                type: "POST",
                url: $("#employee_form").attr('action'),
                data: $("#employee_form").serialize(),
                success: function (response) {
                    var employees = JSON.parse(response);
                    if (employees.success == true) {
                        msg = getMessageSuccess('Operación realizada con exito...');
                        $("#messages").html(msg);
                        location.reload();
                    } else {
                        if (employees.message !== "") {
                            msg = getMessageError(employees.message);
                            $("#messages").html(msg);
                        }
                    }
                }
            });
        });
    });
    </script>
    <script  type="text/javascript">
        ysumma.saleDocument = new ysumma.SaleDocument();

        $(document).ready(function () {
            ysumma.saleDocument.listService();
            function h() {
                var opt = document.getElementsByClassName("Factura");
                for (i = 0; i < opt.length; i++) {
                    opt[i].style.display = "none";
                }

            }
            h("");
            $("input[type=radio]").click(function (event) {
                var valor = $(event.target).val();
                if (valor === "Deposito") {
                    $("#div1").show();
                    $("#div2").hide();
                } else if (valor === "Ventanilla") {
                    $("#div1").hide();
                    $("#div2").show();
                }
            });

            $('#sel_user').change(function () {
                var cod_tip_otr_doc_ref = $(this).val();
                var modal_title_coti=$("#ref_id_base").val();
                $.ajax({
                    url: 'index.php/sales/userDetails',
                    method: 'post',
                    data: {cod_tip_otr_doc_ref: cod_tip_otr_doc_ref,modal_title_coti:modal_title_coti},
                    dataType: 'json',
                    success: function (response) {
                            var serie = response.serie;
                            var num_corre_cpe_ref = (parseInt(response.num_corre_cpe_ref));

                            $('#sserie').html("<option value='"+serie+"'>"+serie+"</option>");
                            $('#sserie').val(serie);
                            $('#serie').val(serie);
                            $("#modal-title-coti").html(modal_title_coti+"-"+response.modal_title_coti);
                            $("#ref_id").val(modal_title_coti+"-"+response.modal_title_coti);
                            $('#snum_corre_cpe_ref').val(num_corre_cpe_ref);

                    }
                });
            });
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
                ysumma.saleDocument.llenarServicios();
            });
        });

    </script>