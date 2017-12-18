<div id="viewCategoriesContainer">
	<div id="page">
		<?php for($i = 1;$i < $max/5+1 ; $i++){?>
		<button class="pages btn-tini " onclick="showProducts(<?php echo $i.",".$category;?>)"><?php echo $i ?></button>
		<?php } ?>
	</div>
	<div id="result">
			
	</div>
</div>