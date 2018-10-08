var ysumma = ysumma || {};

ysumma.SaleDocument = function () {
    this.sale = null;
    this.servicios={
    "Boleto Aereo":"table_boleto",
"Boleto BT/IT":"table_boleto",
"Remision":"table_otro",
"Paquete":"table_paquete",
"Paquetes Netos":"table_paquete",
"Tarjetas de Asistencias":"table_tarjeta",
"Hotel":"table_hotel",
"Traslado":"table_otro",
"Auto":"table_auto",
"Excursiones":"table_excursion",
"Crucero":"table_crucero",
"Trenes":"table_tren",
"Entradas":"table_entrada",
"Gastos Administrativos":"table_otro",
"Otros":"table_otro"};
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
                ysumma.saleDocument.sale = res;
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
                                    ysumma.saleDocument.sale.list_service_doc = list_service_doc;
                                    for (var i = 0; i < list_service_doc.length; i++) {
                                        list_service_doc[i].id=i;
                                        list_service_doc[i].cotizacion_id=$("#sale_cod").val();
                                        ysumma.saleDocument.pintarTablaServicioXTipo(ysumma.saleDocument.servicios[list_service_doc[i].tipo_servicio],list_service_doc[i]);
                                    }
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
        var monto = data.valor || "";
        var fecha = data.observaciones || "";
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
                    <td>
                        <center>
                            <a href="javascript:void();" onclick="ysumma.saleDocument.editServicios(` + id + `);">
                                <i class="fa fa-edit"></i>
                            </a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="javascript:void();" onclick="ysumma.saleDocument.deleteClient(` + id + `,false);">
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
};

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
        $.ajax({
            url: 'index.php/sales/userDetails',
            method: 'post',
            data: {cod_tip_otr_doc_ref: cod_tip_otr_doc_ref},
            dataType: 'json',
            success: function (response) {
                var len = response.length;
                if (len > 0) {
                    var serie = response[0].serie;
                    var cod_tip_otr_doc_ref = response[0].cod_tip_otr_doc_ref;
                    var num_corre_cpe_ref = (parseInt(response[0].num_corre_cpe_ref) + 1);


                    $('#sserie').text(serie);
                    $('select[id="sserie"]').val(serie);
                    $('#scod_tip_otr_doc_ref').text(cod_tip_otr_doc_ref);
                    $('input[id="scod_tip_otr_doc_ref"]').val(cod_tip_otr_doc_ref);
                    $('#snum_corre_cpe_ref').text(num_corre_cpe_ref);
                    $('input[id="snum_corre_cpe_ref"]').val(num_corre_cpe_ref);

                } else {
                    $('#serie').text('');
                    $('select[id="sserie"]').text('');
                    $('#scod_tip_otr_doc_ref').text('');
                    $('input[id="scod_tip_otr_doc_ref"]').val('');
                    $('#snum_corre_cpe_ref').text('');
                    $('input[id="snum_corre_cpe_ref"]').val('');
                }

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
        $('#modal_factura').modal('show');
    });
});