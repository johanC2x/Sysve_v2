<?php

class Sale extends CI_Model {

    public function get_info($sale_id) {
        $this->db->select('sales.*', FALSE);
        $this->db->select('people.*', FALSE);
        $this->db->from('sales');
        $this->db->join('people', 'people.person_id = sales.customer_id', 'LEFT');
        $this->db->where('sale_id', $sale_id);
        return $this->db->get();
    }

    function insertService($service_data) {
        $success = $this->db->insert('servicios', $service_data);
        return ($this->db->affected_rows() !== 1) ? false : true;
    }

    function insertFactura($factura) {
        $success = $this->db->insert('factura', $factura);
        return ($this->db->affected_rows() !== 1) ? false : true;
    }

    function insertVentas($factura) {
        $success = $this->db->insert('ventas', $factura);
        return ($this->db->affected_rows() !== 1) ? false : true;
    }

    function editarVentas($factura,$id) {
        $this->db->where('id', $id);
        $this->db->update('ventas', $factura);
        return ($this->db->affected_rows() !== 1) ? false : true;
    }

    function insertPago($pago) {
        $success = $this->db->insert('pago', $pago);
        return ($this->db->affected_rows() !== 1) ? false : true;
    }

    function exists($sale_id) {
        $this->db->from('sales');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get();

        return ($query->num_rows() == 1);
    }

    function getServicios($servicio_id) {
        $response = null;
        $this->db->from('clients');
        $this->db->where('id', $servicio_id);
        $this->db->where('deleted', 0);
        $client = $this->db->get();
        if ($client->num_rows() == 1) {
            $response = $client->row();
        }
        return $response;
    }

    function getSales($id) {
        $response = null;
        $this->db->from('ventas');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServicios($data) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->where('cotizacion_id', $data);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return null;
    }

    function listServiciosBoleto($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Boleto);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosHotel($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->where('name', Hotel);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosAuto($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->where('name', Auto);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosTarjeta($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Tarjeta);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosPaquete($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Paquete);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosExcursion($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Excursion);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosCrucero($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Crucero);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosTren($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Tren);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosEntrada($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Entrada);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function listServiciosOtro($cotizacion_id) {
        $response = null;
        $this->db->from('cotizaciones_servicios');
        $this->db->like('name', Otro);
        $this->db->where('cotizacion_id', $cotizacion_id);
        $this->db->order_by('id', 'desc');
        $clients = $this->db->get();
        foreach ($clients->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function update($sale_data, $sale_id) {
        $this->db->where('sale_id', $sale_id);
        $success = $this->db->update('sales', $sale_data);

        return $success;
    }

    function save($items, $customer_id, $employee_id, $comment, $payments, $sale_id = false) {
        if (count($items) == 0)
            return -1;

        //Alain Multiple payments
        //Build payment types string
        $payment_types = '';
        foreach ($payments as $payment_id => $payment) {
            $payment_types = $payment_types . $payment['payment_type'] . ': ' . to_currency($payment['payment_amount']) . '<br />';
        }

        $sales_data = array(
            'sale_time' => date('Y-m-d H:i:s'),
            'customer_id' => $this->Customer->exists($customer_id) ? $customer_id : null,
            'employee_id' => $employee_id,
            'payment_type' => $payment_types,
            'comment' => $comment
        );

        //Run these queries as a transaction, we want to make sure we do all or nothing
        $this->db->trans_start();

        $this->db->insert('sales', $sales_data);
        $sale_id = $this->db->insert_id();

        foreach ($payments as $payment_id => $payment) {
            if (substr($payment['payment_type'], 0, strlen($this->lang->line('sales_giftcard'))) == $this->lang->line('sales_giftcard')) {
                /* We have a gift card and we have to deduct the used value from the total value of the card. */
                $splitpayment = explode(':', $payment['payment_type']);
                $cur_giftcard_value = $this->Giftcard->get_giftcard_value($splitpayment[1]);
                $this->Giftcard->update_giftcard_value($splitpayment[1], $cur_giftcard_value - $payment['payment_amount']);
            }

            $sales_payments_data = array
                (
                'sale_id' => $sale_id,
                'payment_type' => $payment['payment_type'],
                'payment_amount' => $payment['payment_amount']
            );
            $this->db->insert('sales_payments', $sales_payments_data);
        }

        foreach ($items as $line => $item) {
            $cur_item_info = $this->Item->get_info($item['item_id']);

            $sales_items_data = array
                (
                'sale_id' => $sale_id,
                'item_id' => $item['item_id'],
                'line' => $item['line'],
                'description' => $item['description'],
                'serialnumber' => $item['serialnumber'],
                'quantity_purchased' => $item['quantity'],
                'discount_percent' => $item['discount'],
                'item_cost_price' => $cur_item_info->cost_price,
                'item_unit_price' => $item['price']
            );

            $this->db->insert('sales_items', $sales_items_data);

            //Update stock quantity
            $item_data = array('quantity' => $cur_item_info->quantity - $item['quantity']);
            $this->Item->save($item_data, $item['item_id']);

            //Ramel Inventory Tracking
            //Inventory Count Details
            $qty_buy = -$item['quantity'];
            $sale_remarks = 'POS ' . $sale_id;
            $inv_data = array
                (
                'trans_date' => date('Y-m-d H:i:s'),
                'trans_items' => $item['item_id'],
                'trans_user' => $employee_id,
                'trans_comment' => $sale_remarks,
                'trans_inventory' => $qty_buy
            );
            $this->Inventory->insert($inv_data);
            //------------------------------------Ramel

            $customer = $this->Customer->get_info($customer_id);
            if ($customer_id == -1 or $customer->taxable) {
                foreach ($this->Item_taxes->get_info($item['item_id']) as $row) {
                    $this->db->insert('sales_items_taxes', array(
                        'sale_id' => $sale_id,
                        'item_id' => $item['item_id'],
                        'line' => $item['line'],
                        'name' => $row['name'],
                        'percent' => $row['percent']
                    ));
                }
            }
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return -1;
        }

        return $sale_id;
    }

    function delete_list($sale_ids, $employee_id, $update_inventory = TRUE) {
        $result = TRUE;
        foreach ($sale_ids as $sale_id) {
            $result &= $this->delete($sale_id, $employee_id, $update_inventory);
        }
        return $result;
    }

    function delete($sale_id, $employee_id, $update_inventory = TRUE) {
        // start a transaction to assure data integrity
        $this->db->trans_start();
        // first delete all payments
        $this->db->delete('sales_payments', array('sale_id' => $sale_id));
        // then delete all taxes on items
        $this->db->delete('sales_items_taxes', array('sale_id' => $sale_id));
        if ($update_inventory) {
            // defect, not all item deletions will be undone??
            // get array with all the items involved in the sale to update the inventory tracking
            $items = $this->get_sale_items($sale_id)->result_array();
            foreach ($items as $item) {
                // create query to update inventory tracking
                $inv_data = array
                    (
                    'trans_date' => date('Y-m-d H:i:s'),
                    'trans_items' => $item['item_id'],
                    'trans_user' => $employee_id,
                    'trans_comment' => 'Deleting sale ' . $sale_id,
                    'trans_inventory' => $item['quantity_purchased']
                );
                // update inventory
                $this->Inventory->insert($inv_data);
            }
        }
        // delete all items
        $this->db->delete('sales_items', array('sale_id' => $sale_id));
        // delete sale itself
        $this->db->delete('sales', array('sale_id' => $sale_id));
        // execute transaction
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    function get_sale_items($sale_id) {
        $this->db->from('sales_items');
        $this->db->where('sale_id', $sale_id);
        return $this->db->get();
    }

    function get_sale_payments($sale_id) {
        $this->db->from('sales_payments');
        $this->db->where('sale_id', $sale_id);
        return $this->db->get();
    }

    function get_customer($sale_id) {
        $this->db->from('sales');
        $this->db->where('sale_id', $sale_id);
        return $this->Customer->get_info($this->db->get()->row()->customer_id);
    }

    //We create a temp table that allows us to do easy report/sales queries
    public function create_sales_items_temp_table() {
        $this->db->query("DROP TABLE IF EXISTS phppos_sales_items_temp");
        $this->db->query("CREATE TEMPORARY TABLE " . $this->db->dbprefix('sales_items_temp') . "
		(SELECT date(sale_time) as sale_date, sale_time, " . $this->db->dbprefix('sales_items') . ".sale_id, comment,payments.payment_type, customer_id, employee_id, 
		" . $this->db->dbprefix('items') . ".item_id, supplier_id, quantity_purchased, item_cost_price, item_unit_price, SUM(percent) as item_tax_percent,
		discount_percent, (item_unit_price*quantity_purchased-item_unit_price*quantity_purchased*discount_percent/100) as subtotal,
		" . $this->db->dbprefix('sales_items') . ".line as line, serialnumber, " . $this->db->dbprefix('sales_items') . ".description as description,
		(item_unit_price*quantity_purchased-item_unit_price*quantity_purchased*discount_percent/100)*(1+(SUM(percent)/100)) as total,
		(item_unit_price*quantity_purchased-item_unit_price*quantity_purchased*discount_percent/100)*(SUM(percent)/100) as tax,
		(item_unit_price*quantity_purchased-item_unit_price*quantity_purchased*discount_percent/100) - (item_cost_price*quantity_purchased) as profit
		FROM " . $this->db->dbprefix('sales_items') . "
		INNER JOIN " . $this->db->dbprefix('sales') . " ON  " . $this->db->dbprefix('sales_items') . '.sale_id=' . $this->db->dbprefix('sales') . '.sale_id' . "
		INNER JOIN " . $this->db->dbprefix('items') . " ON  " . $this->db->dbprefix('sales_items') . '.item_id=' . $this->db->dbprefix('items') . '.item_id' . "
		INNER JOIN (SELECT sale_id, SUM(payment_amount) AS sale_payment_amount, 
		GROUP_CONCAT(payment_type SEPARATOR ', ') AS payment_type FROM " . $this->db->dbprefix('sales_payments') . " 
		WHERE payment_type <> '" . $this->lang->line('sales_check') . "' GROUP BY sale_id) AS payments 
		ON " . $this->db->dbprefix('sales_items') . '.sale_id' . "=" . "payments.sale_id		
		LEFT OUTER JOIN " . $this->db->dbprefix('suppliers') . " ON  " . $this->db->dbprefix('items') . '.supplier_id=' . $this->db->dbprefix('suppliers') . '.person_id' . "
		LEFT OUTER JOIN " . $this->db->dbprefix('sales_items_taxes') . " ON  "
                . $this->db->dbprefix('sales_items') . '.sale_id=' . $this->db->dbprefix('sales_items_taxes') . '.sale_id' . " and "
                . $this->db->dbprefix('sales_items') . '.item_id=' . $this->db->dbprefix('sales_items_taxes') . '.item_id' . " and "
                . $this->db->dbprefix('sales_items') . '.line=' . $this->db->dbprefix('sales_items_taxes') . '.line' . "
		GROUP BY sale_id, item_id, line)");

        //Update null item_tax_percents to be 0 instead of null
        $this->db->where('item_tax_percent IS NULL');
        $this->db->update('sales_items_temp', array('item_tax_percent' => 0));

        //Update null tax to be 0 instead of null
        $this->db->where('tax IS NULL');
        $this->db->update('sales_items_temp', array('tax' => 0));

        //Update null subtotals to be equal to the total as these don't have tax
        $this->db->query('UPDATE ' . $this->db->dbprefix('sales_items_temp') . ' SET total=subtotal WHERE total IS NULL');
    }

    public function correlativo($postData) {
        $response = [];
        $this->db->from('factura');
        $this->db->order_by('num_corre_cpe_ref', 'desc');
        $this->db->select_max('num_corre_cpe_ref');
        $this->db->select('cod_tip_otr_doc_ref');
        $this->db->group_by(array("cod_tip_otr_doc_ref"));
        $correlativo = $this->db->get();
        foreach ($correlativo->result() as $row) {
            $response[] = $row;
        }
        return $response;
    }

    function getUserDetails($postData) {

        $response = array();

        // if($postData['username'] )
        {

            // Select record
            $this->db->select('*');
            $this->db->where('cod_tip_otr_doc_ref', $postData['cod_tip_otr_doc_ref']);
            $this->db->order_by('num_corre_cpe_ref', 'desc');
            $q = $this->db->get('factura');
            $response = $q->result_array();
        }

        return $response;
    }

    function getCotizacionDetails($postData) {

        $response = array(); {
            $this->db->select('*');
            $this->db->where('cotizacion_id', 'TURIFAX-G1K6-1408'); // $postData['cotizacion_id']);	   
            $q = $this->db->get('cotizaciones_servicios');
            $response = $q->result_array();
        }

        return $response;
    }

    public function get_giftcard_value($giftcardNumber) {
        if (!$this->Giftcard->exists($this->Giftcard->get_giftcard_id($giftcardNumber)))
            return 0;

        $this->db->from('giftcards');
        $this->db->where('giftcard_number', $giftcardNumber);
        return $this->db->get()->row()->value;
    }

}

?>
