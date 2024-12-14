<?php

require_once '../config/connect.php';


class dangnhapModel {

    // get all product
    public function getAlldangnhap() {
        $sql = "SELECT * FROM dangnhap";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getdangnhapById($id) {
        $sql = "SELECT * FROM dangnhap WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function adddangnhap($images_banner) {
        $sql = "INSERT INTO dangnhap (image) VALUES ('$images_banner')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editdangnhap($id, $images_banner) {
        $sql = "UPDATE dangnhap SET image = '$images_banner' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deletedangnhap($id) {
        $sql = "DELETE FROM dangnhap WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}