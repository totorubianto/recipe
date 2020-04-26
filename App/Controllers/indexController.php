<?php

namespace App\Controllers;
use App\Core\Controller,
App\Models\User;

class indexController extends Controller {
	public function __construct(){
		$this->User=new User;
	}
	public function index() {
		$result=$this->User->get();
		$this->loadTemplate('home', array('result'=>$result));
	}

	public function login() {
		$result=$this->User->get();
		$this->loadTemplate2('users/login', array('result'=>$result));
	}

	public function register() {
		$result=$this->User->get();
		$this->loadTemplate2('users/register', array('result'=>$result));
	}

	public function action_login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$result=$this->User->action_login($email, $password);
	}

	public function action_register(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_confirmation = $_POST['password_confirmation'];
		$username = $_POST['username'];
		$result=$this->User->action_register($email, $password, $password_confirmation, $username);
		$this->register();
	}

	public function action_logout(){
		$result=$this->User->action_logout();
	}
}
