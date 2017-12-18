<style>
	.group{
		position: relative;
		padding: 3px;
		border-right: 1px solid rgba(255,255,255,0.6);
		background-color: rgba(0,0,0,0.2);
		transition: all 0.2s;
	}
	.group img{
		width: 70%;
		height: 100px;
	}
	.group .filter{
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: 3;
		background-color: rgba(0,0,0,0.4);
		top:0;
		left:0;
	}
	.group:hover .filter{
		z-index: -1;	
	}
	.group:hover{
		background-color: rgba(0,0,0,0.4);
	}
	.group .title{
		position: absolute;
		
		width: 100%;
		bottom:50%;
		left: 0;
		font:17px;
		font-weight: bold;
		color: white;
		padding: 3px;
		transition: all 0.2s;
	}
	.group:hover .title{
		bottom: 0%;
		background-color: rgba(0,0,0,0.4);
	}
	.group:active {
		background-color: rgba(0,0,0,0.5);
	}

	.group.active {
		background-color: rgba(0,0,0,0.5);
	}
	.group.active .title{
		bottom: 0%;
		background-color: rgba(0,0,0,0.6);
	}
	.group.active .filter{
		z-index: -1;	
	}
	#GroupDetail{
		position: relative;
		margin: 0px;
		padding-top:0px;
		width:100%;
		height: 0;
		background-color: rgba(0,0,0,0.7);
		transition: all 0.2s;
		overflow: hidden;

	}
	#GroupDetail.active{
		height: 600px;
	}
	#GroupDetail #btn_addProduct{	
		position: absolute;
		margin-top: 5px;
		margin-left: 5px;
		color: white;
		background-color: rgba(235,251,103,0.84);
		padding:3px 10px 3px 10px;
	}
	#GroupDetail #btn_addProduct:hover{
		background-color: rgba(235,251,103,0.97);
	}
	#GroupDetail #btn_addProduct:active{
		background-color: rgba(103,251,142,0.97);
	}
	#ProductList{
		position: absolute;
		top:50px;
		width: 100%;
	}
	#AddProduct{
		width: 300px;
		padding: 5px;
		background-color: rgba(255,255,255,0.9);
		box-shadow: 1px 1px 1px rgba(255,255,255,1);
		position: absolute; 
		z-index: 5;
		top:150px;
		left: 40%;
	}
	#AddProduct .row{
		padding: 2px;
	}
</style>
<div id="ProductGroupList" class="row">
	<?php $index=0; foreach($result as $group):?>
		<div class="col2 center group" onclick="showGroupDetail(<?php echo $index.','.$group->id;?>)">
			<img src="uploads/image/<?php echo $group->image;?>" alt="">
			<div class="filter">
				
			</div>
			<p class="title">
				<?php echo $group->name;?>
			</p>
		</div>	
	<?php $index++; endforeach;?>
</div>
<div id="GroupDetail">
	<button class="btn" id="btn_addProduct" onclick="ShowAddProduct()" style="display: none">Add</button>
	<div id="AddProduct" style="display: none">
		<div>
			<i style="color: red;" id="alertSaveProduct"></i>
		</div>
		<div class="row">
			<p class="col4">product's name</p> <input class="col6" type="text" id="name" name="name">
		</div>
		<div class="row">
			<p class="col4">product's description</p> <input class="col6" type="text" id="description" name="description">
		</div>
		<div class="row">
			<p class="col4">product's prices</p> <input class="col6" type="text" id="prices" name="prices">
		</div>
		<div class="row">
			<p class="col4">Category's image</p> <input class="col6" type="file" id="image" name="image">
		</div>
		<div class='progress_outer row'>
           <progress id="progressBar" value="0" max="100" style="width:150px;"></progress>
        </div>
        <div class='row'>
			<button class="btn" value="" id="SaveProduct" onclick="FunctionSaveProduct(this.value)">Save</button>
		</div>
	</div>
	<div id="ProductList">
		
	</div>
</div>