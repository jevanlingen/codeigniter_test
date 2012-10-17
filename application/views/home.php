<!DOCTYPE html>
<html lang="en">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
   <link rel="stylesheet" href="http://localhost/CodeIgniter_2.1.2/960.css">
   <link rel="stylesheet" href="http://localhost/CodeIgniter_2.1.2/mystyles.css">
 </head>
 <body>
	<div class="container_12"> 	
		<div class="grid_12">
		   <h1>Portal</h1>
		   <p>
				Welcome <?php echo $username; ?>! Choose one of the different applications:
				<br /><br />
				<b>Own applications</b>
				<ul>
					<li><?=anchor("books/main","Books application")?></li>
				</ul>
				<b>Shared with all users</b>
				<ul>
					<li><?=anchor("blog","Blog")?></li>
					<li><?=anchor("news","News")?></li>
				</ul>
		   </p>
		   <hr />
		   <p><a href="home/logout">Logout</a></p>
		 </div>
	</div>
 </body>
</html>