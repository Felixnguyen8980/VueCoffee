<style>
	#ProductBox .col2{
		text-align: center;
		background-color: rgba(0,0,0,0.6);
		padding: 5px;
		border: 2px solid rgba(255,255,255,0.3);
	}
	#ProductBox img{
		width: 85%;
		height: 150px;
	}
	#ProductBox .col2 p{
		color: white;
	}
</style>
<div id="ProductBox">
	<?php $item=0;foreach($result as $product):
		if ($item%4==0){ ?>
		<div class="row">
		<div class="col1"></div>
	<?php	}
	?>
		<div class="col2">
			<img src="uploads/image/<?php echo $product->image;?>" alt="" >
			<p><?php echo $product->name;?></p>
			<p><?php echo $product->prices;?></p>
		</div>	
	<?php if($item%4==3) {?>
		<div class="col1"></div>
		</div>
	<?php } $item++;
	endforeach;?>
</div>