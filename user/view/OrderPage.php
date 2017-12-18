<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VueCoffee Order page</title>
	<link rel="stylesheet" href="user/view/style/master.css">
	<link rel="stylesheet" href="user/view/style/OrderPage.css">
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
</head>
<body>
	<div class="row" id="containerOderPage">
		
		<div class="col7" id="Menu">
			<div class="row">
				<div class="col3" id="Categories">
					
				</div>
				<div class="col7" id="Products">
					
				</div>
			</div>
		</div>
		<div class="col3">
			<div id="OderSide">
				<div id="Cart">
					<button class="btn" onclick="showdetailCart()">Cart</button>
				</div>
				<div id="detailCart" style="display: none">
					<p>YOUR CART</p>
					<div id="infoCart">
						
					</div>
				</div>
				<div id="pannel">
					<p style="color: white">VUE</p>
					<p style="color: #00ceff">COFFEE</p>
				</div>
				<div id="inforOder">
					<div class="box" name="inforCustomer">
						<i id="alertInfoOrder"></i>
						<div class="row">
							<div class="col3"></div>
							<div class="col4">
								<input class="textbox" type="text" id="phone" name="phone" placeholder="phone">
							</div>
							<div class="col3"></div>
						</div>
						<div class="row">
							<div class="col3"></div>
							<div class="col4">
								<input class="textbox" type="text" id="address" name="address" placeholder="address">
							</div>
							<div class="col3"></div>
						</div>
					</div>
					<div id="Order">
						<button id="btnOder" class="btn" onclick="Order()">Oder</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="user/view/js/OrderPage.js"></script>
</html>