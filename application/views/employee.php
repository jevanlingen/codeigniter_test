<table>
	<?php foreach ($query as $row):?>
		<tr><td><?=$row->id?></td><td><?=$row->name?></td><td><?=$row->city?></td></tr>
	<?php endforeach;?>
</table>