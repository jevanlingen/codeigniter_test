<html>
<head>
	<link rel="stylesheet" href="http://localhost/CodeIgniter_2.1.2/960.css">
	<link rel="stylesheet" type="text/css" href="<?php echo "$base/$css"?>">
</head>
<body>
	<div class="container_12"> 	
		<div class="grid_12">
			<div id="header">
				<? $this->load->view('books/books_header'); ?>
			</div>
			<div id="menu">
				<? $this->load->view('books/books_menu'); ?>
			</div>

			<? echo $table ?>

			<div id="footer">
				<? $this->load->view('books/books_footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>