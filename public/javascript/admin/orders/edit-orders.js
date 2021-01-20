$(document).on("click","#orderEditButton", function(){

	customerCount = $("body").data( "customer-count" ); // 52
	totalCount = customerCount;

	orderID = $(this).data('order-id');

	$(".orderID").html( orderID );

	recipientCountryCode = $(this).data('recipient-country');
	recipientStateCode = $(this).data('recipient-state');
	recipientStateName = $(this).data('recipient-state-name');
	recipientStateSubs = $(this).data('recipient-state-subs');
	recipientPostalCode = $(this).data('recipient-postal');

	// $_GET['country'] = "AU";
	// $_GET['state'] = "Victoria";
	// $_GET['suburb'] = "Melbourne";
	// $_GET['postal_code'] = "3002";

	getCountryMS( recipientCountryCode );
	getCountryStateMS( recipientCountryCode, recipientStateCode );

	findCountryStateSubsPlacesRest(recipientCountryCode, recipientStateName);

	$("input[name=recipientCountryCode]").val(recipientCountryCode);
	$("input[name=recipientStateWithName]").val(recipientStateName);
	$("input[name=recipientPostal]").val(recipientPostalCode);
	$("input[name=recipientStateSubsPlace]").val(recipientStateSubs);

	/*
	* Required parameters
	* 
	* $country_code = "AU";
	* $state_code = "VIC";
	* $state_name = "Victoria";
    * $count_data = "99";
	* 
	*/
	// $country_code, $state_code, $state_name, $count_data

	// $_REQUEST['rec_country_code']=; recipientCountryCode
	// $_REQUEST['rec_state_code']; recipientStateCode
	// $_REQUEST['rec_state_name']; recipientStateName
	// $_REQUEST_['rec_suburb'];    recipientStateSubs
	// $_REQUEST['rec_postalcode']; recipientPostal
	// $_REQUEST['rec_count_data']; totalCount

	findCustomerIsSupplier(recipientCountryCode, recipientStateCode, recipientStateName, recipientStateSubs, recipientPostalCode, totalCount);

});
	
	function generateSupplierNearestRecipientLocation(object){

		var output = "";
		for(let i=0; i < object.length; i++){
			var storeName 	= object[i].store_name;
			var postCode 	= object[i].postal_code;
			var suburb 	= object[i].suburb;
			var incatchment 	= object[i].incatchment;
			var distance 	= object[i].distance_recipients;
			var thirty_days 	= object[i].thirty_days;
			var total_orders 	= object[i].total_orders;

			console.log("testing", total_orders );

			output +="<tr>";
				output +="<td class='small align-middle' scope='col' >"+storeName+"</td>";	
				output +="<td class='small align-middle' scope='col' >"+postCode+"</td>";
				output +="<td class='small align-middle' scope='col' >"+suburb+"</td>";
				output +="<td class='small align-middle text-center''>"+incatchment+"</td>";
				output +="<td class='small align-middle text-center''>"+distance+"</td>";
				output +="<td class='small align-middle text-center'>"+thirty_days+"</td>";
				output +="<td class='small align-middle text-center'>"+total_orders+"</td>";
			output += "<tr>";

		}

		$('#manualSelectTable > tbody:last-child').html(output);

	}


