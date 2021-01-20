function epochToHumanReadable(datemtime){
	dateObj = new Date(datemtime * 1000);
	var month = dateObj.getUTCMonth(); 
	var day = dateObj.getUTCDate();
	var year = dateObj.getUTCFullYear();
	var months = [ "January", "February", "March", "April", "May", "June", 
           "July", "August", "September", "October", "November", "December" ];
	var selectedMonthName = months[month];
	newdate = selectedMonthName + "-" + day + "-" + year;
	return newdate;
}

function findOrdersModal(object){

	console.log("teset", object );

	var output = "";

	for(let i=0; i<object.length; i++){

		var orderID 		= object[i].id;
		var state 			= object[i].shipping.state;
		var city 			= object[i].shipping.city;
		var meta_data		= object[i].meta_data;
		var status 			= object[i].status;
		var total 			= object[i].total;
		var dateCreated 	= object[i].date_created;
		// var deliveryDate 	= object[i].shipping.meta._orddd_lite_timestamp;

			for(let c=0; c<meta_data.length; c++){
				if(meta_data[c].key =='_orddd_lite_timestamp'){
					var delivery_date = meta_data[c].value;
					var epoch_delivery = epochToHumanReadable(delivery_date);
				}
			}

		output += "<tr>";
			output +="<td>"+ orderID +"</td>";	
			output +="<td>"+state+"-"+city+"</td>";
			output +="<td>"+ orderID +"</td>";
			output +="<td>"+ status +"</td>";
			output +="<td>"+ total +"</td>";
			output +="<td> </td>";
			output +="<td> </td>";
			output +="<td>"+ dateCreated +"</td>";
			output +="<td>"+ epoch_delivery +"</td>";	
		output += "<tr>";
	}

	
				
	$('#findOrdersTable > tbody:last-child').html(output);

}			 

function onClickgenerateJSONEOrdersWC(OrderID){

	console.log("checkckck", OrderID);

	let formData = {
		"customer_id": OrderID
	}

	$.ajax({
		dataType: 'json',
		url: siteDomain+"/public/service/admin/order/find_orders/find_orders.php?id="+OrderID,
		method: 'GET',
		data :formData
	})
	.done(function(object) {

		console.log("after table");

		if(object){
			findOrdersModal(object);
	  	}else{
	  		object="not found";
	  	}
	})
	.fail(function() {
		console.log("REST error. Nothing returned for AJAX.");
	});

}



$(document).on('click', '#findOrdersClickButton', function(){


	event.preventDefault();
	
	var customerID = $(this).data('customer-id');

	console.log("Order ID", customerID );

	onClickgenerateJSONEOrdersWC(customerID);
	
});