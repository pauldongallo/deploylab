<?php
	// get all the from the customer
require_once('../../private/initialize.php');
require_once(CLASS_PATH.'/customer.php');
require_once(CLASS_PATH.'/order.php');


if(isset( $_REQUEST )){

	$request = $_REQUEST;

	// $request['ent_first_name'] = "Barry";
	// $request['ent_store_name']=1421;
	// $request['ent_home'] = "0432979817";

	$data_fields_index = [];
	$data_meta_query = [];
	$search_result = [];
	$entity_data = [];

	foreach( $request as $key => $value ){
		if(!empty($value)){
			$data_fields_index[] = "$value";			
		}
	}

	$search = array_values($data_fields_index)[0];

	if( !empty( $request['ent_store_name']) && 
		empty( $request['ent_first_name']) &&
		empty( $request['ent_last_name']) &&
		empty( $request['ent_email']) &&
		empty( $request['ent_home']) &&
		empty( $request['ent_work_phone']) && 
		empty( $request['ent_fax_phone']) &&
		empty( $request['ent_mobile_phone']) &&
		empty( $request['recipient_fist_name']) &&
		empty( $request['recipient_last_name']) ){

		$orders = $order_obj->get_orders_meta_data();

	}else {

		$entity_data = $customer->entity_search($search);

		/*
		* Customer is not registered
		*/
		if(empty($entity_data)){	

			$search_result = false;

			return html(json_encode( $search_result ));

		}

	}

	// first name
	if( !empty( $request['ent_first_name']) ){

		$search_result = $order_obj->entity_search_result($entity_data, $request);

	// last name
	}elseif( !empty( $request['ent_last_name'] ) ){
		$search_result = $order_obj->entity_search_result($entity_data, $request);
	// ent email	

	}elseif( !empty( $request['ent_store_name'] ) ){
		$search_result = $order_obj->entity_search_result($orders, $request);

	}elseif( !empty( $request['ent_email']) ){
		$search_result = $order_obj->entity_search_result($entity_data, $request);
	// phone

	}elseif( !empty( $request['ent_home'] ) ){
		$search_result = $order_obj->entity_search_result($entity_data, $request);
	// work phone

	}elseif( !empty( $request['ent_work_phone'] ) ){
		$search_result = "work_phone to do";
	// fax phone

	}elseif( !empty( $request['ent_fax_phone']) ){
		$search_result = "fax phone to do";
	}elseif( !empty( $request['ent_mobile_phone']) ){
	// mobile phone
		$search_result = "mobile phone to do";
	// recipient fist name	

	}elseif( !empty( $request['recipient_fist_name']) ){
		$search_result = $order_obj->entity_search_result($entity_data, $request);
	// recipient last name	

	}elseif( !empty( $request['recipient_last_name']) ){
		
		$search_result = $order_obj->entity_search_result($entity_data, $request);

	}

}
html(json_encode( $search_result ));

?>