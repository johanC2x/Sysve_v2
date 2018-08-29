<?php
require_once ("person_controller.php");
class Customers extends Person_controller
{
	function __construct()
	{
		parent::__construct('customers');
		$this->load->model("property");
	}
	
	function index() 
	{
		//$this->output->cache(5);
		$config['base_url'] = site_url('/customers/index');
		$config['total_rows'] = $this->Customer->count_all();
		$config['per_page'] = '20';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		
		$data['controller_name']=strtolower(get_class());
		$data['form_width']=$this->get_form_width();
		$data['manage_table']=get_people_manage_table( $this->Customer->get_all( $config['per_page'], $this->uri->segment( $config['uri_segment'] ) ), $this );
		$this->load->view('customers/render',$data);
	}
	
	/*
	Returns customer table data rows. This will be called with AJAX.
	*/
	function search()
	{
		$search=$this->input->post('search');
		$data_rows=get_people_manage_table_data_rows($this->Customer->search($search),$this);
		echo $data_rows;
	}
	
	/*
	Gives search suggestions based on what is being searched for
	*/
	function suggest()
	{
		$suggestions = $this->Customer->get_search_suggestions($this->input->post('q'),$this->input->post('limit'));
		echo implode("\n",$suggestions);
	}
	
	/*
	Loads the customer edit form
	*/
	function view($customer_id=-1){
		$this->output->cache(2);
		$parent_property = $this->property->getListParentModule();
		if(sizeof($parent_property) > 0){
			foreach ($parent_property as $key_parent => $value_parent) {
				$children_property = $this->property->getListByParent($value_parent["id"]);
				$propertys[$key_parent]["id"] = $value_parent["id"];
				$propertys[$key_parent]["name"] = $value_parent["name"];
				$propertys[$key_parent]["type"] = $value_parent["type"];
				if(sizeof($children_property) > 0){
					$propertys_children = []; 
					foreach ($children_property as $key_children => $value_children) {
						$propertys_children[] = array(
							"id" => $value_children["id"],
							"name" => $value_children["name"],
						); 
					}
					$propertys[$key_parent]["children"] = $propertys_children;
				}
			}
		}
		$data['person_info']=$this->Customer->get_info($customer_id);
		$data['propertys'] = $propertys;
		$this->load->view("customers/form",$data);
	}

	/*
	Inserts/updates a customer
	*/
	function save($customer_id=-1){
		$data["customer_info"] = json_decode($this->input->post('data_customer'));
		// var_dump($_REQUEST);
		// var_dump($this->input->post('data_customer'));
		// die();
		$person_data = array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'email'=>$this->input->post('email'),
			'phone_number'=>$this->input->post('phone_number'),
			'address_1'=>$this->input->post('address_1'),
			'fec_nac'=>$this->input->post('fec_nac'),
			'nationality'=>$this->input->post('nationality'),
			// 'country'=>$this->input->post('country'),
			'comments'=>$this->input->post('comments'),
			'person_id'=>$this->input->post('person_id'),
			'type_person_id'=>$this->input->post('type_person_id'),
			'has_brevete'=>$this->input->post('has_brevete'),
			'num_brevete'=>$this->input->post('num_brevete'),
			'has_passport'=>$this->input->post('has_passport'),
			'num_passport'=>$this->input->post('num_passport'),
		);
		$customer_data=array(
			'account_number'=>$this->input->post('account_number')=='' ? null:$this->input->post('account_number'),
			'taxable'=>$this->input->post('taxable')=='' ? 0:1,
			'data'=>$this->input->post('data'),
			'data_customer' => json_encode($data),
			'data_nueva'=> $this->input->post('hidden_tablas'),
		);


		$response = $this->Customer->save($person_data,$customer_data,$customer_id);
		if(isset($response->person_id) && !empty($response->person_id)){
			echo json_encode(array(
					'success'=>false,
					'message'=>$this->lang->line('customers_exists'),
				));
		}else{
			if($response){
				if($customer_id==-1){
					echo json_encode(array(
							'success'=>true,
							'message'=>$this->lang->line('customers_successful_adding').' '.$person_data['first_name'].' '.$person_data['last_name'],
							'person_id'=>$person_data['person_id']
						));
				}else{
					echo json_encode(array(
							'success'=>true,
							'message'=>$this->lang->line('customers_successful_updating').' '.$person_data['first_name'].' '.$person_data['last_name'],
							'person_id'=>$customer_id
						));
				}
			}else{	
				echo json_encode(array(
						'success'=>false,
						'message'=>$this->lang->line('customers_error_adding_updating').' '.$person_data['first_name'].' '.$person_data['last_name'],
						'person_id'=>-1
					));
			}
		}
	}
	
	/*
	This deletes customers from the customers table
	*/
	function delete()
	{
		$customers_to_delete=$this->input->post('ids');
		
		if($this->Customer->delete_list($customers_to_delete))
		{
			echo json_encode(array('success'=>true,'message'=>$this->lang->line('customers_successful_deleted').' '.
				count($customers_to_delete).' '.$this->lang->line('customers_one_or_multiple')));
		}
		else
		{
			echo json_encode(array('success'=>false,'message'=>$this->lang->line('customers_cannot_be_deleted')));
		}
	}
	
	function excel()
	{
		$data = file_get_contents("import_customers.csv");
		$name = 'import_customers.csv';
		force_download($name, $data);
	}
	
	function excel_import()
	{
		$this->load->view("customers/excel_import", null);
	}

	function do_excel_import()
	{
		$msg = 'do_excel_import';
		$failCodes = array();
		if ($_FILES['file_path']['error']!=UPLOAD_ERR_OK)
		{
			$msg = $this->lang->line('items_excel_import_failed');
			echo json_encode( array('success'=>false,'message'=>$msg) );
			return;
		}
		else
		{
			if (($handle = fopen($_FILES['file_path']['tmp_name'], "r")) !== FALSE)
			{
				//Skip first row
				fgetcsv($handle);
				
				$i=1;
				while (($data = fgetcsv($handle)) !== FALSE) 
				{
					$person_data = array(
						'first_name'=>$data[0],
						'last_name'=>$data[1],
						'email'=>$data[2],
						'phone_number'=>$data[3],
						'address_1'=>$data[4],
						'address_2'=>$data[5],
						'city'=>$data[6],
						'state'=>$data[7],
						'zip'=>$data[8],
						'country'=>$data[9],
						'comments'=>$data[10],
						'person_id'=>$data[11]
						);
					
					$customer_data=array(
						'account_number'=>$data[11]=='' ? null:$data[11],
						'taxable'=>$data[12]=='' ? 0:1,
						);
					
					if(!$this->Customer->save($person_data,$customer_data))
					{	
						$failCodes[] = $i;
					}
					
					$i++;
				}
			}
			else 
			{
				echo json_encode( array('success'=>false,'message'=>'Your upload file has no data or not in supported format.') );
				return;
			}
		}

		$success = true;
		if(count($failCodes) > 1)
		{
			$msg = "Most customers imported. But some were not, here is list of their CODE (" .count($failCodes) ."): ".implode(", ", $failCodes);
			$success = false;
		}
		else
		{
			$msg = "Import Customers successful";
		}

		echo json_encode( array('success'=>$success,'message'=>$msg) );
	}
	
	/*
	get the width for the add/edit form
	*/
	function get_form_width()
	{			
		return 1250;
	}

	/* METODOS PARA CLIENTES */

	function render(){
		$this->load->view('customers/render');
	}

	function listClients(){
		$response = $this->Customer->listClients();
		if(!empty($response)){
			echo json_encode(array('success'=>true,'data'=>$response));
		}else{
			echo json_encode(array('success'=>false,'data'=>[]));
		}
	}

	function listCotizacion(){
		$response = $this->Customer->listCotizacion();
		$correlativo = $this->Sale->correlativo();
		if(!empty($response)){
			echo json_encode(array('success'=>true,'data'=>$response, $correlativo));
		}else{
			echo json_encode(array('success'=>false,'data'=>[]));
		}
	}

	function getClient(){
		$response = [];
		if($this->input->post()){
			$client_id = $this->input->post("id");
			$result = $this->Customer->getClient($client_id);
			if(!empty($result)){
				$response = array('success'=>true,'data'=>$result);
			}else{
				$response = array('success'=>false);
			}
		}else{
			$response = array('success'=>false);
		}
		echo json_encode($response);
	}

	function saveClient(){
		if($this->input->post()){
			$date = date('Y-m-d', strtotime(str_replace('-','/', $this->input->post('date_expire'))));
			$client_data = array(
				'firstname'=>$this->input->post('first_name'),
				'middlename'=>$this->input->post('midle_name'),
				'lastname'=>$this->input->post('last_name'),
				'mother_lastname'=>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'age'=>$this->input->post('age'),
				'fecha_vcto'=>$this->input->post('fecha_vcto'),
				'nacionalidad'=>$this->input->post('nacionalidad'),
				'gender'=>$this->input->post('gender'),
				'fec_nac'=>$this->input->post('user_date'),
				'data'=>$this->input->post('client_data')
			);
			$response = $this->Customer->insertClient($client_data);
			if(!empty($response) && (int)$response === 1){
				echo json_encode(array('success'=>true,'message'=>"Operación correcta"));
			}else{
				echo json_encode(array('success'=>false,'message'=>"Ha ocurrido un error interno"));
			}
		}else{
			echo json_encode(array('success'=>false,'message'=>"No se ha enviado ningún registro"));
		}
	}


	function saveClientBasico(){
		$cliente['datos']     = array(
		    	'person_id'       =>$this->input->post('person_id'),
	            'firstname'       =>$this->input->post('first_name'),
	            'middlename'      =>$this->input->post('midle_name'),
	            'lastname'        =>$this->input->post('last_name'),
	            'mother_lastname' =>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'descripcion'     =>$this->input->post('descripcion'),
        );
		if($this->input->post()){
			$date = date('Y-m-d', strtotime(str_replace('-','/', $this->input->post('date_expire'))));
			$client_data = array(
				'firstname'=>$this->input->post('first_name'),
				'middlename'=>$this->input->post('midle_name'),
				'lastname'=>$this->input->post('last_name'),
				'mother_lastname'=>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'age'=>$this->input->post('age'),
				'fecha_vcto'=>$this->input->post('fecha_vcto'),
				'gender'=>$this->input->post('gender'),
				'fec_nac'=>$this->input->post('user_date'),
				'data'=>$this->input->post('client_data')
			);
			$response = $this->Customer->insertClient($client_data);
			if(!empty($response) && (int)$response === 1){
				$this->load->view('customers/render', $cliente);
			}else{
				echo json_encode(array('success'=>false,'message'=>"Ha ocurrido un error interno"));
			}
		}else{
			echo json_encode(array('success'=>false,'message'=>"No se ha enviado ningún registro"));
		}
	}

	function Cotizacion($id = null){
		$cliente = [];
		if(!empty($id)){
			$client = $this->Customer->getClient($id);
			$data = json_decode($client->data);

			//OBTENIENDO DATOS DE EMAIL
			$email_pos = array_search('empresa', array_column($data->emails, 'type_email'));
			$email_arr = $data->emails[$email_pos];
			$email = (!empty($email_arr)) ? $email_arr->email : "";

			//OBTENIENDO DATOS DE TELEFONO
			$phone_pos = array_search('celular_personal', array_column($data->emails, 'type_phone'));
			$phone_arr = $data->phones[$phone_pos];
			$phone = (!empty($phone_arr)) ? $phone_arr->nro_phone : "";

			//OBTENIENDO DATOS DE DOCUMENTO
			$document_pos = array_search('dni', array_column($data->documents, 'type_document'));
			$document_arr = $data->documents[$document_pos];
			$document = (!empty($document_arr)) ? $document_arr->nro_doc : "";
			
			$cliente['datos']     = array(
		    	'person_id'       => $client->id,
	            'firstname'       => $client->firstname,
	            'middlename'      => $client->middlename,
	            'lastname'        => $client->lastname,
	            'mother_lastname' => $client->mother_lastname,
				'last_name_casada'=> $client->last_name_casada,
				'documents' 	  => $document,
				'description' 	  => $data->description,
				'emails'		  => $email,
				'phones'	      => $phone,	  
        	);
		}
		$this->load->view('customers/cotizar',$cliente, $data);
	}


/*
	function saveClientBasico(){
		    $cliente['datos']     = array(
		    	'person_id'       =>$this->input->post('person_id'),
	            'firstname'       => $this->input->post('first_name'),
	            'middlename'      => $this->input->post('midle_name'),
	            'lastname'        => $this->input->post('last_name'),
	            'mother_lastname' =>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'age'             =>$this->input->post('age'),
				'gender'          =>$this->input->post('gender'),
				'fec_nac'         =>$this->input->post('user_date'),
				'data'            =>$this->input->post('client_data')
        );

		if($this->input->post()){
			$date = date('Y-m-d', strtotime(str_replace('-','/', $this->input->post('date_expire'))));
			$client_data = array(
				'firstname'       =>$this->input->post('first_name'),
				'middlename'      =>$this->input->post('midle_name'),
				'lastname'        =>$this->input->post('last_name'),
				'mother_lastname' =>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'age'             =>$this->input->post('age'),
				'fec_nac'         =>$this->input->post('user_date'),
				'data'            =>$this->input->post('client_data')
			);
			$response = $this->Customer->insertClient($client_data);
			if(!empty($response) && (int)$response === 1){
				$this->load->view('customers/cotizar', $cliente);
			}else{
				echo json_encode(array('success'=>false,'message'=>"Ha ocurrido un error interno"));
			}
		}else{
			echo json_encode(array('success'=>false,'message'=>"No se ha enviado ningún registro"));
		}
	}
*/
	function updateClient(){
		if($this->input->post()){
			$date = date('Y-m-d', strtotime(str_replace('-','/', $this->input->post('date_expire'))));
			$client_id = $this->input->post('client_id');
			$client_data = array(
				'firstname'=>$this->input->post('first_name'),
				'middlename'=>$this->input->post('midle_name'),
				'lastname'=>$this->input->post('last_name'),
				'mother_lastname'=>$this->input->post('last_name_mothers'),
				'last_name_casada'=>$this->input->post('last_name_casada'),
				'age'=>$this->input->post('age'),
				'fecha_vcto'=>$this->input->post('fecha_vcto'),
				'nacionalidad'=>$this->input->post('nacionalidad'),
				'gender'=>$this->input->post('gender'),
				'fec_nac'=>$this->input->post('user_date'),
				'data'=>$this->input->post('client_data')
			);
			$response = $this->Customer->updateClient($client_data,$client_id);
			if(!empty($response) && (int)$response === 1){
				echo json_encode(array('success'=>true,'message'=>"Operación correcta"));
			}else{
				echo json_encode(array('success'=>false,'message'=>"Ha ocurrido un error interno"));
			}
		}else{
			echo json_encode(array('success'=>false,'message'=>"No se ha enviado ningún registro"));
		}
	}

	function deleteClient(){
		if($this->input->post()){
			$client_id = $this->input->post('client_id');
			$client_data = array('deleted'=>1);
			$response = $this->Customer->deleteClient($client_data,$client_id);
			if(!empty($response) && (int)$response === 1){
				echo json_encode(array('success'=>true,'message'=>"Operación correcta"));
			}else{
				echo json_encode(array('success'=>false));
			}
		}else{
			echo json_encode(array('success'=>false));
		}
	}

	function customers_edit($customer_id){
		$data['person_info']=$this->Customer->get_info($customer_id);
		$this->load->view('customers/mantenimiento', $data);
	}

	function saveCotizacion(){
		if($this->input->post()){
			$id = 0;
			$cliente_id = $this->input->post('person_id');
			$cotizacion_id = $this->input->post('code_coti');
			$user_id = $this->session->userdata["person_id"];
			$descripcion = $this->input->post('descripcion');
			$cotizaciones_data = array(
				'cliente_id' => $cliente_id,
				'cotizacion_id' => $cotizacion_id,
				'descripcion' => $descripcion,
				'estatus' => 'C',
				'asesor' => $user_id,
				'fecha' => date('Y-m-d H:i:s')
			);
			$response = $this->Customer->addCotizacion($cotizaciones_data);
			$obj_cotizacion = $this->Customer->getCotizacionBycode($cotizacion_id);
			if(!empty($obj_cotizacion)){
				$id = $obj_cotizacion->cotizacion_id;
			}
			if(!empty($response) && (int)$response === 1){
				$cotizaciones = json_decode($this->input->post('comisiones'));
				foreach($cotizaciones as $cotizacion){
					$cotizaciones_service_data = array(
						'name' => $cotizacion->name,
						'cotizacion_id' => $id,
						'descripcion' => $cotizacion->descripcion,
						'created_at' => date('Y-m-d H:i:s'),
						'created_by' => $user_id,
						'code' => $cotizacion->ammount,
						'amount' => $cotizacion->monto,
						'data' => json_encode($cotizacion->childrens)
					);
					$response_coti = $this->Customer->addCotizacionService($cotizaciones_service_data);
					if(empty($response) || (int)$response !== 1){
						echo json_encode(array('success'=>false));
						exit();
					}
				}
				echo json_encode(array('success'=>true));
			}else{
				echo json_encode(array('success'=>false));
			}
		}
	}

}
?>