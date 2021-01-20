<?php
require_once('../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');


if( $_SERVER['REQUEST_METHOD'] === 'POST' ){

	if(isset($_POST)){

		$data = Order::update_order_entity_status($_POST);
		// if($data){
		// 	$data="success";
		// }	
	}
	
	html(json_encode($data, true));
}