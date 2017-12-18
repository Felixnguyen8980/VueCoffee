
<!DOCTYPE html>
<html>
<head>
	<title>main</title>
	<link rel="stylesheet" type="text/css" href="view/style/main.css">
	<script src="view/js/viewUser.js"></script>
	<script src="view/js/viewCategories.js"></script>
	<script src="view/js/viewProducts.js"></script>
</head>
<body>
	<div id="container">
		<header>
			<div class="row">
				<div class="col1"></div>
				<div class="logo col3 element">
					<div class="flexbox" style="align-items: center;">
						<a href=""><i class="home">The VueCoffee</i></a>
					</div>
				</div>
				<div class="tool col5 element">
					<ul class="row">
						<li class="col2"></li>
						<li class="col2"></li>
						<li class="col2">
							<a class="option" onclick="OpenOption(event,'Message')"><p>Message</p></a>
						</li>
						<li class="col2">
							<a  class="option" onclick="OpenOption(event,'Notification')" ><p>Notification</p></a>
						</li>
						<li class="col2">
							<a class="option" onclick="OpenOption(event,'Account')"><p>Account</p></a>
							<div class="dropdown" id="Account" style="display: none">
								<div>
									Avatar
								</div>
								<div id="Logout" >
									<a href="index.php?action=logout">Logout</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="col1"></div>
			</div>
		</header>
		<div class="box" id="boxContent">
			<div id="sidebar">
				<ul>
					<li>
						<button id="Users" class="Selector" onclick="OpenSelector('Users')"><a href="#Users">Users</a></button>
					</li>
					<li>
						<button id="Categories" class="Selector" onclick="OpenSelector('Categories')"><a href="#Categories">Categories</a></button>
					</li>
					<li>
						<button id="Products" class="Selector" onclick="OpenSelector('Products')"><a href="#Products">Products</a></button>
					</li>
					<li>
						<button id="News" class="Selector" onclick="OpenSelector('News')"><a href="#News">News</a></button>
					</li>
				</ul>
			</div>
			<div id="mainContent">
				
			</div>
		</div>
	</div>
<script type="text/javascript" src="view/js/main.js"></script>
</body>
</html>		
