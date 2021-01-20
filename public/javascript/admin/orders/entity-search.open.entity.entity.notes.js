var content_text;
var initiateClickEvent;

function entityBoxModule(object){

	entityTitleLabel = object.title.rendered;

	console.log("entity status", entityTitleLabel);

	$(".entityStatusMessage").html('<span class="text-md-left badge badge-danger">'+entityTitleLabel+'</span>');

	var content_notes = object.meta.rendered_json_content;

	content_text = JSON.parse(content_notes);

	let entityStatusLastUpdated = content_text[0].date_created;

	let parsedUDN = moment(entityStatusLastUpdated, "DD/MM/YYYY HH:mm:ss");

	let entityStatusLastUpdatedTime = parsedUDN.format('DD/MM/YYYY hh:mm:ss a');
	
	$(".entityStatusLastUpdated").html('Last updated on '+entityStatusLastUpdatedTime);

	notes_content(object, content_text);

}
/*
* get notes base from order id and user id
*
*/
function read_notes(notesID){

	$("#loader_spinner").show();
	jso.ajax({
		dataType: 'json',
		url: NOTESROUTE+"/"+notesID,
		method: 'GET',
	})
	.done(function(object) {

		if(object){
			entityBoxModule(object);
	  	}else{
	  		object="not found";
	  	}

	})
	.fail(function() {
		console.log("REST error. Nothing returned for AJAX.");
	})

}

function update_notes(notesID, formData){

	jso.ajax({
		dataType: 'json',
		url: NOTESROUTE+"/"+notesID,
		method: 'POST',
		data: formData
	})
	.done(function(object) {
		console.log("update notes return data", object );
		// read notes here
	})
	.fail(function() {
		console.log("REST error. Nothing returned for AJAX.");
	})
}


/*
* get notes base from order id and user id !important
*
*/
function isOrderIDExists(orderID, formData){
	/*
	* Retrive notes_id via order_id
	*/
	console.log("isOrderIDExists", formData);

	$.ajax({
		dataType: 'json',
		url: '../../../private/json/read_notes_order_id.php?id='+orderID,
		method: 'GET',
		data: formData
	})
	.done(function(object){

		var json_file_php = object.notes.meta.rendered_json_content;

		var new_json_content = JSON.parse(json_file_php);	

		var posted_content = content_text; 
			
		var merge_content = new_json_content.concat(posted_content);

		var notesID = object.notes_id;

		var entity_status_title = ( $("#extEntityStatus option:selected").text() ) ? $("#extEntityStatus option:selected").text() :'';
		var entity_status_value = ( $("#extEntityStatus option:selected").val() ) ? $("#extEntityStatus option:selected").val() :'';

		var tempInActiveDesc = ( $(".tempInActive option:selected").text() ) ? $(".tempInActive option:selected").text() :'';

		var tempInactiveCalendardefault = ( $("#tempInactiveCalendardefault").val() ) ? $("#tempInactiveCalendardefault").val():'';
		var tempInactiveCalendarOneWeek = ( $("#tempInactiveCalendarOneWeek").val() ) ? $("#tempInactiveCalendarOneWeek").val():'';
		var tempInactiveCalendartwoWeek = ( $("#tempInactiveCalendartwoWeek") ) ? $("#tempInactiveCalendartwoWeek").val():'';
		var tempInactiveCalendarOneMonth = ( $("#tempInactiveCalendarOneMonth") ) ? $("#tempInactiveCalendarOneMonth").val():'';
		var tempInactiveCalendarText = ( $("#tempInactiveCalendar option:selected").text() ) ? $("#tempInactiveCalendar option:selected").text() :'';
		var permanentInActive = ( $(".permanentInActive option:selected").text() ) ? $(".permanentInActive option:selected").text() :'';
		
		var scheduleInactiveStartDateDefault = ($("#scheduleInactiveStartDateDefault").val() ) ? $("#scheduleInactiveStartDateDefault").val() :'';
		var scheduleInactiveEndDateDefault = ( $("#scheduleInactiveEndDateDefault").val() ) ? $("#scheduleInactiveEndDateDefault").val() :'';
		
		var scheduleInactiveStartDateOneWeek = ( $("#scheduleInactiveStartDateOneWeek").val() ) ? $("#scheduleInactiveStartDateOneWeek").val() : '';
		var scheduleInactiveEndDateOneWeek = ( $("#scheduleInactiveEndDateOneWeek").val() ) ? $("#scheduleInactiveEndDateOneWeek").val() : '';

		var scheduleInactiveStartDateTwoWeek = ( $("#scheduleInactiveStartDateTwoWeek").val() ) ? $("#scheduleInactiveStartDateTwoWeek").val() : '';
		var scheduleInactiveEndDateTwoWeek = ( $("#scheduleInactiveEndDateTwoWeek").val() ) ? $("#scheduleInactiveEndDateTwoWeek").val() : '';

		var scheduleInactiveStartDateOneMonth = ( $("#scheduleInactiveStartDateOneMonth").val() ) ? $("#scheduleInactiveStartDateOneMonth").val() : '';
		var scheduleInactiveEndDateOneMonth = ( $("#scheduleInactiveEndDateOneMonth").val() ) ? $("#scheduleInactiveEndDateOneMonth").val() : '';

		if(tempInactiveCalendardefault){
			tempInactiveCalendar = tempInactiveCalendardefault;
		} else if(tempInactiveCalendarOneWeek){
			tempInactiveCalendar = tempInactiveCalendarOneWeek;
		} else if(tempInactiveCalendartwoWeek){
			tempInactiveCalendar = tempInactiveCalendartwoWeek;
		} else if(tempInactiveCalendarOneMonth){
			tempInactiveCalendar = tempInactiveCalendarOneMonth;
		} else if( scheduleInactiveStartDateDefault && scheduleInactiveEndDateDefault){
			sIsStartDate = scheduleInactiveStartDateDefault;
			sIsEndDate = scheduleInactiveEndDateDefault;
		} else if(scheduleInactiveStartDateOneWeek && scheduleInactiveEndDateOneWeek ){
			sIsStartDate = scheduleInactiveStartDateOneWeek;
			sIsEndDate = scheduleInactiveEndDateOneWeek;
		} else if(scheduleInactiveStartDateTwoWeek && scheduleInactiveStartDateTwoWeek ){
			sIsStartDate = scheduleInactiveStartDateTwoWeek;
			sIsEndDate = scheduleInactiveStartDateTwoWeek;
		} else if(scheduleInactiveStartDateOneMonth && scheduleInactiveStartDateOneMonth ){
			sIsStartDate = scheduleInactiveStartDateOneMonth;
			sIsEndDate = scheduleInactiveStartDateOneMonth;
		}


		// naa jud diri ang updated sa Header Entity
		switch( entity_status_value ){
			case "A" :
				entityTtatusTitleHeader=entity_status_title;
				break;
			case "T":
				entityTtatusTitleHeader="Temporary Inactive. Florist will be Re-activated on "+tempInactiveCalendar;
				break;
			case "P":
				entityTtatusTitleHeader = entity_status_title;
				break;
			case "S":
				entityTtatusTitleHeader = "Schedule Inactive From "+sIsStartDate+" to "+sIsEndDate;
				break;
		}

		let formData = {
			"title":  entityTtatusTitleHeader,
			"meta": {
			    "rendered_json_content" : JSON.stringify(merge_content)
			},
		}

		console.log("update notes here", formData);

		update_notes(notesID, formData);

		setTimeout( function(){
		  	read_notes(notesID);
		}, 1000 );

	})
	.fail(function(){
		console.error("REST error. Nothing returned for AJAX.");
	});
}

function notes_content(object, content_text){

	var output = "";

	for(let i=0; i<content_text.length; i++){

		var user_id = content_text[i].user_id;
		var date_created = content_text[i].date_created;
		var username = content_text[i].username;
		var status_title = content_text[i].status_title;
		var text_content = content_text[i].text_content;
		var status_desc = content_text[i].status_desc;
		var schedule_inactive_description = content_text[i].schedule_inactive_description;

		output += "<tr>";
		output +="<th scope='row' class='text-dark'>"; 
		if(date_created){
			output +="<p class='m-2'>"+ date_created +"</p>";	
		}
		if(text_content){
			output +="<p class='m-2'>"+ text_content +"</p>";												
		}
		if(status_desc){
			output +="<p class='m-2'>"+ status_desc +"</p>";												
		}
		if(username){
			output +="<p class='badge badge-info m-2'>"+ username +"</p>";
		}
		if(schedule_inactive_description){
			output +="<p class='m-2'>"+ schedule_inactive_description +"</p>";												
		}
		output +="</th>";
		output += "</tr>";

	}
	$('#notesTable > tbody:last-child').html(output);
	$("#extEntityStatus").val( $("#extEntityStatus option:first").val() ).change();
	$("#operatorNotes").val('');
}


/*
* Store json data
* 
*/
function storeNotesOrderUser(data){
		
	$.ajax({
		dataType: 'json',
		url: '../../../private/json/store_notes_order_user.php',
		method: 'POST',
		data: data
	})
	.done(function(object) {
		console.log( object );
		if(object){
		    console.log("success store data");
		 }
	  	
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	})

}

/*
* Update entity status 
* 
*/
function updateEntityStatusOrderOnWC(formData){
	
	// check if order in notes is exist

	jso.ajax({
		dataType: 'json',
		url: RESTCREATENOTESROUTE,
		method: 'POST',
		data: formData
	})
	.done(function(object) {

		if(object){

	     	var notesID = object.id;
	     	var userID = $("#authUserID").val();
	     	var orderID = $("#extOrderID").val();

	     	let noteUserData = {
	     		"notes_id" : notesID,
				"order_id": $("#extOrderID").val(),
				"user_id" : $("#authUserID").val()
			};

			storeNotesOrderUser(noteUserData);
			getJSONOrdersLocal( $("#extOrderID").val() );
	  	}	

	  	console.log("saving", object );
	})
	.fail(function() {
		console.error("REST error. Nothing returned for AJAX.");
	});

}

function onClickgenerateJSONEStoringNotesWP(){
	/*
	* If Temp Selected 
	* tempInActive
	*
	*/
	var entity_status_title = ( $("#extEntityStatus option:selected").text() ) ? $("#extEntityStatus option:selected").text() :'';
	var entity_status_value = ( $("#extEntityStatus option:selected").val() ) ? $("#extEntityStatus option:selected").val() :'';

	var tempInActiveDesc = ( $(".tempInActive option:selected").text() ) ? $(".tempInActive option:selected").text() :'';

	var tempInactiveCalendardefault = ( $("#tempInactiveCalendardefault").val() ) ? $("#tempInactiveCalendardefault").val():'';
	var tempInactiveCalendarOneWeek = ( $("#tempInactiveCalendarOneWeek").val() ) ? $("#tempInactiveCalendarOneWeek").val():'';
	var tempInactiveCalendartwoWeek = ( $("#tempInactiveCalendartwoWeek") ) ? $("#tempInactiveCalendartwoWeek").val():'';
	var tempInactiveCalendarOneMonth = ( $("#tempInactiveCalendarOneMonth") ) ? $("#tempInactiveCalendarOneMonth").val():'';
	var tempInactiveCalendarText = ( $("#tempInactiveCalendar option:selected").text() ) ? $("#tempInactiveCalendar option:selected").text() :'';
	var permanentInActive = ( $(".permanentInActive option:selected").text() ) ? $(".permanentInActive option:selected").text() :'';
	
	var scheduleInactiveStartDateDefault = ($("#scheduleInactiveStartDateDefault").val() ) ? $("#scheduleInactiveStartDateDefault").val() :'';
	var scheduleInactiveEndDateDefault = ( $("#scheduleInactiveEndDateDefault").val() ) ? $("#scheduleInactiveEndDateDefault").val() :'';
	
	var scheduleInactiveStartDateOneWeek = ( $("#scheduleInactiveStartDateOneWeek").val() ) ? $("#scheduleInactiveStartDateOneWeek").val() : '';
	var scheduleInactiveEndDateOneWeek = ( $("#scheduleInactiveEndDateOneWeek").val() ) ? $("#scheduleInactiveEndDateOneWeek").val() : '';

	var scheduleInactiveStartDateTwoWeek = ( $("#scheduleInactiveStartDateTwoWeek").val() ) ? $("#scheduleInactiveStartDateTwoWeek").val() : '';
	var scheduleInactiveEndDateTwoWeek = ( $("#scheduleInactiveEndDateTwoWeek").val() ) ? $("#scheduleInactiveEndDateTwoWeek").val() : '';

	var scheduleInactiveStartDateOneMonth = ( $("#scheduleInactiveStartDateOneMonth").val() ) ? $("#scheduleInactiveStartDateOneMonth").val() : '';
	var scheduleInactiveEndDateOneMonth = ( $("#scheduleInactiveEndDateOneMonth").val() ) ? $("#scheduleInactiveEndDateOneMonth").val() : '';

	if(tempInactiveCalendardefault){
		tempInactiveCalendar = tempInactiveCalendardefault;
	} else if(tempInactiveCalendarOneWeek){
		tempInactiveCalendar = tempInactiveCalendarOneWeek;
	} else if(tempInactiveCalendartwoWeek){
		tempInactiveCalendar = tempInactiveCalendartwoWeek;
	} else if(tempInactiveCalendarOneMonth){
		tempInactiveCalendar = tempInactiveCalendarOneMonth;
	} else if( scheduleInactiveStartDateDefault && scheduleInactiveEndDateDefault){
		sIsStartDate = scheduleInactiveStartDateDefault;
		sIsEndDate = scheduleInactiveEndDateDefault;
	} else if(scheduleInactiveStartDateOneWeek && scheduleInactiveEndDateOneWeek ){
		sIsStartDate = scheduleInactiveStartDateOneWeek;
		sIsEndDate = scheduleInactiveEndDateOneWeek;
	} else if(scheduleInactiveStartDateTwoWeek && scheduleInactiveStartDateTwoWeek ){
		sIsStartDate = scheduleInactiveStartDateTwoWeek;
		sIsEndDate = scheduleInactiveStartDateTwoWeek;
	} else if(scheduleInactiveStartDateOneMonth && scheduleInactiveStartDateOneMonth ){
		sIsStartDate = scheduleInactiveStartDateOneMonth;
		sIsEndDate = scheduleInactiveStartDateOneMonth;
	}

	var operatorNotes = ( $("#operatorNotes").val() ) ? $("#operatorNotes").val() :'';

	var entityTtatusTitleHeader = $("#extEntityStatus option:selected").text();

	switch( entity_status_value ){
		case "A" :
			entity_status_title;
			entity_description="Reactivated";
			tempInactiveCalendar="";
			scheduleInactiveStartDate = "";
			scheduleInactiveEndDate = "";
			schedule_inactive_description ="";
			break;
		case "T":
			entity_status_title="Temporary Inactive. Florist will be Re-activated on "+tempInactiveCalendar;
			tempInactiveCalendar;
			entity_description = tempInActiveDesc;	
			scheduleInactiveStartDate = "";
			scheduleInactiveEndDate = "";
			schedule_inactive_description = entity_status_title;
			break;
		case "P":
			entity_status_title;
			entity_description = permanentInActive;
			tempInactiveCalendar = "";
			scheduleInactiveStartDate = "";
			scheduleInactiveEndDate = "";
			schedule_inactive_description = entity_status_title;
			break;
		case "S":
			entity_status_title = "Schedule Inactive From "+sIsStartDate+" to "+sIsEndDate;
			entity_description = tempInActiveDesc;
			tempInactiveCalendar = "";
			scheduleInactiveStartDate = sIsStartDate;
			scheduleInactiveEndDate = sIsEndDate;
			schedule_inactive_description = entity_status_title;
			break;
	}

	/*
	* parameters
	* order_id, user_id, username, date_created
	*/
	if(initiateClickEvent==0){
		/*
		* Update Data Notes Custom Post Type
		* 
		*/
		var notes = [{
			"user_id" : $("#authUserID").val(),
			"username" : "By: "+$("#authUserName").val(),
			"status_title" : entity_status_title,
			"status_desc" : entity_description,
			"temp_inactive_calendar" :  tempInactiveCalendar,
			"schedule_inactive_start_date" : currentDateAustraliaFormatParam(scheduleInactiveStartDate),
			"schedule_inactive_end_date" : currentDateAustraliaFormatParam(scheduleInactiveEndDate),
			"schedule_inactive_description" : schedule_inactive_description,
			"date_created" : currentDateAustraliaFormat()
		}];
		
	}else{
		/*
		* Save Data Notes Custoim Post Typle
		* 
		*/
		var notes = [{
			"user_id" : $("#authUserID").val(),
			"username" : "By: "+$("#authUserName").val(),
			"text_content" : operatorNotes,
			"date_created" : currentDateAustraliaFormat(),
		}];
	}


	let formData = {
		"status": "publish",
		"author" : $("#authUserID").val(),
		"meta": {
		    "rendered_json_content" : JSON.stringify(notes)
		},
	}

	// get the order id and find note id update and update note id
	orderID = $("#extOrderID").val();
	isOrderIDExists(orderID, formData);

}

function getJSONOrdersLocal(orderID){

	// console.log("Orde ID", orderID);

	$.ajax({
		 dataType: 'json',
		url: '../../../private/json/read_notes_order_operator.php?id='+orderID,
		method: 'GET',
	})
	.done(function(object) {
		if(object){
			// console.log("notes order result", object );
			var notesID = object.notes_id;
			if(notesID){

				read_notes(notesID);
			}
		}
	})
	.fail(function(){
		console.error("REST error. Nothing returned for AJAX.");
	});

}

function readEntityStatusOrder(orderID){



}

function updateEntityStatusOrderOnWC(formData){

	$.ajax({
		dataType: 'json',
		url: '../../service/admin/order/entity/entity_status.php',
		method: 'POST',
		data : formData
	})
	.done(function(object) {
		if(object){
			var data = "sucess";
		}	
	})
	.fail(function(){
		console.error("REST error. Nothing returned for AJAX.");
	});

}


function generateJSONESUpdateEntityStatusOnWC(orderID){

	var extEntityStatus = $("#extEntityStatus option:selected").val();		
	let formData = {
		"order_id" : orderID,
		"activity_status" : extEntityStatus
	};

	updateEntityStatusOrderOnWC(formData);
}


/*
* Update Notes
* 
*/
$(document).on('click', '#entityStatusButton', function(){

	event.preventDefault();
	initiateClickEvent = 0;
	/*
	* Check Order if exist on notes order user json
	* 
	*/
	onClickgenerateJSONEStoringNotesWP();

	/*
	* Update Order Entity Status
	*
	*/
	generateJSONESUpdateEntityStatusOnWC( $(this).data("order-id") );

	/*
	* Bactk to default "Activate"
	*
	*/
});

$(document).on('change', '#extEntityStatus', function(){
		
	switch( this.value ){
	case "A" :
		break;
	case "T":
		$("#tempInactiveCalendarDefaultContainer").show();
		$("#tempInactiveCalendarOneWeekContainer").hide();
		$("#tempInactiveCalendartwoWeekContainer").hide();
		$("#tempInactiveCalendarOneMonthContainer").hide();

		var tempInactiveCalendardefault = $("#tempInactiveCalendardefault").val();
		if( tempInactiveCalendardefault==''){
			let parsedUDN1 = moment(loadTomorrowDateMDYFormat(), "MM/DD/YYYY");
			let dateParsed1 = parsedUDN1.format('DD/MM/YYYY');
			$("#tempInactiveCalendardefault").val(dateParsed1);
		}

		break;
	case "P":
		break;
	case "S":
		$("#sIDefaultContainer").show();
		$("#sIOneWeekContainer").hide();
		$("#sITwoWeekContainer").hide();
		$("#sIOneMonthContainer").hide();

		var scheduleInactiveStartDateDefault = $("#scheduleInactiveStartDateDefault").val();
		if( scheduleInactiveStartDateDefault==''){
			let parsedUDN1 = moment(loadTomorrowDateMDYFormat(), "MM/DD/YYYY");
			let dateParsed1 = parsedUDN1.format('DD/MM/YYYY');
			$("#scheduleInactiveStartDateDefault").val(dateParsed1);
		} 
		break;
	}

});

/*
* Temporary Inactive Change Status Calendar
*
*/
$(document).on('click', '#oneWeek', function(){
	event.preventDefault();

	$('#tempInactiveCalendarDefaultContainer').hide();
	$("#tempInactiveCalendarOneWeekContainer").show();
		$("#tempInactiveCalendardefault").val('');
		// $("#tempInactiveCalendarOneWeek").val('');
		$("#tempInactiveCalendartwoWeek").val('');
		$("#tempInactiveCalendarOneMonth").val('');
	$("#tempInactiveCalendartwoWeekContainer").hide();
	$("#tempInactiveCalendarOneMonthContainer").hide();

	var numberOfWeeks = $(this).data("one-week");

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + ONE_WEEK);
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate =  mm + '/' + dd + '/' + y;

	$('#tempInactiveCalendarOneWeek').datetimepicker({
       	format: "DD/MM/YYYY",
       	defaultDate: formattedDate,
        autoclose: true
    });

	let parsedUDN = moment(formattedDate, "MM/DD/YYYY");

	let dateParsed = parsedUDN.format('DD/MM/YYYY');

	var tempInactiveCalendarOneWeek = $("#tempInactiveCalendarOneWeek").val();

	if( tempInactiveCalendarOneWeek === '' ){
		$("#tempInactiveCalendarOneWeek").val(dateParsed);
	}


});


$(document).on('click', '#twoWeek', function(){
	event.preventDefault();

	$('#tempInactiveCalendarDefaultContainer').hide();
	$("#tempInactiveCalendarOneWeekContainer").hide();
	$("#tempInactiveCalendartwoWeekContainer").show();
		$("#tempInactiveCalendardefault").val('');
		$("#tempInactiveCalendarOneWeek").val('');
		// $("#tempInactiveCalendartwoWeek").val(''); // dont empty
		$("#tempInactiveCalendarOneMonth").val('');

	$("#tempInactiveCalendarOneMonthContainer").hide();

	var newdate = new Date();
	newdate.setDate(newdate.getDate() + TWO_WEEKS );
	var dd = newdate.getDate();
	var mm = newdate.getMonth() + 1;
	var y = newdate.getFullYear();
	var formattedDate =  mm + '/' + dd + '/' + y;

	// $('#tempInactiveCalendartwoWeek').datepicker("update", formattedDate);
	$('#tempInactiveCalendartwoWeek').datetimepicker({
       	format: "DD/MM/YYYY",
       	defaultDate: formattedDate,
        autoclose: true
    });

  	let parsedUDN = moment(formattedDate, "MM/DD/YYYY");

	let dateParsed = parsedUDN.format('DD/MM/YYYY');

	var tempInactiveCalendartwoWeek = $("#tempInactiveCalendartwoWeek").val();

	if( tempInactiveCalendartwoWeek === '' ){
		$("#tempInactiveCalendartwoWeek").val(dateParsed);
	}

	// $('#tempInactiveCalendartwoWeek').data("DateTimePicker", {'date': formattedDate} );
});

$(document).on('click', '#oneMonth', function(){

	event.preventDefault();

	$("#tempInactiveCalendarOneWeekContainer").hide();
	$('#tempInactiveCalendarDefaultContainer').hide();
	$("#tempInactiveCalendartwoWeekContainer").hide();
	$("#tempInactiveCalendarOneMonthContainer").show();
		$("#tempInactiveCalendardefault").val('');
		$("#tempInactiveCalendarOneWeek").val('');
		$("#tempInactiveCalendartwoWeek").val('');
		// $("#tempInactiveCalendarOneMonth").val('');

		var newdate = new Date();
		newdate.setDate(newdate.getDate() + 30);
		var dd = newdate.getDate();
		var mm = newdate.getMonth() + 1;
		var y = newdate.getFullYear();
		var formattedDate =  mm + '/' + dd + '/' + y;

		$('#tempInactiveCalendarOneMonth').datetimepicker({
	       	format: "DD/MM/YYYY",
       		defaultDate: formattedDate,
        	autoclose: true
	    });

		let parsedUDN = moment(formattedDate, "MM/DD/YYYY");

		let dateParsed = parsedUDN.format('DD/MM/YYYY');

		var tempInactiveCalendarOneMonth = $("#tempInactiveCalendarOneMonth").val();

		if( tempInactiveCalendarOneMonth === '' ){
			$("#tempInactiveCalendarOneMonth").val(dateParsed);
		}

});



/*
* Event : Click
* Schedule Inactive Calendar - Entity Status
*
*/
$(document).on('click', '#sIoneWeek', function(){

	event.preventDefault();
 
	$("#sIDefaultContainer").hide();
		//$("#scheduleInactiveStartDateDefault").val('');
		//$("#scheduleInactiveEndDateDefault").val('');
	$('#sIOneWeekContainer').show();
		//$("#scheduleInactiveStartDateOneWeek").val();
		//$("#scheduleInactiveEndDateOneWeek").val();
	$("#sITwoWeekContainer").hide();
		//$("#scheduleInactiveStartDateTwoWeek").val('');
		//$("#scheduleInactiveEndDateTwoWeek").val('');
	$("#sIOneMonthContainer").hide();
		//$("#scheduleInactiveStartDateOneMonth").val('');
		//$("#scheduleInactiveEndDateOneMonth").val('');

		var newdate = new Date();
		newdate.setDate(newdate.getDate() + ONE_WEEK );
		var dd = newdate.getDate();
		var mm = newdate.getMonth() + 1;
		var y = newdate.getFullYear();
		var formattedDate =  mm + '/' + dd + '/' + y;


		$('#scheduleInactiveStartDateOneWeek').datetimepicker({
		    format: "DD/MM/YYYY",
		    defaultDate: loadTomorrowDateMDYFormat(),
		    autoclose: true
	    });

		let parsedUDN1 = moment(loadTomorrowDateMDYFormat(), "MM/DD/YYYY");

		let dateParsed1 = parsedUDN1.format('DD/MM/YYYY');

		var scheduleInactiveStartDateOneWeek = $("#scheduleInactiveStartDateOneWeek").val();

		if( scheduleInactiveStartDateOneWeek === '' ){
			$("#scheduleInactiveStartDateOneWeek").val(dateParsed1);
		}


	    $('#scheduleInactiveEndDateOneWeek').datetimepicker({
	       	format: "DD/MM/YYYY",
	       	defaultDate: formattedDate,
	        autoclose: true
	    });

		let parsedUDN2 = moment(formattedDate, "MM/DD/YYYY");

		let dateParsed2 = parsedUDN2.format('DD/MM/YYYY');

		var scheduleInactiveEndDateOneWeek = $("#scheduleInactiveEndDateOneWeek").val();

		if( scheduleInactiveEndDateOneWeek === '' ){
			$("#scheduleInactiveEndDateOneWeek").val(dateParsed2);
		}

});

$(document).on('click', '#sItwoWeek', function(){

	event.preventDefault();

	$("#sIDefaultContainer").hide();
		//$("#scheduleInactiveStartDateDefault").val('');
		//$("#scheduleInactiveEndDateDefault").val('');
	$('#sIOneWeekContainer').hide();
		//$("#scheduleInactiveStartDateOneWeek").val('');
		//$("#scheduleInactiveEndDateOneWeek").val('');
	$("#sITwoWeekContainer").show();
		// $("#scheduleInactiveStartDateTwoWeek").val();
		// $("#scheduleInactiveEndDateTwoWeek").val();
	$("#sIOneMonthContainer").hide();
		//$("#scheduleInactiveStartDateOneMonth").val('');
		//$("#scheduleInactiveEndDateOneMonth").val('');

		var newdate = new Date();
		newdate.setDate(newdate.getDate() + TWO_WEEKS );
		var dd = newdate.getDate();
		var mm = newdate.getMonth() + 1;
		var y = newdate.getFullYear();
		var formattedDate =  mm + '/' + dd + '/' + y;

		$('#scheduleInactiveStartDateTwoWeek').datetimepicker({
		    format: "DD/MM/YYYY",
		    defaultDate: loadTomorrowDateMDYFormat(),
		    autoclose: true
	    });

		let parsedUDN1 = moment(loadTomorrowDateMDYFormat(), "MM/DD/YYYY");

		let dateParsed1 = parsedUDN1.format('DD/MM/YYYY');

		var scheduleInactiveStartDateTwoWeek = $("#scheduleInactiveStartDateTwoWeek").val();

		if( scheduleInactiveStartDateTwoWeek === '' ){
			$("#scheduleInactiveStartDateTwoWeek").val(dateParsed1);
		}


		$('#scheduleInactiveEndDateTwoWeek').datetimepicker({
	       	format: "DD/MM/YYYY",
	       	defaultDate: formattedDate,
	        autoclose: true
	    });

		let parsedUDN2 = moment(formattedDate, "MM/DD/YYYY");

		let dateParsed2 = parsedUDN2.format('DD/MM/YYYY');

		var scheduleInactiveEndDateTwoWeek = $("#scheduleInactiveEndDateTwoWeek").val();

		if( scheduleInactiveEndDateTwoWeek === '' ){
			$("#scheduleInactiveEndDateTwoWeek").val(dateParsed2);
		}

});


$(document).on('click', '#isIOneMonth', function(){

	event.preventDefault();

	$("#sIDefaultContainer").hide();
		//$("#scheduleInactiveStartDateDefault").val('');
		//$("#scheduleInactiveEndDateDefault").val('');
	$('#sIOneWeekContainer').hide();
		//$("#scheduleInactiveStartDateOneWeek").val('');
		//$("#scheduleInactiveEndDateOneWeek").val('');
	$("#sITwoWeekContainer").hide();
		//$("#scheduleInactiveStartDateTwoWeek").val('');
		//$("#scheduleInactiveEndDateTwoWeek").val('');
	$("#sIOneMonthContainer").show();
		//$("#scheduleInactiveStartDateOneMonth").val();
		//$("#scheduleInactiveEndDateOneMonth").val();

		var newdate = new Date();
		newdate.setDate(newdate.getDate() + ONE_MONTH );
		var dd = newdate.getDate();
		var mm = newdate.getMonth() + 1;
		var y = newdate.getFullYear();
		var formattedDate =  mm + '/' + dd + '/' + y;

		$('#scheduleInactiveStartDateOneMonth').datetimepicker({
			    format: "DD/MM/YYYY",
			    defaultDate: loadTomorrowDateMDYFormat(),
			    autoclose: true
		});

		let parsedUDN1 = moment(loadTomorrowDateMDYFormat(), "MM/DD/YYYY");

		let dateParsed1 = parsedUDN1.format('DD/MM/YYYY');

		var scheduleInactiveStartDateOneMonth = $("#scheduleInactiveStartDateOneMonth").val();

		if( scheduleInactiveStartDateOneMonth === '' ){
			$("#scheduleInactiveStartDateOneMonth").val(dateParsed1);
		}


		$('#scheduleInactiveEndDateOneMonth').datetimepicker({
		   	format: "DD/MM/YYYY",
		   	defaultDate: formattedDate,
		    autoclose: true
		});

		let parsedUDN2 = moment(formattedDate, "MM/DD/YYYY");

		let dateParsed2 = parsedUDN2.format('DD/MM/YYYY');

		var scheduleInactiveEndDateOneMonth = $("#scheduleInactiveEndDateOneMonth").val();

		if( scheduleInactiveEndDateOneMonth === '' ){
			$("#scheduleInactiveEndDateOneMonth").val(dateParsed2);
		}


});