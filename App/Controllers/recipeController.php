<?php

namespace App\Controllers;
use App\Core\Controller,
App\Models\User;

class recipeController extends Controller {
	public function __construct(){
		$this->User=new User;
	}
	
	public function add_recipe(){
		$this->loadTemplate("users/add-recipe");
	}

	public function action_logout(){
		$result=$this->User->action_logout();
	}
}
