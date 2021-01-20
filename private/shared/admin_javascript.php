<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="<?php echo url_for('/assets/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php // echo url_for('/assets/jquery-3.2.1.slim.min.js'); ?>"></script>
<!-- show only data tables -->
<script src="<?php // echo url_for('/assets/DataTables2/datatables.min.js'); ?>"></script>
<script src="<?php // echo url_for('/rest/jso.js'); ?>" ></script>
<script src="<?php echo url_for('/rest/jwt.js'); ?>" ></script>
<script src="<?php //echo url_for('/assets/mod/js/auth/jso.js'); ?>" ></script>
<script src="<?php //echo url_for('/assets/mod/js/auth/oauth.js'); ?>" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script type="text/javascript" src="<?php echo url_for('/assets/vendor/min/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url_for('/assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

<script src="<?php echo url_for('/assets/bootstrap-4.0.0/js/bootstrap.js'); ?>"></script>
<script src="<?php echo url_for('/assets/mod/js/sidebar_menu_collapse.js'); ?>"></script>
<script src="<?php echo url_for('/javascript/functions.js');?>"></script>
<?php

if($current_page == 'florist.php'){
 	echo '<script src="'.url_for("/assets/mod/js/florist/floristlist.ajax.js").'" defer></script>';
 	echo '<script src="'.url_for("/assets/mod/js/florist/addflorist.ajax.js").'"></script>';	
 	echo '<script src="'.url_for("/assets/mod/js/florist/editflorist.ajax.js").'"></script>';
 	echo '<script src="'.url_for("/assets/mod/js/florist/updateflorist.ajax.js").'"></script>';	
}elseif($current_page == 'customer.php'){
  	echo '<script src="'.url_for("/assets/mod/js/customer/customer_oder.ajax.js").'" defer></script>';
}elseif($current_page == 'order-assign.php?id='.$id){
	echo '<script src="'.url_for('/assets/mod/js/activity-log/activity-log.js').'"></script>';
?>
	<script>
		// $('#deliver_date').datepicker({
	 //    	format: 'mm/dd/yyyy',
	 //    	startDate: '-3d'
		// });
	</script>
	<?php 
}elseif($current_page == 'orders-dashboard.php'){
	// echo '<script src="'.url_for('/service/admin/order/entity/javascript/operator_notes.js').'"></script>';
	// echo '<script src="'.url_for('/service/admin/order/entity/javascript/entity_notes.js').'"></script>';
	// echo '<script src="'.url_for('/service/admin/order/find-orders/javascript/find-orders.js').'"></script>';
	echo '<script src="'.url_for('/rest/wc-rest.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/dashboard.country.state.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/entity-search.open.entity.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/entity-search.open.entity.entity.notes.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/entity-search.open.entity.operator.notes.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/entity-search.find.orders.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/edit-orders.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/edit-orders.pors.manual.select.js').'"></script>';
	echo '<script src="'.url_for('/javascript/admin/orders/edit-orders.pors.addnewstore.js').'"></script>';
?>
	<script>
		// $('#toOrderDate').datepicker({
	 //    	format: 'dd/mm/yyyy',
	 //    	autoclose: true
		// });
		// $('#fromDeliveryDate').datepicker({
	 //    	format: 'mm/dd/yyyy',
	 //    	autoclose: true
		// });
		// $('#toDeliveryDate').datepicker({
	 //    	format: 'mm/dd/yyyy',
	 //    	autoclose: true
		// });

		// $("#tempInactiveCalendar").datepicker({
		// 	format: 'mm/dd/yyyy',
		// 	autoclose: true
		// });
	</script>
<?php
}elseif( site_domain_public('/admin/agent/index.php') == current_page() ){
	echo '<script src="'.url_for('/assets/mod/js/agent/agent.js').'" defer ></script>';
}elseif( site_domain_public('/admin/agent/new.php') == current_page() ){
	echo '<script src="'.url_for('/assets/mod/js/agent/new-agent.js').'" defer ></script>';
}
?>

