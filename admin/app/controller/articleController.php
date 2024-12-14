<?php

require_once 'app/model/articleModel.php';

class articleController
{
    public function index()
    {
        $article = new articleModel();
        $articles = $article->getAllarticle();

        include_once 'views/pages/article/article.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['paragraph'];
            $status = $_POST['status'];
            $id_article = $_POST['id_article'];
            $thumbnail = $_FILES['thumbnail']['name'];
    
            if (empty($err)) {
                $article = new articleModel();
                $article->addarticle($title, $pagraph, $thumbnail, $status, $id_article);
    
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'article');
            }
        }
        include_once 'views/pages/article/create.php';
    }
    
    //edit product
    public function edit() {
        $article_id = $_GET['id'];
        $article = new articleModel();
        $articleData = $article->getarticleById($article_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $pagraph = $_POST['paragraph'];
            $status = $_POST['status'];
            $id_article = $_POST['id_article'];
            $thumbnail = $articleData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $article->editarticle($article_id, $title,$pagraph,  $thumbnail,$status,  $id_article);
                header('Location:' . APPURL_ADMIN . 'article');
            }
        }
        include_once 'views/pages/article/edit.php';
    }

    //delete product
    public function delete() {
        $article_id = $_GET['id'];
        $article = new articleModel();
        $article->deletearticle($article_id);
        header('Location:' . APPURL_ADMIN . 'article');
    }
}