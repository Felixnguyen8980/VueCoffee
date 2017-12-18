<style>
	#viewUserContainer{
		position: relative;
	}
	#page{
		margin-top: 5px;
	}
	#AddUser{
		width: 300px;
		padding: 5px;
		background-color: rgba(255,255,255,0.9);
		box-shadow: 1px 1px 1px rgba(255,255,255,1);
		position: absolute; 
		top:200px;
		left: 40%;
	}
	#AddUser .row{
		padding: 2px;
	}
	#roles_id{
		background-color: rgba(165,165,165,0.9);
	}
</style>
<div id="viewUserContainer">
</div>
	<div>
		<button class="btn" onclick="showAddUser()">Add Users</button>
	</div>
	<div id="AddUser" style="display: none">
		<div>
			<i style="color: red;" id="alertSaveUser"></i>
		</div>
		<div class="row">
			<p class="col3">username:</p> <input type="text" name="username" id="username">
		</div>
		<div class="row">
			<p class="col3">password:</p> <input type="password" name="password" id="password">
		</div>
		<div class="row">
			<p class="col3">roles_id:</p> 
			<select name="roles_id" id="roles_id">
				<?php foreach ($roles as $role):  ?>
					<?php if($role->name =="customers"){ ?>
						<option value="<?php echo $role->id;?>" selected><?php echo $role->name;?></option>
					<?php } else { ?> 
						<option value="<?php echo $role->id;?>" ><?php echo $role->name;?></option>
					<?php } ?>
				<?php endforeach; ?>
			</select>
		</div>
		<button class="btn" onclick="SaveUser()">Save</button>
	</div>
	<div id="page">
		<?php for($i = 1;$i < $max/10+1 ; $i++){?>
		<button class="pages btn-tini " onclick="showUsers(<?php echo $i;?>)"><?php echo $i ?></button>
		<?php } ?>
	</div>
	<div id="result">
		
	</div>
</div>

