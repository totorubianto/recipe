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

	public function transaction() {
		$result=$this->Admin->get_transaction();
		$this->loadTemplateadmin("admin/transaction",array('result'=>$result));
	}

	public function markcompleted() {
		$id = $_GET['id'];
		$result=$this->Admin->mark($id);
		$this->transaction();
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

	public function edit(){
		$id=$_POST['id'];
		$data['name']=$_POST['name'];
		$data['email']=$_POST['email'];
		$data['password']=$_POST['password'];
		$data['username']=$_POST['username'];
		if ($data['name'] !== "" && $data['email'] !== "" && $data['password'] !== "" && $data['username'] !== "") {
			$result=$this->Admin->edit_admin($id, $data['email'], $data['password'], $data['username'], $data['name']);
		}else{
			echo "<script type='text/javascript'>alert('Isi Semua data');</script>";
		}
		$this->admin();
	}

	public function add_admin(){
		$data['name']=$_POST['name'];
		$data['email']=$_POST['email'];
		$data['password']=$_POST['password'];
		$data['username']=$_POST['username'];
		if ($data['name'] !== "" && $data['email'] !== "" && $data['password'] !== "" && $data['username'] !== "") {
			$result=$this->Admin->add_admin($data['email'], $data['password'], $data['username'], $data['name']);
		}else{
			echo "<script type='text/javascript'>alert('Isi Semua data');</script>";
		}
		$this->admin();
	}
}
