<?php
require_once('../../../private/initialize.php');

include(SHARED_PATH.'/admin_header.php');

$order = New Order();

$index = $order->index();

$page_title = 'Order Dashboard';
?>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
        <!-- Page Content  -->
        <div id="content">
        	<h1> <?php  

        		echo $index;

        	?> </h1>

    	</div><!--#end content -->
</div><!-- #end warpper -->

<?php include(SHARED_PATH.'/admin_footer.php'); ?>

	