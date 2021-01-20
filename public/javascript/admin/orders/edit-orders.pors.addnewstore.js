$(document).on("click", "#addNewStoreButton", function(event){

	event.preventDefault();

	findCountries();

});


/*
* Recieved the param from Delivery Country
*
*/ 
$(document).on("change", "#getAllCountry", function(){

	findCountry();

	findCountryState( $("#getAllCountry").val() );

});


/*
* Label: Address State
* On change select
*/ 
$(document).on("change", "#addNewStorecountryState", function(){

	countryCode = $("#addNewStoreAddressCountry").val();
	
	stateName = $('option:selected',this).data("state-name");

	findCountryStatePostalREST(countryCode, stateName);

});

function findCountryStatePostal(object){

	// var o = new Option("option text", "");
	// $(o).html("---select---");
	// $(".addressSuburb").append(o);

	$.each(object, function(key, value){
		var post_name = value.post_name;
		var postal_code = value.postal_code;
		$(".addressSuburb").append('<option value="'+post_name+'" data-province="'+postal_code+'" >'+post_name+" ("+postal_code+")"+'</option>');
	});
}

/*
* Address Country State
* source: wc-rest.js
*/ 
function addNewStoreCountrySate(object){

	var countryStates = object.states;

	$.each(countryStates, function(key, value){
		var code = value.code;
		var name = value.name;
		if( code == countryCode  ){
			option = 'selected="selected"';
			$("#addNewStorecountryState").append('<option value="'+code+'" data-state-name="'+name+'" '+option+' > '+name+' </option>');
		}else{
			
			$("#addNewStorecountryState").append('<option value="'+code+'" data-state-name="'+name+'" data-pass-to-state="'+code+'" > '+name+' </option>');
		}
	});

}


/*
* On adding store, it will create automatic account
*
*/ 
$(document).on("click", "#submitNewStoreButton", function(event){

	event.preventDefault();
	generateJSONAddStore();
	countRegisteredUser(); 
});

	function generateJSONAddStore(){

		count = $("#countRegisteredUser").val();

		addCount = count+1;

		storeNameTrim = textSmallCaps( removeSpacing( $('#storeName').val() ) );
		storeNameTrimWithID = storeNameTrim+addCount;

		tempPassword = randomTextGenerator(5);
		tempPasswordWithID = tempPassword+addCount;

		ownerFirstName = $('#ownerFirstName').val(),
		ownerLastName = $('#ownerLastName').val(),
		fullname = ownerFirstName+" "+ownerFirstName;

		let registerUser = {
			"username" 		: storeNameTrimWithID,
			"first_name" 	: ownerFirstName,
			"last_name" 	: ownerLastName,
			"name"			: fullname,
	    	"email" 		: $('#storeEmail').val(),
	    	"password" 		: tempPasswordWithID,
	    	"roles" 		: "customer"
		}		

		createWPUser(registerUser);
	}

	function generaterecenCustomerJSON(id){

		ownerFirstName 				= $('#ownerFirstName').val();
		ownerLastName 				= $('#ownerLastName').val();
		storeName 					= $('#storeName').val();
		addressLine1 				= $('#addressLine1').val();
		addressLine2    			= $('#addressLine2').val();
		addressLine3 				= $('#addressLine3').val();
		townCity	 				= $('#townCity').val();
		addNewStorecountryState 	= $('#addNewStorecountryState').val();
		addressSuburb 				= $('#addressSuburb').val();
		postalCode 					= $('select.addressSuburb').find(':selected').data('province');
		addNewStoreAddressCountry 	= $('#addNewStoreAddressCountry').val();		
		storeEmail 					= $('#storeEmail').val();
		storeMobile					= $('#storeMobile').val();
		storePhone 					= $('#storePhone').val();	
		storeFax 					= $('#storeFax').val();

		let formData = {
			"owner_first_name" 			: ownerFirstName,
			"owner_last_name" 			: ownerLastName,
			"store_name" 				: storeName,	
			"address_line_1" 			: addressLine1,
			"address_line_2" 			: addressLine2,
			"address_line_3" 			: addressLine3,
			"city" 						: townCity,
			"owner_store_country_state" : addNewStorecountryState,
			"address_suburb" 			: addressSuburb,
			"postal_code"				: postalCode,
			"owner_store_country" 		: addNewStoreAddressCountry,
			"store_email" 				: storeEmail,
			"owner_store_phone" 		: storePhone,
			"owner_store_mobile" 		: storeMobile,
			"owner_store_fax" 			: storeFax,
			"pass_key"					: tempPasswordWithID, 
		}		
		console.log("checking data",formData)
		updateRegisteredWOOCustomer(id, formData);
	}


		function generateSuccessRegisteredUser(object){

		
      for(let i=0; i<object.meta_data.length; i++){
        if( object.meta_data[i].key == '_billing_fax_phone' ){
           billing_fax_phone = object.meta_data[i].value
        }
      }

       for(let i=0; i<object.meta_data.length; i++){
        if( object.meta_data[i].key == '_billing_address_3' ){
           billing_address_3 = object.meta_data[i].value
        }
      }

       for(let i=0; i<object.meta_data.length; i++){
        if( object.meta_data[i].key == '_billing_mobile_phone' ){
           billing_mobile_phone = object.meta_data[i].value
	        }
	      }

      	for(let i=0; i<object.meta_data.length; i++){
        	if( object.meta_data[i].key == '_billing_suburb' ){
           		billing_suburb = object.meta_data[i].value
	     	}
      	}

		var registeredUser =
			'<tr>' +
	          	'<td class="small" scope="row">Store Name</td>' +
	          	'<td class="small">'+object.billing.company+'</td>' +
	        '</tr>' +
	        '<tr>' +
	        '<td class="small" scope="row">First Name</td>' +
	          '<td class="small">'+object.first_name+'</td>'+
	       '</tr>'+
	         '<tr>'+
	          '<td class="small" scope="row">Last Name</td>'+
	          '<td class="small" colspan="2">'+object.last_name+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row">email</td>'+
	          '<td class="small" colspan="2">'+object.billing.email+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row">email</td>'+
	          '<td class="small" colspan="2">'+billing_fax_phone+'</td>'+
	        '</tr>'+
	         '<tr>'+
	          '<td class="small" >Work Phone</td>'+
	          '<td class="small" colspan="2">'+billing_mobile_phone+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row"> Line 1 </td>'+
	          '<td class="small" colspan="2">'+object.billing.address_1+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row"> Line 2 </td>'+
	          '<td class="small" colspan="2">'+object.billing.address_2+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row"> Country </td>'+
	          '<td class="small" colspan="2">'+object.billing.country+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row"> Line 3 </td>'+
	          '<td class="small" colspan="2">'+billing_address_3+'</td>'+
	        '</tr>'+        
	        '<tr>'+
	          '<td class="small" scope="row"> State </td>'+
	          '<td class="small" colspan="2">'+object.billing.state+'</td>'+
	        '</tr>'+
	        '<tr>'+
	          '<td class="small" scope="row"> Suburb </td>'+
	          '<td class="small" colspan="2">'+billing_suburb+'</td>'+
	        '</tr>';

	  
	    $('#showRegisteredUser > tbody:last-child').html(registeredUser);
	
	}

	/*
	* Delivery Country
	* source: wc-rest.js
	*/ 
	function addNewStoreDeliverCountry(object){
		var o = new Option("option text", "");
		$(o).html("---select---");
		$("#getAllCountry").append(o)
		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			$("#getAllCountry").append('<option data-add-country-full-name="'+name+'" data-country-down-state="'+code+'" value="'+code+'"> '+name+' </option>');
		});
	}

	/*
	* Address Country
	* source: wc-rest.js
	*/ 
	function addNewStoreCountry(object, varAdNewStoreDeliverCountry){

		countryCode = varAdNewStoreDeliverCountry;

		$.each(object, function(key, value){
			var code = value.code;
			var name = value.name;
			if( code == countryCode  ){
				option = 'selected="selected"';
				$("#addNewStoreAddressCountry").append('<option value="'+code+'" '+option+' > '+name+' </option>');
			}else{
				
				$("#addNewStoreAddressCountry").append('<option value="'+code+'" data-pass-to-state="'+code+'" > '+name+' </option>');
			}
		});

	}

	


