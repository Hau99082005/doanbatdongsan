<?php

require_once 'app/model/baivietModel.php';

class baivietController
{
    public function index()
    {
        $baiviet = new baivietModel();
        $baiviets = $baiviet->getAllbaiviet();

        include_once 'views/pages/baiviet/baiviet.php';
    }

    public function create()
{
    $err = [];
    $data = $_POST;

    if (isset($_POST['submit'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
$pagraph = isset($_POST['pagraph']) ? $_POST['pagraph'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$id_blog = isset($_POST['id_blog']) ? $_POST['id_blog'] : '';
$thumbnail = isset($_FILES['thumbnail']['name']) ? $_FILES['thumbnail']['name'] : '';

        if (empty($id_blog) || !is_numeric($id_blog)) {
            $err[] = "A valid Blog ID is required.";
        }
        if ($thumbnail && $_FILES['thumbnail']['error'] !== 0) {
            $err[] = "Error uploading thumbnail.";
        }

        if (empty($err)) {
            $baiviet = new baivietModel();
            $blogExists = Database::query("SELECT COUNT(*) AS count FROM blog WHERE id = $id_blog")->fetch_assoc();
            if ($blogExists['count'] == 0) {
                $err[] = "The specified Blog ID does not exist.";
            } else {
                $baiviet->addbaiviet($title, $pagraph, $thumbnail, $status, $id_blog);
                if ($thumbnail) {
                    $file = '../assets/images/' . $thumbnail;
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
                }

                header('Location:' . APPURL_ADMIN . 'baiviet');
                exit;
            }
        }
    }

    include_once 'views/pages/baiviet/create.php';
}
    public function edit() {
        $baiviet_id = $_GET['id'];
        $baiviet = new baivietModel();
        $baivietData = $baiviet->getbaivietById($baiviet_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['pagraph'];
            $id_blog = $_POST['id_blog'];
            $status = $_POST['status'];
            $thumbnail = $baivietData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $baiviet->editbaiviet($baiviet_id, $title,$pagraph,  $thumbnail,$status,  $id_blog);
                header('Location:' . APPURL_ADMIN . 'baiviet');
            }
        }
        include_once 'views/pages/baiviet/edit.php';
    }
    public function delete() {
        $baiviet_id = $_GET['id'];
        $baiviet = new baivietModel();
        $baiviet->deletebaiviet($baiviet_id);
        header('Location:' . APPURL_ADMIN . 'baiviet');
    }
}

?>