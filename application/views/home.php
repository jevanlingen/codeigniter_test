<!DOCTYPE html>
<html lang="en">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 </head>
 <body>
   <h1>Portal</h1>
   <h2>Welcome <?php echo $username; ?>!</h2>
   <p>Choose one of the different applications:</p>
   <b>Own applications</b>
   <ul>
	 <li><?=anchor("books/main","Books application")?></li>
   </ul>
   
   <br />
   <b>Shared with all users</b>
   <ul>
	 <li><?=anchor("blog","Blog")?></li>
	 <li><?=anchor("news","News")?></li>
   </ul>
   <hr />
   <a href="home/logout">Logout</a>
 </body>
</html>