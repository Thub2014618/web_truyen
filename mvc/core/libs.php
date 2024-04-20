<?php  require_once "./mvc/core/route.php"; require_once "./mvc/models/dbCon.php";
	define('SALT', '123123$');

	function public_patch($patch){
		echo APP_URL.'public/'.$patch;
	}

        function storage_patch($patch){
		echo APP_URL.'storage/'.$patch;
	}

	function redirect($link, $message=null){
		if($message != null){
			setcookie("message", $message, time() + 2, "/");
		}

		return header("location: " . $link);
	}

	function active($link, $active){
		if(strlen(strstr($_GET['url'], $link)) > 0){
			echo $active;
		}
	}

	function Slug($str) {
                if(!$str) return false;
                
                $utf8 = array(

                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

                'd'=>'đ|Đ',

                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

                'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',);

                foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i", $ascii, $str);
                        $str = str_replace(" ", "-", $str);
                        $str = str_replace("/", "", $str);
                        $str = str_replace("'", "", $str);
                        $str = strtolower($str);
                        return $str;
	}

	function DateToTime($date){
                $to_time = strtotime($date);
                $from_time = strtotime(date("Y-m-d H:i:s"));
                $second = abs($to_time - $from_time);

                $time = 0;

                if($second < 60){
                        $time = $second;
                        return $time." giây trước";
                }
                else if($second > 60 && $second < 3600){  //minute
                        $time = floor($second/60);
                        return $time." phút trước";
                }
                else if($second > 3600 && $second < 86400){//hour
                        $time = floor($second/3600);
                        return $time." giờ trước";
                }
                else if($second > 86400 && $second < 2678400){ //day
                        $time = floor($second/86400);
                        return $time." ngày trước";
                }
                else if($second > 2678400 && $second < 32140800){//month
                        $time = floor($second/2678400);
                        return $time." tháng trước";
                }
                else{//year
                        $arr = explode('-', $date);
                        $truoc = $arr[0];
                        $curr = date("Y");
                        $time = $curr - $truoc;
                        return $time." năm trước";
                }
        }

        function getTheLoai($truyen_id){
                $conn = new dbCon();
                $conn = $conn->connect();

                try{
                        $query = "SELECT ten FROM truyen_theloai WHERE truyen_id = :truyen_id";
                        $cmd = $conn->prepare($query);
                        $cmd->bindValue(":truyen_id", $truyen_id);
                        $cmd->execute();

                        $theloai = $cmd->fetchAll();
                        $result = "";
                        $i = 1;

                        foreach($theloai as $val){
                        if($i < count($theloai))
                                $result .= '<a href="#">'.$val["ten"].'</a>, ';
                        else
                        $result .= '<a href="#">'.$val["ten"].'</a>'; 
                        $i++;
                        }

                        echo $result;

                }catch(PDOException $e){
                        return $e->getMessage();
                }
        }
        
        function getTheLoai_Header(){
                $conn = new dbCon();
                $conn = $conn->connect();
            
               try{
                    $query = "SELECT * FROM theloaitruyen ORDER BY ten ASC";
                    $cmd = $conn->prepare($query);
                    $cmd->execute();
            
                    return $cmd->fetchAll();
            
                }catch(PDOException $e){
                        return $e->getMessage();
                }
        }
            
        function getTheLoai_HOME($truyen_id){
                $conn = new dbCon();
                $conn = $conn->connect();
                
                try{
                        $query = "SELECT ten FROM truyen_theloai WHERE truyen_id = :truyen_id";
                        $cmd = $conn->prepare($query);
                        $cmd->bindValue(":truyen_id", $truyen_id);
                        $cmd->execute();
                
                        $theloai = $cmd->fetchAll();
                        $result = "";
                        $i = 1;
                
                        foreach($theloai as $val){
                        if($i < count($theloai))
                                $result .= '<a itemprop="genre" href="#">'.$val['ten'].'</a>, ';
                        else
                                $result .= '<a itemprop="genre" href="#">'.$val['ten'].'</a>'; 
                        $i++;
                        }
                
                        echo $result;
                
                }catch(PDOException $e){
                        return $e->getMessage();
                }
        }  
        
        function getTenChuong($str){
                $arr = explode(':', $str);
                return $arr[0];
        }

        function tachSoChuong($str){
                $arr = explode('-', $str);
                return $arr[1];
        }

        function checkChuongSau($truyen_id, $soChuong){
                $conn = new dbCon();
                $conn = $conn->connect();
                
                try{
                        $query = "SELECT FROM chuong WHERE id = :id AND ten_khongdau = :ten_khongdau";
                        $cmd = $conn->prepare($query);
                        $cmd->bindValue(":id", $truyen_id);
                        $cmd->bindValue(":ten_khongdau", "chuong-".$soChuong);
                        $cmd->execute();

                        if($cmd->rowCount()>0){
                                return true;
                        }else 
                                return false;

                }catch(PDOException $e){
                        return $e->getMessage();
                }
        }

        function checkChuong($truyen_id, $soChuong){
                $conn = new dbCon();
                $conn = $conn->connect();
            
                try{
                    $query = "SELECT * FROM chuong WHERE truyen_id = :truyen_id AND ten_khongdau = :ten_khongdau";
                    $cmd = $conn->prepare($query);
                    $cmd->bindValue(":truyen_id", $truyen_id);
                    $cmd->bindValue(":ten_khongdau", "chuong-".$soChuong);
                    $cmd->execute();
            
                    if($cmd->rowCount() > 0){
                        return true;
                    }else{
                        return false;
                    }
            
                }catch(PDOException $e){
                    return $e->getMessage();
                }
            }
            
            function disable($truyen_id, $soChuong){
                if(checkChuong($truyen_id, $soChuong) == false){
                    echo 'disabled';
                }
            }

?>