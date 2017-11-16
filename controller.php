<?php 
include 'model/model.php';
class controller{
	public function handle_request() {
		$op = (isset($_GET['op']))? $_GET['op']:NULL;
		switch ($op) {
			case NULL:
				 	$this->view();
				break;
			case 'view':
				 	$this->view();
				break;	
			case 'product_view':
					$this->product_view();
				break;
			case 'editusers':
					$this->editusers();
				break;
			case 'edit':
					$this->edit();
				break;
			default:
				# code...
				break;
		}
	}
	public function view() {
		$model = new model();
		$model->view();
	}
	public function product_view(){
		 $model = new model();
		 $model->product_view();
	}
	public function editusers(){
		 $model = new model();
		 $model->editusers();
	}
	public function edit(){
		 $model = new model();
		 $model->edit();

	}
}
?>