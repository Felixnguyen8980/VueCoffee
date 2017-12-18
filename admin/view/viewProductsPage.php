<div id="viewProductPage">	
	<div id="page">
		<?php for($i = 1;$i < $max/6+1 ; $i++){?>
			<button class="pages btn-tini " onclick="resultProduct(<?php echo $category.','.$i;?>)"><?php echo $i ?></button>
		<?php } ?>
	</div>
	<div id="resultProduct">
		
	</div>
</div>