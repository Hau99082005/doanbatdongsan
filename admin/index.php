
<?php
session_start();

require_once 'app/controller/productController.php';
require_once 'app/controller/auth/loginController.php';
require_once 'app/controller/bannerController.php';
require_once 'app/controller/orderController.php';
require_once 'app/controller/categoriesController.php';
require_once 'app/controller/baivietController.php';
require_once 'app/controller/blogController.php';
require_once 'app/controller/baigioithieuController.php';
require_once 'app/controller/articleController.php';
require_once 'app/controller/contactController.php';
require_once 'app/controller/dangnhapController.php';
require_once 'app/controller/dangkyController.php';
require_once 'app/controller/posterController.php';
require_once 'app/controller/infoController.php';

define('APPURL_ADMIN', '/batdongsan/admin/');
define('APPURL', '/batdongsan/');

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', trim($url, '/')); 

$url = explode('?', $url[2]);
// echo var_dump($url);
if (!isset($_SESSION['user-admin'])) {
    if ($url[0] == 'login') {
        $login = new loginController();
        $login->index();
    } else {
        header('Location:' . APPURL_ADMIN . 'login');
    }
}





//init controller
$info = new infoController();
$product = new productController();
$banner = new bannerController();
$orderCtl = new orderController();
$categories = new CategoriesController();
$baiviet = new baivietController();
$blog = new blogController();
$baigioithieu = new baigioithieuController();
$article = new articleController();
$contact = new contactController();
$dangnhap = new dangnhapController();
$dangky = new dangkyController();
$poster = new posterController();

switch ($url[0]) {    
    case '':
        require_once 'views/home.php';
        break;
    //auth route
    case 'login':
        $login = new loginController();
        $login->index();
        break;
    case 'logout':
        session_destroy();
        header('Location:' . APPURL_ADMIN . 'login');
        break;

    //product route
    case 'product':
        $product->index();
        break;
    case 'create-product':
        $product->create();
        break;
    case 'edit-product':
        $product->edit();
        break;
    case 'delete-product':
        $product->delete();
        break;
 //oder route
 case 'order':
    $orderCtl->index();
    break;
case 'order-detail':
    if (isset($_GET['id'])) {
        $orderCtl->show($_GET['id']);
    }else{
        header('Location:' . APPURL_ADMIN . 'order');
    }
    break;
// Check for the 'delete' action in the URL and call the delete method in the controller
case 'order-delete':
if (isset($_GET['id'])) {
    $orderCtl->delete();
} else {
    header('Location: ' . APPURL_ADMIN . 'order');
}
break;

    //banner route
    case 'banner':
        $banner->index();
        break;
    case 'create-banner':
        $banner->create();
        break;
    case 'edit-banner':
        $banner->edit();
        break;
    case 'delete-banner':
        $banner->delete();
        break;
    //info router//
    case 'info':
        $info->index();
        break;
    case 'create-info':
        $info->create();
        break;
    case 'edit-info':
        $info->edit();
        break;
    case 'delete-info':
        $info->delete();
        break;
    //poster router
    case 'poster':
        $poster->index();
        break;
    case 'create-poster':
        $poster->create();
        break;
    case 'edit-poster':
        $poster->edit();
        break;
    case 'delete-poster':
        $poster->delete();
        break;
    //categories route
    case 'categories':
        $categories->index();
        break;
    case 'create-categories':
        $categories->create();
        break;
    case 'edit-categories':
        $categories->edit();
        break;
    case 'delete-categories':
        $categories->delete();
        break;
    //baiviet route
    case 'baiviet':
        $baiviet->index();
        break;
    case 'create-baiviet':
        $baiviet->create();
        break;
    case 'edit-baiviet':
        $baiviet->edit();
        break;
    case 'delete-baiviet':
        $baiviet->delete();
        break;
    //blog route
    case 'blog':
        $blog->index();
        break;
    case 'create-blog':
        $blog->create();
        break;
    case 'edit-blog':
        $blog->edit();
        break;
    case 'delete-blog':
        $blog->delete();
        break;
    //baigioithieu route
    case 'baigioithieu':
        $baigioithieu->index();
        break;
    case 'create-baigioithieu':
        $baigioithieu->create();
        break;
    case 'edit-baigioithieu':
        $baigioithieu->edit();
        break;
    case 'delete-baigioithieu':
        $baigioithieu->delete();
        break;
    //article route
    case 'article':
        $article->index();
        break;
    case 'create-article':
        $article->create();
        break;
    case 'edit-article':
        $article->edit();
        break;
    case 'delete-article':
        $article->delete();
        break;
    case 'contact':
        $contact->index();
        break;
    case 'create-contact':
        $contact->create();
        break;
    case 'edit-contact':
        $contact->edit();
        break;
    case 'delete-contact':
        $contact->delete();
        break;
    //dangnhap route
    case 'dangnhap':
        $dangnhap->index();
        break;
    case 'create-dangnhap':
        $dangnhap->create();
        break;
    case 'edit-dangnhap':
        $dangnhap->edit();
        break;
    case 'delete-dangnhap':
        $dangnhap->delete();
        break;
    //dangky route
    case 'dangky':
        $dangky->index();
        break;
    case 'create-dangky':
        $dangky->create();
        break;
    case 'edit-dangky':
        $dangky->edit();
        break;
    case 'delete-dangky':
        $dangky->delete();
        break;
    default:
        require_once 'views/404.php';
        break;
}
