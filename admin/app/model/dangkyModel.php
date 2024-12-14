<?php

require_once '../config/connect.php';


class dangkyModel {

    // get all product
    public function getAlldangky() {
        $sql = "SELECT * FROM dangky";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getdangkyById($id) {
        $sql = "SELECT * FROM dangky WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function adddangky($images_banner) {
        $sql = "INSERT INTO dangky (image) VALUES ('$images_banner')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editdangky($id, $images_banner) {
        $sql = "UPDATE dangky SET image = '$images_banner' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deletedangky($id) {
        $sql = "DELETE FROM dangky WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}