<?php

require_once 'app/model/dangkyModel.php';

class dangkyController
{
    public function index()
    {
        $dangky = new dangkyModel();
        $dangkys = $dangky->getAlldangky();

        include_once 'views/pages/dangky/dangky.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $thumbnail = $_FILES['thumbnail']['name'];
            if (empty($err)) {
                $dangky = new dangkyModel();
                $dangky->adddangky($thumbnail);
    
                // Upload file
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'dangky');
            }
        }
        include_once 'views/pages/dangky/create.php';
    }
    
    //edit product
    public function edit() {
        $dangky_id = $_GET['id'];
        $dangky = new dangkyModel();
        $dangkyData = $dangky->getdangkyById($dangky_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $thumbnail = $dangkyData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
            if (empty($err)) {
                $dangky->editdangky($dangky_id,   $thumbnail);
                header('Location:' . APPURL_ADMIN . 'dangky');
            }
        }
        include_once 'views/pages/dangky/edit.php';
    }

    //delete product
    public function delete() {
        $dangky_id = $_GET['id'];
        $dangky = new dangkyModel();
        $dangky->deletedangky($dangky_id);
        header('Location:' . APPURL_ADMIN . 'dangky');
    }
}