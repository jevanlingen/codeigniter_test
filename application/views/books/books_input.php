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

	<? echo heading($forminput,3) ?>
	<? echo form_open('books/input'); ?>
	<? echo form_hidden('id',$fid['value']); ?>
	<? echo $title		.' : '.
			form_input($ftitle).br(); ?>
	<? echo $author		.' : '.
			form_input($fauthor).br(); ?>
	<? echo $publisher	.' : '.
			form_input($fpublisher).br(); ?>
	<? echo $year		.' : '.
			form_dropdown('year',$years,$fyear['value']).br(); ?>
	<? echo $available	.' : '.
			form_checkbox($favailable).br(); ?>
	<? echo $summary	.' : '.
			form_textarea($fsummary).br(); ?>
	<? echo form_submit('mysubmit','Submit!');  ?>
	<? echo form_close(); ?>

	<div id="footer">
		<? $this->load->view('books/books_footer'); ?>
	</div>
</body>
</html>