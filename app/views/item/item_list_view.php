<?php 
	$this->render('common/meta'); 
	$this->render('common/header');
	
?>

<table>
	<?php foreach($items as $item): ?>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['title']; ?></td>
		</tr>
	<?php endforeach; ?>

</table>

<?php
	$this->render('common/footer');
?> 