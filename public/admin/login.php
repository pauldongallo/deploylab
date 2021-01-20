<?php 

require_once('../../private/initialize.php');

include(SHARED_PATH.'/admin_header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md">
      
    </div>
    <div class="col-md">
		<form id="loginFormSignIn" action="<?php url_for('public/admin/login.php'); ?>" method="post" class="form-signin" style="padding-top: 80px">
			<img src="/public/assets/img/modin-logo.png" class="mod-logo-default img-fluid" alt="modin" title="modin">
		 	<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		 	<label for="inputEmail" class="sr-only">Email address</label>
		  	<input type="text" name="username" id="userLogin" class="form-control" required="">
		  	<label for="inputPassword" class="sr-only">Password</label>
		  	<input type="password" name="password" id="userPassword" class="form-control" required="" autocomplete="on">
		  	<button type="button" id="loginButton" class="btn btn-lg btn-primary btn-block">Sign in</button>
		  	<button style="display:none;" type="submit" id="loginSubmitbutton" class="btn btn-lg btn-primary btn-block">Sign in</button>
		  	<p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
		</form>
    </div>
    <div class="col-md">
     
    </div>
  </div>
</div>
<?php include(SHARED_PATH.'/admin_javascript.php'); ?>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>