<?php
include 'user/model/User.php';
class controllerUser{
	public function handle_request($action){
		switch ($action) {
			case Null:
				return $this->home();
				break;
			case "OrderPage":
				return $this->OrderPage();
				break;
			case "resultCategories":
				return $this->resultCategories();
				break;
			case "resultProducts":
				return $this->resultProducts();
				break;
			case "viewProductsPage":
				return $this->viewProductsPage();
				break;
			case "products":
				return $this->products();
				break;
			case "Order":
				return $this->Order();
				break;
			default:
				echo $action;
				break;
		}
	}
	public function home(){
		include "user/view/home.php";
	}
	public function OrderPage(){
		include "user/view/OrderPage.php";
	}
	public function resultCategories(){
		$user = new User();
		$result = $user->categories();
		echo json_encode($result);
	}
	public function resultProducts(){
		$user = new User();
		$result = $user->resultProducts();
		echo json_encode($result);
	}
	public function viewProductsPage(){
		$list = new User();
		$category = $_GET['category'];
		$max = $list->countProduct($category);
		include 'user/view/viewProductsPage.php';
	}
	public function products(){
		$category = $_GET['category'];
		$start = $_GET['start'];
		$list = new User();
		$result = $list->product($category,$start,6);
		include 'user/view/resultProducts.php';
	}
	public function Order(){
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$products=explode(",", $_POST['product']);
		$quantity=explode(",", $_POST['quantity']);
		$timescreate=strtotime('now');
		$list = new User();
		$result = $list->upOrder($phone,$address,1,$timescreate);
		$OderId = $list->findOder($timescreate);

		for($i=0;$i< count($quantity) ;$i++){
			$add=$list->addOrderDetail($products[$i],$quantity[$i],$OderId->id);
		}
		echo "dat hang thong cong";
	}
}
?>