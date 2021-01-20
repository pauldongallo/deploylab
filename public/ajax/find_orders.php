<?php
require_once('../../private/initialize.php');
require_once(CLASS_PATH.'/order.php');

if(isset($_GET['customer_id'])){

	$data = Order::find_orders_by_customer_id($_GET['customer_id']);

	html(json_encode($data, true));
}