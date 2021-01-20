<?php
require_once('../../../private/initialize.php');



include(SHARED_PATH.'/admin_header.php');

$page_title = 'Order Dashboard';
?>
<div class="wrapper">
	<?php include(SHARED_PATH.'/sidebar-navigation.php'); ?>
        <!-- Page Content  -->
        <div id="content">
        	<form id="order_dasbhoard" action="<?php echo url_for('/admin/orders/orders-dashboard.php'); ?>" method="post">
		      	<div class="card mb-3">	
	  				<div class="card-body">   				
						<div class="row">
							<div class="col col-lg-2">
							 	<small class="text-muted"> Show Orders that have been: </small>
							 </div>
						    <div class="col col-lg-1">	   					    										
								<button 
									type="submit"
									name="delivered_button" class="btn-block btn btn-light btn-sm" 
									value="submit"
								>
								Delivered	
								<?php 		
							 		if( isset( $orders['active_icon'] ) ){
							 			if( $orders['active_icon'] == $delivered ){
							 				echo $icon_checked;
								 		}
							 		}
								?> 
							 	</button>
							 	<input type="hidden" name="delivered_value" value="4" />					 	
						    </div>
						    <div class="col col-lg-1">					     
								<button 
									type="submit"  
									name="ordered_button" class="btn-block btn btn-light btn-sm" 
									value="submit">
									Ordered 
									<?php 		
								 		if( isset( $orders['active_icon'] ) ){
								 			if( $orders['active_icon'] == $ordered_default ){
								 				html($icon_checked);
									 		} 												 	
								 		}
									?> 
								</button>
					      		<input type="hidden" name="ordered_value" value="<?php html($ordered_default); ?>" />										
						    </div>
						    <div class="col col-lg-1">
							 	<small class="text-muted"> Show results for: </small>
							</div>
						    <div class="col col-lg-1">						    	   					    	
								<button 
									type="button" 
									name="thirtdy_days_button" class="btn-block btn btn-light btn-sm" 
									value="4">
									30 Days 
								</button> 			
								<input type="hidden" name="test1" value="1" />
								
						    </div>
						    <div class="col col-lg-1">		   					    	
								<button 
									type="button" name="seven_days_button" 
									class="btn-block btn btn-light btn-sm" value="4">
									7 Days 
								</button> 			
								<input type="hidden" name="seven_days_value" value="1" />
						    </div>
						   <div class="col-lg-1">				  
						     	<form>		   					    								
									<button 
										type="submit" id="todayButton" disabled 
										name="today_button" class="btn-block btn btn-light btn-sm" 
										value="submit"
									>
									Today 
									<?php 
										html($icon_checked);
									?> 					
									</button>
									<input type="hidden" name="todays_date_value" value="<?php html($order_obj::TODAY); ?>" />
									<input type="hidden" name="todays_date" value="<?php echo $todays_date; ?>" />
								</form>					
						    </div>
						    <div class="col-lg-2">				  			   					    	
								<button 
									id="entitySearch"
									type="button" name="entity_search"
									class="btn-block btn btn-info btn-sm" 
									value="4" data-toggle="modal"
									data-target="#entitySearchModal"
									>
									Entity Search
								</button> 	
						    </div>
						    <div class="col">
						     	
						    </div>
						</div><!--#row-->
						<div class="row">
							<div class="col col-lg-2">
							 	<small class="text-muted">  </small>
							 </div>
							<div class="col col-lg-1">	
								<div class="row">
									<small>Date From:</small>	
								</div>	
						    </div>
						    <div class="col col-lg-1">	
						    	<div class="row">
									<small> Date To: </small>
								</div>		
						    </div>
						</div><!--#row-->
						<div class="row">
							<div class="col col-lg-2">
							 	<small class="text-muted"> Search Specific Date range: </small>
							</div>
							<div class="col-md-auto">					      	
						      	<div class="row">	
									<form class="form-inline">
									  <label class="sr-only" for="inlineFormInputName2">Date From</label>
									  <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" id="fromOrderDate" name="or_start_date" value="<?php echo $or_start_date; ?>" size="8" placeholder="mm/dd/yyyy">

									  <label class="sr-only" for="inlineFormInputGroupUsername2">Date To</label>
									  <div class="input-group mb-2 mr-sm-2">
									    <input type="text" class="form-control form-control-sm" id="toOrderDate" name="or_end_date" value="<?php echo $or_end_date; ?>" size="8" placeholder="mm/dd/yyyy">
									  </div>
									    <div class="input-group mb-2 mr-sm-2">
									  		<button 
									  			id="orderDateButton" type="submit" 
									  			name="order_date" value="submit" 
									  			class="btn btn-primary btn-sm">
									  		Filter
									  		</button>
										</div>
									</form>

								</div>	
						    </div>
						    <div class="col col-lg-2">	
						    	<div class="row">	
									<form class="form-inline">
									  <label class="sr-only" for="inlineFormInputName2">Name</label>
									  <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" size="8" placeholder="">
									    <div class="input-group mb-2 mr-sm-2">
									  		<button 
									  			type="submit" name="order_date" 
									  			value="submit" class="btn-block btn btn-primary btn-sm">
									  			Search
									  		</button>
										</div>
									</form>
								</div>	
						    </div>

							<div class="col-md-auto">					      	
						      	<div class="row">	
									<div class="form-inline">
										<div class="input-group mb-2 mr-sm-2">
											<label> <small class="text-muted"> Order Number(xxxx-xxxx): </small> </label>	
										</div>	
									  	<div class="input-group mb-2 mr-sm-2">
									    	<input type="text" class="form-control form-control-sm" id="sSorderNumber" name="order_id" size="10">
									  	</div>
									    <div class="input-group mb-2 mr-sm-2">
									  		<button type="submit" name="s_order_id" value="submit" class="btn btn-primary btn-sm">
									  		Search
									  		</button>
										</div>
									</div>
								</div>	
						    </div>
						    <div class="col col-lg-1">	
						    	<form action="" method="get">
				                	<button id="logout" class="logout btn-block btn btn-warning btn-sm">Logout</button>
				               	</form>
						    </div>
						</div><!--#row-->
						<div class="row">
							<div class="col col-lg-2">
								<small class="text-muted"> Filters: </small>
							</div>
							<div class="col col-md-2">
								<div class="row">
									<form class="form-inline">
										<select class="form-control form-control-sm mb-2 mr-sm-2">
										  <option>select</option>
										</select> 
									</form>
								</div>  
							</div>
							<div class="col col-lg-1">
								<small class="text-muted">Order Status:</small>
							</div>
							<div class="col col-lg-2">
								<div class="row">
									<form class="form-inline">
										<select class="form-control form-control-sm mb-2 mr-sm-2">
										  <option>select</option>
										</select>
									</form>
								</div>
							</div>
							<div class="col col-lg-1">
								<small class="text-muted">Country:</small>
							</div>
							<div class="col  col-lg-1">
								<div class="row">
									<div class="form-inline">
										<select style="width:210px;" name="country_options" class="countryOptions form-control form-control-sm mb-2 mr-sm-2">
										  	<option>all</option>
										  	<?php if(isset($country_code)){?> 
										  		<option <?php 
									  				if( $_POST['country_options'] == $country_code ){ 
									  					html("data-country='".$country_code."'"."selected");
									  					} 
									  				?> value="" > <?php html( $country_name ); ?>		  			
										  		</option>
										  	<?php } ?>
										</select> 
									</div>
									<?php if(isset( $country_code )){ ?>
										<input type="hidden" name="country_code" value="<?php echo $country_code; ?>" />
									<?php } ?>	
									<?php if(isset( $country_name )){ ?>
										<input type="hidden" name="country_name" value="<?php echo $country_name; ?>" />
									<?php } ?>		
									<button type="submit" id="countryOptionButton" name="country_options_value" value="submit" >submit</button>
								</div>
							</div>
						</div><!--#row-->
						<div class="row">
							<div class="col col-lg-1">						
								<small class="text-muted">Page size:</small>
							</div>
							<div class="col col-lg-1">
								<select name="page_length" class="custom-select form-control-sm">
									<?php			

										if( $orders['total_page'] != 0){
											for($perpage = 1; $perpage < $orders['total_page']; $perpage++){
												if($perpage % $order_obj::LIMIT_LIST == 0){							
													echo "<option value=".$perpage.">".$perpage."</option>";	
												}elseif( $order_obj::DEFAULT_PAGE > $orders['total_page'] ){
													$perpage = 20;
													echo "<option value=".$perpage." >".$perpage."</option>";	
												}elseif($order_obj::DEFAULT_PAGE == $orders['total_page']){
													$perpage = 20;
													echo "<option value=".$perpage." >".$perpage."</option>";	
												}
											}
										}else {
											$perpage = 20;
											echo "<option value=".$perpage." >".$perpage."</option>";	
										}
									?>
								</select>
							</div>
							<div class="col col-lg-2">
								<div class="row">
								 	<div class="input-group input-group-sm mb-3">
									    <div class="input-group-prepend">
									      	<span class="input-group-text" id="inputGroup-sizing-sm">Store</span>
									    </div>
									  	<input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
									</div>
								</div>	
							</div>
							<div class="col col-lg-1">
								<small class="text-muted">Action States:</small>
							</div>
							<div class="col col-lg-2">
								<div class="row">
									<form class="form-inline">
										<select class="form-control form-control-sm mb-2 mr-sm-2">
										  <option>select</option>
										</select>
									</form>
								</div>
							</div>
							<div class="col col-lg-1">
								<small class="text-muted">States:</small>
							</div>
							<div class="col col-lg-2">
								<div class="row">
									<div class="form-inline">
										<select style="width:210px;" name="country_states_option" id="countryStateOption" class="form-control form-control-sm mb-2 mr-sm-2">
										   <option>==chose country==</option>

										   <?php if(isset($country_state_code)){?> 
										  		<option <?php 
									  				if( $_POST['country_states_option'] == $country_state_code ){ 
									  					html("data-country='".$country_state_code."'"."selected");
									  					} 
									  				?> value="" > <?php html( $country_state_name ); ?>		  			
										  		</option>
										  	<?php } ?>

										</select>
										<button type="submit" id="countryStatesOptionButton" name="country_states_options_value" value="submit" >submit</button>
									</div>
								</div>
							</div>
							<div class="col col-lg-1">
								<div class="row">
									<form class="form-inline">	
										<div class="form-group mx-sm-3 mb-2">		
										    <button type="button" id="resetAllFilters" class="btn btn-sm btn-warning">reset</button>
										</div>
									</form>
								</div>
							</div>
						</div><!--#row-->
	  				</div><!--#card-body-->
				</div>
			</form>	
	        <div class="table-responsive">
				<table id="orders_table" class="table table-striped">
					<thead>
					    <tr>
					      	<th scope="col">Operator Name</th>
					      	<th scope="col">Temp Order No.</th>
					      	<th scope="col">Order No.</th>
					      	<th scope="col">Order Date.</th>
					      	<th scope="col">Delivery Date.</th>
					      	<th scope="col">Order Amount.</th>
					      	<th scope="col">Order Amount in AUD.</th>
					      	<th scope="col">Pay to Florist</th>	
					      	<th scope="col"> % </th>	
					      	<th scope="col">Dispatch Status</th>
					      	<th scope="col">Notes</th>	
					      	<th scope="col">Fraud Score</th> 
					      	<th scope="col">Store Name</th>   
					      	<th scope="col">Order Status</th>     	 
					    </tr>
					</thead>
					<tbody>
					 	<?php
					 	$order_obj->orders_table_index($orders['orders']); ?>
				   </tbody>
				</table>
			</div>	
    	</div><!--#end content -->
</div><!-- #end warpper -->

<!-- Modal #EntityOperator -->
<div class="modal modal-wide fade" id="entitySearchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-mod" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-window-restore text-info"></i>Entity Operator</h5>
        <button type="button" class="close close_entity" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
      		<form id="entityForm" action="">
		      	<table class="table">
				  	<thead>
					   <tr class="table-primary" >
						    <th scope="row"><small class="text-muted">First Name</small></th>
						    <th scope="row">
						    	<input type="text" id="entFirstName" name="ent_first_name" class="form-control form-control-sm">
						    </th>
						    <th scope="row"><small class="text-muted">Last Name</small></th>
						    <th scope="row">
						    	<input type="text"
						    		id="ent_last_name"
						    		name="ent_last_name" 
						    		class="form-control form-control-sm"
						    	>
						    </th>
						    <th scope="row"><small class="text-muted">Store Name</small></th>
						    <th scope="row"><input type="text" name="ent_store_name" class="form-control form-control-sm"></th>
						    <th scope="row"><small class="text-muted">Email 1</small></th>
						    <th scope="row"><input type="text" name="ent_email" class="form-control form-control-sm"></th>
						    <th scope="row"><small class="text-muted">Home phone</small></th>
						    <th scope="row"><input type="text" name="ent_home" class="form-control form-control-sm"></th> 
						    <th scope="row"></th>
					  	</tr>
					</thead>
					<tbody>
					 	<tr class="table-primary" >
					    	<th scope="row"><small class="text-muted">Work phone</small></th>
					    	<th scope="row"><input type="text" name="ent_work_phone" disabled class="form-control form-control-sm"></th>
					    	<th scope="row"><small class="text-muted">Fax Phone</small></th>
					    	<th scope="row"><input type="text" name="ent_fax_phone" class="form-control form-control-sm" disabled></th>
					    	<th scope="row"><small class="text-muted">Mobile Phone</small></th>
					    	<th scope="row"><input type="text" name="ent_mobile_phone" disabled class="form-control form-control-sm"></th>
					   		<th scope="row"><small class="text-muted">Recipient First Name</small></th>
					   		<th scope="row"><input type="text" name="recipient_fist_name" class="form-control form-control-sm"></th>
					   		<th scope="row"><small class="text-muted">Recipient Last Name</small></th>
					    	<th scope="row"><input type="text" name="recipient_last_name" class="form-control form-control-sm"></th>
					    	<th scope="row"> 
					    		<div class="input-group mb-3">
								  	<div class="input-group-append">
								    	<button id="entitySearchButton" class="btn btn-success" type="button">Go</button>
								  	</div>
								</div>
							</th>
					  </tr>
					</tbody>
				</table>				
				<div class="table-responsive">
					<table id="entitySearchTable" class="table table-bordered table-striped table-sm">
					  	<thead>
						   <tr>
							    <th scope="col"><small class="text-muted">First Name</small></th>
							    <th scope="col"><small class="text-muted">Last Name</small></th>
							    <th scope="col"><small class="text-muted">Points</small></th>
							    <th scope="col"><small class="text-muted">Store Name</small></th>
							    <th scope="col"><small class="text-muted">IsActive</small></th>
							    <th scope="col"><small class="text-muted">Email</small></th>
							    <th scope="col"><small class="text-muted">Home Phone</small></th>
							    <th scope="col"><small class="text-muted">Work Phone</small></th>
							    <th scope="col"><small class="text-muted">Fax Phone</small></th>
							    <th scope="col"><small class="text-muted">Recipients First Name</small></th>
							    <th scope="col"><small class="text-muted">Recipient's Last Name</small></th>
							    <th scope="col"><small class="text-muted">Open Entity </small></th>
							    <th scope="col"><small class="text-muted">Find Orders </small></th>							    
						  	</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- #end Modal #EntityOperator -->

<!-- Button trigger modal -->
<?php include(PUBIC_PATH.'/admin/orders/modal/open-entity.php'); ?>
<?php include(PUBIC_PATH.'/admin/orders/modal/edit-order.php'); ?>
<?php include(PUBIC_PATH.'/admin/orders/modal/find_orders.php'); ?>
<!-- #end Button trigger modal -->

<?php include(SHARED_PATH.'/admin_javascript.php'); ?>

<script>


	function output_entity_table(object){
	 		
	 		console.log("entity", object);

		var output = "";

		if(object==true){

			var output = "";
			output += "<tr>";
			output += "<td colspan='12'> <br> <p class='text-center'> <i class='fas fa-spinner fa-spin text-info fa-3x'></i> </td>";
			output += "</tr>";
			$('#entitySearchTable > tbody:last-child').html(output);

		} else {

			for(let i=0; i<object.length; i++){
		 		output += "<tr>";
		 		output += "<td><small class='text-muted'>"+ object[i].ent_first_name + "</small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].ent_last_name + "</small></td>";
		 		output += "<td><small class='text-muted'> Not Available </small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].ent_store_name + "</small></td>";
		 		output += "<td><small class='text-muted'> to-do </small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].ent_email + "</small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].ent_home + "</small></td>";
		 		output += "<td><small class='text-muted'> Not Available </small></td>";
		 		output += "<td><small class='text-muted'> Not Available </small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].recipient_fist_name + "</small></td>";
		 		output += "<td><small class='text-muted'>"+ object[i].recipient_last_name + "</small></td>";
		 		output += "<td>";
				output += "<button type='button' class='openEntityButton btn btn-sm btn-info'";
				output += "data-ent-order-id='"+object[i].ent_order_id+"' data-ent-activity-entity-status='"+ object[i].ent_activity_entity_status +"' "; 
				output += "data-ent-customer-id='"+object[i].ent_customer_id+"'"; 
				output += "data-ent-abn='"+ object[i].ent_abn +"' data-ent-person-title='"+object[i].ent_person_title+"' "; 
				output += "data-ent-billing-email-2='"+object[i].ent_billing_email_2+"' data-ent-billing-website='"+object[i].ent_billing_website+"' ";
				output += "data-ent-billing-work-phone='"+object[i].ent_billing_work_phone+"' ";
				output += "data-ent-billing-fax-phone='"+object[i].ent_billing_fax_phone+"' ";
				output += "data-ent-billing-mobile-phone='"+object[i].ent_billing_mobile_phone+"' ";
				output += "data-ent-nickname='"+object[i].ent_nickname+"' data-ent-dob='"+object[i].ent_dob+"' ";
				output += "data-ent-billing-fb='"+object[i].ent_billing_fb+"' data-ent-billing-wechat='"+object[i].ent_billing_wechat+"' ";	
				output += "data-ent-billing-whatsapp='"+object[i].ent_billing_whatsapp+"' data-ent-billing-skype='"+object[i].ent_billing_skype+"' ";	
				output += "data-ent-billing-viber='"+object[i].ent_billing_viber+"' ";	
				output += "data-ent-shp-fb='"+object[i].ent_shp_fb+"' data-ent-shp-wechat='"+object[i].ent_shp_wechat+"' ";	
				output += "data-ent-shp-whatsapp='"+object[i].ent_shp_whatsapp+"' data-ent-shp-skype='"+object[i].ent_shp_skype+"' ";	
				output += "data-ent-shp-viber='"+object[i].ent_shp_viber+"' ";
				output += "data-ent-first-name='"+ object[i].ent_first_name +"' data-ent-last-name='"+object[i].ent_last_name+"' ";
				output += "data-ent-country-billing='"+object[i].ent_billing_country+"' data-ent-country-state='"+object[i].ent_billing_state+"' data-ent-email='"+object[i].ent_email+"' ";
				output += "data-ent-suburb='"+ object[i].ent_city +"' data-ent-store-name-id='"+ object[i].ent_store_name_id +"'";
				output += "data-ent-store-id='"+ object[i].ent_store_id +"' ";
				output += "data-ent-store-names='"+ object[i].ent_store_name +"' "; 
				output += "data-ent-recipient-first-name='"+ object[i].recipient_fist_name +"' data-ent-recipient-last-name='"+object[i].recipient_last_name+"' ";  
				output += "data-ent-phone-home='"+ object[i].ent_home +"' data-ent-billing-address-2='"+ object[i].ent_billing_address_2 +"' ";  
				output += "data-ent-billing-address-1='"+ object[i].ent_billing_address_1 +"' ";  
				output += "data-ent-billing-address-3='"+object[i].billing_address_3+"' data-ent-billing-store-type='"+ object[i].ent_store_type +"'  data-ent-billing-merchant-name='"+object[i].ent_billing_merchant_name+"' ";
				output += "data-ent-billing-store-latitude='"+object[i].ent_billing_store_latitude+"' data-ent-billing-store-longitude='"+object[i].ent_billing_store_longitude+"' ";	
				output += "data-ent-billing-store-bsb='"+object[i].ent_billing_store_bsb+"' data-ent-billing-store-bank-account-name='"+object[i].ent_billing_store_bank_account_name+"' ";
				output += "data-ent-billing-store-swift-c='"+object[i].ent_billing_store_swift_c+"' data-ent-billing-store-bank-name='"+object[i].ent_billing_store_bank_name+"' ";
				output += "data-ent-billing-store-bank-address='"+object[i].ent_billing_store_bank_address+"' "; 
					output += "data-toggle='modal'"; 
					output += "data-target='#openEntity'>";
					output += "Open Entity";
				output += "<i class='fas fa-external-link-alt'></i>";
				output += "</button>";
		 		output += "</td>";
		 		output += "<td>";
		 		output += "<button type='button' id='findOrdersClickButton' data-customer-id='"+object[i].ent_customer_id+"' class='btn btn-sm btn-info'";
		 		output += "data-toggle='modal' data-target='#findOrdersModal'>";
  				output += "Find Orders"
				output += "</button>";
		 		output += "</td>";
		 		output += "</tr>";
		 	}

		}

	 	$('#entitySearchTable > tbody:last-child').html(output);
	 }

	function output_entity_no_reasult()
	{
		var output = "";
		output += "<tr>";
		output += "<td colspan='12' style='text-align:center;line-height:30px'> <p> <small class='text-muted'> Oops! no data found <br> <i class='far fa-sad-tear text-danger fa-3x'></i> </small></p></td>";
		output += "</tr>";

		$('#entitySearchTable > tbody:last-child').html(output);
	}

	// dataType : "json",

</script>
<?php 
	$script = '
		<script>
			/*
			* Handled by $_POST
			*/
			function get_search_entity(formData)
			{
				object = true;
				$("#loader_spinner").show();
				output_entity_table(object);
				$.ajax({
					dataType : "json",
					url: "'. $url_entity_search .'",
					method: "post",
					data: formData
				})
				.done(function(object){
					
					$("#loader_spinner").hide();
					if(object){
					 	output_entity_table(object);
					}else{
						output_entity_no_reasult();
					}
				})
				.fail(function() {
					console.error("REST error. Nothing returned for AJAX.");
				})
			}

			function update_entity_status(formData)
			{
				$.ajax({
					url: "'. $url_open_entity .'",
					method: "post",
					data: formData
				})
				.done(function(object){
					console.log(object);
					if(object){
						var success = "success";
					}
				})
				.fail(function() {
					console.error("REST error. Nothing returned for AJAX.");
				})
			}

		</script>
	';
	html($script);
?>
<script>
	
	$( document ).ready(function() {
		/**
		* load default
		*
		*/
		js_mod_init();



		/**
		* load spinner every ajax request
		*
		*/ 
	    $('#loader_spinner').bind('get_search_entity', function(){
		    $(this).show();
		}).bind('ajaxStop', function(){
		    $(this).hide();
		});

		 var longDateFormat  = 'dd/MM/yyyy HH:mm:ss';
	
	});

	/** Entity Status Options **/		
	$(document).on('change', '#extEntityStatus', function(){

		if( this.value === "A" ){

			$("#tempInActive").hide();
			$("#permanentInactive").hide();
			$("#scheduleInactive").hide();

		}else if( this.value === "T"){

			$("#tempInActive").show();
			/*
			* Hide not included
			*/
			$("#permanentInactive").hide();
			$("#scheduleInactive").hide();

		}else if(this.value === "P"){

			$("#permanentInactive").show();
			/*
			* Hide not included
			*/
			$("#tempInActive").hide();
			$("#scheduleInactive").hide();

		}else if( this.value === "S" ){

			$("#scheduleInactive").show();
			/*
			* Hide not included
			*/
			$("#tempInActive").hide();
			$("#permanentInactive").hide();
			
				$("#tempInactiveCalendardefault").val('');
				$("#tempInactiveCalendarDefaultOneWeek").val('');
				$("#tempInactiveCalendarDefaultTwoWeek").val('');
				$("#tempInactiveCalendarDefaultOneMonth").val('');

					$("#scheduleInactiveStartDateOneWeek").val('');
					$("#scheduleInactiveEndDateDefaultOneWeek").val('');
					$("#scheduleInactiveStartDateTwoWeek").val('');
					$("#scheduleInactiveEndDateDefaultTwoWeek").val('');
					$("#scheduleInactiveStartDateoneMonth").val('');
					$("#scheduleInactiveEndDateDefaultOneMonth").val('');
		}	

	});

	/**
	* reset table and form fields after modal close
	*
	*/ 
	$(document).on('click', '.close_entity', function(){
		$("form#entityForm")[0].reset();
		$("#entitySearchTable > tbody:last-child").empty();
	});

	function generateJSON(entityForm){
		get_search_entity(entityForm);
	}

	/** Search Data **/		
	$(document).on('click', '#entitySearchButton', function(event){
		event.preventDefault();
		var entityForm = $("form#entityForm").serializeArray();
		generateJSON(entityForm);
	});

</script>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>

	