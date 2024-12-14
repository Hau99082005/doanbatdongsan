<?php

require_once '../config/connect.php';


class bannerModel {

    // get all product
    public function getAllBanner() {
        $sql = "SELECT * FROM banner";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getBannerById($id) {
        $sql = "SELECT * FROM banner WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addBanner($images_banner) {
        $sql = "INSERT INTO banner (image) VALUES ('$images_banner')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editBanner($id, $images_banner) {
        $sql = "UPDATE banner SET image = '$images_banner' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deleteBanner($id) {
        $sql = "DELETE FROM banner WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}