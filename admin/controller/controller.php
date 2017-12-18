<?php
include ('model/Admin.php');
class controllerAdmin {
	public function handle_request($action){
		if(isset($_SESSION['admin'])){
			switch ($action) {
				case 'logout':
					return $this->logout();
					break;
				case NULL:
					return $this->main();
					break;	
				case 'main':
					return $this->main();
					break;	
				case 'viewUser':
					return $this->viewUser();
					break;
				case 'resultUsers':
					return $this->resultUsers();
					break;
				case 'SaveUser':
					return $this->SaveUser();
					break;
				case 'viewCategories':
					return $this->viewCategories();
					break;
				case 'resultCategories':
					return $this->resultCategories();
					break;
				case 'SaveCategories':
					return $this->SaveCategories();
					break;
				case 'viewProducts':
					return $this->viewProducts();
					break;
				case 'resultProductsGroup':
					return $this->resultProductsGroup();
					break;
				case 'SaveProduct':
					return $this->SaveProduct();
					break;
				case 'resultProduct':
					return $this->resultProduct();
					break;
				case 'productPage':
					return $this->productPage();
					break;	
				default:

					# code...
					break;
			}
		} else {
					if (isset($action) && $action =="login") {
						return $this->login();
					} else {
						return $this->loginform();
					}
		 		}
	}
//LOGIN 
	public function loginform(){
		return include 'view/login.php';
	}
	public function login(){
		$admin = new Admin();
		$result = $admin->login($_POST['username'],md5($_POST['password']));
		if($result!=null){
			if(!isset($_SESSION['admin'])){
				$_SESSION['admin'] = $result;
			}
			header('location: index.php');
		} else {
			 $err = "User does not exit";
			 include 'view/login.php';
		}
	}
	public function logout(){
		session_destroy();
		header('location: index.php');
	}
//LOGIN 
//FUNCTION
	public function view($view){
		$viewOption = $view;
		include 'view/main.php';
	}
	public function main(){
		$view = ['viewpart'=>''];
		return $this->view($view);
	}
	//USER's FUNCTION 
	public function viewUser(){
		$list = new Admin();
		$max = $list->count('users');
		$roles = $list->roles();
		include 'view/viewUser.php';
	}
	public function resultUsers(){
		$start = $_GET['start'];
		$list = new Admin();
		$result = $list->users($start,10);
		include 'view/resultUser.php';
	}
	public function SaveUser(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$roles_id = $_POST['roles_id'];
		$list = new Admin();
		$result =$list->saveUser($username,$password,$roles_id);
		if ($result) {
			echo "Saved";
			return;
		} else {
			echo "Error of invalid";
			return;
		}	
	}
	//CATEGORY's FUNCTION  
	public function viewCategories(){
		$list = new Admin();
		$max = $list->count('categories');
		include 'view/viewCategories.php';
	}
	public function resultCategories(){
		$start = $_GET['start'];
		$list = new Admin();
		$result = $list->categories($start,10);
		include 'view/resultCategories.php';
	}
	public function SaveCategories(){
		if($_FILES['SelectedFile']['type'] != 'image/png' && $_FILES['SelectedFile']['type'] != 'image/jpeg'){
		    echo 'Unsupported filetype uploaded '.$_FILES['SelectedFile']['type'];
		    return;
		}
		if($_FILES['SelectedFile']['size'] > 500000){
		    echo 'File uploaded exceeds maximum upload size.';
		    return;		    
		}
		$target_dir = "uploads/image/";
		$filename = strtotime("now").$_FILES['SelectedFile']['name'];
		if(!move_uploaded_file($_FILES['SelectedFile']['tmp_name'], $target_dir . $filename)){
    		echo 'Error uploading file - check destination is writeable.';
    		return;
		}
		$nameCategori = $_POST['nameCategories'];  
		$list = new Admin();
		$result = $list->saveCategory($nameCategori,$filename); 
		if ($result) {
				echo "Saved";
		} else {
			echo "Error! Something went wrong!";
		}	              
	}
	//PRODUCT's FUNCTION
	public function  viewProducts(){
		$list = new Admin();
		$max = $list->count('categories');
		include 'view/viewProducts.php';
	}
	public function  resultProductsGroup(){
		$start = $_GET['start'];
		$list = new Admin();
		$result = $list->categories($start,5);
		include 'view/resultProductsGroup.php';
	}
	public function SaveProduct(){
		if($_FILES['SelectedFile']['type'] != 'image/png' && $_FILES['SelectedFile']['type'] != 'image/jpeg'){
		    echo 'Unsupported filetype uploaded '.$_FILES['SelectedFile']['type'];
		    return;
		}
		if($_FILES['SelectedFile']['size'] > 500000){
		    echo 'File uploaded exceeds maximum upload size.';
		    return;		    
		}
		$target_dir = "uploads/image/";
		$filename = strtotime("now").$_FILES['SelectedFile']['name'];
		if(!move_uploaded_file($_FILES['SelectedFile']['tmp_name'], $target_dir . $filename)){
    		echo 'Error uploading file - check destination is writeable.';
    		return;
		}
		$group = $_POST['group'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$prices = $_POST['prices'];
		$list = new Admin();
		$result = $list->SaveProduct($group,$name,$description,$prices,$filename); 
		if ($result) {
				echo "Saved";
		} else {
			echo "Error! Something went wrong!";
		}	 
	}
	public function productPage(){
		$list = new Admin();
		$category = $_GET['category'];
		$max = $list->countProduct($category);
		include 'view/viewProductsPage.php';
	}
	public function resultProduct(){
		$category = $_GET['category'];
		$start = $_GET['start'];
		$list = new Admin();
		$result = $list->product($category,$start,6);
		include 'view/resultProducts.php';
	}
//FUNCTION
}
?>