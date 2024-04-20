<?php  require_once "./mvc/core/libs.php"; require_once "./mvc/core/route.php";
	class core{
		public function view($view, $data=[]){
			require_once "./mvc/views/".$view.".php";
		}

		public function model($model){
			require_once "./mvc/models/".$model.".php";
			return new $model;
		}

		public function loginSession($session){
			$_SESSION['truyenfull_id'] = $session['id'];
			$_SESSION['truyenfull_user'] = $session['tendangnhap'];
			$_SESSION['truyenfull_quyen'] = $session['role'];
		}

		public function logOut (){
			$_SESSION['truyenfull_id'] ;
			$_SESSION['truyenfull_user'] ;
			$_SESSION['truyenfull_quyen'];
		}
	}
?>