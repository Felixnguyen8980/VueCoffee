<?php
include 'config/connect.php';
Class Admin extends connectDB{

	public function login($username,$password){
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND roles_id= 1";
		$result = mysqli_query($this->conn,$sql);
		while ($obj = mysqli_fetch_object($result))
		return $obj;
	}

	public function users($start,$limit){
		$sql = "SELECT * FROM users ORDER BY id DESC LIMIT $start,$limit ";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
	}

	public function saveUser($username,$password,$role_id){
		$sql = "INSERT INTO users(username,password,roles_id) VALUES ('$username','$password','$role_id')";
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	public function roles(){
		$sql = "SELECT id,name FROM roles";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
	}
	public function categories($start,$limit){
		$sql = "SELECT * FROM categories ORDER BY id DESC LIMIT $start,$limit ";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
	}
	public function saveCategory($name,$image){
		$sql = "INSERT INTO categories(name,image) VALUES ('$name','$image')";
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	public function count($table){
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($this->conn,$sql);
		return $result->num_rows;
	}
	public function SaveProduct($categories_id,$name,$description,$prices,$image){
		$sql = "INSERT INTO products(categories_id,name,description,prices,image) VALUES ('$categories_id','$name','$description','$prices','$image')";
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
	public function product($category,$start,$limit){
		$sql = "SELECT * FROM products WHERE categories_id='$category' ORDER BY id DESC LIMIT $start,$limit ";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
	}
	public function countProduct($category){
		$sql = "SELECT * FROM products WHERE categories_id='$category' ";
		$result = mysqli_query($this->conn,$sql);
		return $result->num_rows;
	}
}
?>