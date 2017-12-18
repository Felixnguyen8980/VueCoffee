<style>
	.image_table{	
		width: 30px;
		height: 30px;
	}
</style>
<table id="resultTable">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>image_address</th>
		<th>image</th>
		<th>action</th>
	</tr>
<?php foreach ($result as $category): ?>
	 	<tr>
	 		<td><?php echo $category->id;  ?></td>
	 		<td><?php echo $category->name;  ?></td>
	 		<td><?php echo $category->image;  ?></td>
	 		<td><img class="image_table" src="uploads/image/<?php echo $category->image;?>" alt=""></td>
	 		<td><button class="btn">Edit</button><button class="btn">Delete</button></td>
	 	</tr>
<?php endforeach ?>
</table>
