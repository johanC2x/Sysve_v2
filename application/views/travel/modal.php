<div id="modal_customer" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">REGISTRO DE CLIENTES</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('customers/saveClient',array('id'=>'form_customer_register')); ?>
          <div class="row">
            <div class="col-md-6">
              <fieldset>
                <legend>Documentos</legend>
                <!-- =========== FORM ADDRESS ============ -->
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
                    <input type="text" id="nro_customer_doc" autocomplete="off" name="nro_customer_doc" class="form-control" placeholder="Nro. Documento">
                  </div>
                </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button id="btn_add_customer_doc" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                <!-- ===================================== -->
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" autocomplete="off" class="form-control"/>
                <input type="hidden" id="client_id" name="client_id"/>
                <input type="hidden" id="client_data" name="client_data"/>
              </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="midle_name">Pre-Nombre:</label>
                <input type="text" id="midle_name" name="midle_name" autocomplete="off" class="form-control"/>
              </div>    
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellidos Paterno:</label>
                <input type="text" id="last_name" name="last_name" autocomplete="off" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellidos Materno:</label>
                <input type="text" id="last_name_mothers" name="last_name_mothers" autocomplete="off" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Apellido de Casada:</label>
                <input type="text" id="last_name_casada" name="last_name_casada" autocomplete="off" class="form-control"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" autocomplete="off" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="fecha_vcto">Vcto. Doc. Identidad:</label>
                <input type="date" id="fecha_vcto" name="fecha_vcto" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="gender">Género:</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="">Seleccionar</option>
                  <option value="M">MASCULINO</option>
                  <option value="F">FEMENINO</option>
                </select>
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
            <!-- <div class="col-md-12">
              <label for="address_1">Dirección:</label>
              <input type="text" id="address_1" name="address_1" class="form-control"/>
            </div> -->
            <div class="col-md-12">
              <center>
                <div id="messages" class="form-group"></div>
              </center>
            </div>

            <!-- =========== FORM TELEFONOS Y CORREOS ============ -->

            
            <div class="col-md-6" style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Teléfonos</legend>
                <div class="col-md-5">
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
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="customer_phone">Telefono:</label>
                  <input type="text" id="customer_phone" name="customer_phone" autocomplete="off" class="form-control">
                </div>
                </div>
                  <div class="form-group" >
                    <label for="">&nbsp;</label>
                  <div class="form-group">
                <button id="btn_add_customer_phones" type="button" class="btn btn-primary">Agregar</button>
                  </div>
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
            <div class="col-md-6" style="background-color:#EFF0F1"></br>
            <fieldset>
                <legend>Correos</legend>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="type_customer_email">Tipo de Email:</label>
                  <select name="type_customer_email" id="type_customer_email" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="empresa">Empresa</option>
                    <option value="personal">Personal</option>
                  </select>
                </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                  <label for="customer_email">Email:</label>
                  <input type="email" id="customer_email" name="customer_email" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                </div>
                </div>
                  <div class="form-group" >
                    <label for="">&nbsp;</label>
                  <div class="form-group">
                <button id="btn_add_customer_emails" type="button" class="btn btn-primary">Agregar</button>
                  </div>
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



            <!-- ===== FORM CLIENTES FRECUENTES ====== -->
            <div class="col-md-12"></br>
              <fieldset>
                <legend>Pasajeros Frecuentes</legend>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="millaje_customer_frec">Millaje:</label>
                    <input type="text" id="millaje_customer_frec" name="millaje_customer_frec" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nro_customer_frec">Nro:</label>
                    <input type="text" id="nro_customer_frec" name="nro_customer_frec" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="user_customer_frec">Usuario:</label>
                    <input type="text" id="user_customer_frec" name="user_customer_frec" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="pass_customer_frec">Clave:</label>
                    <input type="text" id="pass_customer_frec" name="pass_customer_frec" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="end_customer_frec">Pin:</label>
                    <input type="text" id="end_customer_frec" name="end_customer_frec" autocomplete="off" class="form-control">
                  </div>
                </div>
                  <div class="form-group">
                    <label>&nbsp;</label>
                  <div class="form-group">
                <button id="btn_add_customer_frec" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                  </div>
                <table id="table_customer_frec" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-3"><center>Millaje</center></th>
                      <th class="col-md-3"><center>Nro</center></th>
                      <th class="col-md-3"><center>Usuario</center></th>
                      <th class="col-md-3"><center>Clave</center></th>
                      <th class="col-md-3"><center>Pin</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6">
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



            <!-- =========== FORM PASAPORTE ============ -->
            <div class="col-md-12"style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Pasaportes</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_nro">Nro. Pasaporte:</label>
                    <input type="text" id="passport_customer_nro" name="passport_customer_nro" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_date">Fecha de Emisión:</label>
                    <input type="date" id="passport_customer_date" name="passport_customer_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_init_date">Fecha de Vencimiento:</label>
                    <input type="date" id="passport_customer_init_date" name="passport_customer_init_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_country">País de Emisión:</label>
                    <input type="text" id="passport_customer_country" name="passport_customer_country" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="passport_customer_nationality">Nacionalidad:</label>
                    <input type="text" id="passport_customer_nationality" name="passport_customer_nationality" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <br/>
                  <div class="form-group">
                    <button id="btn_add_customer_passport" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_customer_passport" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-4"><center>Nro de Pasaporte </center></th>
                      <th class="col-md-3"><center>Pais Origen</center></th>
                      <th class="col-md-2"><center>Fec. Vencimiento</center></th>
                      <th class="col-md-2"><center>Fec. Emisión</center></th> 
                      <th class="col-md-2"><center>Nacionalidad</center></th>
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6">
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

            <!-- =========== FORM VISADO ============ -->
            <div class="col-md-12"></br>
              <fieldset>
                <legend>Visado</legend>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_type">Tipo Visado:</label>
                    <select name="visado_customer_type" id="visado_customer_type" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="VISA">VISA</option>
                      <option value="E-VISA">E-VISA</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="visado_customer_nro">Número:</label>
                    <input type="text" id="visado_customer_nro" name="visado_customer_nro" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="visado_customer_init_date">Fecha de Emisión:</label>
                    <input type="date" id="visado_customer_init_date" name="visado_customer_init_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="visado_customer_end_date">Fecha de Vencimiento:</label>
                    <input type="date" id="visado_customer_end_date" name="visado_customer_end_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="visado_customer_country">Pais Emisor:</label>
                    <input type="text" name="visado_customer_country" id="visado_customer_country" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="">&nbsp;</label>
                        <div class="form-group">
                            <button id="btn_add_customer_visado" type="button" class="btn btn-primary">Agregar</button>
                        </div>
                  </div>  
                </div>
                <table id="table_customer_visado" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-2"><center>Pais Emisor</center></th>
                      <th class="col-md-2"><center>Tipo</center></th>
                      <th class="col-md-2"><center>Número</center></th>
                      <th class="col-md-2"><center>Fec. Emisión</center></th> 
                      <th class="col-md-2"><center>Fec. Vencimiento</center></th>
<!-- Falta incluir el valor del pais emisor en la tabla de agregar         <th class="col-md-2"><center>Pais Emisor</center></th> -->
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
              </fieldset>
              </div>
            <!-- ===================================== -->

            <!-- =========== FORM BREVETE ============ -->
            <div class="col-md-12" style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Licencia de Conducir</legend>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="brevete_customer_nro">Nro. Identificador:</label>
                    <input type="text" id="brevete_customer_nro" name="brevete_customer_nro" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="brevete_customer_date">Fecha de vcto.:</label>
                    <input type="date" id="brevete_customer_date" name="brevete_customer_date" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="brevete_customer_type">Tipo de Doc:</label>
                        <select class="form-control" id="brevete_customer_type" name="brevete_customer_type">
                          <option value="">Seleccionar</option>
                          <option value="Nacional">NACIONAL</option>
                          <option value="Internacional">INTERNACIONAL</option>
                        </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="brevete_customer_country">País de Emisión:</label>
                    <input type="text" id="brevete_customer_country" name="brevete_customer_country" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <br/>
                  <div class="form-group">
                    <button id="btn_add_customer_brevete" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
                <table id="table_customer_brevete" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-4"><center>Nro. Doc.</center></th>
                      <th class="col-md-3"><center>Fec. Vencimiento</center></th>
                      <th class="col-md-2"><center>Tipo</center></th>
                      <th class="col-md-2"><center>Pais Emisor</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6">
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
            <!-- =========== FORM ADDRESS ============ -->
            <div class="col-md-12"></br>
              <fieldset>
                <legend>Direcciones Propias y de Entrega</legend>
                <div class="col-md-4">
                  <label for="type_address_customer_travel">Tipo</label>
                  <select name="type_address_customer_travel" id="type_address_customer_travel" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="domicilio">Domicilio</option>
                    <option value="entrega">Entrega</option>
                    <option value="empresa">Empresa</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="address_customer_travel">Dirección:</label>
                    <input type="text" id="address_customer_travel" name="address_customer_travel" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="district_customer_travel">Distrito/Estado:</label>
                    <input type="text" id="district_customer_travel" name="district_customer_travel" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="country_customer_travel">País:</label>
                    <input type="text" id="country_customer_travel" name="country_customer_travel" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="phone_customer_travel">Teléfono:</label>
                    <input type="text" id="phone_customer_travel" name="phone_customer_travel" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="reference_customer_travel">Referencia:</label>
                    <input type="text" id="reference_customer_travel" name="reference_customer_travel" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>&nbsp;</label>
                  <div class="form-group">
                    <button id="btn_add_customer_travel" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
              </div>
                <table id="table_customer_address" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo</center></th>
                      <th class="col-md-1"><center>Dirección</center></th>
                      <th class="col-md-4"><center>Distrito</center></th>
                      <th class="col-md-4"><center>País</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
                      <th class="col-md-2"><center>Referencia</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="7">
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
            <!-- =========== FORM COMPANY ============ -->
            <div class="col-md-12" style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Datos de Empresas</legend>
                <div class="col-md-6">
                    <div class="form-group" >
                      <label for="company_customer_ruc">Ruc:</label>
                      <input type="text" id="company_customer_ruc" name="company_customer_ruc" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" >
                      <label for="company_customer_name">Razón Social:</label>
                      <input type="text" id="company_customer_name" name="company_customer_name" autocomplete="off" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-8">
                    <div class="form-group" >
                      <label for="company_customer_address">Dirección:</label>
                      <input type="text" id="company_customer_address" name="company_customer_address" autocomplete="off" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_district">Distrito:</label>
                      <input type="text" id="company_customer_district" name="company_customer_district" autocomplete="off" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-3">
                    <div class="form-group" >
                      <label for="company_customer_mail">Correo:</label>
                      <input type="email" id="company_customer_mail" name="company_customer_mail" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-3">
                    <div class="form-group" >
                      <label for="company_customer_phone">Teléfono:</label>
                      <input type="text" id="company_customer_phone" name="company_customer_phone" autocomplete="off" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                      <label for="company_customer_reference">Referencia:</label>
                      <input type="text" id="company_customer_reference" name="company_customer_reference" autocomplete="off" class="form-control">
                    </div>  
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>&nbsp;</label>
                    <div class="form-group">
                      <button id="btn_add_customer_company" type="button" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                </div>
                <table id="table_customer_company" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Ruc</center></th>
                      <th class="col-md-4"><center>Razon Social</center></th>
                      <th class="col-md-2"><center>Correo</center></th> 
                      <th class="col-md-2"><center>Dirección</center></th>
                      <th class="col-md-3"><center>Distrito</center></th> 
                      <th class="col-md-2"><center>Teléfono</center></th> 
                      <th class="col-md-2"><center>Referencia</center></th> 
                      <th colspan="3" class="col-md-1"><center>Acción</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="8">
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

             <!-- =========== FORM CONTACTS ============ -->
            <div class="col-md-12"></br>
              <fieldset>
                <legend>Contacto en Caso de Emergencia</legend>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="contact_customer_ruc">Nombre:</label>
                    <input type="text" id="contact_customer_ruc" name="contact_customer_ruc" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="contact_customer_name">Teléfono:</label>
                    <input type="text" id="contact_customer_name" name="contact_customer_name" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="contact_customer_address">Correo:</label>
                    <input type="email" id="contact_customer_address" name="contact_customer_address" placeholder="Ej.: usuario@servidor.com" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="debito_credito">&nbsp;</label>
                  <div class="form-group">
                    <button id="btn_add_customer_contacts" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
              </div>
                <table id="table_customer_contacts" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Nombre</center></th>
                      <th class="col-md-4"><center>Teléfono</center></th>
                      <th class="col-md-2"><center>Correo</center></th>
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
              </fieldset>
            </div>
            <!-- ===================================== -->
            <!-- =========== FORM DATOS TARJETAS ============ -->
            <div class="col-md-12" style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Datos de Tarjetas</legend>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="tipo_tarjeta">Tipo de Tarjeta:</label>
                    <input type="text" id="tipo_tarjeta" name="tipo_tarjeta" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="nro_tarjeta">Nro de tarjeta:</label>
                    <input type="text" id="nro_tarjeta" name="nro_tarjeta" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-3">
                  <div class="form-group" >
                    <label for="debito_credito">Débito o Crédito:</label>
                    <input type="text" id="debito_credito" name="debito_credito" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="debito_credito">&nbsp;</label>
                  <div class="form-group">
                    <button id="btn_add_tarjetas" type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
              </div>
                <table id="table_tarjetas" class="table table-hover table-bordered" >
                  <thead>
                    <tr>
                      <th class="col-md-1"><center>Tipo de Tarjeta</center></th>
                      <th class="col-md-4"><center>Nro de Tarjeta</center></th>
                      <th class="col-md-2"><center>Débito o Crédito</center></th>
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
              </fieldset>
            </div>
            <!-- ===================================== -->
            <!-- =========== FORM DATOS FAMILIARES ============ -->
            <div class="col-md-12"></br>
              <fieldset>
                <legend>Datos de Familiares</legend>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_relacion">Relacion:</label>
                    <input type="text" id="contact_familiar_relacion" name="contact_familiar_relacion" autocomplete="off" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_nombre">Nombre:</label>
                    <input type="text" id="contact_familiar_nombre" name="contact_familiar_nombre" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_telefono">Teléfono:</label>
                    <input type="text" id="contact_familiar_telefono" name="contact_familiar_telefono" autocomplete="off" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="contact_familiar_prefasiento">Pref Asiento:</label>
                    <select id="contact_familiar_prefasiento" name="contact_familiar_prefasiento" class="form-control">
                      <option value="NO INDICA">NO INDICA</option>
                      <option value="MEDIO">MEDIO</option>
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
                    <input type="text" id="contact_familiar_indicaciones" name="contact_familiar_indicaciones" autocomplete="off" class="form-control">
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
                      <td colspan="6">
                        <center>
                          No se registraron datos.
                        </center>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </fieldset>
            </div>
            <div class="col-md-12" style="background-color:#EFF0F1"></br>
              <fieldset>
                <legend>Observaciones</legend>
                <div class="form-group">
                  <textarea placeholder="Comentarios..." id="descripcion" name="descripcion" class="form-control" style="height: 150px;"></textarea>
                </div>
              </fieldset>
            </div>
            <!-- ===================================== -->
            <div id="messages" class="col-md-12"></div></br>
          </div>
</div>
      <div class="modal-footer">

            <!--<button type="submit" id="myBtn" class="btn btn-primary">Guardar Nuevo</button>-->
            <button class="btn btn-primary" >Guardar</button>
          <?php echo form_close();?>
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  function imprSelec(historial){
  var ficha=document.getElementById(historial);
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
}
</script>
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
            <button id="btn_save_customer" type="submit" class="btn btn-primary" >Guardar</button>
        <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-------------MODAL VENTA----------->

<div id="modal_servicios" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TABLA DE SERVICIOS</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('sales/saveService'); ?>
          <div class="row">
            <!-- =========== FORM DATOS DEL SERVICIO ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Servicio</legend>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="proveedor">Codigo</label>
                    <input type="text" id="proveedor" name="proveedor" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Monto</label>
                    <input type="text" id="tarifa_neta" name="tarifa_neta" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor">Descripcion</label>
                    <input type="text" id="comi_proveedor" name="comi_proveedor" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor">Servicio</label>
                    <input type="text" id="fee_proveedor" name="fee_proveedor" class="form-control" name="">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label for="fee_agencia">Observ.</label>
                    <input type="text" id="fee_agencia" name="fee_agencia" class="form-control">
                  </div>  
                </div>

              </fieldset>
            </div>
          </div>
        </div>
            <!-- ============FIN DATOS DEL SERVICIO========================= -->
            <div id="messages" class="col-md-12"></div>
      <div class="modal-body">
          <div class="row">
            <!-- =========== FORM DATOS CARGA DE TABLA ============ -->
            <div class="col-md-12">
              <fieldset>
                <legend>Tabla</legend>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="proveedor">Proveedor</label>
                    <input type="text" id="proveedor" name="proveedor" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tarifa_neta">Tarifa Neta</label>
                    <input type="text" id="tarifa_neta" name="tarifa_neta" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="comi_proveedor">Com. Proveedor</label>
                    <input type="text" id="comi_proveedor" name="comi_proveedor" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_proveedor">Fee Proveedor</label>
                    <input type="text" id="fee_proveedor" name="fee_proveedor" class="form-control" name="">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="fee_agencia">Fee Agencia</label>
                    <input type="text" id="fee_agencia" name="fee_agencia" class="form-control">
                  </div>  
                </div>
                <div class="col-md-2">
                  <div class="form-group" >
                    <label for="tipo_boleto">Tipo de Boleto</label>
                    <select class="form-control">
                      <option id="tipo_boleto" value="boleto_aereo" >Boleto Aereo</option>
                      <option id="tipo_boleto" value="boleto_bt" >Boleto BT</option>
                    </select>
                  </div>  
                </div>
              </fieldset>
            </div>
            <div class="col-md-12">
              <fieldset>
                <legend>Observaciones</legend>
                <div class="form-group">
                  <textarea id="descripcion" class="form-control" style="height: 50px;"></textarea>
                </div>
              </fieldset>
            </div>
            <!-- ===================================== -->
            <div id="messages" class="col-md-12"></div>

      </div>
      </div>

<dir class="modal-header" >
<h4 class="modal-title">Datos Financieros del Servicio
  <button type="button" class="btn btn-primary pull-right" id="mostrar" name="boton1" ><i class="fa fa-angle-down"></i>
                </button>

  <button type="button" class="btn btn-primary pull-right" id="ocultar" name="boton2" ><i class="fa fa-angle-up"></i>
                </button>

</h4>
<input id="target" type="hidden">
<div class="target" ><br>
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
                      <label for="name_travel">Imp. Extranjero:</label>
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
</div> 
    <div class="modal-footer">
      <div class="form-group"></div>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" onclick="travel.cancelRegisterCustomer();" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
    </div>
          <?php echo form_close(); ?>
</div>



<script type="text/javascript">
    $(document).ready(function(){
    $("#mostrar").on( "click", function() {
      $('#target').show(); //muestro mediante id
      $('.target').show(); //muestro mediante clase
     });
    $("#ocultar").on( "click", function() {
      $('#target').hide(); //oculto mediante id
      $('.target').hide(); //muestro mediante clase
    });
  });

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
                });
</script>

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