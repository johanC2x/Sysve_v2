/* global util */

var ysumma = ysumma || {};

ysumma.SaleDocument = function () {
    this.sale = null;
    this.list_service_doc = {};
    this.current_serice_doc = -1;
    this.servicios = {
        "Boleto Aereo": "table_boleto",
        "Boleto BT/IT": "table_boleto",
        "Remision": "table_otro",
        "Paquete": "table_paquete",
        "Paquetes Netos": "table_paquete",
        "Tarjetas de Asistencias": "table_tarjeta",
        "Hotel": "table_hotel",
        "Traslado": "table_otro",
        "Auto": "table_auto",
        "Excursiones": "table_excursion",
        "Crucero": "table_crucero",
        "Trenes": "table_tren",
        "Entradas": "table_entrada",
        "Gastos Administrativos": "table_otro",
        "Otros": "table_otro"};
    this.listService = function () {
        for (var element in ysumma.saleDocument.servicios) {
            ysumma.saleDocument.limpiarTablaServicios(ysumma.saleDocument.servicios[element]);
        }
        var id = $("#sale_id").val();
        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            url: "index.php/sales/getSales",
            success: function (res) {
                var response = JSON.parse(res);
                ysumma.saleDocument.sale = response;
                if (response.success) {
                    var data = response.data[0];
                    if (data.hasOwnProperty("data")) {
                        if (data.data !== '' && data.data !== null) {
                            var data_sales = JSON.parse(data.data);
                            ysumma.saleDocument.sale.data_sales = data_sales;
                            if (data_sales.hasOwnProperty('detalle_servicio_json')) {
                                if (data_sales.detalle_servicio_json !== "")
                                {
                                    var list_service_doc = JSON.parse(data_sales.detalle_servicio_json);
                                    for (var i = 0; i < list_service_doc.length; i++) {
                                        list_service_doc[i].id = i;
                                        list_service_doc[i].cotizacion_id = $("#sale_cod").val();
                                        ysumma.saleDocument.pintarTablaServicioXTipo(ysumma.saleDocument.servicios[list_service_doc[i].tipo_servicio], list_service_doc[i]);
                                    }
                                    ysumma.saleDocument.sale.list_service_doc = list_service_doc;
                                }
                            }
                        }
                    }
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $('#nro_doc_rct').val(data.num_doc_rct);
                    $('#dir_des_rct').val(data.dir_des_rct);
                    $('#tip_doc_rct').val(data.tip_doc_rct);
                }
            }
        });
    };
    this.pintarTablaServicioXTipo = function (tabla, data) {
        $("#" + tabla + " tbody").empty();
        var tbody = "";
        var id = data.id;
        var cotizacion_id = data.cotizacion_id;
        var servicio = data.tipo_servicio || "";
        var codigo = data.codigo || "";
        var monto = data.costo || "";
        var fecha = data.observaciones || "";
        tbody += `<tr>
                    <td>
                        <center>
                            <input style="width:16px;height:16px;" type="checkbox" name="check[` + id + `]" value="` + id + `"/>
                        </center>
                    </td>
                    <td>` + cotizacion_id + `</td>
                    <td>` + servicio + `</td>
                    <td>` + codigo + `</td>
                    <td>` + monto + `</td>
                    <td>` + fecha + `</td>
                    <td>
                        <center>
                            <a href="javascript:void();" onclick="ysumma.saleDocument.editServicios(` + id + `);">
                                <i class="fa fa-edit"></i>
                            </a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="javascript:void();" onclick="ysumma.saleDocument.deleteServicio(` + id + `,false);">
                                <i class="fa fa-trash"></i>
                            </a>
                        </center>
                    </td>
                </tr>`;

        $("#" + tabla + " tbody").append(tbody);
    };
    this.limpiarTablaServicios = function (tabla) {
        var tbody = `<tr>
                        <td colspan="8">
                        <center>
                            NO SE ENCONTRARON RESULTADOS
                        </center>
                        </td>
                        </tr>`;
        $("#" + tabla + " tbody").html(tbody);
    };

    this.llenarServicios = function () {
        var servicios = $("#content input[type=checkbox]:checked");
        $('#modal_factura').modal('show');
        ysumma.saleDocument.sale.list_service_selected = [];
        ysumma.saleDocument.list_service_doc=[];
        for (var item = 0; item < servicios.length; item++) {
            ysumma.saleDocument.sale.list_service_selected[servicios[item].value] = ysumma.saleDocument.sale.list_service_doc[servicios[item].value];
            var data = {};
            data.service_doc_name = ysumma.saleDocument.sale.list_service_doc[servicios[item].value].detalle;
            data.service_doc_type = ysumma.saleDocument.sale.list_service_doc[servicios[item].value].tipo_servicio;
            data.service_doc_trib = (ysumma.saleDocument.sale.list_service_doc[servicios[item].value].afectacion || "");
            data.service_doc_quantity = (ysumma.saleDocument.sale.list_service_doc[servicios[item].value].cantidad || "");
            data.service_doc_amount = (ysumma.saleDocument.sale.list_service_doc[servicios[item].value].valor_unitario || "");
            ysumma.saleDocument.list_service_doc.push(data);
        }
        ysumma.saleDocument.setOcultoDetalleServicio();
        ysumma.saleDocument.makeTableServiceDoc();
        ysumma.saleDocument.resetServiceDocReset();
    };
    this.setOcultoDetalleServicio = function () {
        $('#detalle_servicio_json').val(JSON.stringify(ysumma.saleDocument.list_service_doc));
    };
    this.removeServiceDoc = function (idx) {
        ysumma.saleDocument.list_service_doc.splice(idx, 1);
        ysumma.saleDocument.makeTableServiceDoc();
    };
    this.getServiceDoc = function (idx) {
        ysumma.saleDocument.current_serice_doc = idx;
        var current = ysumma.saleDocument.list_service_doc[idx];
        $("#detalle_servicio").val(current.service_doc_name);
        $("#cbo_comision_payment_servicio").val(current.service_doc_type);
        $("#tributo_travel").val(current.service_doc_trib);
        $("#travel_cantidad").val(current.service_doc_quantity);
        $("#cbo_amount_comision_payment_children").val(current.service_doc_amount);
    };
    this.resetServiceDocReset = function () {
        $("#detalle_servicio").val("");
        $("#cbo_comision_payment_servicio").val("");
        $("#tributo_travel").val("");
        $("#travel_cantidad").val("");
        $("#cbo_amount_comision_payment_children").val("");
        ysumma.saleDocument.current_serice_doc = -1;
    };

    this.addServiceDoc = function () {
        var service_doc_name = $("#detalle_servicio").val();
        var service_doc_type = $("#cbo_comision_payment_servicio").val();
        var service_doc_trib = $("#tributo_travel").val();
        var service_doc_quantity = $("#travel_cantidad").val();
        var service_doc_amount = $("#cbo_amount_comision_payment_children").val();
        var detalle_servicio = $("#detalle_servicio_modal").val();
        if (service_doc_name !== '' && service_doc_type !== '' && service_doc_trib !== '') {
            var data = {};
            data.service_doc_name = service_doc_name;
            data.service_doc_type = service_doc_type;
            data.service_doc_trib = service_doc_trib;
            data.service_doc_quantity = service_doc_quantity;
            data.service_doc_amount = service_doc_amount;
            data.service_doc_name_detail = detalle_servicio;
            if (ysumma.saleDocument.current_serice_doc === -1) {
                ysumma.saleDocument.list_service_doc.push(data);
            } else {
                ysumma.saleDocument.list_service_doc[ysumma.saleDocument.current_serice_doc] = data;
            }

            ysumma.saleDocument.setOcultoDetalleServicio();
            ysumma.saleDocument.makeTableServiceDoc();
            ysumma.saleDocument.resetServiceDocReset();
    }
    };
    this.makeTableServiceDoc = function () {
        var html = '';
        var count = 0;
        var mnt_tot_inf = 0;
        var mnt_tot_exr = 0;
        var mnt_tot_exp = 0;
        var mnt_tot_grv = 0;
        var mnt_tot_grt = 0;
        var mnt_tot_imp = 0;
        var monto_pagar = 0;
        if (ysumma.saleDocument.list_service_doc.length === 0) {
            html += `<tr>
                        <td colspan="9">
                            <center>
                                NO SE ENCONTRARON RESULTADOS
                            </center>
                        </td>
                    </tr>`;
        } else {
            ysumma.saleDocument.list_service_doc.forEach(function (element) {
                var total = parseInt(element.service_doc_quantity) * parseFloat(element.service_doc_amount);
                var tributo = (element.service_doc_trib === '10') ? 0.18 : 0.00;
                var impuesto = ((parseInt(element.service_doc_quantity) * parseFloat(element.service_doc_amount)) * tributo);

                var gravada10 = ((element.service_doc_trib === '10') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada11 = ((element.service_doc_trib === '11') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada12 = ((element.service_doc_trib === '12') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada13 = ((element.service_doc_trib === '13') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada14 = ((element.service_doc_trib === '14') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada15 = ((element.service_doc_trib === '15') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada16 = ((element.service_doc_trib === '16') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var gravada17 = ((element.service_doc_trib === '17') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var exonerado20 = ((element.service_doc_trib === '20') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var exonerado21 = ((element.service_doc_trib === '21') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var exportacion = ((element.service_doc_trib === '40') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);
                var inafecto30 = ((element.service_doc_trib === '30') ? parseFloat(element.service_doc_amount) : 0.00) * parseInt(element.service_doc_quantity);

                var subtotal = parseFloat(element.service_doc_amount);
                html += `<tr  style="background-color:#FFFFFF">
                            <td><center>` + (count + 1) + `</center></td>
                            <td><center>` + element.service_doc_name + `</center></td>
                            <td><center>` + element.service_doc_type + `</center></td>
                            <td><center>` + element.service_doc_trib + 
                        ((element.service_doc_trib!==undefined && element.service_doc_trib!==null && element.service_doc_trib!==""  && element.service_doc_trib!=="null" 
                        && element.service_doc_trib>0)?("-" +$("#tributo_travel [value="+element.service_doc_trib+"]").html()|| ""):"")+ `</center></td>
                            <td><center>` + element.service_doc_quantity + `</center></td>
                            <td align=right>` + ((parseFloat(element.service_doc_amount) * tributo) + parseFloat(element.service_doc_amount)).toFixed(2) + `</td>
                            <td align=right>` + parseFloat(element.service_doc_amount).toFixed(2) + `</td>
                            <td align=right>` + parseInt(element.service_doc_quantity) * parseFloat(element.service_doc_amount).toFixed(2) + `</td>
                            <td>
                                <center>
                                    <a href='javascript:void(0);' title='Editar' onclick='ysumma.saleDocument.getServiceDoc(` + count + `)' >
                                        <i class='fa fa-edit'></i>
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href='javascript:void(0);' title='Eliminar' onclick='ysumma.saleDocument.removeServiceDoc(` + count + `)' >
                                        <i class='fa fa-trash-alt'></i>
                                    </a>
                                </center>
                            </td>
                        </tr>`;
                mnt_tot_imp = mnt_tot_imp + impuesto;
                mnt_tot_exp = mnt_tot_exp + exportacion;
                mnt_tot_grv = mnt_tot_grv + gravada10;
                mnt_tot_grt = mnt_tot_grt + gravada11 + gravada12 + gravada13 + gravada14 + gravada15 + gravada16 + gravada17;
                mnt_tot_inf = mnt_tot_inf + inafecto30;
                mnt_tot_exr = mnt_tot_exr + exonerado20 + exonerado21;
                monto_pagar = monto_pagar + total + impuesto;
                count++;
            });
        }
        $("#table_customer_travel_children tbody").empty().append(html);
        $("#mnt_tot").text(monto_pagar.toFixed(2));
        $('input[id="mnt_tot"]').val(monto_pagar.toFixed(2));
        $("#total_pago_children").text(monto_pagar.toFixed(2));
        $('input[id="total_pago_children"]').val(monto_pagar.toFixed(2));
        $("#mnt_tot_grv").text((mnt_tot_grv).toFixed(2));
        $('input[id="mnt_tot_grv"]').val(mnt_tot_grv.toFixed(2));
        $("#mnt_tot_grt").text((mnt_tot_grt).toFixed(2));
        $('input[id="mnt_tot_grt"]').val(mnt_tot_grt.toFixed(2));
        $("#mnt_tot_exr").text((mnt_tot_exr).toFixed(2));
        $('input[id="mnt_tot_exr"]').val(mnt_tot_exr.toFixed(2));
        $("#mnt_tot_inf").text((mnt_tot_inf).toFixed(2));
        $('input[id="mnt_tot_inf"]').val(mnt_tot_inf.toFixed(2));
        $("#mnt_tot_exp").text((mnt_tot_exp).toFixed(2));
        $('input[id="mnt_tot_exp"]').val(mnt_tot_exp.toFixed(2));
        $("#mnt_tot_imp").text((mnt_tot_imp).toFixed(2));
        $('input[id="mnt_tot_imp"]').val(mnt_tot_imp.toFixed(2));
    };
    this.openModalDetail = function(){
        $(".content_service_detail").toggle();
    };
    this.generarFactura=function (){
        var requiredelements=$("#formGenerarDocumento :required");
        for (var i = 0; i < requiredelements.length; i++) {
            if(requiredelements[i].value=="" || requiredelements[i].value==null || requiredelements[i].value==undefined){
                $(requiredelements[i]).focus();
                return;
            }
        }
        $.ajax({
            type: 'POST',
            data: $("#formGenerarDocumento").serialize(),
            url: "index.php/sales/factura"
           }).done(function (datos) {
            var dato = util.ResponseJson.verificarResponseJson(datos);
            if (dato === false) {
                return;
            }
            util.msjLabel.success(dato.response);
            $("#modal_factura").modal('hide');
        }).fail(function (datos) {
            util.ResponseJson.failedResponse(datos, "Error al generar el documento", -1);
        });
    };
};

