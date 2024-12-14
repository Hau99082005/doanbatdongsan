<?php

require_once 'app/model/posterModer.php';

class posterController
{
    public function index()
    {
        $poster = new posterModel();
        $posters = $poster->getAllposter();

        include_once 'views/pages/poster/poster.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $thumbnail = $_FILES['thumbnail']['name'];
            if (empty($err)) {
                $poster = new posterModel();
                $poster->addposter(  $thumbnail);
    
                // Upload file
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'poster');
            }
        }
        include_once 'views/pages/poster/create.php';
    }
    
    //edit product
    public function edit() {
        $poster_id = $_GET['id'];
        $poster = new posterModel();
        $posterData = $poster->getposterById($poster_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $thumbnail = $posterData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $poster->editposter($poster_id,   $thumbnail);
                header('Location:' . APPURL_ADMIN . 'poster');
            }
        }
        include_once 'views/pages/poster/edit.php';
    }

    //delete product
    public function delete() {
        $poster_id = $_GET['id'];
        $poster = new posterModel();
        $poster->deleteposter($poster_id);
        header('Location:' . APPURL_ADMIN . 'poster');
    }
}