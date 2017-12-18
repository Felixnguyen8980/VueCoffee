<?php
include 'user/config/connect.php';
Class User extends connectDB{
	public function categories(){
		$sql = "SELECT * FROM categories";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
	}

	public function resultProducts(){
		$sql = "SELECT * FROM products";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array;
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
	public function upOrder($phone,$address,$status_id,$timescreate){
		$sql ="INSERT INTO orders(phone,address,status_id,timescreate) VALUES ('$phone','$address','$status_id','$timescreate')";
		$result = mysqli_query($this->conn,$sql);
	}
	public function findOder($timescreate){
		$sql ="SELECT id FROM orders WHERE timescreate='$timescreate' ";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array[0];
	}

	public function getPrices($productID){
		$sql = "SELECT prices FROM products WHERE id='$productID' ";
		$result = mysqli_query($this->conn,$sql);
		$array = array();
		while ($obj = mysqli_fetch_object($result)){
			$array[]=$obj;
		}
		return $array[0]->prices;
	}

	public function addOrderDetail($productID,$quantity,$orderID){
		$price=$this->getPrices($productID);
		$sql ="INSERT INTO orders_details(products_id,	orders_id,	quantities,	prices) VALUES ('$productID','$orderID','$quantity','$price')";
		$result = mysqli_query($this->conn,$sql);
	}
}
?>