<?php

class DBOperation
{
	
	private $con;

	public function __construct(){
		include_once "db.php";
		$db = new Database();
		$this->con = $db->connectDB();
	}
	
	public function addItem($item, $table){
		$pre_stmt = $this->con->prepare("INSERT INTO ? VALUES ('',?)");
		$pre_stmt->bind_param("s,s",$table, $item);
		$result = $pre_stmt->execute();
		if($result){
			return true;
		}
		return 0;
	}
	public function loadAll($table){
		$list = array();
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute();
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}else{
			return "NO_DATA_FOUND";
		}
		return $list;
	}

	public function addProduct($pro_name,$pro_brand,$pro_category,$pro_price,$pro_qty,$date,$status){
		$pre_stmt = $this->con->prepare("INSERT INTO `products` (`pro_name`, `pro_brand`, `pro_category`, `pro_price`, `pro_qty`, `added_date`, `status`) 
			VALUES (?, ?, ?, ?, ?, ?, ?)");
		$status = 1;
		$date = date("Y-m-d");
		$pre_stmt->bind_param("siidisi",$pro_name,$pro_brand,$pro_category,$pro_price,$pro_qty,$date,$status);
		$result = $pre_stmt->execute() or die($this->con->error);
		if($result){
			return "PRODUCT_ADDED";
		}
		return 0;
	}

	public function deleteRecord($table,$key,$id){
		$pre_stmt = $this->con->prepare("DELETE FROM ".$table." WHERE ".$key."= ? ");
		$pre_stmt->bind_param("i",$id);
		$result = $pre_stmt->execute();
		if($result){
			return "DELETED";
		}
		return "NOT_DELETED";
	}

}

?>