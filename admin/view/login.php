<!DOCTYPE html>
<html lang="vi-vn" >
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" type="text/css" href="view/style/login.css">
</head>
<body>
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Vue<span>Coffee</span></div>
		</div>
		<br>
		<div class="login">
			<div><?php  if(isset($err)) {echo $err;} ?></div>
			<form method="post" action="index.php?action=login">
				<input type="text" placeholder="username" name="username"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" name="submit" value="login">
			</form>	
		</div>
 
</body>
</html>
