<?php $this->load->view("partial/header"); ?>
<?php
if (isset($error_message)){
	echo '<h1 style="text-align: center;">'.$error_message.'</h1>';
	exit;
}?>

<script src="<?php echo base_url();?>js/lib/cotizacion.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<div id="title_bar">
    <div id="title" class="float_left">
        Generar Documento
    </div>
</div>
<div class="input-group"> <span class="input-group-addon">Buscar</span>

    <input id="filter" type="text" class="form-control" placeholder="Nro. de Cotizacion">
</div>
<div id="table_holder">
    <table class="table table-bordered" id="table_clients">
        <thead>
            <tr class="well">
                <th><center>Nombres</center></th>
                <th><center>Apellidos</center></th>
                <th><center>Nro. DNI</center></th>
                <th><center>Genero</center></th>
                <th><center>Email</center></th>
                <th><center>Teléfono</center></th>
                <th><center>Acción</center></th>
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



<?php $this->load->view("travel/cliente_parcial"); ?>
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
        travel.current_url = "<?= base_url();?>";
        /* LISTANDO CLIENTES */
        travel.listCotizacion();
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
<?php $this->load->view("partial/footer"); ?>










