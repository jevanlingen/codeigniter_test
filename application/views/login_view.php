<!DOCTYPE html>
<html lang="en">
 <head>
   <title>Simple Login with CodeIgniter</title>
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
 
   <h1>Simple Login with CodeIgniter</h1>
   <?= validation_errors() ?>
   <?= $message ?>
   <?php echo form_open('Login/login'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
   
   <hr />
   <p>No account, <?=anchor("","register", 'id="register"')?> one!</p>
   <div id="create_account" style="border: solid 2px gray;
		position: fixed;
		left: 50%;
		top: 50%;
		background-color: white;
		z-index: 100;

		height: 120px;
		margin-top: -200px;

		width: 360px;
		margin-left: -300px;
		padding: 20px;
		display:none;">
		
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