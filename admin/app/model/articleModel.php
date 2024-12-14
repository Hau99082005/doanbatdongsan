<?php

require_once '../config/connect.php';


class articleModel {

    // get all product
    public function getAllarticle() {
        $sql = "SELECT * FROM article";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getarticleById($id) {
        $sql = "SELECT * FROM article WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addarticle($title,$pagraph, $images, $status,$id_article) {
        $sql = "INSERT INTO article(image, title, paragraph,id_article,	status) VALUES ('$images', '$title','$pagraph','$id_article' ,'$status')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editarticle($id, $title,$pagraph, $images, $status,$id_article) {
        $sql = "UPDATE article SET image = '$images', title = '$title', paragraph = '$pagraph',id_article = '$id_article',status  = '$status' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deletearticle($id) {
        $sql = "DELETE FROM article WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}