<?php

require_once 'app/model/bannerModel.php';

class bannerController
{
    public function index()
    {
        $banner = new bannerModel();
        $banners = $banner->getAllBanner();

        include_once 'views/pages/banner/banner.php';
    }

    public function create() {
        $err = [];
        $data = $_POST;
        
        if (isset($_POST['submit'])) {
            $thumbnail = $_FILES['thumbnail']['name'];
            if (empty($err)) {
                $banner = new bannerModel();
                $banner->addBanner(  $thumbnail);
    
                // Upload file
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
    
                header('Location:' . APPURL_ADMIN . 'banner');
            }
        }
        include_once 'views/pages/banner/create.php';
    }
    
    //edit product
    public function edit() {
        $banner_id = $_GET['id'];
        $banner = new bannerModel();
        $bannerData = $banner->getBannerById($banner_id)->fetch_assoc();
        $err = [];
    
        if (isset($_POST['submit'])) {
            $thumbnail = $bannerData['image'];
    
            if ($_FILES['thumbnail']['error'] == 0) {
                $thumbnail = $_FILES['thumbnail']['name'];
                $file = '../assets/images/' . $_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $file);
            }
    
            if (empty($err)) {
                $banner->editBanner($banner_id,   $thumbnail);
                header('Location:' . APPURL_ADMIN . 'banner');
            }
        }
        include_once 'views/pages/banner/edit.php';
    }

    //delete product
    public function delete() {
        $banner_id = $_GET['id'];
        $banner = new bannerModel();
        $banner->deleteBanner($banner_id);
        header('Location:' . APPURL_ADMIN . 'banner');
    }
}