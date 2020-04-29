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

	public function transaction(){
		$id=$_GET["id"];
		$result=$this->Recipe->detail($id);
		$this->loadTemplate("users/transaction",array('result'=>$result));
	}
}
