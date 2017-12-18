<table>
	<tr>
		<th>id</th>
		<th>username</th>
		<th>password</th>
		<th>roles_id</th>
		<th>Action</th>
	</tr>
<?php foreach ($result as $user): ?>
	 	<tr>
	 		<td><?php echo $user->id;  ?></td>
	 		<td><?php echo $user->username;  ?></td>
	 		<td><?php echo $user->password;  ?></td>
	 		<td><?php echo $user->roles_id;  ?></td>
	 		<td><button class="btn">Edit</button><button class="btn">Delete</button></td>
	 	</tr>
<?php endforeach ?>
</table>
