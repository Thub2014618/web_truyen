<?php
    class home extends core {
        function index(){
            $this->view('trangchu',[
                'title' => 'Đọc truyện hay mới tại đây',
                'page' => 'index',
                'truyenHOT' => $this->model('truyen_Model')->getTruyenHOT(),
                'truyenMoiCapNhat' => $this->model('truyen_Model')->getTruyenMoiCapNhat(),
                'truyenHoanThanh' => $this->model('truyen_Model')->getTruyenHoanThanh(),
                'theLoaiTruyen' => $this->model('TheLoaiTruyen_Model')->getAll(),
            ]);
        }

        function truyen($ten_khongdau){
            $truyen = $this-> model('truyen_Model')->get($ten_khongdau);

            $this->view('trangchu',[
                'title' => 'Truyện'. $truyen['ten'],
                'page' => 'truyen',
                'truyen' => $truyen,
                'cungtacgia' => $this->model('truyen_Model')->TruyenCungTacGia($truyen['tacgia']),
                'chuong' => $this->model('chuong_model')->get($truyen['id']),
                'truyenHOT' => $this->model('truyen_Model')->getTruyenHOT(),
               
            ]);
        }

        function doctruyen($ten_khongdau , $chuong){
            $truyen = $this-> model('truyen_Model')->get($ten_khongdau);
            $chuong = $this->model('chuong_model')->getHome($truyen['id'], $chuong);
            $this->view('trangchu',[
                'title' => 'Truyện'. $truyen['ten'],
                // 'page' => 'truyen',
                'page' => 'doctruyen',
                'truyen' => $truyen,
                'chuong' => $chuong,
               
            ]);
        }
    }
?>