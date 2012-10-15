<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo "$base/$css"?>">
</head>
<body>
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
</body>
</html>