<?php 

namespace App\Models;

use App\Core\Model;

class Recipe extends Model{
	public function get_tag(){
		$sql="SELECT * FROM tag";
		$result=$this->db->query($sql);
		return $result;
	}

	public function get_tag_id($id){
		$sql="SELECT * FROM tag WHERE id='$id'";
		$result=$this->db->query($sql);
		$fetch=$result->fetch_assoc();
		return $fetch;
	}

	public function get($category, $search){
		if (!empty($category)) {
			if (!empty($search)) {
				$in = '(' . implode(',', $category) .')';
				$sql="SELECT recipe.id, users.name, recipe.price, users.id as usersId, recipe.description, recipe.title, recipe.image FROM recipe LEFT JOIN users ON users.id = recipe.author WHERE tag IN" . $in . "title LIKE '$search'";
			} else {
				$in = '(' . implode(',', $category) .')';
				$sql="SELECT recipe.id, users.name, recipe.price, users.id as usersId, recipe.description, recipe.title, recipe.image FROM recipe LEFT JOIN users ON users.id = recipe.author WHERE tag IN" . $in;
			}
		}else{
			if (!empty($search)) {
				$sql="SELECT recipe.id, users.name, recipe.price, users.id as usersId, recipe.description, recipe.title, recipe.image FROM recipe LEFT JOIN users ON users.id = recipe.author WHERE title LIKE '$search'";
			} else {
				$sql="SELECT recipe.id, users.name, recipe.price, users.id as usersId, recipe.description, recipe.title, recipe.image FROM recipe LEFT JOIN users ON users.id = recipe.author";
			}
		}
		$result=$this->db->query($sql);
		return $result;
	}

	public function delete($id){
		$sql="DELETE FROM transaction WHERE recipe=$id";
		$result=$this->db->query($sql);
		$sql="DELETE FROM recipe WHERE id=$id";
		$result=$this->db->query($sql);
		var_dump($result, $id);
		// header("location:". BASE . '/admin/admin');
	}

	public function update_transaction($id, $image){
		$imageName = mt_rand() . $image["name"];
		$uploadOk = 1;
		if ($image["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		$checkImage = getimagesize($image["tmp_name"]);
		if($checkImage !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		$targetImage = PUBLIC_DIR. "/proof/". basename($imageName);

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			move_uploaded_file($image["tmp_name"], $targetImage);
			$sql = "UPDATE transaction SET proof='$imageName', status=1 WHERE id='$id'";
			$result=$this->db->query($sql);
			header("location:". BASE . '/recipe/checkout');
			return $result;
		}
		
	}

	public function get_transaction(){
		if(empty($_SESSION['id'])) header("location:". BASE . '/index/login');
		$sql="SELECT transaction.id, transaction.recipe, transaction.user, transaction.date, transaction.status, transaction.norek, transaction.nameRek, transaction.proof, recipe.id as recipeId, recipe.content, recipe.cover, recipe.image, recipe.createdAt, recipe.tag, recipe.author, recipe.title, recipe.price, recipe.description, tag.id as tagId, tag.tagName FROM `transaction` LEFT JOIN recipe ON transaction.recipe = recipe.id LEFT JOIN tag ON recipe.tag = tag.id WHERE transaction.user='$_SESSION[id]'";
		// $sql="SELECT * FROM transaction LEFT JOIN recipe ON 'transaction.recipe' = 'recipe.id'";
		$result=$this->db->query($sql);
		return $result;
	}

	public function detail($id){
		if(empty($id)) header("location:". BASE . '/error');
		$id = $_GET["id"];

		$sql="SELECT * FROM recipe WHERE id='$id'";
		$result=$this->db->query($sql);
		$fetch=$result->fetch_assoc();
		$sql2="SELECT tagName FROM tag WHERE id='$fetch[tag]'";
		$result2=$this->db->query($sql2);
		$fetch2=$result2->fetch_assoc();
		$sql3="SELECT name FROM users WHERE id='$fetch[author]'";
		$result3=$this->db->query($sql3);
		$fetch3=$result3->fetch_assoc();
		$data = array_merge($fetch2, $fetch, $fetch3 );
		return $data;
	}

	public function add_transaction($data) {
		$sql="INSERT INTO transaction (recipe, user, status, norek, nameRek, proof) VALUES ('$data[recipe]', '$data[user]', '$data[status]', '$data[norek]', '$data[name]', '')";
		$result=$this->db->query($sql);
	}

	public function action_save_recipe($image, $cover, $content, $tag, $author, $title, $price){
		$imageName = mt_rand() . $image["name"];
		$coverName = mt_rand() . $cover["name"];
		$uploadOk = 1;
		if ($image["size"] > 500000 || $cover["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		$checkImage = getimagesize($image["tmp_name"]);
		$checkCover = getimagesize($cover["tmp_name"]);
		if($checkImage !== false || $checkCover !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		$targetImage = PUBLIC_DIR. "/image/". basename($imageName);
		$targetCover = PUBLIC_DIR. "/cover/". basename($coverName);

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			move_uploaded_file($image["tmp_name"], $targetImage);
			move_uploaded_file($cover["tmp_name"], $targetCover);
			$sql="INSERT INTO recipe (image, cover, content, tag, author, title, price) VALUES ('$imageName', '$coverName', '$content', '$tag', '$author', '$title', '$price')";
			$result=$this->db->query($sql);
			header("location:". BASE . '/index');
			return $result;
		}
	}
}
