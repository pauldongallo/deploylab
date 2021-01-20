/*
* Add notes 
* 
*/
function onClickgenerateJSONEStoringSaveNotessWP(){

	/*
	* If Temp Selected 
	* tempInActive
	*
	*/
	var entity_status_title = ( $("#operatorNotes").val() ) ? $("#operatorNotes").val() :'';

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
			"text_content" : entity_status_title,
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
			"text_content" : entity_status_title,
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

$(document).on('click', '#entitySaveNotesButton', function(){

	event.preventDefault();
	initiateClickEvent = 0;

	/*
	* Check Order if exist on notes order user json
	* 
	*/
	onClickgenerateJSONEStoringSaveNotessWP();
	
});