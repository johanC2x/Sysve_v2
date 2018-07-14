<script src="<?php echo base_url();?>js/lib/cotizacion.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    init_table_sorting();
    enable_select_all();
    enable_row_selection();
    enable_search('<?php echo site_url("$controller_name/suggest")?>','<?php echo $this->lang->line("common_confirm_search")?>');
    enable_email('<?php echo site_url("$controller_name/mailto")?>');
  enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>','<?php echo $this->lang->line($controller_name."_none_selected")?>');
  
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

  /* BOTON DE AGREGADO DE FAMILIARES */
  if(document.getElementById("btn_add_familiares") !== null){
    const btn_add_familiares = document.getElementById("btn_add_familiares");
    btn_add_familiares.addEventListener("click" ,() => {
      travel.saveFamiliar();
    });
  }

  /* BOTON DE AGREGADO DE PREFERENCIAS DE ASIENTO */
  if(document.getElementById("btn_add_indicaciones") !== null){
    const btn_add_indicaciones = document.getElementById("btn_add_indicaciones");
    btn_add_indicaciones.addEventListener("click" ,() => {
      travel.savePreferenciasAsiento();
    });
  }

  /* BOTON DE AGREGADO DE INFO DE TARJETAS */
  if(document.getElementById("btn_add_tarjetas") !== null){
    const btn_add_tarjetas = document.getElementById("btn_add_tarjetas");
    btn_add_tarjetas.addEventListener("click" ,() => {
      travel.saveTarjetas();
    });
  }

  /* BOTON DE AGREGADO DE VISADO */
  if(document.getElementById("btn_add_customer_visado") !== null){
    const btn_add_customer_visado = document.getElementById("btn_add_customer_visado");
    btn_add_customer_visado.addEventListener("click" ,() => {
      travel.saveCustomerVisado();
    });
  }

  /* BOTON DE AGREGADO DE CONTACTOS */
  if(document.getElementById("btn_add_customer_contacts") !== null){
    const btn_add_customer_contacts = document.getElementById("btn_add_customer_contacts");
    btn_add_customer_contacts.addEventListener("click" ,() => {
      travel.saveCustomerContacts();
    });
  }

  /* BOTON DE AGREGADO DE DOCUMENTOS */
  if(document.getElementById("btn_add_customer_doc") !== null){
    const btn_add_customer_doc = document.getElementById("btn_add_customer_doc");
    btn_add_customer_doc.addEventListener("click" ,() => {
      travel.saveCustomerDocuments();
    });
  }

  if(document.getElementById("btn_add_customer_phones") !== null){
    const btn_add_customer_phones = document.getElementById("btn_add_customer_phones");
    btn_add_customer_phones.addEventListener("click" ,() => {
      travel.saveCustomerPhones();
    });
  }

  if(document.getElementById("btn_add_customer_emails") !== null){
    const btn_add_customer_emails = document.getElementById("btn_add_customer_emails");
    btn_add_customer_emails.addEventListener("click", () => {
      travel.saveCustomerEmails();
    });
  }

  if(document.getElementById("btn_add_customer_frec") !== null){
    const btn_add_customer_frec = document.getElementById("btn_add_customer_frec");
    btn_add_customer_frec.addEventListener("click", () => {
      travel.saveCustomerFrec();
    });
  }

  if(document.getElementById("btn_add_customer_frec") !== null){
    const btn_save_customer = document.getElementById("btn_save_customer");
    btn_save_customer.addEventListener("click", () => {
      var validator = $('#form_customer_register_parcial').data('bootstrapValidator');
      validator.validate();
      return validator.isValid();
    });
  }

  $("#form_customer_register_parcial").bootstrapValidator({
    container: '#messages',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
      type_customer_doc:{
        validators: {
            notEmpty: { message: "El campo tipo de documento es requerido"}
          }
      },
      nro_customer_doc:{
        validators: {
            notEmpty: { message: "El campo número de documento es requerido"}
          }
      },
      first_name: {
          validators: {
            notEmpty: { message: "El campo nombre es requerido"}
          }
      },
      midle_name: {
          validators: {
            notEmpty: { message: "El campo pre-nombre es requerido"}
          }
      },
      last_name:{
        validators: {
            notEmpty: { message: "El campo apellidos paterno es requerido"}
          }
      },
      last_name_mothers:{
        validators: {
            notEmpty: { message: "El campo apellidos materno es requerido"}
          }
      },
      last_name_casada:{
        validators: {
            notEmpty: { message: "El campo apellido de casada es requerido"}
          }
      },
      age:{
        validators: {
            notEmpty: { message: "El campo edad es requerido"}
          }
      },
      date_expire:{
        validators: {
          notEmpty: { message: "El campo fecha de nacimiento es requerido"}
          }
      }
    }
  }).on('success.form.bv', function(e) {
    e.preventDefault();
    $("#btn_save_customer").prop("disabled", false);
    var data = {};
    travel.saveDescripcion();
    data.address = travel.customer_address_list;
    data.passport = travel.customer_passport_list;
    data.card = travel.customer_card_list;
    data.company = travel.customer_company_list;
    data.visado = travel.customer_visado_list;
    data.contact = travel.customer_contact_list;
    data.documents = travel.customer_documents_list;
    data.phones = travel.customer_phones_list;
    data.emails = travel.customer_emails_list;
    data.frec = travel.customer_frec_list;
    data.familiares = travel.customer_familiares_list;
    data.asiento = travel.preferencia_asiento_list;
    data.tarjtas = travel.customer_tarjtas_list;
    data.description = travel.customer_description;
    $("#client_data").val(JSON.stringify(data));
    $.ajax({
            type:"POST",
            url:$("#form_customer_register_parcial").attr('action'),
            data:$("#form_customer_register_parcial").serialize(),
            success:function(msg){
                console.log(msg);
            }
    });
  });

}); 

function init_table_sorting()
{
  //Only init if there is more than one row
  if($('.tablesorter tbody tr').length >1)
  {
    $("#sortable_table").tablesorter(
    { 
      sortList: [[1,0]], 
      headers: 
      { 
        0: { sorter: false}, 
        5: { sorter: false} 
      } 

    }); 
  }
}

function post_person_form_submit(response)
{
  if(!response.success)
  {
    set_feedback(response.message,'error_message',true);  
  }
  else
  {
    //This is an update, just update one row
    if(jQuery.inArray(response.person_id,get_visible_checkbox_ids()) != -1)
    {
      update_row(response.person_id,'<?php echo site_url("$controller_name/get_row")?>');
      set_feedback(response.message,'success_message',false); 
      
    }
    else //refresh entire table
    {
      do_search(true,function()
      {
        //highlight new row
        hightlight_row(response.person_id);
        set_feedback(response.message,'success_message',false);   
      });
    }
  }
}
</script>




<div id="modal_customer" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRO DE CLIENTES</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('customers/saveClientBasico',array('id'=>'form_customer_register_parcial')); ?>

          <div class="row">
            <div class="col-md-12">
              <fieldset>
                <legend>Documentos</legend>
                <!-- =========== FORM ADDRESS ============ -->

<div class="col-md-12">
  <div class="col-md-4">
    <div class="form-group" >
        <select id="type_customer_doc" class="form-control">
            <option value="">Seleccionar Tipo de Documento</option>
            <option value="dni">DNI</option>
            <option value="carnet_extranjeria">Carnet de Extranjeria</option>
            <option value="pasaporte">Pasaporte</option>
        </select>
    </div>    
  </div>
  <div class="col-md-5">
    <div class="form-group" >
       <input type="text" id="nro_customer_doc" name="nro_customer_doc" class="form-control" placeholder="Nro. Documento">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
       <button id="btn_add_customer_doc" type="button" class="btn btn-primary">Agregar</button>
    </div>
  </div>
</div>
                <!-- ===================================== -->
<div class="col-md-12">
           <table id="table_customer_doc" class="table table-hover table-bordered" >
             <thead>
               <tr>
                 <th class="col-md-1"><center>Tipo Documento</center></th>
                 <th class="col-md-4"><center>Nro. de Documento </center></th>
                 <th colspan="3" class="col-md-1"><center>Acción</center></th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td colspan="4">
                   <center>
                     No se registraron datos.
                   </center>
                 </td>
               </tr>
             </tbody>
           </table>
</div>
              </fieldset>
            </div>
            <div class="col-md-6" style="display:none;">
              <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select id="tipo_documento" name="tipo_documento" class="form-control">
                  <option>Seleccionar</option>
                  <option value="DNI">DNI</option>
                  <option value="CE">CE</option>
                  <option value="Pasaporte">Pasaporte</option>
                </select>
              </div>
            </div>
            <div class="col-md-6" style="display:none;">
              <div class="form-group">
                <label for="person_id">Nro. Documento:</label>
                <input type="text" id="person_id" name="person_id" class="form-control" maxlength="8" />
              </div>
            </div>
 <!-- =======DATOS PERSONALES=========== -->

<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
      <label for="first_name">Nombre:</label>
      <input type="text" id="first_name" name="first_name" class="form-control"/>
      <input type="hidden" id="client_id" name="client_id"/>
      <input type="hidden" id="client_data" name="client_data"/>
    </div> 
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="midle_name">Pre-Nombre:</label>
        <input type="text" id="midle_name" name="midle_name" class="form-control"/>
    </div>   
  </div>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
        <label for="last_name">Apellidos Paterno:</label>
        <input type="text" id="last_name" name="last_name" class="form-control"/>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="last_name">Apellidos Materno:</label>
        <input type="text" id="last_name_mothers" name="last_name_mothers" class="form-control"/>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="col-md-6">
    <div class="form-group">
                <label for="last_name">Apellido de Casada:</label>
                <input type="text" id="last_name_casada" name="last_name_casada" class="form-control"/>
              </div>
  </div>
  <div class="col-md-3">
   <div class="form-group">
                <label for="user_date">Fecha de Nacimiento:</label>
                <input type="date" id="user_date" name="user_date" class="form-control"/>
              </div>
  </div>
  <div class="col-md-3">
   <div class="form-group">
                <label for="age">Edad:</label>
          <table width="100%">
            <td align="lefth">
       <input type="button" class="btn btn-warning" value="Edad" onclick="javascript:calcularEdad();" />

            </td>
            <td>
          <div id="result"><input type="text" id="age" name="age" class="form-control"/></div>  
            </td>
          </table>
   </div>
  </div>
</div>
<div id="messages" class="col-md-6"></div>
<legend class="col-md-12" ></legend>
 <!-- ==========FIN DATOS PERSONALES=========== -->

            <!-- =========== FORM TELEFONOS Y CORREOS ============ -->

            <div class="col-md-6">
              <fieldset>
                <legend>Teléfonos</legend>
                <div class="form-group">
                  <label for="type_customer_phone">Tipo de Contacto:</label>
                  <select name="type_customer_phone" id="type_customer_phone" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="celular_personal">Celular Personal</option>
                    <option value="celular_empresa">Celular Empresa</option>
                    <option value="telefono_fijo">Telefono Fijo</option>
                    <option value="otros">Otros</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="customer_phone">Telefono:</label>
                  <input type="text" id="customer_phone" name="customer_phone" class="form-control">
                </div>
                  <div class="form-group">
                <button id="btn_add_customer_phones" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                <table id="table_customer_phones" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>T. Contacto</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <div class="col-md-6">
            <fieldset>
                <legend>Correos</legend>
                <div class="form-group">
                  <label for="type_customer_email">Tipo de Email:</label>
                  <select name="type_customer_email" id="type_customer_email" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="empresa">Empresa</option>
                    <option value="personal">Personal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="customer_email">Email:</label>
                  <input type="text" id="customer_email" name="customer_email" class="form-control">
                </div>
                  <div class="form-group">
                <button id="btn_add_customer_emails" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                <table id="table_customer_emails" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>T. Email</center></th>
                      <th class="col-md-4"><center>Email</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <!-- ===================================== -->
 

            <!-- =========== FORM DATOS FAMILIARES ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Datos de Familiares</legend>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_relacion">Relacion:</label>
                    <input type="text" id="contact_familiar_relacion" name="contact_familiar_relacion" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_nombre">Nombre:</label>
                    <input type="text" id="contact_familiar_nombre" name="contact_familiar_nombre" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_telefono">Teléfono:</label>
                    <input type="text" id="contact_familiar_telefono" name="contact_familiar_telefono" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_prefasiento">Pref Asiento:</label>
                    <select id="contact_familiar_prefasiento" name="contact_familiar_prefasiento" class="form-control">
                      <option value="VENTANA">VENTANA</option>
                      <option value="PASILLO">PASILLO</option>
                      <option value="SALIDA DE EMERGENCIA">SALIDA DE EMERGENCIA</option>
                      <option value="COMPRA DE ASIENTOS">COMPRA DE ASIENTOS</option>
                      <option value="UPGRADE">UPGRADE</option>
                      <option value="SILLA DE RUEDAS">SILLA DE RUEDAS</option>
                    </select>
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_indicaciones">Indicaciones:</label>
                    <input type="text" id="contact_familiar_indicaciones" name="contact_familiar_indicaciones" class="form-control">
                  </div>  
                </div>
                <div class="col-md-1">
                  <div class="form-group" >
                    <label for="">&nbsp;</label>
                        <div class="form-group">
                            <button id="btn_add_familiares" type="button" class="btn btn-primary">Agregar</button>
                        </div>
                  </div>  
                </div>
                <table id="table_familiares" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>Relacion</center></th>
                      <th class="col-md-2"><center>Nombre</center></th>
                      <th class="col-md-2"><center>Teléfono</center></th>
                      <th class="col-md-2"><center>Preferencia de Asiento</center></th>
                      <th class="col-md-2"><center>Indicaciones</center></th>
                      <th class="col-md-2"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="12">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
                <legend>Observaciones</legend>
                <div class="form-group">
                  <textarea id="descripcion" name="descripcion" class="form-control" style="height: 150px;"></textarea>
                </div>
              </fieldset>
            </div>
            <!-- ===================================== -->
          </div>
          <button type="submit" class="btn btn-primary">Siguiente</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE REGISTRO DE VIAJES -->
<div id="modal_travel" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRAR VIAJE</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('travel/insert_client',array('id'=>'form_travel_register'));?>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ruc:</label>
                    <input type="datetime-local" id="ruc_travel" name="ruc_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Razón Social:</label>
                    <input type="datetime-local" id="razon_social_travel" name="razon_social_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Dirección Fiscal:</label>
                    <input type="datetime-local" id="direccion_fiscal_travel" name="direccion_fiscal_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Aerolínea:</label>
                    <input type="datetime-local" id="aerolinea_travel" name="direccion_fiscal_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Código:</label>
                    <input type="text" name="code_travel" id="code_travel" class="form-control" />
                    <input type="hidden" id="customer_id" name="customer_id" value="2" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Vuelo:</label>
                    <input type="text" name="name_travel" id="name_travel" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Desde:</label>
                    <input type="text" name="destiny_origin_travel" id="destiny_origin_travel" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Hasta:</label>
                    <input type="text" name="destiny_end_travel" id="destiny_end_travel" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Salida:</label>
                    <input type="datetime-local" id="date_init_travel" name="date_init_travel" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Llegada:</label>
                    <input type="datetime-local" id="date_end_travel" name="date_end_travel" class="form-control"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Ventana</label>
                      <input type="text" id="window_travel_detail" name="window_travel_detail" placeholder="" class="form-control">
                  </div>     
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pasillo</label>
                        <input type="text" id="pas_travel_detail" name="pas_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Millaje</label>
                        <input type="text" id="mill_travel_detail" name="mill_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa</label>
                        <input type="text" id="visa_travel_detail" name="visa_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Vacuna</label>
                        <input type="text" id="vacuna_travel_detail" name="vacuna_travel_detail" placeholder="" class="form-control">
                    </div>      
                </div>
              </div>
            </div>
            <button id="btn_save_customer" type="submit" class="btn btn-primary" >Siguiente</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function isValidDate(day,month,year)

{
    var dteDate;
    month=month-1;
    dteDate=new Date(year,month,day);
    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}

function validate_fecha(fecha)
{
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
    if(fecha.search(patron)==0)
    {
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0]))
        {
            return true;
        }
    }
    return false;
}

function calcularEdad()
{
    var fecha=document.getElementById("user_date").value;
    if(validate_fecha(fecha)==true)
    {
        var values=fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
        var edad = (ahora_ano + 1900) - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
        // calculamos los meses
        var meses=0;
        if(ahora_mes>mes)
            meses=ahora_mes-mes;
        if(ahora_mes<mes)
            meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
            meses=11;
 
        // calculamos los dias

        var dias=0;
        if(ahora_dia>dia)
            dias=ahora_dia-dia;
        if(ahora_dia<dia)
        {
            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }
 
        document.getElementById("result").innerHTML=""+edad+" años";
    }else{
        document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
    }
}
</script>


