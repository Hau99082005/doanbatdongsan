<?php

require_once 'app/model/dangnhapModel.php';

class dangnhapController
{
    public function index()
    {
        $dangnhap = new dangnhapModel();
        $dangnhaps = $dangnhap->getAlldangnhap();

        include_once 'views/pages/dangnhap/dangnhap.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $thumbnail = $_FILES['thumbnail']['name'];
            if (empty($err)) {
                $dangnhap = new dangnhapModel();
                $dangnhap->adddangnhap(  $thumbnail);
    
                // Upload file
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'dangnhap');
            }
        }
        include_once 'views/pages/dangnhap/create.php';
    }
    
    //edit product
    public function edit() {
        $dangnhap_id = $_GET['id'];
        $dangnhap = new dangnhapModel();
        $dangnhapData = $dangnhap->getdangnhapById($dangnhap_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $thumbnail = $dangnhapData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $dangnhap->editdangnhap($dangnhap_id,   $thumbnail);
                header('Location:' . APPURL_ADMIN . 'dangnhap');
            }
        }
        include_once 'views/pages/dangnhap/edit.php';
    }

    //delete product
    public function delete() {
        $dangnhap_id = $_GET['id'];
        $dangnhap = new dangnhapModel();
        $dangnhap->deletedangnhap($dangnhap_id);
        header('Location:' . APPURL_ADMIN . 'dangnhap');
    }
}