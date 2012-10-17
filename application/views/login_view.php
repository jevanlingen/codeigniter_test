<!DOCTYPE html>
<html lang="en">
 <head>
   <title>Simple Login with CodeIgniter</title>
   <link rel="stylesheet" href="http://localhost/CodeIgniter_2.1.2/960.css">
   <link rel="stylesheet" href="http://localhost/CodeIgniter_2.1.2/mystyles.css">
   <script type="text/javascript" src="http://localhost/CodeIgniter_2.1.2/js/jquery-1.8.2.min.js"></script>
 </head>
 <body>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#register').click(function() {
			  $("#create_account").show();
			  return false;
			});
		});
	</script>
	
   <div class="container_12"> 	
		<div class="grid_12">
		   <h1>Simple Login with CodeIgniter</h1>
		   <?= validation_errors() ?>
		   <?= $message ?>
		</div>		
		<div class="clear"></div>
		
		<?php echo form_open('Login/login'); ?>
			<div class="grid_1">
				<label for="username">Username:</label>
			</div>
			<div class="grid_11">
				<input type="text" size="20" id="username" name="username"/>
			</div>
			<div class="grid_1">
				<label for="password">Password:</label>
			</div>
			<div class="grid_11">
				<input type="password" size="20" id="passowrd" name="password"/>
			</div>
			<div class="grid_1">
				<input type="submit" value="Login"/>
			</div>
			<div class="clear"></div>
		</form>
		
		<div class="grid_12">
			<hr />
			<p>No account, <?=anchor("","register", 'id="register"')?> one!</p>
		</div>		   
	</div>
	
	<div id="create_account">				
		<b>Choose Username and password for your account:</b>
		<br />
		<br />
		<?php echo form_open('Login/create_account'); ?>
			<label for="username">Username:</label>
			<input type="text" size="20" id="username" name="username"/>
			<br/>
			<label for="password">Password:</label>
			<input type="password" size="20" id="passowrd" name="password"/>
			<br/><br/>

			<input type="submit" value="Create"/>
		</form>
	</div>
 </body>
</html>