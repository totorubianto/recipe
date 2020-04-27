<?php 

namespace App\Models;

use App\Core\Model;

class User extends Model{
	public function get(){
		$sql="SELECT * FROM recipe";
		$result=$this->db->query($sql);
		return $result;
	}
}