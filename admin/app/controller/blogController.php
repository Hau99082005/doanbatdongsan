<?php

require_once 'app/model/blogModel.php';

class blogController
{
    public function index()
    {
        $blog = new blogModel();
        $blogs = $blog->getAllblog();

        include_once 'views/pages/blog/blog.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['pagaph'];
            $day = $_POST['day'];
            $thumbnail = $_FILES['thumbnail']['name'];
    
            if (empty($err)) {
                $blog = new blogModel();
                $blog->addblog($title, $pagraph, $thumbnail, $day);
    
                $file = '../img/blog/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'blog');
            }
        }
        include_once 'views/pages/blog/create.php';
    }
    
    //edit product
    public function edit() {
        $blog_id = $_GET['id'];
        $blog = new blogModel();
        $blogData = $blog->getblogById($blog_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['pagaph'];
            $day = $_POST['day'];
            $thumbnail = $blogData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../img/blog/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $blog->editblog($blog_id, $title,$pagraph,  $thumbnail,$day);
                header('Location:' . APPURL_ADMIN . 'blog');
            }
        }
        include_once 'views/pages/blog/edit.php';
    }

    //delete product
    public function delete() {
        $blog_id = $_GET['id'];
        $blog = new blogModel();
        $blog->deleteblog($blog_id);
        header('Location:' . APPURL_ADMIN . 'blog');
    }
}