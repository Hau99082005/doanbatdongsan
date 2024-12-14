<?php

require_once '../config/connect.php';


class baigioithieuModel {

    // get all product
    public function getAllbaigioithieu() {
        $sql = "SELECT * FROM baigioithieu";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getbaigioithieuById($id) {
        $sql = "SELECT * FROM baigioithieu WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addbaigioithieu($title,$pagraph, $images) {
        $sql = "INSERT INTO baigioithieu (title, pagraph, image) VALUES ('$title', '$pagraph','$images')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editbaigioithieu($id,$title,$pagraph, $images) {
        $sql = "UPDATE baigioithieu SET image = '$images', title = '$title', pagraph = '$pagraph' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deletebaigioithieu($id) {
        $sql = "DELETE FROM baigioithieu WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}