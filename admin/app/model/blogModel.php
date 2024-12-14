<?php

require_once '../config/connect.php';


class blogModel {

    // get all product
    public function getAllblog() {
        $sql = "SELECT * FROM blog";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getblogById($id) {
        $sql = "SELECT * FROM blog WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addblog($title,$pagraph, $images, $day) {
        $sql = "INSERT INTO blog (image, title, pagaph,day) VALUES ('$images', '$title','$pagraph','$day')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editblog($id,$title,$pagraph, $images, $day) {
        $sql = "UPDATE blog SET image = '$images', title = '$title', pagaph = '$pagraph',day = '$day' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deleteblog($id) {
        $sql = "DELETE FROM blog WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}