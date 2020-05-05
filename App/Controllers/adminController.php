<?php

namespace App\Controllers;
use App\Core\Controller,
App\Models\User,
App\Models\Admin,
App\Models\Recipe;

class adminController extends Controller {
	public function __construct(){
		$this->User=new User;
		$this->Recipe=new Recipe;
		$this->Admin=new Admin;
	}
	
	public function index(){
		$this->loadTemplateAdmin('admin/hehe');
	}

	public function admin(){
		$admin=$this->Admin->get_admin();
		$this->loadTemplateAdmin('admin/admin', array('admin'=>$admin));
	}

	public function delete(){
		if (isset($_GET['id'])) {
			$id=$_GET['id'];
		} else{
			$id=null;
		}
		var_dump($id);
		$admin=$this->Admin->delete_admin($id);;
	}

	public function add_admin(){
		$data['name']=$_POST['name'];
		$data['email']=$_POST['email'];
		$data['password']=$_POST['password'];
		$data['username']=$_POST['username'];
		echo json_encode($data);
		if ($data['name'] !== "" && $data['email'] !== "" && $data['password'] !== "" && $data['username'] !== "") {
			$result=$this->Admin->add_admin($data['email'], $data['password'], $data['username'], $data['name']);
		}
	}
}
