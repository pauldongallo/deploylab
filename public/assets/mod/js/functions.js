const ONE_WEEK = 7;
const TWO_WEEKS = 14;
const ONE_MONTH = 30;

var notes_title 		 		= "";
var entity_description		  	= "";
var scheduleInactiveStartDate 	= "";
var scheduleInactiveStartEnd 	= "";
var sIsStartDate 				= "";
var sIsEndDate					= "";
var entityTitleLabel           	= "";
var json_object					= "";
var entityStatusLastUpdated		= "";
var entityStatusLastUpdatedTime = "";

// Barry

	console.log( "tesing", loadTomorrowDateMDYFormat() );

/*
* Load Tomorrow Date
*
*/
function loadTomorrowDateMDYFormat(){

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + 1);
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate =  mm + '/' + dd + '/' + y;

	return formattedDate;
}

/*
* Load Tomorrow Date Day Month Year Format
*
*/
function loadTomorrowDateDMYFormat(){

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + 1);
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate = dd + '/' + mm + '/' + y;

	return formattedDate;
}


/*
* Load Tomorrow Date based on "parameter"
*
*/
function targetDateDMYFormat(parameter){

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + parameter );
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate = dd + '/' + mm + '/' + y;

	return formattedDate;
}

function targetDateMDYFormat(parameter){

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + parameter );
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate = mm + '/' + dd + '/' + y;

	return formattedDate;
}

function resetDateTime(date){

	if(date){
		var today = new Date(date);
		var dd = today.getDate();

		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear();

		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

		if(dd<10) 
		{
		    dd='0'+dd;
		} 

		if(mm<10) 
		{
		    mm='0'+mm;
		} 

		today = mm+'/'+dd+'/'+yyyy+" "+time;
	}else{
		today = "";
	}

	return today;
}


function formatDate2(date) {
  var d = new Date(date);
  var hh = d.getHours();
  var m = d.getMinutes();
  var s = d.getSeconds();
  var dd = "AM";
  var h = hh;
  if (h >= 12) {
    h = hh - 12;
    dd = "PM";
  }
  if (h == 0) {
    h = 12;
  }
  m = m < 10 ? "0" + m : m;

  s = s < 10 ? "0" + s : s;

  /* if you want 2 digit hours:
  h = h<10?"0"+h:h; */

  var pattern = new RegExp("0?" + hh + ":" + m + ":" + s);

  var replacement = h + ":" + m;
  /* if you want to add seconds
  replacement += ":"+s;  */
  replacement += " " + dd;

  return date.replace(pattern, replacement);
}

function myDateFormatter (date) {
        var d = new Date(date);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = month + "/" + day + "/" + year;

        return date;
    };

function js_mod_init(){

	console.log("initiate");
	$("#tempInActive").hide();
	$("#permanentInactive").hide();
	$("#scheduleInactive").hide();

	/**
	* Australian Date Foramt
	*
	*/ 
	$('#tempInactiveCalendardefault').datetimepicker({
	    format: "DD/MM/YYYY",
	    defaultDate: loadTomorrowDateMDYFormat(),
	    autoclose: true
	});

	$('#scheduleInactiveStartDateDefault').datetimepicker({
	    format: "DD/MM/YYYY",
	    defaultDate: loadTomorrowDateMDYFormat(),
	    autoclose: true
	});	

	$('#scheduleInactiveEndDateDefault').datetimepicker({
	   	format: "DD/MM/YYYY",
	   	defaultDate: loadTomorrowDateMDYFormat(),
	   	autoclose: true
	});	

	/**
	* Hide Temporary Inactive Calendar - Entity Status
	*
	*/ 
	$('#tempInactiveCalendarDefaultContainer').show();
	$("#tempInactiveCalendarOneWeekContainer").hide();
	$("#tempInactiveCalendartwoWeekContainer").hide();
	$("#tempInactiveCalendarOneMonthContainer").hide();

	/**
	* Hide Schedule Inactive Calendar - Entity Status
	*
	*/ 
	$("#sIOneWeekContainer").hide();
	$("#sITwoWeekContainer").hide();
	$("#sIOneMonthContainer").hide();
}


/*
* Edit select
*
*/
function person_title_edit(entPersonTitle){
	/**
	 * get the value from the button
	 * integer version
	 */
	// $(document).on('click', '.openEntityButton', function(){
	// 	var person_title =  $(this).data("ent-person-title");
	// 	person_title_edit(person_title);
	// });
	// resource : 
	$('#extTitle option:eq("'+entPersonTitle+'")').prop('selected', true);
}

function store_type_edit(store_type){
	/**
	 * get the value from the button
	 * text version
	 */
	$('#extStoreType option').filter(function() { 
	    return ($(this).text() == store_type ); //To select Blue
	}).prop('selected', true);
}


/*
* After Load Country initiate state
*
*/
function buildState(object, countrySate){
	// console.log("checking");
	var JSONObject = JSON.parse(object);
	for(key in JSONObject.states){
		if(JSONObject.states.hasOwnProperty(key)){
			var code = JSONObject.states[key].code;
			var name = JSONObject.states[key].name;
			if(code == countrySate ){
				var option = 'selected="selected"';
				$(".stateBase").append('<option value="'+code+'" '+option+'> '+name+' </option>');
			} else {
				$(".stateBase").append('<option value="'+code+'"> '+name+' </option>');
			}
		}
	}
}
function getLoadState(countryBilling, countrySate){
	// var groundReceiverCountry = $("#ground_receiver_country").val();
	$.ajax({
		type: "POST",
		url: "../../../private/class/country.php",
		data: {'selectData': countryBilling },
    	success:  function(object){
    		buildState(object, countrySate)			
    	}
	});
}


/*
* Load Country on edit page
*
*/
// function buildCountry(object, countryBilling){

// 	$.each(object, function(key, value){
// 		var code = value.code;
// 		var name = value.name;
// 		if(code == countryBilling ){ // from the hidden value of the current country
// 			var option = 'selected="selected"';
// 			$(".countryBase").append('<option value="'+code+'" '+option+'> '+name+' </option>');
// 		} else {
// 			$(".countryBase").append('<option value="'+code+'"> '+name+' </option>');
// 		}	
// 	});
// }

// function getCountry(){

// 	$.ajax({
// 		// type:'POST',
// 		dataType : 'json',
// 		url 	 : '../../../private/class/countries.php'
// 	})
// 	.done(function(object){
// 		/** open Entity Table **/
// 		$(document).on('click', '.openEntityButton', function(){

// 			var countryBilling = $(this).data("ent-country-billing");
// 			buildCountry(object, countryBilling);

// 			var countrySate = $(this).data("ent-country-state");
// 			getLoadState(countryBilling, countrySate);

// 		});
// 	})
// 	.fail(function(){
// 		console.error("REST Error. Nothing return for ajax");
// 	})
// }
// getCountry();

function rassignAgentAfterDelete(){
	var agentIDs=[];
	var agentIDsSet=[];
	var current_link = this.value;
	var citrus_result = "";
	var arraySet = "";

	$(".deleteUser").each(function(index, value){
		if(current_link != this.value){
			agentIDs.push(this.value);
		}
	});
	for(i=0; i < agentIDs.length; i++){
		if(agentIDs[i]<current_link){
			agentIDsSet.push(agentIDs[i]);
		}
	}
	var getDecreaseOne = get_count(agentIDsSet) - 1;
	if(getDecreaseOne == -1){
		for(i=0; i < agentIDs.length; i++){
			if(agentIDs[i]>current_link){
				var agentIDsSet = agentIDs[0];
				// agentIDsSet.push(agentIDs[i]);
			}
		}
		arraySet = agentIDsSet;
	} else {
		arraySet = agentIDsSet[getDecreaseOne];
	}

	return arraySet;
}

function get_count(parameter){
	return parameter.length;
}

/*
* Time
*/
function formatAMPM(date) {
	  	var hours = date.getHours();
	  	var minutes = date.getMinutes();
	  	var ampm = hours >= 12 ? 'pm' : 'am';
	  	hours = hours % 12;
	  	hours = hours ? hours : 12; // the hour '0' should be '12'
	  	minutes = minutes < 10 ? '0'+minutes : minutes;
	  	var strTime = hours + ':' + minutes + ' ' + ampm;
	  	return strTime;
	}

function todayHours(){
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
	var today = mm + '-' + dd + '-' + yyyy;
	var hours = formatAMPM(new Date);
	var today_hours = today+" "+hours;
	return today_hours;
}
// console.log("today houers", todayHours() );

function todayHours24Hoursformat(){

	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	return time;

}

/*
* Date
*
*/
function currentDateAustraliaFormat(){

	var today = new Date();
	var dd = today.getDate();

	var mm = today.getMonth()+1; 
	var yyyy = today.getFullYear();

	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

	if(dd<10) 
	{
	    dd='0'+dd;
	} 

	if(mm<10) 
	{
	    mm='0'+mm;
	} 

	today = dd+'/'+mm+'/'+yyyy+" "+time;

	return today;
}


function currentDateAustraliaFormatParam(date){

	if(date){
		var today = new Date(date);
		var dd = today.getDate();

		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear();

		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

		if(dd<10) 
		{
		    dd='0'+dd;
		} 

		if(mm<10) 
		{
		    mm='0'+mm;
		} 

		today = dd+'/'+mm+'/'+yyyy+" "+time;
	}else{
		today = "";
	}

	return today;
}


function scheduleInactiveStartDate(){

	var date = new Date();
	var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));

	// $("#scheduleInactiveStartDate").datepicker({
	// 	format: 'mm/dd/yyyy',
	// 	startDate: '-3d',
	// 	setDate : tomorrow	
	// });

}

function scheduleInactiveEndDate(){

	var date = new Date();
	var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));

	// $("#scheduleInactiveEndDate").datepicker({
	// 	format: 'mm/dd/yyyy',
	// 	startDate: '-3d',
	// 	"setDate" : tomorrow		
	// });

}