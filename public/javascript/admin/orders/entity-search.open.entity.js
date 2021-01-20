/** open Entity Table **/
$(document).on('click', '.openEntityButton', function(){

	switch( $(this).data("ent-activity-entity-status") ){
		case "A" :
			$("#textActive").show();
			$("#textTemporaryInActive").hide();
			$("#textPermanentInActive").hide();
			$("#textScheduleInActive").hide();
			break;
		case "T":
			$("#textActive").hide();
			$("#textTemporaryInActive").show();
			$("#textPermanentInActive").hide();
			$("#textScheduleInActive").hide();
			break;
		case "P":
			$("#textActive").hide();
			$("#textTemporaryInActive").hide();
			$("#textPermanentInActive").show();
			$("#textScheduleInActive").hide();
			break;
		case "S":
			$("#textActive").hide();
			$("#textTemporaryInActive").hide();
			$("#textPermanentInActive").hide();
			$("#textScheduleInActive").show();
			break;
	}

	// switch case funciton	
	person_title_edit( $(this).data("ent-person-title") );
	// entity_satus_edit( $(this).data("ent-activity-entity-status") );

	var entOrderID 			    = $(this).data("ent-order-id");
	var entAbn 					= $(this).data("ent-abn");
	var entNickname 			= $(this).data("ent-nickname");
	var entFirstName 			= $(this).data("ent-first-name");
	var entLastName 			= $(this).data("ent-last-name");

	var entDOB 					= $(this).data("ent-dob");
	var entBillingEmail2 		= $(this).data("ent-billing-email-2");
	var entBillingWebsite 		= $(this).data("ent-billing-website");
	var entBillingWorkPhone	 	= $(this).data("ent-billing-work-phone");
	var entbillingFaxPhone		= $(this).data("ent-billing-fax-phone");
	var entBillingMobilePhone   = $(this).data("ent-billing-mobile-phone");

	var entStoreName 			= $(this).data("ent-store-names");
	var entStoreNameID 			= $(this).data("ent-store-name-id");
	var entStoreID 				= $(this).data("ent-store-id");
	var entEmail 				= $(this).data("ent-email");
	var extPhoneHome			= $(this).data("ent-phone-home");

	var entRecipientFirstName 	= $(this).data("ent-recipient-first-name");
	var entRecipientLastName 	= $(this).data("ent-last-first-name");
	var entPersonTitle 			= $(this).data("ent-person-title");

	var entBillingFb 			= $(this).data("ent-billing-fb");
	var entBillingWechat 		= $(this).data("ent-billing-wechat");
	var entBillingWhatsapp 		= $(this).data("ent-billing-whatsapp");
	var entBillingSkype 		= $(this).data("ent-billing-skype");
	var entBillingViber 		= $(this).data("ent-billing-viber");

	var entShippingFb 			= $(this).data("ent-shp-fb");
	var entShippingWechat 		= $(this).data("ent-shp-wechat");
	var entShippingWhatsapp 	= $(this).data("ent-shp-whatsapp");	
	var entShippingSkype 		= $(this).data("ent-shp-skype");
	var entShippingViber		= $(this).data("ent-shp-viber");

	var entBillingAddress_1 	= $(this).data('ent-billing-address-1');
	var entBillingAddress_2 	= $(this).data('ent-billing-address-2');
	var extbillingAddress_3 	= $(this).data("ent-billing-address-3");
	var extSuburb				= $(this).data("ent-suburb");
		
	store_type_edit( $(this).data("ent-billing-store-type") );
	var extBillingMerchantName 	 = $(this).data("ent-billing-merchant-name");
	var extBillingStoreLatitude  = $(this).data("ent-billing-store-latitude");
	var extBillingStoreLongitude = $(this).data("ent-billing-store-longitude"); 
	var extBillingBsn  			 = $(this).data("ent-billing-store-bsb");
	var extBillingStoreBankAccountName  = $(this).data("ent-billing-store-bank-account-name");
	var extBillingStoreSwiftC    = $(this).data("ent-billing-store-swift-c");
	var extBillingStoreBankName    = $(this).data("ent-billing-store-bank-name");
	var extBillingStoreBankAddress = $(this).data("ent-billing-store-bank-address");


	/*
	* Initialize Reading Data
	* 
	*/
	console.log("checking", entOrderID);
	if(entOrderID){
		$('#entityStatusButton').attr('data-order-id', entOrderID );
		getJSONOrdersLocal(entOrderID);
	}

	var output = "";
	output += '<iframe width="350" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ';
	output += 'src="https://maps.google.com/maps?q='+extBillingStoreLatitude+','+extBillingStoreLongitude+'&hl=es&z=14&amp;output=embed">';
	output += '</iframe>';
	$(".store_map").append( output );

	$("#extOrderID").val(entOrderID);
	$("#extBillingMerchantName").val(extBillingMerchantName);
	$("#extBillingStoreLatitude").val(extBillingStoreLatitude);
	$("#extBillingStoreLongitude").val(extBillingStoreLongitude);
	$("#extBillingBsn").val(extBillingBsn);
	$("#extBillingStoreBankAccountName").val(extBillingStoreBankAccountName);
	$("#extBillingStoreSwiftC").val(extBillingStoreSwiftC);
	$("#extBillingStoreBankName").val(extBillingStoreBankName);
	$("#extBillingStoreBankAddress").val(extBillingStoreBankAddress);

	$("#entStoreID").val(entStoreID);
	$("#extAbn").val(entAbn);

	$("#extNickName").val(entNickname);
	$("#extFirstName").val(entFirstName);
	$("#extLastName").val(entLastName);

	$("#extPersonTitle").val();
	$("#extStoreName").val(entStoreName);
	$("#extDOB").val(entDOB);
	$("#extEmail1").val(entEmail);
	$("#extBillingEmail2").val(entBillingEmail2);

	$("#extBillingWebsite").val(entBillingWebsite);
	$("#extBillingWorkPhone").val(entBillingWorkPhone);
	$("#extbillingFaxPhone").val(entbillingFaxPhone);
	$("#extBillingMobilePhone").val(entBillingMobilePhone);

	$("#extPhoneHome").val(extPhoneHome);

	$("#extBillingFb").val(entBillingFb);
	$("#extBillingWechat").val(entBillingWechat);	
	$("#extBillingWhatsapp").val(entBillingWhatsapp);
	$("#extBillingSkype").val(entBillingSkype);
	$("#extBillingViber").val(entBillingViber);

	$("#extShippingFb").val(entShippingFb);
	$("#extShippingWechat").val(entShippingWechat);
	$("#extShippingWhatsapp").val(entShippingWhatsapp);
	$("#extShippingSkype").val(entShippingSkype);
	$("#extShippingViber").val(entShippingViber);

	$("#extBillingAddress_1").val(entBillingAddress_1);
	$("#extBillingAddress_2").val(entBillingAddress_2);
	$("#extbillingAddress_3").val(extbillingAddress_3);
	$("#extSuburb").val(extSuburb);

});	