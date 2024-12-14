<?php

require_once 'app/model/baigioithieuModel.php';

class baigioithieuController
{
    public function index()
    {
        $baigioithieu = new baigioithieuModel();
        $baigioithieus = $baigioithieu->getAllbaigioithieu();

        include_once 'views/pages/baigioithieu/baigioithieu.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['pagraph'];
            $thumbnail = $_FILES['thumbnail']['name'];
    
            if (empty($err)) {
                $baigioithieu = new baigioithieuModel();
                $baigioithieu->addbaigioithieu($title, $pagraph, $thumbnail);
    
                $file = '../img/blog/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'baigioithieu');
            }
        }
        include_once 'views/pages/baigioithieu/create.php';
    }
    
    //edit product
    public function edit() {
        $baigioithieu_id = $_GET['id'];
        $baigioithieu = new baigioithieuModel();
        $baigioithieuData = $baigioithieu->getbaigioithieuById($baigioithieu_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['pagraph'];
            $thumbnail = $baigioithieuData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../img/blog/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $baigioithieu->editbaigioithieu($baigioithieu_id, $title,$pagraph,  $thumbnail);
                header('Location:' . APPURL_ADMIN . 'baigioithieu');
            }
        }
        include_once 'views/pages/baigioithieu/edit.php';
    }

    //delete product
    public function delete() {
        $baigioithieu_id = $_GET['id'];
        $baigioithieu = new baigioithieuModel();
        $baigioithieu->deletebaigioithieu($baigioithieu_id);
        header('Location:' . APPURL_ADMIN . 'baigioithieu');
    }
}