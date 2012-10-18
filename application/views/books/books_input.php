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
			<? echo heading($forminput,3) ?>
			<?= validation_errors() ?>
			<?= $error ?>
		</div>
		<div class="clear"></div>
		
		<? echo form_open_multipart('books/input'); ?>
		<? echo form_hidden('id',$fid['value']); ?>
			<div class="grid_1">
				<label for="<?=$title?>"><?=$title?>:</label>
			</div>
			<div class="grid_11">
				<?=form_input($ftitle)?>
			</div>
			<div class="grid_1">
				<label for="<?=$author?>"><?=$author?>:</label>
			</div>
			<div class="grid_11">
				<?=form_input($fauthor)?>
			</div>
			<div class="grid_1">
				<label for="<?=$publisher?>"><?=$publisher?>:</label>
			</div>
			<div class="grid_11">
				<?=form_input($fpublisher)?>
			</div>
			<div class="grid_1">
				<label for="<?=$year?>"><?=$year?>:</label>
			</div>
			<div class="grid_11">
				<?=form_dropdown('year',$years,$fyear['value'])?>
			</div>
			<div class="grid_1">
				<label for="<?=$available?>"><?=$available?>:</label>
			</div>
			<div class="grid_11">
				<?=form_checkbox($favailable)?>
			</div>
			<div class="grid_1">
				<label for="<?=$summary?>"><?=$summary?>:</label>
			</div>
			<div class="grid_11">
				<?=form_textarea($fsummary)?>
			</div>
			<div class="grid_1">
				<label for="image_of_book">Image:</label>
			</div>
			<div class="grid_11">
				<input type="file" name="userfile" size="20" />
			</div>
			<div class="grid_1">
				<?=form_submit('mysubmit','Submit!')?>
			</div>
		</form>
		
		<div class="clear"></div>
		<div class="grid_12">
			<div id="footer">
				<? $this->load->view('books/books_footer'); ?>
			</div>
		</div>
	</div>
</body>
</html>