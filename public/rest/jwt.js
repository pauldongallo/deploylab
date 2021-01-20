const RESTROOT = 'http://mabuhayflowers.test/wp-json';
const JWTH_AUTH = RESTROOT + '/jwt-auth/v1/token';
const USER_BY_ROLE_ROUTE = RESTROOT + '/wp/v2/users?roles=customer';

function getToken(username, password){

	$.ajax({
		url: JWTH_AUTH,
		method: 'POST',
		data:{
			'username': username,
			'password': password
		}
	})
	.done(function(response){
		if(response!==null){
			html = "";
			html +="<input name='user_id' value='"+ response.user_id+"' type='hidden'/>";
			html +="<input name='user_email' value='"+response.user_email+"' type='hidden'/>";
			html +="<input name='user_nicename' value='"+response.user_nicename+"' type='hidden'/>";
			html +="<input name='user_display_name' value='"+response.user_display_name+"' type='hidden'/>";
			$("form#loginFormSignIn").append(html);
			$("#loginSubmitbutton").click();
		} else {
			// window.location.href = "/public/admin/logout.php";
		}
	})
	.fail(function(response){
		console.error("REST error.");
	});

}

$( document ).ready(function() {

   	$("#loginButton").on("click", function(){
   		getToken( $("#userLogin").val(), $("#userPassword").val() );
   	});

   	$(".logout").on("click", function(){
   		window.location.href = "/public/admin/logout.php";
   	});

});