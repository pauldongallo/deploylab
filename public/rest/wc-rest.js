/**
 * Script for Customers
 *
 * 
 */

function findCustomerByID(type, customer_id){

	//  var  result = null;

	// $(".response_success").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');
	// $.ajax({
	// 	dataType: 'json',
	// 	type: "POST",
	// 	url : '../../service/admin/customer/customer.php?id='+customer_id,
	// 	contentType: 'application/json',
	// 	async: false,
	// 	 success: function(data){
 //            return result = data;
 //        }
	// });

	// return result;

	// .done(function(object){
	// 	if(object){
	// 		if(type=="customerSupplier"){
	// 			findSupplierNearestRecipientLocation(object);
	// 		}

	// 	}
	// })
	// .fail(function(){
	// 	console.error("REST Error. Nothing return for ajax");
	// });
}


function findOrdersByID($order_id){

	$.ajax({
		dataType: 'json', 
		type: "POST",
		url : '../../service/admin/order/orders.php?order_id='+order_id
	})
	.done(function(object){
		// console.log(object);
		/** open Entity Table **/
		if(object){
			return object;
		}
		return null;
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	});

}


/*
* Rest for registering users or customers(working)
*
*/
function createWPUser(formData){
	
	$.ajax({
		url: RESTROOT + '/wp/v2/users',
		method: 'POST',
			beforeSend: function(xhr) {
				xhr.setRequestHeader( 'Authorization', 'Bearer ' + sessionStorage.getItem('newToken') );
			},
		data: formData
	})
	.done(function(response ){
		if(response){
			// console.log( response );
			user_id = response.id;
			generaterecenCustomerJSON(user_id);
			let meta = {
				"meta" : {
					"is_supplier": "1"
				}
			}
			updateUserMeta(user_id, meta);
		}
	})
	.fail(function(response){
		console.error("REST error.");
	});

}

/*
* Update users meta (working)
* Todo : to be updated
*/
function updateUserMeta(id, formData){

	//console.log("Update User Meta");

	//console.log("id", id);

	//console.log("sdfsdf", formData);

	$.ajax({
		url: RESTROOT + '/wp/v2/users/'+id,
		method: 'PUT',
			beforeSend: function(xhr) {
				xhr.setRequestHeader( 'Authorization', 'Bearer ' + sessionStorage.getItem('newToken') );
			},
		data: formData
	})
	.done(function(response, recentCustomer ){
		if(response){
			console.log("success", response);
		}
	})
	.fail(function(response){
		console.error("REST error.");
	});

}

/*
* Rest for updating recent customer (working)
*
*/
function updateRegisteredWOOCustomer(id, formData){
	
	$(".dataLoading").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({
		dataType: 'json',
		type: "POST",
		url : '../../service/admin/customer/update-customer.php?id='+id,
		data : formData
	})
	.done(function(object){
		// console.log("update registered customer", object );
		generateSuccessRegisteredUser(object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
	.always(function() {
   	 	$('.loader').remove();
   	 	$(".registeredUser").show();
  	})
}

/*
* Rest for country (working)
*
*/
function findCountries(){ //

	$.ajax({
		dataType: 'json',
		type: "POST",
		url : '../../service/country/countries.php'
	})
	.done(function(object){
		if(object){
			addNewStoreDeliverCountry(object);
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})

}

/*
* Rest for parameter scountry (working)
*
*/
function findCountry(){

	$(".address-country").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({
		dataType: 'json',
		type: "POST",
		url : '../../service/country/countries.php'
	})
	.done(function(object){
		if(object){
			varAdNewStoreDeliverCountry = $( "#getAllCountry" ).val();
			addNewStoreCountry(object, varAdNewStoreDeliverCountry );
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
	.always(function() {
   	 	$('.loader').remove();
  	});

}

/*
* Rest for parameter country states (working)
*
*/
function findCountryState( addNewStoreAddressCountry ){

	$(".address-state").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({	
		dataType: 'json',
		type: "POST",
		url : '../../service/country/country-states.php',
		data: {'selectData': addNewStoreAddressCountry },	
	})
	.done(function(object){
		if(object){
			addNewStoreCountrySate(object);
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})

	.always(function() {
   	 	$('.loader').remove();
  	})
}

function findCountryStatePostalREST(countryCode, stateName){

	$(".postal_loading").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({
		dataType: 'json',
		type: "GET",
		url : '../../service/geonames/geocountry.php?country_code='+countryCode+"&state_name="+stateName,
	})
	.done(function(object){
		if(object){
			findCountryStatePostal(object);
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})

	.always(function() {
   	 	$('.loader').remove();
  	})
}

function findCountryStateSubsPlacesRest(countryCode, stateName){

	// $(".postal_loading").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');
	// findCountryStateSubsPlacesRest(recipientCountryCode, recipientStateName, recipientStateSubs, recipientPostal);

	$.ajax({
		dataType: 'json',
		type: "GET",
		url : '../../service/geonames/geocountry.php?country_code='+countryCode+"&state_name="+stateName
	})
	.done(function(object){

		console.log("coordinates", object);

		if(object){
			findCountryStateSubsPlaces(object);
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})

	.always(function() {
   	 	$('.loader').remove();
  	})
}


function findCountryWithStateName(recipientCountryCode, recipientStateCode, recipientStateName){

	$(".postal_loading").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({
		dataType: 'json',
		type: "GET",
		url : '../../service/geonames/geocountry.php?country='+recipientCountryCode+"&state="+recipientStateName,
		success: function(response){
			countryStatesSubsPlancesArryObj = response;
			recipientCountryWithStatesSubplace(countryStatesSubsPlancesArryObj, recipientCountryCode, recipientStateCode, recipientStateName);
		}
	})
	// .done(function(object){
	// 	if(object){
	// 		console.log(object);
	// 		// findCountryStatePostal(object);
	// 	}
	// })
	// .fail(function(){
	// 	console.error("REST Error. Nothing return for ajax");
	// })

	// .always(function() {
 //   	 	$('.loader').remove();
 //  	})
}

// findCountryStateSubsPlacesRest(recipientCountryCode, recipientStateName, recipientStateSubs, recipientPostal);

function findCustomerIsSupplier(recipientCountryCode, recipientStateCode, recipientStateName, recipientStateSubs, recipientPostalCode, count_data){

	console.log( recipientCountryCode );

	console.log( recipientStateCode );

	console.log( recipientStateName );

	console.log( recipientStateSubs );

	console.log( recipientPostalCode );

	console.log( count_data );

	$(".postal_loading").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

	$.ajax({
		dataType: 'json',
		type: "GET",
		url : '../../service/admin/customer/find-store-nearest-recipient-location.php?country_code='+recipientCountryCode+"&state_code="+recipientStateCode+"&state_name="+recipientStateName+"&suburb="+recipientStateSubs+"&postal_code="+recipientPostalCode+"&count_data="+count_data,
	})
	.done(function(object){
		if(object){
			console.log(" findCustomerIsSupplier ", object);
			generateSupplierNearestRecipientLocation(object);
		}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})

	.always(function() {
   	 	$('.loader').remove();
  	})

	// recipientCountry, stateName, recipientState
	// console.log("recipientCountry findCustomerIsSupplier", recipientCountry );
	// $.ajax({	
	// 	dataType: 'json',
	// 	type: "GET",
	// 	url : USER_BY_ROLE_ROUTE+'&per_page='+total_count,
	// 	beforeSend: function(xhr, settings) { 
	// 		xhr.setRequestHeader('Authorization','Bearer ' + token); 
	// 	},
	// 	'success': function(object) {
	// 		console.log("checking", object);
	//            generateCustomerSupplier(object, recipientCountry, recipientState, recipientPostal);
	//        }
	// })
	// .fail(function(){
	// 	console.error("REST Error. Nothing return for ajax");
	// })

	// .always(function() {
	//   	 	$('.loader').remove();
	//  	})
 
}




// function getsuggestedStoreNearRecipeint(){

// 	$(".response_success").append('<div class="loader fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>');

// 	console.log("retrieve users");

// 	$.ajax({	
// 		dataType: 'json',
// 		type: "POST",
// 		url : '../../service/admin/customer/supplier.php'
// 	})
// 	.done(function(object){
// 		// console.log(object);
// 		if(object){
// 			generateSugestedStoreList(object);
// 		}
// 	})
// 	.fail(function(){
// 		console.error("REST Error. Nothing return for ajax");
// 	})

// 	.always(function() {
//    	 	$('.loader').remove();
//   	})
// }

/*
* Count Orders
*
*/
function countOrders(){

	$.ajax({	
		dataType: 'json',
		type: "POST", 
		url : '../../service/admin/customer/count-orders.php',
	})
	.done(function(count){
		console.log( "load  ", count);
		appendCountOrders(count);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	});

}

function appendCountOrders(count){

	console.log("append here", count );

	$('body').attr('data-orders-count', count );

}

/*
* Rest data counts (working)
*
*/
function countRegisteredUser(){

	$.ajax({	
		dataType: 'json',
		type: "POST", 
		url : '../../service/admin/customer/count-customer.php',
	})
	.done(function(object){
		console.log( "load  ", object );
		appendCountRegisteredCustomer(object);
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	});

}



function appendCountRegisteredCustomer(appendCountRegisteredCustomer){
		
	console.log("append here", appendCountRegisteredCustomer );

	$("#countRegisteredUser").val(appendCountRegisteredCustomer);

	// $("#countRegisteredUser").val(appendCountRegisteredCustomer);

	$('body').attr('data-customer-count', appendCountRegisteredCustomer );

}