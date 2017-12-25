<style>
	#viewCategoriesContainer{
		position: relative;
	}
	#AddCategories{
		width: 300px;
		padding: 5px;
		background-color: rgba(255,255,255,0.9);
		box-shadow: 1px 1px 1px rgba(255,255,255,1);
		position: absolute; 
		top:200px;
		left: 40%;
	}
	#AddCategories .row{
		padding: 2px;
	}
</style>
<div id="viewCategoriesContainer">
	<div>
		<button class="btn" onclick="showAddCategories()">Add Categories</button>
	</div>
	<div id="AddCategories" style="display: none">
		<div>
			<i style="color: red;" id="alertSaveCategories"></i>
		</div>
		<div class="row">
			<p class="col4">Category's name</p> <input class="col6" type="text" id="nameCategories" name="nameCategories">
		</div>
		<div class="row">
			<p class="col4">Category's image</p> <input class="col6" type="file" id="_file" name="_file">
		</div>
		<div class='progress_outer'>
           <progress id="progressBar" value="0" max="100" style="width:150px; height: 2px;"></progress>
        </div>
		<button class="btn" onclick="SaveCategories()">Save</button>
	</div>
	<div id="page">
		<?php for($i = 1;$i < $max/10+1 ; $i++){?>
		<button class="pages btn-tini " onclick="showCategories(<?php echo $i;?>)"><?php echo $i ?></button>
		<?php } ?>
	</div>
	<div id="result">
		
	</div>
</div>