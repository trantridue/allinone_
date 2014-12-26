<?php
$totalcolum = 7;
$totalline = 100;
?>
<table id="example" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
		<?php
		
		for($i = 1; $i <= $totalcolum; $i ++) {
			if ($i != 5) {
				?>
		
			<th>Colum <?php echo $i;?></th>
			
			<?php } else { ?>
			<th style="display: none;">Colum <?php echo $i;?></th>
			<?php 	}}?>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th colspan="7"></th>
		</tr>
	</tfoot>

	<tbody>
	<?php for ($j=1;$j<=$totalline;$j++) {?>
		<tr>
			<td>Tiger Nixon <?php echo $j;?></td>
			<td>System Architect <?php echo $j;?></td>
			<td>Edinburgh <?php echo $j;?></td>
			<td><?php echo $j;?></td>
			<td style="display: none;"><?php echo $j;?></td>
			<td><?php echo 2000+$j;?>/04/25</td>
			<td><?php echo $j*$j;?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>