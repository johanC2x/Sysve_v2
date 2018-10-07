var sales = function () {

    var self = {
        current_url: "",
        list_customer: [],
        list_comision: [],
        list_comision_children: [],
        last_travel: '',
        last_list_comision: [],
        customer_address_list: [],
        customer_pay_list: [],
        customer_card_list: [],
        customer_company_list: [],
        customer_visado_list: [],
        customer_contact_list: [],
        customer_documents_list: [],
        customer_phones_list: [],
        customer_emails_list: [],
        customer_frec_list: [],
        customer_familiares_list: [],
        customer_tarjtas_list: [],
        customer_description: '',
        modal_views: '',
        action_form: "",
        current_id: 0,
        current_service: -1,
        current_pay: 0,
        current_pay_children: 0,
        list_service_doc: [],
        current_serice_doc: -1,
        detalle_servicio: ""
    };


    self.changeRow = function (idObj) {
        var open = $("#row_travel_" + idObj).is(':visible');
        if (!open) {
            $("#row_travel_" + idObj).show();
            $("#row_open_" + idObj).html('<i class="fa fa-angle-down"></i>');
        } else {
            $("#row_travel_" + idObj).hide();
            $("#row_open_" + idObj).html('<i class="fa fa-angle-right"></i>');
        }
    };

    self.addServiceDoc = function (mPrefix) {
        var data = {};
        data.dfs_tarifa_neta_servicios = "";
        data.quue_servicios = "";
        data.imp_extranjero_servicios = "";
        data.dfs_otros_servicios = "";
        data.exento_fee = "";
        data.dfs_inafecto_servicios = "";
        data.porcent18_servicios = "";
        data.credit_card = "";
        data.serv_esp = "";
        data.tua = "";
        data.dfs_otros = "";
        data.fee = "";
        data.dfs_igv = "";
        data.dfs_total_fee = "";
        data.cav_agencia = "";
        data.cav_igual_agencia ="";
        data.cav_over = "";
        data.cav_igual_cover = "";
        data.cav_inafecto = "";
        data.cav_vendedor = "";
        data.cav_incentivo = "";
        data.cav_incentivo_counter = "";
        data.cav_per_vendedor = "";
        data.cav_igual_per_vendedor = "";
        data.cav_f_salida = "";
        data.cav_horasalida = "";
        data.cav_nro_vuelo = "";
        data.cav_clase = "";
        data.cav_f_retorno = "";
        data.cav_hora_retorno = "";
        data.obs_f_solicitada = "";
        data.obs_monto = "";
        data.fpa_monto_pago = "";
        data.fpa_contacto = "";
        data.fpa_credito = "";
        data.fpa_tarjeta = "";
        data.fpa_nro_cheque = "";
        data.eb_agencia = "";
        data.eb_igual_agencia = "";
        data.eb_over = "";
        data.eb_gual_over = "";
        data.eb_inafecto = "";
        
        
        
        
        data.tipo_servicio = $("#" + mPrefix + "tipo_servicio").val();
        data.codigo = $("#" + mPrefix + "codigo").val();
        data.cantidad = $("#" + mPrefix + "cantidad").val();
        data.valor_unitario = $("#" + mPrefix + "valor_unitario").val();
        data.detalle = $("#" + mPrefix + "detalle").val();
        data.proveedor = $("#" + mPrefix + "proveedor").val();
        data.tarifa_neta = $("#" + mPrefix + "tarifa_neta").val();
        data.comi_proveedor_porcentaje = $("#" + mPrefix + "comi_proveedor_porcentaje").val();
        data.comi_proveedor_fija = $("#" + mPrefix + "comi_proveedor_fija").val();
        data.fee_proveedor = $("#" + mPrefix + "fee_proveedor").val();
        data.fee_proveedor_conf = $("#" + mPrefix + "fee_proveedor_conf").val();
        data.fee_agencia = $("#" + mPrefix + "fee_agencia").val();
        data.impuesto = $("#" + mPrefix + "impuesto").val();
        data.incentivo_add = $("#" + mPrefix + "incentivo_add").val();
        data.otros = $("#" + mPrefix + "otros").val();
        data.costo = $("#" + mPrefix + "costo").html();
        data.incentivo = $("#" + mPrefix + "incentivo").val();
        data.observaciones = $("#" + mPrefix + "observaciones").val();
        
        
        if (data.tipo_servicio !== '' && data.codigo !== '' && data.cantidad !== '' && data.valor_unitario !== '') {
            if (self.current_serice_doc === -1) {
                self.list_service_doc.push(data);
            } else {
                self.list_service_doc[self.current_serice_doc] = data;
            }
            self.setOcultoDetalleServicio(mPrefix);
            self.makeTableServiceDoc(mPrefix);
            self.resetServiceDocReset(mPrefix);
            self.detalle_servicio = "";
            //self.calcularComisionesChildren();
        }
    };
    self.makeTableServiceDoc = function (mPrefix) {
        var html = '';
        var count = 0;
        var subtotal = 0;
        var tasa = 18;
        var total1 = 0;

        if (self.list_service_doc.length === 0) {
            html += `<tr>
                        <td colspan="9">
                            <center>
                                NO SE ENCONTRARON RESULTADOS
                            </center>
                        </td>
                    </tr>`;
        } else {
            self.list_service_doc.forEach(function (element) {
                var utilidad = ((parseInt(element.tarifa_neta) * parseFloat(element.comi_proveedor_porcentaje)) / 100) + parseInt(element.comi_proveedor_fija) + parseInt(element.fee_agencia);
                var valor = (element.cantidad) * parseFloat(element.valor_unitario).toFixed(3);

                //getServicios estaba con un ID estatico de 8 y hacia un ajax
                html += `<tr  style="background-color:#FFFFFF">
                            <td><center>` + (count + 1) + `</center></td>
                            <td><center>` + element.tipo_servicio + `</center></td>
                            <td><center>` + element.detalle + `</center></td>
                            <td><center>` + element.codigo + `</center></td>
                            <td><center>` + element.cantidad + `</center></td>
                            <td><center>` + valor.toFixed(3) + `</center></td>
                            <td><center>` + element.proveedor + `</td>
                            <td><center>` + utilidad.toFixed(3) + `</td>
                            <td>
                                <center>
                                    <a href="javascript:void(` + count + `);" onclick="sales.setServicios(` + count + `,'` + mPrefix + `');"><i class="fa fa-edit"></i></a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='sales.removeServiceDoc(` + count + `,"` + mPrefix + `")' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>
                        </tr>`;

                subtotal = subtotal + (element.cantidad) * parseFloat(element.valor_unitario).toFixed(3);
                total1 = subtotal;
                iva = (subtotal * tasa) / 100;
                count++;
            });
        }
        $("#" + mPrefix + "table_customer_travel_children tbody").empty().append(html);
        $('#' + mPrefix + 'subtotal').val(subtotal.toFixed(3));
        $('#' + mPrefix + 'total1').val(total1.toFixed(3));


    };
    self.resetServiceDocReset = function (mPrefix) {
        $("#" + mPrefix + "tipo_servicio").val("");
        $("#" + mPrefix + "codigo").val("");
        $("#" + mPrefix + "cantidad").val("");
        $("#" + mPrefix + "valor_unitario").val("");
        $("#" + mPrefix + "detalle").val("");
        $("#" + mPrefix + "proveedor").val("");
        $("#" + mPrefix + "tarifa_neta").val("");
        $("#" + mPrefix + "comi_proveedor_porcentaje").val("");
        $("#" + mPrefix + "comi_proveedor_fija").val("");
        $("#" + mPrefix + "fee_proveedor").val("");
        $("#" + mPrefix + "fee_proveedor_conf").val("");
        $("#" + mPrefix + "fee_agencia").val("");
        $("#" + mPrefix + "incentivo_add").val("");
        $("#" + mPrefix + "otros").val("");
        $("#" + mPrefix + "incentivo").val("");
        $("#" + mPrefix + "impuesto").val("");
        $("#" + mPrefix + "observaciones").val("");
        $("#" + mPrefix + "costo").html("0");
        self.current_serice_doc = -1;
    };
    self.getServiceDoc = function (obj) {
        self.current_serice_doc = obj;
        var current = self.list_service_doc[obj];
        $("#detalle_servicio").val(current.service_doc_name);
        $("#cbo_comision_payment_servicio").val(current.service_doc_type);
        $("#proveedor").val(current.proveedor);
        $("#fee_proveedor").val(current.fee_proveedor);
        $("#tributo_travel").val(current.service_doc_trib);
        $("#travel_cantidad").val(current.service_doc_quantity);
        $("#cbo_amount_comision_payment_children").val(current.service_doc_amount);
    };



    self.removeServiceDoc = function (obj, mPrefix) {
        self.list_service_doc.splice(obj, 1);
        //   self.addServiceDoc();
        self.setOcultoDetalleServicio(mPrefix);
        self.makeTableServiceDoc(mPrefix);
    };

    self.modal_views = function (id, mPrefix) {
        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            url: self.current_url + "index.php/sales/getSales",
            success: function (res) {
                var response = JSON.parse(res);
                if (response.success) {
                    self.action_form = self.current_url + "index.php/sales/updateSales";
                    var data = response.data[0];
                    if (data.hasOwnProperty("data")) {
                        if (data.data !== '' && data.data !== null) {
                            var data_sales = JSON.parse(data.data);
                            $("#" + mPrefix + "data").val(data.data);
                            if (data_sales.hasOwnProperty('detalle_servicio_json')) {
                                if (data_sales.detalle_servicio_json !== "")
                                {
                                    self.list_service_doc = JSON.parse(data_sales.detalle_servicio_json);
                                    self.setOcultoDetalleServicio(mPrefix);
                                    self.makeTableServiceDoc(mPrefix);
                                    self.resetServiceDocReset(mPrefix);
                                    self.detalle_servicio = "";
                                }
                            }
                            if (data_sales.hasOwnProperty('detalle_condicion_pago_json')) {
                                if (data_sales.detalle_condicion_pago_json !== "") {
                                    self.customer_pay_list = JSON.parse(data_sales.detalle_condicion_pago_json);
                                    self.resetCustomerPay(mPrefix);
                                    self.makeTablePay(mPrefix);
                                }
                            }
                            $("#" + mPrefix + "subtotal").val(data_sales.subtotal|| "");
                            $("#" + mPrefix + "porcentaje").val(data_sales.porcentaje|| "");
                            $("#" + mPrefix + "utilidad1").val(data_sales.utilidad1|| "");
                            $("#" + mPrefix + "igv").val(data_sales.igv|| "");
                            $("#" + mPrefix + "total1").val(data_sales.total1|| "");
                            $("#" + mPrefix + "subtotal1").val(data_sales.subtotal1|| "");
                            $("#" + mPrefix + "porcentaje1").val(data_sales.porcentaje1|| "");
                            $("#" + mPrefix + "utilidad11").val(data_sales.utilidad11|| "");
                        }
                    }
                    $("#" + mPrefix + "id").val(id);
                    $("#" + mPrefix + "name").val(data.name);
                    $("#" + mPrefix + "email").val(data.email);
                    $("#" + mPrefix + "modal-title-coti").html(data.cotizacion_id);
                    $("#" + mPrefix + "modal_views").modal("show");
                    $('#' + mPrefix + 'modal_views input[name="nro_doc_rct"]').val(data.num_doc_rct);
                    $('#' + mPrefix + 'modal_views input[name="telefono"]').val(data.telefono);
                    $('#' + mPrefix + 'modal_views input[name="dir_des_rct"]').val(data.dir_des_rct);
                    $('#' + mPrefix + 'modal_views select[name="tip_doc_rct"]').val(data.tip_doc_rct);
                    $('#' + mPrefix + 'modal_views input[name="data"]').val(data.data);
                    $('#' + mPrefix + 'sale_observaciones').html(data.descripcion);


                }
            }
        });
    };

    self.setOcultoDetalleServicio = function (mPrefix) {
        var list_service_doc = self.list_service_doc;
        $('#' + mPrefix + 'detalle_servicio_json').val(JSON.stringify(list_service_doc));
    };

    self.setCustomerFilter = function () {
        var val = $('#search_value').val();
        var current = $('#list_travel_search').find('option[value="' + val + '"]').data('id');
        if (current !== null) {
            $.ajax({
                type: "POST",
                data: {
                    "person_id": current
                },
                url: travel.current_url + "index.php/travel/info",
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        data = data.data;
                        //armamos apellidos y nombres
                        nombre_completo = data.lastname + ' ' + data.mother_lastname + ' ' + data.firstname + ' ' + data.middlename;
                        $('input[name="name"]').val(nombre_completo);
                        //seteamos el primer tipo de documento y nro de documento, primera direccion, primer email y primer telefono
                        personal_data = JSON.parse(data.data); //info parseada del campo DATA
                        info_doc1 = personal_data.documents[0];
                        info_direc1 = personal_data.address[0];
                        info_email1 = personal_data.emails[0];
                        info_phone1 = personal_data.phones[0];

                        if (personal_data.address.length > 0) {
                            val_direccion = info_direc1.address;
                            $('input[name="dir_des_rct"]').val(val_direccion);
                        }

                        if (personal_data.emails.length > 0) {
                            val_email = info_email1.email || '';
                            $('input[name="email"]').val(val_email);
                        }

                        if (personal_data.phones.length > 0) {
                            val_telefono = info_phone1.nro_phone || '';
                            $('input[name="telefono"]').val(val_telefono);
                        }


                        if (personal_data.documents.length > 0) {
                            val_nrodoc = info_doc1.nro_doc;
                            $('input[name="nro_doc_rct"]').val(val_nrodoc);

                            if (info_doc1.type_document == 'dni') {
                                val_tipodoc = 1;
                            } else {
                                val_tipodoc = 6;
                            }
                            $('select[name="tip_doc_rct"]').val(val_tipodoc);
                        }



                    }
                }
            });
        }
    };

    self.getSolicitud = function () {
        var key = $('#code_travel_search').val();
        if (key !== null) {
            $.ajax({
                type: "POST",
                data: $("#form_travel_code_search").serialize(),
                url: $("#form_travel_code_search").attr("action"),
                success: function (response) {
                    // var data = JSON.parse(response);
                    var data = JSON.parse(response)[0];
                    $('#destiny_origin_travel').val(data.destiny_origin);
                    $('#destiny_end_travel').val(data.destiny_end);
                    $('#name_travel').val(data.name);
                    $('#customer_document').val(data.customer_id);
                    $('#customer_name').val(data.first_name + ' ' + data.last_name);
                    $('#customer_address').text(data.address_1);
                    // document.getElementById("date_init_travel").value = data.date_init.replace(" ","T");
                    // document.getElementById("date_end_travel").value = data.date_end.replace(" ","T");
                    self.list_comision = [];
                    if (data.hasOwnProperty("comisiones")) {
                        self.list_comision = data_travel.comisiones;
                        self.makeTableComision();
                    }
                }
            });
        }
    };

    self.populateTable = function () {
        var html = "";
        if (self.list_customer.length > 0) {
            $("#table_customer_travel tbody").empty();
            for (var i = 0; i < self.list_customer.length; i++) {
                $('#customer_id').val(self.list_customer[i].person_id);
                $('#customer_document').val(self.list_customer[i].person_id);
                $('#customer_name').val(self.list_customer[i].first_name + " " + self.list_customer[i].last_name);
                $('#customer_address').text(self.list_customer[i].address_1);
            }
        } else {
            $("#table_customer_travel tbody").empty();
            html += `<tr>
                        <td colspan="6">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
            $("#table_customer_travel tbody").append(html);
        }
    };

    self.getOption = function (idObj, index) {
        var html = "";
        html = `<center>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0);" onclick="travel.removeCustomer(` + idObj + `,` + index + `)" >Remover</a></li>
                            <li><a href="javascript:void(0);" onclick="travel.openModalCustomer(` + idObj + `)">Viajes</a></li>
                        </ul>
                    </div>
                </center>`;
        return html;
    };

    self.saveDetailTravel = function (idObj) {
        $.ajax({
            url: travel.current_url + "index.php/travel/updateCustomer/" + idObj,
            type: "POST",
            data: $("#frm_travel_customer_detail_" + idObj).serialize(),
            success: function (response) {
                console.log(response);
            }
        });
    };

    self.registerTravel = function () {
        //ID DEL CLIENTE
        customer_document = $('#customer_document').val();
        //DATOS DEL VIAJE
        code_travel = $('#code_travel').val();
        name_travel = $('#name_travel').val();
        //DESTINOS DE VIAJE
        destiny_origin_travel = $('#destiny_origin_travel').val();
        destiny_end_travel = $('#destiny_end_travel').val();
        //FECHAS DE SALIDA
        date_init_travel = $("#date_init_travel").val();
        date_end_travel = $("#date_end_travel").val();
        //TIPO DE VIAJE
        type_travel = $('#type_travel').val();
        data_cotizacion = $('#json_cotizacion').val();
        travel_id = $('#travel_id_hidden').val();
        data = {
            'data': travel.list_comision,
            'data_cotizacion': data_cotizacion,
            'customer_document': customer_document,
            'code_travel': code_travel,
            'name_travel': name_travel,
            'destiny_origin_travel': destiny_origin_travel,
            'destiny_end_travel': destiny_end_travel,
            'date_init': date_init_travel,
            'date_end': date_end_travel,
            'type_travel': type_travel,
            'travel_id': travel_id
        };

        if (travel_id == '') {
            $.ajax({
                url: travel.current_url + "index.php/travel/registerTravel/",
                type: "POST",
                data: data,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (!data.success) {
                        $(".messages_modal").text("Ha ocurrido un error");
                    }
                    // $("#modal_success").modal("show");
                    travel.showLastRegisterTravel(data.travel);
                    $('#showLastTravel').show();
                }
            })
        } else {
            $.ajax({
                url: travel.current_url + "index.php/travel/registerTravel/",
                type: "POST",
                data: data,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (!data.success) {
                        $(".messages_modal").text("Ha ocurrido un error");
                    }
                    // $("#modal_success").modal("show");
                    travel.showLastRegisterTravel(data.travel);
                    $('#showLastTravel').show();
                }
            })
        }

    };

    self.showLastRegisterTravel = function (travel) {
        self.last_travel = travel;
        self.last_list_comision = self.list_comision;
        self.list_comision = [];
        $('input').val('');
        $('input[type="datetime-local"').val('');
        self.makeTableComision();
        self.setTravelCode();
    };

    self.showLastTravel = function () {
        if (self.last_travel != '') {
            $.ajax({
                url: travel.current_url + "index.php/travel/getLastTravelInfo/",
                type: "POST",
                data: {
                    'travel_id': self.last_travel
                },
                success: function (response) {
                    ///////////////////
                    var data = JSON.parse(response);
                    ////info cliente
                    $('#customer_document').val(data.person_id);
                    $('#customer_name').val(data.first_name + ' ' + data.last_name);
                    $('#customer_address').val(data.customer_address);


                    $('#code_travel').val(data.code);
                    // $('#name_travel').val(data.name);
                    // $('#destiny_origin_travel').val(data.destiny_origin);
                    // $('#destiny_end_travel').val(data.destiny_end);
                    // $('#date_init_travel').val(data.date_init.replace(' ','T').replace(':00', ''));
                    // $('#date_end_travel').val(data.date_end.replace(' ','T').replace(':00', ''));
                    // $('#type_travel').val(data.type_travel);

                    self.list_comision = self.last_list_comision;
                    self.makeTableComision();
                }
            })
        }

    }

    self.suggest = function (obj) {
        var value = obj.value || '';
        if (value.length > 3) {
            $.ajax({
                url: $("#form_travel_search").attr('action'),
                type: "POST",
                data: {
                    'key': value
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        $("#list_travel_search").empty();
                        for (var i = 0; i < data.data.length; i++) {
                            var opt = $("<option></option>").attr("value", data.data[i].value).attr("data-id", data.data[i].person_id);
                            $("#list_travel_search").append(opt);
                        }
                    }
                }
            });
        }
    };

    self.removeCustomer = function (idObj, index) {
        self.list_customer.splice(index, 1);
        self.populateTable();
    };

    self.openModalCustomer = function (idObj) {
        $("#modal_travel").modal("show");
    };

    self.search = function (obj) {
        var value = obj.value || '';
        if (value.length > 3) {
            $.ajax({
                url: $("#form_travel_search").attr('action'),
                type: "POST",
                data: {
                    'key': value
                },
                success: function (data) {
                    data = JSON.parse(data);
                    names = [];
                    dnis = [];
                    items = '';

                    for (var i = 0; i < data.length; i++) {
                        names[i] = data[i].first_name + ' ' + data[i].last_name;
                        dnis[i] = data[i].person_id;
                        items += "<span onclick='travel.fillTable(this)' dni='" + data[i].person_id + "' fullname='" + names[i] + "' class='form-control item' style='float:left; clear:left;width: 600px;'>" + names[i] + "</span>";

                    }
                    $('#result').html(items);
                }

            })
        }

    };

    self.fillTable = function (obj) {
        var row = '';
        row += '<tr>';
        row += '<td>';
        row += '<center><a id="row_open_1" href="javascript:void(0);" title="Agregar Detalles" onclick="travel.changeRow(1);"><i class="fa fa-angle-right"></i></a></center>';
        row += '</td>';
        row += '<td>' + obj.getAttribute('dni') + '</td>';
        row += '<td>' + obj.getAttribute('fullname') + '</td>';
        row += '<td>valor_random</td>';
        row += '<td>valor_random</td>';
        row += '<td>';
        row += '<center>';
        row += '<div class="btn-group">';
        row += '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
        row += '<span class="caret"></span>';
        row += '<span class="sr-only">Toggle Dropdown</span>';
        row += '</button>';
        row += '<ul class="dropdown-menu" role="menu">';
        row += '<li><a href="javascript:void(0);">Remover</a></li>';
        row += '<li><a href="javascript:void(0);">Agregar Comisiones</a></li>';
        row += '<li><a href="javascript:void(0);">Agregar Vuelos</a></li>';
        row += '</ul>';
        row += '</div>';
        row += '</center>';
        row += '</td>';
        row += '</tr>;';

        $('.table.table-hover.table-bordered').append(row);
        $('#result').html('');
    }

    self.addComision = function (val = null) {
        if ($("#cbo_comision_payment").val() !== '') {
            var data = {};
            data.key = $("#cbo_comision_payment option:selected").attr("data-key");
            data.name = $("#cbo_comision_payment option:selected").text();
            data.ammount = $("#amount_travel").val();
            data.monto = 0.00;
            if (val === 'fee') {
                data.key = 'fee';
                data.name = 'FEE';
                data.ammount = "";
                data.monto = 0.00;
            }
            $(".error_comision").hide();
            self.list_comision.push(data);
            self.makeTableComision();
            self.calcularComisiones();
    }
    };

    self.addComisionChildren = function (val = null) {
        var code_service = $("#travelid").val();
        var code_comision = $("#cbo_code_comision_payment_children").val();
        var amount_comision = $("#cbo_amount_comision_payment_children").val();
        if ($("#cbo_comision_payment_children").val() !== '') {
            var data = {};
            data.service = code_service;
            data.key = code_service;
            data.name = code_service;
            data.ammount = code_comision;
            data.monto = amount_comision;
            if (val === 'fee') {
                data.service = code_service;
                data.key = 'fee';
                data.name = 'FEE';
                data.ammount = code_comision;
                data.monto = amount_comision;
            }
            self.list_comision_children.push(data);
            self.makeTableComisionChildren();
            self.calcularComisionesChildren();
            if (self.list_comision[self.current_service] !== undefined) {
                var service = self.list_comision[self.current_service];
                service.childrens = self.list_comision_children;
                self.list_comision[self.current_service] = service;
            }
            $("#cbo_code_comision_payment_children").val("");
            $("#cbo_amount_comision_payment_children").val(0);
    }
    };

    self.addServicio = function (val = null) {
        // var code_service = $("#cbo_comision_payment_servicio").val();
        // var code_comision = $("#cbo_code_comision_payment_children").val();
        var code_service = $("#detalle_servicio").val();
        var code_comision = $("#cbo_comision_payment_servicio option:selected").text();
        var amount_comision = $("#cbo_amount_comision_payment_children").val(); // precio unitario
        var tributo_travel = $('#tributo_travel option:selected').text();
        var travel_cantidad = $('#travel_cantidad').val();
        var montototal = $('#montototal').val();
        if ($("#cbo_comision_payment_children").val() !== '') {
            var data = {};
            data.service = code_service;
            data.key = code_service;
            data.name = code_service;
            data.ammount = code_comision;
            data.tributo_travel = tributo_travel;
            data.travel_cantidad = travel_cantidad;
            data.montototal = montototal;
            data.monto = amount_comision;
            if (val === 'fee') {
                data.service = code_service;
                data.key = 'fee';
                data.name = 'FEE';
                data.ammount = code_comision;
                data.monto = amount_comision;
            }
            self.list_comision_children.push(data);
            self.makeTableComisionChildren();
            self.calcularComisionesChildren();
            if (self.list_comision[self.current_service] !== undefined) {
                var service = self.list_comision[self.current_service];
                service.childrens = self.list_comision_children;
                self.list_comision[self.current_service] = service;
            }
            $("#cbo_code_comision_payment_children").val("");
            $("#cbo_amount_comision_payment_children").val(0);
    }
    };

    self.calcularComisiones = function () {
        var suma = 0.00;
        for (var i = 0; i < self.list_comision.length; i++) {
            //valor = parseFloat(self.list_comision[i].ammount) || 0;
            valor = (self.list_comision[i].monto !== undefined) ? self.list_comision[i].monto : 0;
            suma = suma + parseFloat(valor);
        }
        $('#total_pago').text(parseFloat(suma).toFixed(3));
    };

    self.calcularComisionesChildren = function () {
        var suma = 0.00;
        for (var i = 0; i < self.list_comision_children.length; i++) {
            valor = (self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto * self.list_comision_children[i].travel_cantidad : 0;
            suma = suma + parseFloat(valor);
        }
        $('#total_pago_children').text(parseFloat(suma).toFixed(3));
    };

    self.makeTableComision = function () {
        var html = '';
        $("#table_customer_travel tbody").empty();
        if (self.list_comision.length === 0) {
            html = `<tr>
                        <td colspan="5">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        } else {
            for (var i = 0; i < self.list_comision.length; i++) {
                var ammount = (self.list_comision[i].ammount !== '' && self.list_comision[i].ammount !== undefined) ? self.list_comision[i].ammount : '';
                var monto = (self.list_comision[i].monto !== '' && self.list_comision[i].monto !== undefined) ? self.list_comision[i].monto : '';

                html += "<tr>";
                html += "<td><center>" + (i + 1) + "</center></td>";
                html += "<td><center>" + self.list_comision[i].name + "</center></td>";
                if (self.list_comision[i].name !== 'FEE') {
                    html += "<td style='text-align: right;'><center>" + ammount + "</center></td>";
                } else {
                    html += "<td style='text-align: right;'>" + '<input type="text" name="amount" size="8">' + "</td>";
                }
                html += "<td><center>" + monto + "</center></td>";
                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComision(` + i + `)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += `<td>
                                <center>
                                    <a href='javascript:void(` + i + `);' title='Agregar Detalle' onclick='travel.openComisionDetail(` + i + `)' >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_travel tbody").append(html);
    };


    self.makeTableComisionChildren = function () {
        var html = '';
        $("#table_customer_sales tbody").empty();
        if (self.list_comision_children.length === 0) {
            html = `<tr>
                        <td colspan="9">
                            <center>
                                No se registrddaron datos.
                            </center>
                        </td>
                    </tr>`;
        } else {
            for (var i = 0; i < self.list_comision_children.length; i++) {
                var ammount = (self.list_comision_children[i].ammount !== '' && self.list_comision_children[i].ammount !== undefined) ? self.list_comision_children[i].ammount : '';
                var tributo_travel = (self.list_comision_children[i].tributo_travel !== '' && self.list_comision_children[i].tributo_travel !== undefined) ? self.list_comision_children[i].tributo_travel : '';
                var travel_cantidad = (self.list_comision_children[i].travel_cantidad !== '' && self.list_comision_children[i].travel_cantidad !== undefined) ? self.list_comision_children[i].travel_cantidad : '';
                var monto = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto : '';
                var montototal = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto * self.list_comision_children[i].travel_cantidad : '';
                html += "<tr>";
                html += "<td><center>" + (i + 1) + "</center></td>";
                html += "<td><center>" + self.list_comision_children[i].name + "</center></td>";
                if (self.list_comision_children[i].name !== 'FEE') {
                    html += "<td style='text-align: right;'><center>" + ammount + "</center></td>";
                } else {
                    html += "<td style='text-align: right;'>" + '<input type="text" name="amount" size="8">' + "</td>";
                }
                html += "<td><center>" + tributo_travel + "</center></td>";
                html += "<td><center>" + travel_cantidad + "</center></td>";
                html += "<td><center>" + monto + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComisionChildren(` + i + `)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_sales tbody").append(html);
    };

    self.makeTableFactura = function () {
        var html = '';
        $("#table_customer_travel_children tbody").empty();
        if (self.list_comision_children.length === 0) {
            html = `<tr>
                        <td colspan="5">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        } else {
            for (var i = 0; i < self.list_comision_children.length; i++) {
                var ammount = (self.list_comision_children[i].ammount !== '' && self.list_comision_children[i].ammount !== undefined) ? self.list_comision_children[i].ammount : '';
                var monto = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto : '';
                html += "<tr>";
                html += "<td><center>" + (i + 1) + "</center></td>";
                html += "<td><center>" + self.list_comision_children[i].name + "</center></td>";
                if (self.list_comision_children[i].name !== 'FEE') {
                    html += "<td style='text-align: right;'><center>" + ammount + "</center></td>";
                } else {
                    html += "<td style='text-align: right;'>" + '<input type="text" name="amount" size="8">' + "</td>";
                }
                html += "<td><center>" + monto + "</center></td>";
                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComisionChildren(` + i + `)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += `<td>
                                <center>
                                    <a href='javascript:void(` + i + `);' title='Agregar Detalle' onclick='travel.openComisionDetailChildren(` + i + `)' >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_travel_children tbody").append(html);
    };

    self.makeTableComisionChildren = function () {
        var html = '';
        $("#table_customer_travel_pay tbody").empty();
        if (self.list_comision_children.length === 0) {
            html = `<tr>
                        <td colspan="9">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        } else {
            for (var i = 0; i < self.list_comision_children.length; i++) {
                var ammount = (self.list_comision_children[i].ammount !== '' && self.list_comision_children[i].ammount !== undefined) ? self.list_comision_children[i].ammount : '';
                var tributo_travel = (self.list_comision_children[i].tributo_travel !== '' && self.list_comision_children[i].tributo_travel !== undefined) ? self.list_comision_children[i].tributo_travel : '';
                var travel_cantidad = (self.list_comision_children[i].travel_cantidad !== '' && self.list_comision_children[i].travel_cantidad !== undefined) ? self.list_comision_children[i].travel_cantidad : '';
                var monto = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto : '';
                var montototal = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto * self.list_comision_children[i].travel_cantidad : '';
                html += "<tr>";
                html += "<td><center>" + (i + 1) + "</center></td>";
                html += "<td><center>" + self.list_comision_children[i].name + "</center></td>";
                if (self.list_comision_children[i].name !== 'FEE') {
                    html += "<td style='text-align: right;'><center>" + ammount + "</center></td>";
                } else {
                    html += "<td style='text-align: right;'>" + '<input type="text" name="amount" size="8">' + "</td>";
                }
                html += "<td><center>" + tributo_travel + "</center></td>";
                html += "<td><center>" + travel_cantidad + "</center></td>";
                html += "<td><center>" + monto + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComisionChildren(` + i + `)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_travel_pay tbody").append(html);
    };


    self.makeTableComisionChildren = function () {
        var html = '';
        $("#table_customer_travel_children tbody").empty();
        if (self.list_comision_children.length === 0) {
            html = `<tr>
                        <td colspan="9">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        } else {
            for (var i = 0; i < self.list_comision_children.length; i++) {
                var ammount = (self.list_comision_children[i].ammount !== '' && self.list_comision_children[i].ammount !== undefined) ? self.list_comision_children[i].ammount : '';
                var tributo_travel = (self.list_comision_children[i].tributo_travel !== '' && self.list_comision_children[i].tributo_travel !== undefined) ? self.list_comision_children[i].tributo_travel : '';
                var travel_cantidad = (self.list_comision_children[i].travel_cantidad !== '' && self.list_comision_children[i].travel_cantidad !== undefined) ? self.list_comision_children[i].travel_cantidad : '';
                var monto = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto : '';
                var montototal = (self.list_comision_children[i].monto !== '' && self.list_comision_children[i].monto !== undefined) ? self.list_comision_children[i].monto * self.list_comision_children[i].travel_cantidad : '';
                html += "<tr>";
                html += "<td><center>" + (i + 1) + "</center></td>";
                html += "<td><center>" + self.list_comision_children[i].name + "</center></td>";
                if (self.list_comision_children[i].name !== 'FEE') {
                    html += "<td style='text-align: right;'><center>" + ammount + "</center></td>";
                } else {
                    html += "<td style='text-align: right;'>" + '<input type="text" name="amount" size="8">' + "</td>";
                }
                html += "<td><center>" + tributo_travel + "</center></td>";
                html += "<td><center>" + travel_cantidad + "</center></td>";
                html += "<td><center>" + monto + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += "<td><center>" + montototal + "</center></td>";
                html += `<td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='travel.removeComisionChildren(` + i + `)' >
                                        <i class='fa fa-trasdddh-alt'></i>
                                    </a>
                                </center>
                            </td>`;
                html += "</tr>";
            }
        }
        $("#table_customer_travel_children tbody").append(html);
    };

    self.showRow = function (row) {
        $("#row_" + row).removeClass("hidden");
        $("#row_" + row).addClass("block");
    };

    self.openComisionDetail = function (row) {
        self.current_service = row;
        $("#comision_obj_id").val(row);
        data = travel.list_comision[row];
        operaciones = ['re-emision', 'reembolso', 'anulacion'];
        if (!$.inArray(travel.list_comision[row].key, operaciones)) {
            $("#modal_operacion").modal("show");
            $('#tipo_operacion').text(travel.list_comision[row].key);
        } else {
            document.getElementById("form_travel_comision_update").reset();
            var cotizar = self.list_comision[row];

            var name = (cotizar.name !== undefined && cotizar.name !== '') ? cotizar.name : '';
            var ammount = (cotizar.ammount !== undefined && cotizar.ammount !== '') ? cotizar.ammount : '';
            var monto = (cotizar.monto !== undefined && cotizar.monto !== '') ? cotizar.monto : '';
            var descripcion = (cotizar.descripcion !== undefined && cotizar.descripcion !== '') ? cotizar.descripcion : '';

            if (ammount !== '' && monto !== '' && descripcion !== '') {
                self.current_pay = self.current_pay - monto;
                $("#travelid").val(name);
                $("#name_travel").val(ammount);
                $("#total_servicios").val(monto);
                $("#descripcion").val(descripcion);
            } else {
                $("#travelid").val(name);
            }

            $("#cbo_comision_payment_children").val("");
            $("#cbo_code_comision_payment_children").val("");
            $("#cbo_amount_comision_payment_children").val(0);

            if (cotizar.childrens !== undefined && cotizar.childrens.length > 0) {
                self.list_comision_children = cotizar.childrens;
            } else {
                self.list_comision_children = [];
            }
            self.makeTableComisionChildren();
            $("#modal_detail_comision").modal("show");
            self.makeTableFactura();
            $("#modal_detail_comision").modal("show");
            /*
             monto_tabla = $('#table_customer_travel').find('tr:eq('+(row+1)+')').find('td:eq(2)').text();
             monto_detalle = data.monto_detalle || monto_tabla;
             nombre_ruc = data.nombre_ruc || $('#customer_name').val();
             dni_ruc = data.dni_ruc || $('#customer_document').val();
             direccion_fiscal = data.direccion_fiscal || $('#customer_address').text();
             
             $('#monto_detalle').val(monto_detalle);
             $('#fee_servicio').val(data.fee_servicio);
             $('#porcentaje_cobro').val(data.porcentaje_cobro);
             $('#nombre_ruc').val(nombre_ruc);
             $('#dni_ruc').val(dni_ruc);
             $('#nombres').val(data.nombres);
             $('#apellidos').val(data.apellidos);
             $('#direccion_fiscal').val(direccion_fiscal);
             
             $('#comision_code').val(data.comision_code);
             $('#monto_comision').val(data.monto_comision);
             
             $('#tipo_doc').val(data.tipo_doc);
             $('#comision_fee[value="'+data.comision_fee+'"]').prop('checked',true)
             $('#comision_percentage').val(data.comision_percentage);
             $('#acumula_millas').val(data.acumula_millas);
             $('#tipo_tarjeta_milla').val(data.tipo_tarjeta_milla);
             $('#nro_tarjeta_milla').val(data.nro_tarjeta_milla);
             $('#incentivos_turifax').val(data.comision_incentive_turifax);
             $('#incentivos_otros').val(data.comision_incentive_otros);
             $('#comision_code').val(data.comision_code);
             $('#comision_type_operator').val(data.comision_type_operator);
             */
        }
    };

    self.openComisionDetailChildren = function (row) {
        var cotizar = self.list_comision_children[row];
        var service = (cotizar.service !== undefined && cotizar.service !== '') ? cotizar.service : '';
        var name = (cotizar.name !== undefined && cotizar.name !== '') ? cotizar.name : '';
        var ammount = (cotizar.ammount !== undefined && cotizar.ammount !== '') ? cotizar.ammount : '';
        var monto = (cotizar.monto !== undefined && cotizar.monto !== '') ? cotizar.monto : '';
        var descripcion = (cotizar.descripcion !== undefined && cotizar.descripcion !== '') ? cotizar.descripcion : '';
        self.current_pay_children = self.current_pay_children - monto;
        $("#cbo_comision_payment_children").val(service);
        $("#cbo_code_comision_payment_children").val(ammount);
        $("#cbo_amount_comision_payment_children").val(monto);
    };

    self.modalCotizacion = function () {
        // $('#muestra_cotizacion').attr('checked', false);
        if ($('#muestra_cotizacion').is(':checked')) {
            $('#btn_nuevo_cliente').hide()
            $('#btn_nuevo_cliente2').show();
        } else {
            $('#btn_nuevo_cliente').show();
            $('#btn_nuevo_cliente2').hide();
        }

    };

    self.setTravelCode = function () {
        $.ajax({
            url: travel.current_url + "index.php/travel/getTravelCode/",
            success: function (response) {
                $('#code_travel').val(response);
                $('#code_travel').attr('disabled', true);
            }
        })
    };

    self.removeComision = function (obj) {
        self.list_comision.splice(obj, 1);
        self.makeTableComision();
        self.calcularComisiones();
    };

    self.removeComisionChildren = function (obj) {
        self.list_comision_children.splice(obj, 1);
        self.makeTableComisionChildren();
        self.makeTableFactura();
        self.calcularComisionesChildren();
    };

    self.validateFormTravel = function () {
        $('#form_travel_save').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                code_travel: {
                    validators: {
                        notEmpty: {message: "El campo código es requerido."}
                    }
                },
                name_travel: {
                    validators: {
                        notEmpty: {message: "El campo nombre es requerido."}
                    }
                },
                destiny_origin_travel: {
                    validators: {
                        notEmpty: {message: "El campo desde es requerido."}
                    }
                },
                destiny_end_travel: {
                    validators: {
                        notEmpty: {message: "El campo hasta es requerido."}
                    }
                },
                date_init_travel: {
                    validators: {
                        notEmpty: {message: "El campo salida es requerido."}
                    }
                },
                date_end_travel: {
                    validators: {
                        notEmpty: {message: "El campo llegada es requerido."}
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            travel.registerTravel();
        });
    };

    self.validateFormUpdateComision = function () {
        $('#form_travel_comision_update').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                comision_code: {
                    validators: {
                        notEmpty: {message: "El campo código es requerido."}
                    }
                },
                comision_amount: {
                    validators: {
                        notEmpty: {message: "El campo comisión es requerido."}
                    }
                },
                comision_percentage: {
                    validators: {
                        notEmpty: {message: "El campo porcentaje es requerido."}
                    }
                },
                comision_type_operator: {
                    validators: {
                        notEmpty: {message: "El campo tipo de operador es requerido."}
                    }
                },
                comision_incentive: {
                    validators: {
                        notEmpty: {message: "El campo incentivo es requerido."}
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var idObj = parseInt($("#comision_obj_id").val());
            var current = self.list_comision[idObj];
            current.comision_code = $("#comision_code").val();
            current.nombres = $("#nombres").val();
            current.apellidos = $("#apellidos").val();
            current.ammount = parseFloat($("#monto_detalle").val()) + parseFloat($('#fee_servicio').val());
            current.fee_servicio = $("#fee_servicio").val();
            current.monto_comision = $("#monto_comision").val();
            current.porcentaje_cobro = $("#porcentaje_cobro").val();
            current.nombre_ruc = $("#nombre_ruc").val();
            current.dni_ruc = $("#dni_ruc").val();
            current.direccion_fiscal = $("#direccion_fiscal").val();
            current.tipo_doc = $("#tipo_doc").val();
            current.comision_fee = $("#comision_fee:checked").val();
            current.comision_percentage = $("#comision_percentage").val();
            current.acumula_millas = $("#acumula_millas").val();
            current.tipo_tarjeta_milla = $("#tipo_tarjeta_milla").val();
            current.nro_tarjeta_milla = $("#nro_tarjeta_milla").val();
            current.comision_type_operator = $("#comision_type_operator").val();
            current.comision_incentive_turifax = $("#incentivos_turifax").val();
            current.comision_incentive_otros = $("#incentivos_otros").val();
            self.list_comision[idObj] = current;
            if ($("#monto_detalle").val() != '') {
                monto_tabla = parseFloat($("#monto_detalle").val()) + parseFloat($('#fee_servicio').val());
                $('#table_customer_travel').find('tr:eq(' + (idObj + 1) + ')').find('td:eq(2)').text($("#comision_code").val());
                $('#table_customer_travel').find('tr:eq(' + (idObj + 1) + ')').find('td:eq(3)').text(monto_tabla);
            }
            self.calcularComisiones();
            $('.close').trigger('click');
            /* HAY QUE ENVIAR AL CONTROLADOR PARA QUE PUEDA ACTUALIZAR ESTE CAMPO DATA */
        });
    };

    self.formCotizacion = function () {
        $('#modal_cotizacion').bootstrapValidator({}).on('success.form.bv', function (e) {
            e.preventDefault();
        });
    };

    self.calcularPorcentaje = function () {
        porcentaje_cobro = parseInt($('#porcentaje_cobro').val()) || 0;
        monto_detalle = parseInt($('#monto_detalle').val()) || 0;
        if (porcentaje_cobro > 100) {
            $('#cobro_total').val(0);
            $('#porcentaje_cobro').val(0);
            return false;
        }
        calculo = porcentaje_cobro * monto_detalle / 100;
        $('#cobro_total').val(calculo);
    };

    self.getConfiguration = function () {
        $('#pagado').toggle(function () {
            if ($('#pagado').is(':checked')) {
                $.ajax({
                    url: travel.current_url + "index.php/travel/getConfig",
                    type: "POST",
                    dataType: 'JSON',
                    success: function (response) {
                        $('#customer_document').val(response[0].value);
                        $('#customer_name').val(response[1].value);
                        $('#customer_address').text(response[2].value);
                    }
                });
            }

        })
    };


    self.openModalCustomer = function () {
        document.getElementById("form_customer_register").reset();
        $("#modal_customer").modal("show");
    };

    self.saveCustomer = function () {
        $('#form_customer_register').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                person_id: {
                    validators: {
                        notEmpty: {message: "El campo documento es requerido."}
                    }
                },
                first_name: {
                    validators: {
                        notEmpty: {message: "El campo nombres es requerido."}
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {message: "El campo apellidos es requerido."}
                    }
                },
                email: {
                    validators: {
                        notEmpty: {message: "El campo email es requerido."}
                    }
                },
                phone_number: {
                    validators: {
                        notEmpty: {message: "El campo teléfono es requerido."}
                    }
                },
                address_1: {
                    validators: {
                        notEmpty: {message: "El campo dirección es requerido."}
                    }
                },
                brevete: {
                    validators: {
                        notEmpty: {message: "El campo licencia es requerido."}
                    }
                },
                passport: {
                    validators: {
                        notEmpty: {message: "El campo pasaporte es requerido."}
                    }
                },
                user_date: {
                    validators: {
                        notEmpty: {message: "El campo fecha de expiración es requerido."}
                    }
                },
            }

        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var data = {};
            data.address = self.customer_address_list;
            data.passports = self.customer_pay_list;
            data.cards = self.customer_card_list;
            data.companies = self.customer_company_list;
            $("#data_customer").val(JSON.stringify(data));
            $.ajax({
                type: "POST",
                url: $("#form_customer_register").attr('action'),
                data: $("#form_customer_register").serialize(),
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        getMessages("messages", data.message, 'success');
                    }
                }
            });
        });
    };

    self.showInfo = function () {
        value = $('#type_travel').val();
        if (value == 'Re-emisión') {
            $('#div_feepenalidad').show(500);
            $('#div_penalidad').show(500);
            $('#info').html('<strong>Info!</strong> Los boletos de Re-emisión necesitan información de Penalidad y Fee de Penalidad.');
            $("#info").fadeTo(2000, 500).slideUp(500, function () {
                $("#info").slideUp(500);
            });
        } else {
            $('#div_feepenalidad').hide(500);
            $('#div_penalidad').hide(500);
        }
    }

    self.generarTablaDatos = function (contenedor, inputs, width) {
        var tabla = '';
        var select = '';
        // inputs = ['razon_social', 'direccion', 'nro_doc'];
        tabla += '<table style="width:' + width + 'px" class="generada" id="' + contenedor + '">';
        tabla += '<tr>';

        arr = [];
        for (var i = 0; i < inputs.length; i++) {
            if (contenedor == 'datos_dni2' && inputs[i] == 'documento') {
                select += '<select>';
                select += '<option value="DNI">DNI</option>';
                select += '<option value="CE">CE</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">' + select + '</td>';
            } else if (contenedor == 'datos_generales' && inputs[i] == 'tipo') {
                select += '<select>';
                select += '<option value="DOMICILIO">DOMICILIO</option>';
                select += '<option value="ENTREGA">ENTREGA</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">' + select + '</td>';
            } else if (contenedor == 'datos_celulares2' && inputs[i] == 'tipo_contacto') {
                select += '<select>';
                select += '<option value="CELULAR">CELULAR</option>';
                select += '<option value="FIJO">FIJO</option>';
                select += '<option value="OTROS">OTROS</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">' + select + '</td>';
            } else if (contenedor == 'datos_emails2' && inputs[i] == 'tipo_email') {
                select += '<select>';
                select += '<option value="EMPRESA">EMPRESA</option>';
                select += '<option value="PERSONAL">PERSONAL</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">' + select + '</td>';
            } else if (contenedor == 'datos_visado' && inputs[i] == 'pais_visado') {
                select += '<select>';
                select += '<option value="AMERICANO">AMERICANO</option>';
                select += '<option value="ESTA">ESTA</option>';
                select += '</select>';
                tabla += '<td style="padding: 3px">' + select + '</td>';
            } else {
                tabla += '<td style="padding: 3px"><input class="' + inputs[i] + '"></td>';
            }

            arr[i] = inputs[i];

            json = $('#json_' + contenedor).val(JSON.stringify(arr));

        }
        tabla += '<td><button class="borrar fa fa-trash"></button></td></tr>';
        tabla += '<table>';
        $('#' + contenedor).append(tabla);
        $('.borrar').click(function () {
            fila = $(this).parent().parent();
            fila.remove();
        })
    };

    self.saveInfoTablas = function () {
        var info = [];
        $('.generada').each(function () {
            var arr = [];
            id = $(this).attr('id');
            var temp = [];
            $('#' + id + ' > tbody > tr').each(function () {
                td = $(this).find('td');
                var i = 0;
                $.each(td, function (index, value) {
                    var isLastElement = index == td.length - 1;

                    if (isLastElement) {
                        arr.push(JSON.stringify(temp));
                        temp = [];
                    }
                    valor = $(this).find(':input').val();
                    if (valor != '') {
                        temp.push(valor);
                    }
                });
            });
            // info.push("["+id+":"+JSON.stringify(arr)+"]");
            info.push("{" + id + ":" + arr + "}");
            // info[id]= arr;
        });
        info.push("[fecha_nacimiento: " + $('#fecha_nac').val() + "]");
        info.push("[nacionalidad: " + $('#nacionalidad').val() + "]");
        info.push("[nombre: " + $('#nombre').val() + "]");
        info.push("[penombre: " + $('#penombre').val() + "]");
        info.push("[ap_paterno: " + $('#ap_paterno').val() + "]");
        info.push("[ap_materno: " + $('#ap_materno').val() + "]");
        info.push("[ap_casada: " + $('#ap_casada').val() + "]");
        info.push("[fecha_vcto: " + $('#fecha_vcto').val() + "]");
        data = JSON.stringify(info);
        $('#json_cotizacion').val(data);
    }


    /* ================ SET TABLE FOR REGISTER CUSTOMER ============= */
    self.saveCustomerAddress = function () {
        var address = $("#address_customer_travel").val();
        var district = $("#district_customer_travel").val();
        var country = $("#country_customer_travel").val();
        var reference = $("#reference_customer_travel").val();
        var type_address = $("#type_address_customer_travel").val();
        var phone = $("#phone_customer_travel").val();

        if (address !== '' && district !== '' && reference !== '' &&
                country !== '' && type_address !== '' && phone !== '') {
            self.customer_address_list.push({
                address: address,
                district: district,
                reference: reference,
                country: country,
                type_address: type_address,
                phone: phone
            });
            $("#address_customer_travel").val("");
            $("#district_customer_travel").val("");
            $("#country_customer_travel").val("");
            $("#reference_customer_travel").val("");
            $("#type_address_customer_travel").val("");
            $("#phone_customer_travel").val("");
            self.makeTableAddress();
        }
    };

    self.removeCustomerAddress = function (index) {
        self.customer_address_list.splice(index, 1);
        self.makeTableAddress();
    };

    self.makeTableAddress = function () {
        var html = '';
        $("#table_customer_address tbody").empty();
        if (self.customer_address_list.length > 0) {
            for (var i = 0; i < self.customer_address_list.length; i++) {
                html += `<tr>
                            <td><center>` + self.customer_address_list[i].type_address + `</center></td>
                            <td><center>` + self.customer_address_list[i].address + `</center></td>
                            <td><center>` + self.customer_address_list[i].district + `</center></td>
                            <td><center>` + self.customer_address_list[i].country + `</center></td>
                            <td><center>` + self.customer_address_list[i].phone + `</center></td>
                            <td><center>` + self.customer_address_list[i].reference + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerAddress(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            html += `<tr>
                        <td colspan="7">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_address tbody").append(html);
    };

    /* ============================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER VISADO ============= */
    self.saveCustomerVisado = function () {
        var visado_country = $("#visado_customer_country").val();
        var visado_nro = $("#visado_customer_nro").val();
        var visado_type = $("#visado_customer_type").val();
        var visado_init_date = $("#visado_customer_init_date").val();
        var visado_end_date = $("#visado_customer_end_date").val();
        if (visado_country !== '' && visado_nro !== '' && visado_type !== '' && visado_init_date !== '' && visado_end_date !== '') {
            self.customer_visado_list.push({
                country: visado_country,
                type: visado_type,
                nro: visado_nro,
                date_init: moment(visado_init_date).format("DD / MM / YYYY"),
                date_end: moment(visado_end_date).format("DD / MM / YYYY")
            });

            $("#visado_customer_country").val("");
            $("#visado_customer_type").val("");
            $("#visado_customer_nro").val("");
            $("#visado_customer_init_date").val("");
            $("#visado_customer_end_date").val("");

            self.makeTableVisado();
        }
    };
//moment().format("DD / MM / YYYY");
    self.makeTableVisado = function () {
        var tbody = '';
        $("#table_customer_visado tbody").empty();
        if (self.customer_visado_list.length > 0) {
            for (var i = 0; i < self.customer_visado_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_visado_list[i].country + `</center></td>
                            <td><center>` + self.customer_visado_list[i].type + `</center></td>      
                            <td><center>` + self.customer_visado_list[i].nro + `</center></td>                            
                            <td><center>` + self.customer_visado_list[i].date_init + `</center></td>
                            <td><center>` + self.customer_visado_list[i].date_end + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerVisado(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="5">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_visado tbody").append(tbody);
    };

    self.removeCustomerVisado = function (index) {
        self.customer_visado_list.splice(index, 1);
        self.makeTableVisado();
    };
    /* ============================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER CONTACTS ============= */

    self.saveCustomerContacts = function () {
        var contact_ruc = $("#contact_customer_ruc").val();
        var contact_name = $("#contact_customer_name").val();
        var contact_address = $("#contact_customer_address").val();

        if (contact_ruc !== '' && contact_name !== '' && contact_address !== '') {
            self.customer_contact_list.push({
                ruc: contact_ruc,
                name: contact_name,
                address: contact_address
            });

            $("#contact_customer_ruc").val("");
            $("#contact_customer_name").val("");
            $("#contact_customer_address").val("");

            self.makeTableContact();
        }
    };

    self.makeTableContact = function () {
        var tbody = '';
        $("#table_customer_contacts tbody").empty();
        if (self.customer_contact_list.length > 0) {
            for (var i = 0; i < self.customer_contact_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_contact_list[i].ruc + `</center></td>
                            <td><center>` + self.customer_contact_list[i].name + `</center></td>                            
                            <td><center>` + self.customer_contact_list[i].address + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerContact(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="4">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_contacts tbody").append(tbody);
    };

    self.removeCustomerContact = function (key) {
        self.customer_contact_list.splice(key, 1);
        self.makeTableContact();
    };

    /* ======================================================================= */

    /* ================ SET TABLE FOR REGISTER CUSTOMER DOCUMENTS ============= */

    self.saveCustomerDocuments = function () {
        var tipo_documento = $("#type_customer_doc").val();
        var nro_doc = $("#nro_customer_doc").val();
        if (tipo_documento !== '' && nro_doc !== '') {
            self.customer_documents_list.push({
                type_document: tipo_documento,
                nro_doc: nro_doc
            });

            $("#type_customer_doc").val("");
            $("#nro_customer_doc").val("");

            self.makeTableDocuments();
        }
    };

    self.makeTableDocuments = function () {
        var tbody = '';
        $("#table_customer_doc tbody").empty();
        if (self.customer_documents_list.length > 0) {
            for (var i = 0; i < self.customer_documents_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_documents_list[i].type_document + `</center></td>
                            <td><center>` + self.customer_documents_list[i].nro_doc + `</center></td>                            
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerDocument(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="3">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_doc tbody").append(tbody);
    };

    self.removeCustomerDocument = function (key) {
        self.customer_documents_list.splice(key, 1);
        self.makeTableDocuments();
    };

    /* ======================================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER PHONES ================ */

    self.saveCustomerPhones = function () {
        var type_phone = $("#type_customer_phone").val();
        var nro_phone = $("#customer_phone").val();
        if (type_phone !== '' && nro_phone !== '') {
            self.customer_phones_list.push({
                type_phone: type_phone,
                nro_phone: nro_phone
            });

            $("#type_customer_phone").val("");
            $("#customer_phone").val("");

            self.makeTablePhones();
        }
    };

    self.makeTablePhones = function () {
        var tbody = '';
        $("#table_customer_phones tbody").empty();
        if (self.customer_phones_list.length > 0) {
            for (var i = 0; i < self.customer_phones_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_phones_list[i].type_phone + `</center></td>
                            <td><center>` + self.customer_phones_list[i].nro_phone + `</center></td>                            
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerPhones(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="3">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_phones tbody").append(tbody);
    };

    self.removeCustomerPhones = function (key) {
        self.customer_phones_list.splice(key, 1);
        self.makeTablePhones();
    };

    /* ======================================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER FRECUENTES ============ */

    self.saveCustomerFrec = function () {
        var millaje_frec = $("#millaje_customer_frec").val();
        var nro_frec = $("#nro_customer_frec").val();
        var user_frec = $("#user_customer_frec").val();
        var pass_frec = $("#pass_customer_frec").val();
        var end_frec = $("#end_customer_frec").val();

        if (millaje_frec !== '' && nro_frec !== '' && user_frec !== '' && pass_frec !== '' && end_frec !== '') {
            self.customer_frec_list.push({
                millaje_frec: millaje_frec,
                nro_frec: nro_frec,
                user_frec: user_frec,
                pass_frec: pass_frec,
                end_frec: end_frec
            });

            $("#millaje_customer_frec").val("");
            $("#nro_customer_frec").val("");
            $("#user_customer_frec").val("");
            $("#pass_customer_frec").val("");
            $("#end_customer_frec").val("");

            self.makeTableFrec();
        }
    };

    self.makeTableFrec = function () {
        var tbody = '';
        $("#table_customer_frec tbody").empty();
        if (self.customer_frec_list.length > 0) {
            for (var i = 0; i < self.customer_frec_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_frec_list[i].millaje_frec + `</center></td>
                            <td><center>` + self.customer_frec_list[i].nro_frec + `</center></td>                            
                            <td><center>` + self.customer_frec_list[i].user_frec + `</center></td>
                            <td><center>` + self.customer_frec_list[i].pass_frec + `</center></td>
                            <td><center>` + self.customer_frec_list[i].end_frec + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerFrec(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="6">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_frec tbody").append(tbody);
    };

    self.removeCustomerFrec = function (key) {
        self.customer_frec_list.splice(key, 1);
        self.makeTableFrec();
    };

    /* ======================================================================== */


    /* ================ SET TABLE FOR TARJETAS ============ */

    self.saveTarjetas = function () {
        var tipo_tarjeta = $("#tipo_tarjeta").val();
        var nro_tarjeta = $("#nro_tarjeta").val();
        var debito_credito = $("#debito_credito").val();

        if (tipo_tarjeta !== '' && nro_tarjeta !== '' && debito_credito !== '') {
            self.customer_tarjtas_list.push({
                tipo_tarjeta: tipo_tarjeta,
                nro_tarjeta: nro_tarjeta,
                debito_credito: debito_credito,
            });

            $("#tipo_tarjeta").val("");
            $("#nro_tarjeta").val("");
            $("#debito_credito").val("");

            self.makeTableTarjetas();
        }
    };

    self.makeTableTarjetas = function () {
        var tbody = '';
        $("#table_tarjetas tbody").empty();
        if (self.customer_tarjtas_list.length > 0) {
            for (var i = 0; i < self.customer_tarjtas_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_tarjtas_list[i].tipo_tarjeta + `</center></td>
                            <td><center>` + self.customer_tarjtas_list[i].nro_tarjeta + `</center></td>                            
                            <td><center>` + self.customer_tarjtas_list[i].debito_credito + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeTarjeta(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="6">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_tarjetas tbody").append(tbody);
    };

    self.removeTarjeta = function (key) {
        self.customer_tarjtas_list.splice(key, 1);
        self.makeTableTarjetas();
    };

    /* ======================================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER EMAILS ================ */

    self.saveCustomerEmails = function () {
        var type_email = $("#type_customer_email").val();
        var email = $("#customer_email").val();
        if (type_email !== '' && email !== '') {
            self.customer_emails_list.push({
                type_email: type_email,
                email: email
            });

            $("#type_customer_email").val("");
            $("#customer_email").val("");

            self.makeTableEmails();
        }
    };

    self.makeTableEmails = function () {
        var tbody = '';
        $("#table_customer_emails tbody").empty();
        if (self.customer_emails_list.length > 0) {
            for (var i = 0; i < self.customer_emails_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_emails_list[i].type_email + `</center></td>
                            <td><center>` + self.customer_emails_list[i].email + `</center></td>                            
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerEmails(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="3">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_emails tbody").append(tbody);
    };

    self.removeCustomerEmails = function (key) {
        self.customer_emails_list.splice(key, 1);
        self.makeTableEmails();
    };

    /* ======================================================================== */




    /* ================ SET TABLE FOR REGISTER CUSTOMER PASSPORT ============= */
    self.saveCustomerPassport = function () {
        var passport_country = $("#passport_customer_country").val();
        var passport_nro = $("#passport_customer_nro").val();
        var passport_date = $("#passport_customer_date").val();
        var passport_init_date = $("#passport_customer_init_date").val();
        var passport_nationality = $("#passport_customer_nationality").val();

        if (passport_country !== '' && passport_nro !== '' && passport_date !== '' && passport_init_date !== '' && passport_nationality !== '') {
            self.customer_passport_list.push({
                country: passport_country,
                nro: passport_nro,
                date: moment(passport_date).format("DD / MM / YYYY"),
                date_init: moment(passport_init_date).format("DD / MM / YYYY"),
                nationality: passport_nationality
            });

            $("#passport_customer_country").val("");
            $("#passport_customer_nro").val("");
            $("#passport_customer_date").val("");
            $("#passport_customer_init_date").val("");
            $("#passport_customer_nationality").val("");

            self.makeTablePassport();
        } else {
            console.log("errores");
        }
    };

    self.removeCustomerPassport = function (index) {
        self.customer_passport_list.splice(index, 1);
        self.makeTablePassport();
    };

    self.makeTablePassport = function () {
        var html = '';
        $("#table_customer_passport tbody").empty();
        if (self.customer_passport_list.length > 0) {
            for (var i = 0; i < self.customer_passport_list.length; i++) {
                html += `<tr>
                            <td><center>` + self.customer_passport_list[i].nro + `</center></td>
                            <td><center>` + self.customer_passport_list[i].country + `</center></td>
                            <td><center>` + self.customer_passport_list[i].date_init + `</center></td>
                            <td><center>` + self.customer_passport_list[i].date + `</center></td>
                            <td><center>` + self.customer_passport_list[i].nationality + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerPassport(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            html += `<tr>
                        <td colspan="4">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_passport").append(html);
    };

    /* =================================================================== */

    /* ================ SET TABLE FOR REGISTER CUSTOMER CARD ============= */

    self.saveCustomerCard = function () {
        var card_brand = $("#card_customer_brand").val();
        var card_nro = $("#card_customer_nro").val();
        var card_type = $("#card_customer_type").val();
        if (card_brand !== '' && card_nro !== '' && card_type !== '') {
            self.customer_card_list.push({
                brand: card_brand,
                nro: card_nro,
                type: card_type
            });

            $("#card_customer_brand").val("");
            $("#card_customer_nro").val("");
            $("#card_customer_type").val("");

            self.makeTableCard();
        }
    };

    self.removeCustomerCard = function (index) {
        self.customer_card_list.splice(index, 1);
        self.makeTableCard();
    };

    self.makeTableCard = function () {
        var html = '';
        $("#table_customer_card tbody").empty();
        if (self.customer_card_list.length > 0) {
            for (var i = 0; i < self.customer_card_list.length; i++) {
                html += `<tr>
                            <td><center>` + self.customer_card_list[i].brand + `</center></td>
                            <td><center>` + self.customer_card_list[i].nro + `</center></td>
                            <td><center>` + self.customer_card_list[i].type + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerCard(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            html += `<tr>
                        <td colspan="4">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_card").append(html);
    };

    /* =================================================================== */

    /* ============= SET TABLE FOR REGISTER CUSTOMER COMPANY ============= */

    self.saveCustomerCompany = function () {
        var company_ruc = $("#company_customer_ruc").val();
        var company_name = $("#company_customer_name").val();
        var company_mail = $("#company_customer_mail").val();

        var company_address = $("#company_customer_address").val();
        var company_district = $("#company_customer_district").val();
        var company_phone = $("#company_customer_phone").val();
        var company_reference = $("#company_customer_reference").val();

        if (company_ruc !== '' && company_name !== '' && company_mail !== '') {
            self.customer_company_list.push({
                ruc: company_ruc,
                name: company_name,
                mail: company_mail,
                reference: company_reference,
                phone: company_phone,
                district: company_district,
                address: company_address
            });

            $("#company_customer_ruc").val("");
            $("#company_customer_name").val("");
            $("#company_customer_mail").val("");
            $("#company_customer_address").val("");
            $("#company_customer_district").val("");
            $("#company_customer_phone").val("");
            $("#company_customer_reference").val("");

            self.makeTableCompany();
        }
    };

    self.removeCustomerCompany = function (index) {
        self.customer_company_list.splice(index, 1);
        self.makeTableCompany();
    };

    self.makeTableCompany = function () {
        var html = '';
        $("#table_customer_company tbody").empty();
        if (self.customer_company_list.length > 0) {
            for (var i = 0; i < self.customer_company_list.length; i++) {
                html += `<tr>
                            <td><center>` + self.customer_company_list[i].ruc + `</center></td>
                            <td><center>` + self.customer_company_list[i].name + `</center></td>
                            <td><center>` + self.customer_company_list[i].mail + `</center></td>
                            <td><center>` + self.customer_company_list[i].address + `</center></td>
                            <td><center>` + self.customer_company_list[i].district + `</center></td>
                            <td><center>` + self.customer_company_list[i].phone + `</center></td>
                            <td><center>` + self.customer_company_list[i].reference + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeCustomerCompany(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            html += `<tr>
                        <td colspan="8">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_customer_company").append(html);
    };

    self.saveDescripcion = function () {
        var descripcion = $('#descripcion').val() || '';
        self.customer_description = descripcion;
    };

    self.saveFamiliar = function () {
        var relacion = $("#contact_familiar_relacion").val();
        var nombre = $("#contact_familiar_nombre").val();
        var telefono = $("#contact_familiar_telefono").val();
        var preferencia_asiento = $("#contact_familiar_prefasiento").val();
        var indicaciones = $("#contact_familiar_indicaciones").val() || '';

        if (relacion !== '' && nombre !== '' && telefono !== '' && preferencia_asiento != '') {
            self.customer_familiares_list.push({
                relacion: relacion,
                nombre: nombre,
                telefono: telefono,
                preferencia_asiento: preferencia_asiento,
                indicaciones: indicaciones,
            });

            $("#contact_familiar_relacion").val("");
            $("#contact_familiar_nombre").val("");
            $("#contact_familiar_telefono").val("");
            $("#contact_familiar_prefasiento").val("");
            $("#contact_familiar_indicaciones").val("");

            self.makeTableDatosFamilares();
        }
    };

    self.removeFamiliar = function (index) {
        self.customer_familiares_list.splice(index, 1);
        self.makeTableDatosFamilares();
    };

    self.makeTableDatosFamilares = function () {
        var tbody = '';
        $("#table_familiares tbody").empty();
        if (self.customer_familiares_list.length > 0) {
            for (var i = 0; i < self.customer_familiares_list.length; i++) {
                tbody += `<tr>
                            <td><center>` + self.customer_familiares_list[i].relacion + `</center></td>
                            <td><center>` + self.customer_familiares_list[i].nombre + `</center></td>                            
                            <td><center>` + self.customer_familiares_list[i].telefono + `</center></td>
                            <td><center>` + self.customer_familiares_list[i].preferencia_asiento + `</center></td>
                            <td><center>` + self.customer_familiares_list[i].indicaciones + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="travel.removeFamiliar(` + i + `);">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            tbody += `<tr>
                        <td colspan="6">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#table_familiares tbody").append(tbody);
    }

    /* LIMPIANDO FORMULARIO DE REGISTRO DE CLIENTES */
    self.cancelRegisterCustomer = function () {
        document.getElementById("form_customer_register").reset();
        self.customer_address_list = [];
        self.makeTableAddress();
        self.customer_passport_list = [];
        self.makeTablePassport();
        self.list_service_doc = [];
        self.makeTableServiceDoc();
        self.customer_card_list = [];
        self.makeTableCard();
        self.customer_company_list = [];
        self.makeTableCompany();
    };

    self.getViajes = function () {
        travelid = $('#travel_id_hidden').val() || '';
        console.log(travelid);
        if (travelid != '') {
            $.ajax({
                type: 'POST',
                url: $("#form_travel_code_search").attr("action"),
                data: {
                    "travel_id": travelid
                },
                success: function (response) {
                    console.log(response);
                    ///////////////////
                    var data = JSON.parse(response)[0];
                    console.log(data);
                    ////info cliente
                    $('#customer_document').val(data.person_id);
                    $('#customer_name').val(data.first_name + ' ' + data.last_name);
                    $('#customer_address').val(data.customer_address);


                    $('#code_travel').val(data.code);
                    $('#name_travel').val(data.name);
                    $('#destiny_origin_travel').val(data.destiny_origin);
                    $('#destiny_end_travel').val(data.destiny_end);
                    $('#date_init_travel').val(data.date_init.replace(' ', 'T').replace(':00', ''));
                    $('#date_end_travel').val(data.date_end.replace(' ', 'T').replace(':00', ''));
                    $('#type_travel').val(data.type_travel);
                    tabla = JSON.parse(data.data_travel);
                    console.log(tabla);
                    self.list_comision = tabla.comisiones;
                    self.makeTableComision();

                }
            });
        }

    };

    self.setCamposFecha = function () {
        $('input').each(function () {
            var clase = $(this).attr('class') || '';
            if (clase.search("fecha")) {
                $(this).attr('type', 'date');
            }
        })
    };


    self.listClients = function () {
        $.ajax({
            type: 'POST',
            data: {},
            url: self.current_url + "index.php/customers/listClients",
            success: function (response) {
                var res = JSON.parse(response);
                if (res.success) {
                    var tbody = "";
                    var data = res.data;
                    //var data_client = JSON.parse(data.data);
                    $("#table_clients tbody").empty();
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var id = data[i].id;
                            var nombres = data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase();
                            var apellidos = data[i].lastname.toUpperCase() + ' ' + data[i].mother_lastname.toUpperCase();
                            var genero = (data[i].gender === 'M') ? 'MASCULINO' : 'FEMENINO';

                            //BUSCANDO VALORES EN DATA DE CLIENTES
                            var data_client = JSON.parse(data[i].data);

                            var document = data_client.documents.find(x => x.type_document === "dni" != "dni");
                            var email = data_client.emails.find(x => x.type_email === "empresa" != "personal");
                            var phones = data_client.phones.find(x => x.type_phone === "celular_empresa" != "celular_personal");
                            //VALIDANDO VALORES VACIOS
                            var val_doc = (document !== undefined && document.nro_doc !== "") ? document.nro_doc : ("SIN DOCUMENTO").fontcolor("red");
                            var val_email = (email !== undefined && email.email !== "") ? email.email : ("FALTA INFORMACION").fontcolor("red");
                            var val_phone = (phones !== undefined && phones.nro_phone !== "") ? phones.nro_phone : ("FALTA INFORMACION").fontcolor("red");

                            tbody += `<tr>
                                        <td>` + nombres + `</td>
                                        <td>` + apellidos + `</td>
                                        <td>` + val_doc + `</td>
                                        <td>` + genero + `</td>
                                        <td>` + val_email + `</td>
                                        <td>` + val_phone + `</td>
                                        <td>
                                            <center>
                                                <a href="javascript:void(0);" onclick="travel.getClient(` + id + `);">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="javascript:void(0);" onclick="travel.deleteClient(` + id + `,false);">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>`;
                        }
                    } else {
                        tbody = `<tr>
                                    <td colspan="7">
                                        <center>
                                            NO SE ENCONTRARON RESULTADOS
                                        </center>
                                    </td>
                                </tr>`;
                    }
                    $("#table_clients tbody").append(tbody);
                }
            }
        });
    };

    self.listServicios = function () {
        $.ajax({
            type: 'POST',
            data: {},
            url: self.current_url + "index.php/sales/listServicios",
            success: function (response) {
                var res = JSON.parse(response);
                if (res.success) {
                    var tbody = "";
                    var data = res.data;
                    //var data_client = JSON.parse(data.data);
                    $("#table_clients tbody").empty();
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var id = data[i].id;
                            var cotizacion_id = data[i].cotizacion_id;
                            var servicio = data[i].name;
                            var codigo = data[i].code;
                            var monto = data[i].amount;
                            var fecha = data[i].created_at;

                            tbody += `<tr>
                                        <td>
                                            <center>
                                                <input type="checkbox" name="check[` + id + `]" value="` + id + `"/>
                                            </center>
                                        </td>
                                        <td>` + cotizacion_id + `</td>
                                        <td>` + servicio + `</td>
                                        <td>` + codigo + `</td>
                                        <td>` + monto + `</td>
                                        <td>` + fecha + `</td>
                                      </tr>`;
                        }
                    } else {
                        tbody = `<tr>
                                    <td colspan="7">
                                        <center>
                                            NO SE ENCONTRARON RESULTADOS
                                        </center>
                                    </td>
                                </tr>`;
                    }
                    $("#table_clients tbody").append(tbody);
                }
            }
        });
    };




    self.listCotizacion = function () {
        $.ajax({
            type: 'POST',
            data: {},
            url: self.current_url + "index.php/customers/listSales",
            success: function (response) {
                var res = JSON.parse(response);
                if (res.success) {
                    var tbody = "";
                    var data = res.data;
                    //var data_client = JSON.parse(data.data);
                    $("#table_clients tbody").empty();
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var id = data[i].id;
                            var cotizacion_id = data[i].cotizacion_id;
                            var name = data[i].name.toUpperCase();
                            var estat = data[i].estatus;
                            var estatus = (data[i].estatus === 'C') ? ('VENDIDO').fontcolor("green") : ('COTIZADO').fontcolor("red");
                            var fecha = moment(data[i].fec_doc_ref).format("DD / MM / YYYY");
                            var monto = data[i].mnt_tot;


                            tbody += `<tr>
                                        <td><center>` + id + `</center></td>
                                        <td>` + cotizacion_id + `</td>
                                        <td>` + name + `</td>
                                        <td><center><small class="label bg-green">` + estatus + `</small></center></td>
                                        <td><center>` + fecha + `</center></td>
                                        <td>
                                            <center>
                                                <a href="javascript:void(0);" onclick="sales.modal_views(` + id + `,\'edit_\');"><i class="fa fa-eye"></i>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="index.php/sales/document/?id=` + id + `&cotizacion_id=` + cotizacion_id + `" onclick="travel.addCoti(` + cotizacion_id + `);">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>`;
                        }
                    } else {
                        tbody = `<tr>
                                    <td colspan="8">
                                        <center>
                                            NO SE ENCONTRARON RESULTADOS
                                        </center>
                                    </td>
                                </tr>`;
                    }
                    $("#table_clients tbody").append(tbody);
                }
            }
        });
    };

    /* ================ SET TABLE FOR REGISTER CUSTOMER PAGOS PAY ============= */
    self.saveCustomerPay = function (mPrefix) {
        var i = 0;
        var condicion = $("#" + mPrefix + "condicion").val();
        var forma_pago = $("#" + mPrefix + "forma_pago").val();
        var total = $("#" + mPrefix + "total").val();
        var banco = $("#" + mPrefix + "banco").val();
        var tipo = $("#" + mPrefix + "tipo").val();
        var referencia = $("#" + mPrefix + "referencia").val();
        var fecha_exp = $("#" + mPrefix + "fecha_exp").val();

        if (condicion !== '' && forma_pago !== '' && total !== '') {
            self.customer_pay_list.push({
                condicion: condicion,
                total: total,
                forma_pago: forma_pago,
                banco: banco,
                tipo: tipo,
                referencia: referencia,
                fecha_exp: fecha_exp
            });
            self.resetCustomerPay(mPrefix);
            self.makeTablePay(mPrefix);
        } else {
            console.log("errores");
        }
    };

    self.resetCustomerPay = function (mPrefix) {
        $("#" + mPrefix + "condicion").val("");
        $("#" + mPrefix + "forma_pago").val("");
        $("#" + mPrefix + "total").val("");
        $("#" + mPrefix + "banco").val("");
        $("#" + mPrefix + "tipo").val("");
        $("#" + mPrefix + "referencia").val("");
        $("#" + mPrefix + "fecha_exp").val("");

    };

    self.removeCustomerPay = function (index, mPrefix) {
        self.customer_pay_list.splice(index, 1);
        self.makeTablePay(mPrefix);
    };

    self.makeTablePay = function (mPrefix) {
        $("#" + mPrefix + "detalle_condicion_pago_json").val(JSON.stringify(self.customer_pay_list));
        var html = '';
        $("#table_customer_pay tbody").empty();
        if (self.customer_pay_list.length > 0) {
            for (var i = 0; i < self.customer_pay_list.length; i++) {
                html += `<tr>
                            <td><center>` + (i + 1) + `</center></td>
                            <td><center>` + self.customer_pay_list[i].condicion + `</center></td>
                            <td><center>` + self.customer_pay_list[i].forma_pago + `</center></td>
                            <td><center>` + self.customer_pay_list[i].banco + `</center></td>
                            <td><center>` + self.customer_pay_list[i].tipo + `</center></td>
                            <td style="display: none;"><center>` + self.customer_pay_list[i].fecha_exp + `</center></td>                            
                            <td><center>` + self.customer_pay_list[i].referencia + `</center></td>
                            <td><center></center></td>
                            <td><center>` + self.customer_pay_list[i].total + `</center></td>
                            <td>
                                <a href="javascript:void(0);" onclick="sales.removeCustomerPay(` + i + `,'` + mPrefix + `');">
                                    <center>
                                        <i class="fa fa-trash"></i>
                                    </center>
                                </a>
                            </td>
                        </tr>`;
            }
        } else {
            html += `<tr>
                        <td colspan="9">
                            <center>
                                No se registraron datos.
                            </center>
                        </td>
                    </tr>`;
        }
        $("#" + mPrefix + "table_customer_pay tbody").empty().append(html);
    };




    self.listClientsCoti = function () {
        $.ajax({
            type: 'POST',
            data: {},
            url: self.current_url + "index.php/customers/listClients",
            success: function (response) {
                var res = JSON.parse(response);
                if (res.success) {
                    var tbody = "";
                    var data = res.data;
                    //var data_client = JSON.parse(data.data);
                    $("#table_clients tbody").empty();
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var id = data[i].id;
                            var nombres = data[i].firstname.toUpperCase() + ' ' + data[i].middlename.toUpperCase();
                            var apellidos = data[i].lastname.toUpperCase() + ' ' + data[i].mother_lastname.toUpperCase();
                            var genero = (data[i].gender === 'M') ? 'MASCULINO' : 'FEMENINO';

                            //BUSCANDO VALORES EN DATA DE CLIENTES
                            var data_client = JSON.parse(data[i].data);

                            var document = data_client.documents.find(x => x.type_document === "dni");
                            var email = data_client.emails.find(x => x.type_email === "personal");
                            var phones = data_client.phones.find(x => x.type_phone === "celular_personal");
                            //VALIDANDO VALORES VACIOS
                            var val_doc = (document !== undefined && document.nro_doc !== "") ? document.nro_doc : ("SIN DOCUMENTO").fontcolor("red");
                            var val_email = (email !== undefined && email.email !== "") ? email.email : ("FALTA INFORMACION").fontcolor("red");
                            var val_phone = (phones !== undefined && phones.nro_phone !== "") ? phones.nro_phone : ("FALTA INFORMACION").fontcolor("red");

                            tbody += `<tr>
                                        <td>` + nombres + `</td>
                                        <td>` + apellidos + `</td>
                                        <td>` + val_doc + `</td>
                                        <td>` + genero + `</td>
                                        <td>` + val_email + `</td>
                                        <td>` + val_phone + `</td>
                                        <td>
                                            <center>
                                                <a href="index.php/customers/cotizacion/` + id + `" onclick="travel.addCoti(` + id + `);">
                                                    Agregar Cotización
                                                </a>
                                            </center>
                                        </td>
                                    </tr>`;
                        }
                    } else {
                        tbody = `<tr>
                                    <td colspan="6">
                                        <center>
                                            NO SE ENCONTRARON RESULTADOS
                                        </center>
                                    </td>
                                </tr>`;
                    }
                    $("#table_clients tbody").append(tbody);
                }
            }
        });
    };

    self.addCoti = function (id) {
        console.log(id);
    };

    self.openModal = function () {
        self.cleanForm();
        self.action_form = self.current_url + "index.php/customers/saveClient";
        $("#modal_customer").modal("show");
    };

    self.setServicios = function (id, mprefix) {

        $("#modal_servicios").modal("show");
        var detalle_data = self.list_service_doc[id];
        $("#method_prefix").val(mprefix);
        $("#index_servicio").val(id);
        $('#tipo_servicio_servicios').val(detalle_data.tipo_servicio);
        $('#proveedor_servicios').val(detalle_data.proveedor);
        $('#codigo_servicios').val(detalle_data.codigo);
        $('#cantidad_servicios').val(detalle_data.cantidad);
        $('#valor_unitario_servicios').val(detalle_data.valor_unitario);
        $('#detalle_servicios').val(detalle_data.detalle);
        $('#tarifa_neta_servicios').val(detalle_data.tarifa_neta);
        $('#comi_proveedor_porcentaje_servicios').val(detalle_data.comi_proveedor_porcentaje);
        $('#comi_proveedor_fija_servicios').val(detalle_data.comi_proveedor_fija);
        $('#fee_proveedor_servicios').val(detalle_data.fee_proveedor);
        $('#fee_proveedor_conf_servicios').val(detalle_data.fee_proveedor_conf);
        $('#fee_agencia_servicios').val(detalle_data.fee_agencia);
        $('#impuesto_servicios').val(detalle_data.impuesto);
        $('#incentivo_add_servicios').val(detalle_data.incentivo_add);
        $('#otros_servicios').val(detalle_data.otros);
        $('#servicios_costo').html(detalle_data.costo);
        $('#incentivo_servicios').val(detalle_data.incentivo);
        $('#obs_observaciones').val(detalle_data.observaciones|| "");

        $('#dfs_tarifa_neta_servicios').val(detalle_data.dfs_tarifa_neta_servicios || "");
        $('#quue_servicios').val(detalle_data.quue_servicios || "");
        $('#imp_extranjero_servicios').val(detalle_data.imp_extranjero_servicios || "");
        $('#dfs_otros_servicios').val(detalle_data.dfs_otros_servicios || "");
        $('#exento_fee_servicios').prop('checked', detalle_data.exento_fee || "");
        $('#dfs_inafecto_servicios').prop('checked', detalle_data.dfs_inafecto_servicios || "");
        $('#porcent18_servicios').val(detalle_data.porcent18_servicios || "");
        $('#credit_card').val(detalle_data.credit_card || "");
        $('#serv_esp').val(detalle_data.serv_esp || "");
        $('#tua').val(detalle_data.tua || "");
        $('#dfs_otros').val(detalle_data.dfs_otros || "");
        $('#fee').val(detalle_data.fee || "");
        $('#dfs_igv').val(detalle_data.dfs_igv || "");
        $('#dfs_total_fee').val(detalle_data.dfs_total_fee || "");
        $('#cav_agencia').val(detalle_data.cav_agencia || "");
        $('#cav_igual_agencia').val(detalle_data.cav_igual_agencia || "");
        $('#cav_over').val(detalle_data.cav_over || "");
        $('#cav_igual_cover').val(detalle_data.cav_igual_cover || "");
        $('#cav_inafecto').prop('checked', detalle_data.cav_inafecto || "");
        $('#cav_vendedor').val(detalle_data.cav_vendedor || "");
        $('#cav_incentivo').val(detalle_data.cav_incentivo || "");
        $('#cav_incentivo_counter').val(detalle_data.cav_incentivo_counter || "");
        $('#cav_per_vendedor').val(detalle_data.cav_per_vendedor || "");
        $('#cav_igual_per_vendedor').val(detalle_data.cav_igual_per_vendedor || "");
        $('#cav_f_salida').val(detalle_data.cav_f_salida || "");
        $('#cav_horasalida').val(detalle_data.cav_horasalida || "");
        $('#cav_nro_vuelo').val(detalle_data.cav_nro_vuelo || "");
        $('#cav_clase').val(detalle_data.cav_clase || "");
        $('#cav_f_retorno').val(detalle_data.cav_f_retorno || "");
        $('#cav_hora_retorno').val(detalle_data.cav_hora_retorno || "");
        $('#obs_f_solicitada').val(detalle_data.obs_f_solicitada || "");
        $('#obs_monto').val(detalle_data.obs_monto || "");
        $('#fpa_monto_pago').val(detalle_data.fpa_monto_pago || "");
        $('#fpa_contacto').val(detalle_data.fpa_contacto || "");
        $('#fpa_credito').val(detalle_data.fpa_credito || "");
        $('#fpa_tarjeta').val(detalle_data.fpa_tarjeta || "");
        $('#fpa_nro_cheque').val(detalle_data.fpa_nro_cheque || "");
        $('#eb_agencia').val(detalle_data.eb_agencia || "");
        $('#eb_igual_agencia').val(detalle_data.eb_igual_agencia || "");
        $('#eb_over').val(detalle_data.eb_over || "");
        $('#eb_gual_over').val(detalle_data.eb_gual_over || "");
        $('#eb_inafecto').prop('checked', detalle_data.eb_inafecto || "");
    };

    self.addServicioDetalle = function () {

        var index = $("#index_servicio").val();
        var detalle_data = self.list_service_doc[index];
        detalle_data.tipo_servicio = $('#tipo_servicio_servicios').val();
        detalle_data.proveedor = $('#proveedor_servicios').val();
        detalle_data.codigo = $('#codigo_servicios').val();
        detalle_data.cantidad = $('#cantidad_servicios').val();
        detalle_data.valor_unitario = $('#valor_unitario_servicios').val();
        detalle_data.detalle = $('#detalle_servicios').val();
        detalle_data.tarifa_neta = $('#tarifa_neta_servicios').val();
        detalle_data.comi_proveedor_porcentaje = $('#comi_proveedor_porcentaje_servicios').val();
        detalle_data.comi_proveedor_fija = $('#comi_proveedor_fija_servicios').val();
        detalle_data.fee_proveedor = $('#fee_proveedor_servicios').val();
        detalle_data.fee_proveedor_conf = $('#fee_proveedor_conf_servicios').val();
        detalle_data.fee_agencia = $('#fee_agencia_servicios').val();
        detalle_data.impuesto = $('#impuesto_servicios').val();
        detalle_data.incentivo_add = $('#incentivo_add_servicios').val();
        detalle_data.otros = $('#otros_servicios').val();
        detalle_data.costo = $('#servicios_costo').html();
        detalle_data.incentivo = $('#incentivo_servicios').val();
        detalle_data.observaciones = $('#obs_observaciones').val();

        detalle_data.dfs_tarifa_neta_servicios = $('#dfs_tarifa_neta_servicios').val();
        detalle_data.quue_servicios = $('#quue_servicios').val();
        detalle_data.imp_extranjero_servicios = $('#imp_extranjero_servicios').val();
        detalle_data.dfs_otros_servicios = $('#dfs_otros_servicios').val();
        detalle_data.exento_fee = $('#exento_fee_servicios').prop('checked');
        detalle_data.dfs_inafecto_servicios = $('#dfs_inafecto_servicios').prop('checked');
        detalle_data.porcent18_servicios = $('#porcent18_servicios').val();
        detalle_data.credit_card = $('#credit_card').val();
        detalle_data.serv_esp = $('#serv_esp').val();
        detalle_data.tua = $('#tua').val();
        detalle_data.dfs_otros = $('#dfs_otros').val();
        detalle_data.fee = $('#fee').val();
        detalle_data.dfs_igv = $('#dfs_igv').val();
        detalle_data.dfs_total_fee = $('#dfs_total_fee').val();
        detalle_data.cav_agencia = $('#cav_agencia').val();
        detalle_data.cav_igual_agencia = $('#cav_igual_agencia').val();
        detalle_data.cav_over = $('#cav_over').val();
        detalle_data.cav_igual_cover = $('#cav_igual_cover').val();
        detalle_data.cav_inafecto = $('#cav_inafecto').prop('checked');
        detalle_data.cav_vendedor = $('#cav_vendedor').val();
        detalle_data.cav_incentivo = $('#cav_incentivo').val();
        detalle_data.cav_incentivo_counter = $('#cav_incentivo_counter').val();
        detalle_data.cav_per_vendedor = $('#cav_per_vendedor').val();
        detalle_data.cav_igual_per_vendedor = $('#cav_igual_per_vendedor').val();
        detalle_data.cav_f_salida = $('#cav_f_salida').val();
        detalle_data.cav_horasalida = $('#cav_horasalida').val();
        detalle_data.cav_nro_vuelo = $('#cav_nro_vuelo').val();
        detalle_data.cav_clase = $('#cav_clase').val();
        detalle_data.cav_f_retorno = $('#cav_f_retorno').val();
        detalle_data.cav_hora_retorno = $('#cav_hora_retorno').val();
        detalle_data.obs_f_solicitada = $('#obs_f_solicitada').val();
        detalle_data.obs_monto = $('#obs_monto').val();
        detalle_data.fpa_monto_pago = $('#fpa_monto_pago').val();
        detalle_data.fpa_contacto = $('#fpa_contacto').val();
        detalle_data.fpa_credito = $('#fpa_credito').val();
        detalle_data.fpa_tarjeta = $('#fpa_tarjeta').val();
        detalle_data.fpa_nro_cheque = $('#fpa_nro_cheque').val();
        detalle_data.eb_agencia = $('#eb_agencia').val();
        detalle_data.eb_igual_agencia = $('#eb_igual_agencia').val();
        detalle_data.eb_over = $('#eb_over').val();
        detalle_data.eb_gual_over = $('#eb_gual_over').val();
        detalle_data.eb_inafecto = $('#eb_inafecto').prop('checked');

        self.list_service_doc[index] = detalle_data;
        var mprefix = $("#method_prefix").val();
        self.setOcultoDetalleServicio(mprefix);
        self.makeTableServiceDoc(mprefix);
        self.resetServiceDocReset(mprefix);
        self.detalle_servicio = "";
        $("#modal_servicios").modal("hide");

    };

    self.getClient = function (id) {
        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            url: self.current_url + "index.php/customers/getClient",
            success: function (res) {
                var response = JSON.parse(res);
                if (response.success) {
                    self.action_form = self.current_url + "index.php/customers/updateClient";
                    var data = response.data;
                    var data_client = '';
                    if (data.data != '') {
                        var data_client = JSON.parse(data.data);
                    }
                    $("#client_id").val(id);
                    $("#first_name").val(data.firstname);
                    $("#midle_name").val(data.middlename);
                    $("#last_name").val(data.lastname);
                    $("#last_name_mothers").val(data.mother_lastname);
                    $("#last_name_casada").val(data.last_name_casada);
                    $("#fecha_vcto").val(data.fecha_vcto);
                    $("#nacionalidad").val(data.nacionalidad);
                    $("#gender").val(data.gender);
                    $("#age").val(data.age);
                    $("#user_date").val(data.fec_nac);
                    //MAKE TABLE DOCUMENTS
                    if (data_client != '') {
                        self.customer_documents_list = data_client.documents;
                        self.makeTableDocuments();
                        //MAKE TABLE PASSPORT
                        self.customer_passport_list = data_client.passport;
                        self.makeTablePassport();
                        //MAKE TABLE VISADO
                        self.customer_visado_list = data_client.visado;
                        self.makeTableVisado();
                        //MAKE TABLE PHONES
                        self.customer_phones_list = data_client.phones;
                        self.makeTablePhones();
                        //MAKE TABLE EMAILS
                        self.customer_emails_list = data_client.emails;
                        self.makeTableEmails();
                        //MAKE TABLE CLIENTES FRECUENTES
                        self.customer_frec_list = data_client.frec;
                        self.makeTableFrec();
                        //MAKE TABLE ADDRESS
                        self.customer_address_list = data_client.address;
                        self.makeTableAddress();
                        //MAKE TABLE COMPANY
                        self.customer_company_list = data_client.company;
                        self.makeTableCompany();
                        //MAKE TABLE CONTACT
                        self.customer_contact_list = data_client.contact;
                        self.makeTableContact();
                        //MAKE TABLE CARDS
                        self.customer_tarjtas_list = data_client.tarjtas;
                        self.makeTableTarjetas();
                        //MAKE TABLE FAMILIARES
                        self.customer_familiares_list = data_client.familiares;
                        self.makeTableDatosFamilares();
                        $("#descripcion").val(data_client.description);
                    }

                    $("#modal_customer").modal("show");
                }
            }
        });
    };

    self.cleanForm = function () {
        var now = new Date().toISOString().slice(0, 10);
        $("#first_name").val("");
        $("#midle_name").val("");
        $("#last_name").val("");
        $("#last_name_mothers").val("");
        $("#last_name_casada").val("");
        $("#fecha_vcto").val("");
        $("#nacionalidad").val("");
        $("#telefono").val("");
        $("#email").val("");
        $("#user_date").val("");
        //MAKE TABLE DOCUMENTS
        self.customer_documents_list = [];
        self.makeTableDocuments();
        //MAKE TABLE SALES        
        self.list_service_doc = [];
        self.makeTableServiceDoc();
        //MAKE TABLE PASSPORT
        self.customer_passport_list = [];
        self.makeTablePassport();
        //MAKE TABLE VISADO
        self.customer_visado_list = [];
        self.makeTableVisado();
        //MAKE TABLE PHONES
        self.customer_phones_list = [];
        self.makeTablePhones();
        //MAKE TABLE EMAILS
        self.customer_emails_list = [];
        self.makeTableEmails();
        //MAKE TABLE CLIENTES FRECUENTES
        self.customer_frec_list = [];
        self.makeTableFrec();
        //MAKE TABLE ADDRESS
        self.customer_address_list = [];
        self.makeTableAddress();
        //MAKE TABLE COMPANY
        self.customer_company_list = [];
        self.makeTableCompany();
        //MAKE TABLE CONTACT
        self.customer_contact_list = [];
        self.makeTableContact();
        //MAKE TABLE CARDS
        self.customer_tarjtas_list = [];
        self.makeTableTarjetas();
        //MAKE TABLE FAMILIARES
        self.customer_familiares_list = [];
        self.makeTableDatosFamilares();
        $("#descripcion").val('');
    };

    self.deleteClient = function (client_id, is_delete) {
        if (!is_delete) {
            self.current_id = client_id;
            $("#modal_delete_client").modal("show");
        } else {
            self.action_form = self.current_url + "index.php/customers/deleteClient";
            $.ajax({
                type: "POST",
                url: travel.action_form,
                data: {
                    client_id: client_id
                },
                success: function (res) {
                    var response = JSON.parse(res);
                    $("#modal_delete_client").modal("hide");
                    if (response.success) {
                        travel.listClients();
                        $("#modal_success").modal("show");
                    } else {
                        $("#modal_error").modal("show");
                    }
                }
            });
        }
    };

    self.saveInfoService = function () {
        //obtener codigos
        var childrens = self.list_comision[self.current_service].childrens;
        var string_childrens = '';
        var childs = [];
        for (var i = 0; i < childrens.length; i++) {
            childs.push(childrens[i].ammount);
        }
        string_childrens = childs.join('/');
        var total_servicios = $("#total_pago_children").text();
        var descripcion = $("#descripcion").val();
        if (total_servicios !== '') {
            self.current_pay = parseFloat(self.current_pay) + parseFloat(total_servicios);
            var comision = self.list_comision[self.current_service];
            comision.ammount = string_childrens;
            comision.monto = parseFloat(total_servicios).toFixed(3);
            comision.descripcion = descripcion;
            self.list_comision[self.current_service] = comision;
            self.makeTableComision();
            $("#total_pago").text(self.current_pay.toFixed(3));
        }
        $("#modal_detail_comision").modal("hide");
    };

    self.saveAddCotizacion = function () {
        var code_coti = $("#modal-title-coti").text();
        var person_id = $("#customer_documents").val();
        $.ajax({
            type: "POST",
            url: self.current_url + "index.php/customers/saveCotizacion",
            data: {
                person_id: person_id,
                code_coti: code_coti,
                comisiones: JSON.stringify(self.list_comision)
            },
            success: function (res) {
                var response = JSON.parse(res);
                if (response.success) {
                    $('#modal_exito').modal('show');
                } else {
                    $('#modal_error').modal('show');
                }
            }
        });
    };

    self.guardarDetalles = function () {
        var detalle_servicio = $("#detalle_servicio_modal").val();
        self.detalle_servicio = detalle_servicio;
        $(".content_service_detail").css("display", "none");
        $("#detalle_servicio_modal").val("");
    };

    self.openModalDetail = function (methodPrefix) {

        $(".content_service_detail").css("display", "inline");
    };

    self.guardarPago = function () {
        var detalle_servicio = $("#detalle_servicio_modal").val();
        self.detalle_servicio = detalle_servicio;
        $(".content_service_pago").css("display", "none");
        $("#detalle_servicio_modal").val("");
    };

    self.openModalPago = function () {
        $(".content_service_pago").css("display", "inline");
    };
    self.resetSale = function (mPrefix) {
        $("#" + mPrefix + "id").val("");
        $("#" + mPrefix + "name").val("");
        $("#" + mPrefix + "email").val("");
        $('#' + mPrefix + 'modal_views input[name="name"]').val("");
        $('#' + mPrefix + 'modal_views input[name="nro_doc_rct"]').val("");
        $('#' + mPrefix + 'modal_views input[name="email"]').val("");
        $('#' + mPrefix + 'modal_views input[name="telefono"]').val("");
        $('#' + mPrefix + 'modal_views input[name="dir_des_rct"]').val("");
        $('#' + mPrefix + 'modal_views select[name="tip_doc_rct"]').val("");
        $('#' + mPrefix + 'modal_views input[name="data"]').val("");
        $('#' + mPrefix + 'sale_observaciones').html("");
        $("#" + mPrefix + "modal-title-coti").html("");
    };
    return self;
}(jQuery);

$(document).ready(function () {
    $('#modal_agregar').on('hidden.bs.modal', function (e) {

        sales.list_service_doc = [];
        sales.customer_pay_list = [];
        sales.resetServiceDocReset("");
        sales.resetCustomerPay("");
        sales.resetSale("");
        sales.setOcultoDetalleServicio("");
        sales.makeTableServiceDoc("");
        sales.detalle_servicio = "";
        sales.makeTablePay("");
    });
    $('#edit_modal_views').on('hidden.bs.modal', function (e) {
        sales.list_service_doc = [];
        sales.customer_pay_list = [];
        sales.resetServiceDocReset("edit_");
        sales.resetCustomerPay("edit_");
        sales.resetSale("edit_");
        sales.setOcultoDetalleServicio("");
        sales.makeTableServiceDoc("edit_");
        sales.detalle_servicio = "";
        sales.makeTablePay("edit_");
    });
    $('.modal').on('hidden.bs.modal', function (e) {
        $('body').addClass('modal-open');
    });
    $('#add_info_service').click(function () {
        travel.saveInfsoService();
    });
});
