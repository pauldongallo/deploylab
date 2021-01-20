/*
* Load States From Country on Manual Select (working)
*
*/
function buildCountryStateMS(object, countryState){

	// console.log("buildCountryStateMS", object );

	console.log("buildCountryStateMS", countryState );

	var JSONObject = JSON.parse(object);
	for(key in JSONObject.states){
		if(JSONObject.states.hasOwnProperty(key)){
			var code = JSONObject.states[key].code;
			var name = JSONObject.states[key].name;
			if( code == countryState ){
				option = 'selected="selected"';
				$(".countryStateBaseMS").append('<option value="'+code+'" '+option+' > '+name+' </option>');	
			}else{
				$(".countryStateBaseMS").append('<option value="'+code+'"> '+name+' </option>');
			}

		}
	}

}

function getCountryStateMS(recipientCountry, recipientState ){

	$.ajax({
		type:'POST',
		url 	 : '/public/service/country/country-states.php',
		data: {'selectData': recipientCountry },
		success:  function(object){
    		buildCountryStateMS(object, recipientState)	
    	}
	});

}



/*
* Load Country on Manual Select (working)
*
*/
function buildCountryMS(object, recipientCountryCode){

	$.each(object, function(key, value){
		var code = value.code;
		var name = value.name;
		if( code == recipientCountryCode  ){
			option = 'selected="selected"';
			$(".countryBaseMS").append('<option value="'+code+'" '+option+' > '+name+' </option>');
		}else{
			$(".countryBaseMS").append('<option value="'+code+'" data-pass-to-state="'+code+'" > '+name+' </option>');
		}
	});

}
function getCountryMS( recipientCountry ){

	$.ajax({
		type:'POST',
		dataType : 'json',
		url 	 : '/public/service/country/countries.php',
		success:  function(object){   	
    		buildCountryMS(object, recipientCountry)			
    	}
	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}


function findCountryStateSubsPlaces(object){

	var recipientStateSubs = $("input[name=recipientStateSubsPlace]").val();

	var recipientPostal = $("input[name=recipientPostal]").val();

	$.each(object, function(key, value){

		var post_name = value.post_name;

		var postal_code = value.postal_code;

		if( post_name == recipientStateSubs && postal_code == recipientPostal ){

			option = 'selected="selected"';

			$("#manaulAddressSuburb").append('<option value="'+post_name+'" '+option+' data-province="'+postal_code+'" >'+post_name+" ("+postal_code+")"+'</option>');

		}else if( recipientStateSubs == post_name ){

			$("#manaulAddressSuburb").append('<option value="'+post_name+'" data-province="'+postal_code+'" >'+post_name+" ("+postal_code+")"+'</option>');
		}
		
	});
}


/** reset **/
$(document).on("click", ".manual_select", function(){
	// alert("cleaning");
	$("form#entityForm")[0].reset();

	$("#countryBaseMS").val('');
	$("#countryStateBaseMS").val('');

	$("#countryBaseMS option:selected").prop("selected", false);
	$("#countryStateBaseMS option:selected").prop("selected", false);

	$(this).data('recipient-country', "");
	$(this).data('recipient-state', "");

	// reset drop select
	$("#countryBaseMS").val( $("#countryBaseMS option:first").val() ).click();
	
	$("#countryStateBaseMS").val( $("#countryStateBaseMS option:first").val() ).click();

});

// $(".manual_select.close").on("click", function(){

// 	alert("reseting");

// 	$("#countryBaseMS option:selected").empty();

// 	$("#countryStateBaseMS option:selected").empty();

// 	$("#countryBaseMS option:selected").prop("selected", false);

// 	$("#countryStateBaseMS option:selected").prop("selected", false);

// });