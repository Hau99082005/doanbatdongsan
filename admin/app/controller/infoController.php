<?php

require_once 'app/model/infoModel.php';

class infoController
{
    public function index()
    {
        $info = new infoModel();
        $infos = $info->getAllinfo();

        include_once 'views/pages/info/info.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $product_name = $_POST['name'];
            $thumbnail = $_FILES['thumbnail']['name'];
            $price = $_POST['price'];
            $pagraph = $_POST['pagraph'];
            $status = $_POST['status'];
            $id_info = $_POST['id_info'];
    
            if (empty($err)) {
                $info = new infoModel();
                $info->addinfo($product_name,$thumbnail,$price,$pagraph, $status, $id_info);

                
                // Upload file
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
                header('Location:' . APPURL_ADMIN . 'info');
            }
        }
        include_once 'views/pages/info/create.php';
    }
    
    //edit product
    public function edit() {
        $info_id = $_GET['id'];
        $info = new infoModel();
        $infoData = $info->getinfoById($info_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $product_name = $_POST['name'];
            $thumbnail = $infoData['image'];
            $price = $_POST['price'];
            $pagraph = $_POST['pagraph'];
            $status = $_POST['status'];
            $id_info = $_POST['id_info'];
            

            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
            if (empty($err)) {
                $info->editinfo($info_id, $product_name,$thumbnail,$price,$pagraph,  $status,  $id_info);
                header('Location:' . APPURL_ADMIN . 'info');
            }
        }
        include_once 'views/pages/info/edit.php';
    }

    //delete product
    public function delete() {
        $info_id = $_GET['id'];
        $info = new infoModel();
        $info->deleteinfo($info_id);
        header('Location:' . APPURL_ADMIN . 'info');
    }
}