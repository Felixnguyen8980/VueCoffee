<?php
include 'connect.php';
class model extends connectDB{
	public function view(){
		include 'view.php';
	}
	public function product_view(){
		include 'product_view.php';
	}
	public function editusers(){
		include 'editusers.php';
	}
	public function edit(){
		$name = $_POST['name'];
		$pwd = $_POST['password'];
		$sql = "insert into users(name,password) values('$name','$pwd') ";
		 mysqli_query($this->conn,$sql);
		header('Location: index.php?op=editusers');
	}
}
?>