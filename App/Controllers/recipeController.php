<?php

namespace App\Controllers;
use App\Core\Controller,
App\Models\Recipe;

class recipeController extends Controller {
	public function __construct(){
		$this->Recipe=new Recipe;
	}

	public function add_recipe(){
		$result=$this->Recipe->get_tag();
		$this->loadTemplate("users/add-recipe", array('result'=>$result));
	}

	public function detail(){
		$id = $_GET["id"];
		$result=$this->Recipe->detail($id);
		$this->loadTemplate("users/detail", array('result'=>$result));
	}

	public function checkout() {
		$result=$this->Recipe->get_transaction();
		$this->loadTemplate("users/checkout",array('result'=>$result));
	}

	public function update_transaction(){
		$image = $_FILES['image'];
		$id = $_POST["id"];
		$result=$this->Recipe->update_transaction($id, $image); 
	}

	public function action_save_recipe(){
		$image = $_FILES['image'];
		$cover = $_FILES['cover'];
		$content = $_POST['content'];
		$tag = $_POST['tag'];
		$author = $_POST['users'];
		$title = $_POST['title'];
		$price = $_POST['price'];
		$result=$this->Recipe->action_save_recipe($image, $cover, $content, $tag, $author, $title, $price);
	}

	public function add_transaction() {
		$data['name']=$_POST['name'];
		$data['norek']=$_POST['norek'];
		$data['user']=$_POST['user'];
		$data['recipe']=$_POST['recipe'];
		$data['status']= 0;
		echo json_encode($data);
		$result=$this->Recipe->add_transaction($data);
	}

	public function transaction(){
		$id=$_GET["id"];
		$result=$this->Recipe->detail($id);
		$this->loadTemplate("users/transaction",array('result'=>$result));
	}
}
