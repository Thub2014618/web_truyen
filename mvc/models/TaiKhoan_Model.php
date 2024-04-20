<?php  require_once "./mvc/core/libs.php";
	class TaiKhoan_Model extends dbCon{
		private $TaiKhoan;

		function __construct(){
			$this->TaiKhoan = new dbCon();
			$this->TaiKhoan = $this->TaiKhoan->connect();
		}

		public function them($tendangnhap, $matkhau){
			try{
				$query = "INSERT INTO tbl_users(tendangnhap, matkhau) VALUES (:tendangnhap, :matkhau)";
				$cmd = $this->TaiKhoan->prepare($query);
				$cmd->bindValue(":tendangnhap", $tendangnhap);
				$cmd->bindValue(":matkhau", sha1(SALT.$matkhau));
				$cmd->execute();
				return $cmd->rowCount();

			}catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function get($tendangnhap){
			try{
				$query = "SELECT * FROM tbl_users WHERE tendangnhap = :tendangnhap";
				$cmd = $this->TaiKhoan->prepare($query);
				$cmd->bindValue(":tendangnhap", $tendangnhap);
				$cmd->execute();
				return $cmd->fetch();

			}catch(PDOException $e){
				return $e->getMessage();
			}
		}

		public function DangNhap($tendangnhap, $matkhau){
			try{
				$query = "SELECT * FROM tbl_users WHERE tendangnhap = :tendangnhap AND matkhau = :matkhau";
				$cmd = $this->TaiKhoan->prepare($query);
				$cmd->bindValue(":tendangnhap", $tendangnhap);
				$cmd->bindValue(":matkhau", sha1(SALT.$matkhau));
				$cmd->execute();
		
				if($cmd->rowCount() > 0){
					return true;
				}
		
				return false;
		
			}catch(PDOException $e){
				return $e->getMessage();
			}
		}

		
	}
?>