/*
* Load Country on edit page
*
*/
function buildCountryOption(object){

	$.each(object, function(key, value){
		var code = value.code;
		var name = value.name;
		$(".countryOptions").append('<option value="'+code+'" data-country="'+code+'" > '+name+' </option>');
	});
}

function countryOption(){
	$.ajax({
		dataType : 'json',
		// url 	 : '../../../country/countries.php'
		url 	 : 'http://mod.test/public/service/country/countries.php'
	})
	.done(function(object){
		/** open Entity Table **/
		// console.log( object );
		if(object){
			buildCountryOption(object);
		}

	})
	.fail(function(){
		console.error("REST Error. Nothing return for ajax");
	})
}
countryOption();

/*
* Submit form
* 
*/
$(document).on("change", ".countryOptions", function(){

	$("#countryOptionButton").click();

});


/*
* Load State from source country
*
*/
var countryState = $(".countryOptions").find(':selected').attr('data-country');

function buildStateOption(object, countrySate){
	var JSONObject = JSON.parse(object);
	for(key in JSONObject.states){
		if(JSONObject.states.hasOwnProperty(key)){
			var code = JSONObject.states[key].code;
			var name = JSONObject.states[key].name;
			$("#countryStateOption").append('<option value="'+code+'"> '+name+' </option>');
		}
	}
}

function buildStateOptionGenerateJSON(countrySate){

	$.ajax({
		type:'POST',
		url 	 : '/public/service/country/country-states.php',
		data: {'selectData': countrySate },
		success:  function(object){
    		buildStateOption(object, countrySate)			
    	}
	});

}

if(countryState){
	buildStateOptionGenerateJSON(countryState);
}


/*
* Option Sates
*
*/
$(document).on("change", "#countryStateOption", function(){

	$("#countryStatesOptionButton").click();

});