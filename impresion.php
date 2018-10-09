<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<title>Informacion cliente</title>
    <input type="hidden" name="cliente" id="cliente" value="<?php echo $_GET['cliente']?>">
    <h3>Información Personal</h3>
    <hr>
    <div id="info_personal"></div>
    <h3>Teléfonos</h3>
    <hr>
    <div id="info_telefonos"></div>
    <h3>Documentos</h3>
    <hr>
    <div id="info_documentos"></div>
    <h3>Correos</h3>
    <hr>
    <div id="info_correos"></div>
    <h3>Pasajeros Frecuentes</h3>
    <hr>
    <div id="info_pasajeros_frecuentes"></div>
    <h3>Pasaportes</h3>
    <hr>
    <div id="info_pasaportes"></div>
    <h3>Visado</h3>
    <hr>
    <div id="info_visado"></div>
    <h3>Brevete</h3>
    <hr>
    <div id="info_brevete"></div>
    <h3>Direcciones Propias y de Entrega</h3>
    <hr>
    <div id="info_direcciones"></div>
    <h3>Datos de Empresas</h3>
    <hr>
    <div id="info_empresas"></div>
    <h3>Contactos Emergencia</h3>
    <hr>
    <div id="info_contactos_emergencia"></div>
    <h3>Datos de Familiares</h3>
    <hr>
    <div id="info_datos_familiares"></div>
    <h3>Observaciones</h3>
    <hr>
    <span id="observaciones"></span>

</head>
<body>

</body>
</html>
<style type="text/css">
    .tabla_detalles{
        text-align: center;
    }
</style>
<script type="text/javascript">
	id = $('#cliente').val();
	$.ajax({
        type:'POST',
        data:{
            id : id
        },
        url:"index.php/customers/getClient",
        success:function(res){
            var response = JSON.parse(res);
            var predata = response.data;
            var data = JSON.parse(response.data.data);
            console.log(predata);
            console.log(data);
            html = '';
            if(response.success){
                //informacion personal
                if(predata.id != 0){
                    if(predata.gender == 'F')
                        genero = 'Femenino';
                    else
                        genero = 'Masculino';
                    html += '<table width="850px">';
                    html += '<tr><td>Nombres:</td><td>'+predata.firstname+'</td>';    
                    html += '<td>Pre-Nombre:</td><td>'+predata.middlename+'</td></tr>';
                    html += '<tr><td>Apellido Paterno:</td><td>'+predata.lastname+'</td>';
                    html += '<td>Apellido Materno:</td><td>'+predata.mother_lastname+'</td></tr>';
                    html += '<tr><td>Apellido de Casada:</td><td>'+predata.last_name_casada+'</td>';
                    html += '<td>Nacionalidad:</td><td>'+predata.nacionalidad+'</td></tr>';
                    html += '<tr><td>Fecha de Nacimiento:</td><td>'+predata.fec_nac+'</td>';
                    html += '<td>Género:</td><td>'+genero+'</td></tr>';
                    html += '</table>';
                    $('#info_personal').html(html);   
                }
                console.log(data.description);
                if(data.description.length != 0){
                    $('#observaciones').text(data.description);
                }

                //phones
                
                if(data.phones.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="350px">';
                    html += '<tr>';
                    html += '<th>T.Contacto</th>';
                    html += '<th>Teléfono</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.phones.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.phones[i].type_phone+'</td><td>'+data.phones[i].nro_phone+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_telefonos').html(html);
                }

                //documentos
                if(data.documents.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="350px">';
                    html += '<tr>';
                    html += '<th>Tipo de Documento</th>';
                    html += '<th>Nro de Documento</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.documents.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.documents[i].type_document+'</td><td>'+data.documents[i].nro_doc+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_documentos').html(html);
                }

                //correos
                if(data.emails.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="350px">';
                    html += '<tr>';
                    html += '<th>Tipo de Email</th>';
                    html += '<th>Email</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.emails.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.emails[i].type_email+'</td><td>'+data.emails[i].email+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_correos').html(html);
                }

                //pasajeros frecuentes
                if(data.frec.length > 0){
                    html = '';
                    html += '<table width="950px">';
                    html += '<tr>';
                    html += '<th>Millaje</th>';
                    html += '<th>Nro</th>';
                    html += '<th>Usuario</th>';
                    html += '<th>Clave</th>';
                    html += '<th>Pin</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.frec.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.frec[i].millaje_frec+'</td>';
                        html += '<td>'+data.frec[i].nro_frec+'</td>';
                        html += '<td>'+data.frec[i].user_frec+'</td>';
                        html += '<td>'+data.frec[i].pass_frec+'</td>';
                        html += '<td>'+data.frec[i].end_frec+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_pasajeros_frecuentes').html(html);
                }

                //pasaportes
                if(data.passport.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="600px">';
                    html += '<tr>';
                    html += '<th>Nro de Pasaporte</th>';
                    html += '<th>Pais Origen</th>';
                    html += '<th>Fec. Vencimiento</th>';
                    html += '<th>Fec. Emisión</th>';
                    html += '<th>Nacionalidad</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.passport.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.passport[i].nro+'</td>';
                        html += '<td>'+data.passport[i].country+'</td>';
                        html += '<td>'+data.passport[i].date+'</td>';
                        html += '<td>'+data.passport[i].date_init+'</td>';
                        html += '<td>'+data.passport[i].nationality+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_pasaportes').html(html);
                }

                //visado
                
                if(data.visado.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="600px">';
                    html += '<tr>';
                    html += '<th>Pais Emisor</th>';
                    html += '<th>Tipo</th>';
                    html += '<th>Número</th>';
                    html += '<th>Fec. Emisión</th>';
                    html += '<th>Fec. Vencimiento</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.visado.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.visado[i].country+'</td>';
                        html += '<td>'+data.visado[i].type+'</td>';
                        html += '<td>'+data.visado[i].nro+'</td>';
                        html += '<td>'+data.visado[i].date_init+'</td>';
                        html += '<td>'+data.visado[i].date_end+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_visado').html(html);
                }

                //brevete
                
                if(data.brevete.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="600px">';
                    html += '<tr>';
                    html += '<th>Nro. Doc</th>';
                    html += '<th>Fec. Vencimiento</th>';
                    html += '<th>Tipo de Doc</th>';
                    html += '<th>Pais de Emisión</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.brevete.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.brevete[i].nro+'</td>';
                        html += '<td>'+data.brevete[i].date+'</td>';
                        html += '<td>'+data.brevete[i].country+'</td>';
                        html += '<td>'+data.brevete[i].type+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_brevete').html(html);
                }

                //Direcciones Propias y de Entrega
                
                if(data.address.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="1050px">';
                    html += '<tr>';
                    html += '<th>Tipo</th>';
                    html += '<th>Dirección</th>';
                    html += '<th>Distrito</th>';
                    html += '<th>Pais</th>';
                    html += '<th>Teléfono</th>';
                    html += '<th>Referencia</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.address.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.address[i].type_address+'</td>';
                        html += '<td>'+data.address[i].address+'</td>';
                        html += '<td>'+data.address[i].district+'</td>';
                        html += '<td>'+data.address[i].country+'</td>';
                        html += '<td>'+data.address[i].phone+'</td>';
                        html += '<td>'+data.address[i].reference+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_direcciones').html(html);
                }

                //Datoa de la empresas
                
                if(data.company.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="1050px">';
                    html += '<tr>';
                    html += '<th>Ruc</th>';
                    html += '<th>Razón Social</th>';
                    html += '<th>Correo</th>';
                    html += '<th>Dirección</th>';
                    html += '<th>Distrito</th>';
                    html += '<th>Teléfono</th>';
                    html += '<th>Referencia</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.company.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.company[i].ruc+'</td>';
                        html += '<td>'+data.company[i].name+'</td>';
                        html += '<td>'+data.company[i].mail+'</td>';
                        html += '<td>'+data.company[i].address+'</td>';
                        html += '<td>'+data.company[i].district+'</td>';
                        html += '<td>'+data.company[i].phone+'</td>';
                        html += '<td>'+data.company[i].reference+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_empresas').html(html);
                }
                //Contacto en Caso de Emergencia
                
                if(data.contact.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="550px">';
                    html += '<tr>';
                    html += '<th>Nombre</th>';
                    html += '<th>Teléfono</th>';
                    html += '<th>Correo</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.company.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.contact[i].name+'</td>';
                        html += '<td>'+data.contact[i].ruc+'</td>';
                        html += '<td>'+data.contact[i].address+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_contactos_emergencia').html(html);
                }

                 //Datos tarjeta
                
                if(data.tarjtas.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="550px">';
                    html += '<tr>';
                    html += '<th>Tipo de Tarjeta</th>';
                    html += '<th>Nro de Tarjeta</th>';
                    html += '<th>Débito o Crédito</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.tarjtas.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.tarjtas[i].tipo_tarjeta+'</td>';
                        html += '<td>'+data.tarjtas[i].nro_tarjeta+'</td>';
                        html += '<td>'+data.tarjtas[i].debito_credito+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_contactos_emergencia').html(html);
                } 

                //Datos tarjeta
                
                if(data.familiares.length > 0){
                    html = '';
                    html += '<table class="tabla_detalles" width="1050px">';
                    html += '<tr>';
                    html += '<th>Relación</th>';
                    html += '<th>Nombre</th>';
                    html += '<th>Teléfono</th>';
                    html += '<th>Preferencia de Asiento</th>';
                    html += '<th>Indicaciones</th>';
                    html += '</tr>';
                    for (var i = 0; i < data.familiares.length; i++) {
                        html += '<tr>';
                        html += '<td>'+data.familiares[i].relacion+'</td>';
                        html += '<td>'+data.familiares[i].nombre+'</td>';
                        html += '<td>'+data.familiares[i].telefono+'</td>';
                        html += '<td>'+data.familiares[i].preferencia_asiento+'</td>';
                        html += '<td>'+data.familiares[i].indicaciones+'</td>';
                        html += '<tr>';
                    }
                    html += '</table>';   
                    $('#info_datos_familiares').html(html);
                }

            }
        }
    });
</script>