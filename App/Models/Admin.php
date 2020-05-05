<?php 

namespace App\Models;

use App\Core\Model;

class Admin extends Model{
	public function get_admin(){
		$sql="SELECT * FROM users WHERE role='ADMIN'";
		$result=$this->db->query($sql);
		return $result;
	}
	public function delete_admin($id){
		$sql="DELETE FROM recipe WHERE author=$id";
		$result=$this->db->query($sql);
		$sql="DELETE FROM transaction WHERE user=$id";
		$result=$this->db->query($sql);
		$sql="DELETE FROM users WHERE id=$id";
		$result=$this->db->query($sql);
		header("location:". BASE . '/admin/admin');		
	}

	public function add_admin($email, $password, $username, $name ){
		$sql_check="SELECT * FROM users WHERE email='$email'";
		$result_check=$this->db->query($sql_check);
		$fetch=$result_check->fetch_assoc();
		if($fetch > 0){
			echo "<script type='text/javascript'>alert('email sudah terdaftar');</script>";
			return $fetch;
		}
		$sql="INSERT INTO users (email, password, role, username, name) VALUES ('$email', '$password', 'ADMIN', '$username', '$name');";
		$result=$this->db->query($sql);
		// header("location:". BASE . '/admin/admin');
	
	}
}