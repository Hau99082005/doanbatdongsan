<?php
    session_start();
   include 'config/connect.php';
    class cart {
        public $id, $name, $image, $price, $quantity;
        function __construct($id, $name, $image, $price, $quantity) {
          $this->id = $id;
          $this->name = $name;
          $this->image = $image;
          $this->price = $price;
          $this->quantity = $quantity;

        }
    }
    function _header($title){
        $s = '
    <!DOCTYPE html>
    <html lang="zxx">
    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="asset/icon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="asset/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="asset/icon/favicon-16x16.png">
    <link rel="manifest" href="asset/icon/site.webmanifest">
    <link rel="stylesheet" href="boottrap/css/bootstrap.min.css">
    <script src="boottrap/js/bootstrap.bundle.js"></script>
    <script src="boottrap/js/bootstrap.min.js"></script>
    <title>'.$title.'</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
   </head>
    <body>
        ';
        echo $s;
    }
    function _footer(){
        $s = '
         <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="asset/icon/logo.jpg" alt="" width="100px" height="100px"></a>
                        </div>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Hỗ trợ khách hàng</h6>
                        <ul>
                            <li><a href="index.php">Chính sách và điều khoản</a></li>
                            <li><a href="index.php">Hướng dẫn mua hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Liên Hệ</h6>
                        <div class="footer__newslatter">
                            <form action="#" action="methopd">
                                <input type="text" placeholder="email của bạn">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
                        <p>©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                             bản quyền thuộc về <i class="fa fa-heart-o"
                            aria-hidden="true"></i><a href="index.php" target="_blank">Home Page</a>
                        </p>
                        <!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
        ';
        echo $s;
    }
    function navbar(){
        if(isset($_GET['id_product'])) {
            addtoCartProduct($_GET['id_product']);
        }
        if(isset($_GET['clear'])) {
            unset($_SESSION['cart']);
        }
        $q_categories = Database::query("SELECT * FROM `categories`");
        while ($r_category = $q_categories->fetch_array()) {
        $s = '
        <div class="offcanvas-menu-overlay"></div>
        <div class="offcanvas-menu-wrapper">
            <div class="offcanvas__nav__option">
                <a href="giohang.php"><img src="img/icon/cart.png" alt=""> <span>'; if(!isset($_SESSION['cart'])) $s.= '0';
                else $s.= count($_SESSION['cart']);
                $s.= '</span></a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <a href="index.php"><img src="asset/icon/logo.jpg" alt="Logo" width="100px" height="100px"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="index.php">Trang Chủ</a></li>
                                <li><a href="sanpham.php?id_category=' . intval($r_category['id']) . '">Dự án</a>
                                    <ul class="dropdown">';
        $q = Database::query("SELECT * FROM `categories`");
        while($r = $q->fetch_array()) {
            $s .= '<li><a href="sanpham.php?id_category=' . intval($r['id']) . '">'.$r['name'].'</a></li>';
        }
        $s .= '</ul>
                                </li>
                                <li><a href="baiviet.php">Bài Viết</a></li>
                                <li><a href="lienhe.php">Liên Hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option" style="display: flex; align-items: center; justify-content: space-around;">
                            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>';
        if(!isset($_SESSION['user'])) {
            $s .= '<a href="login.php" title="Đăng nhập"><i class="fa fa-user" style="color: black; font-size: 20px;"></i></a>';
        } else {
            $userName = splitName($_SESSION['user']['name']);
            $s .= '<div class="user-greeting" style="display: flex; align-items: center;">
                      <i class="fa fa-user" style="color: black; font-size: 20px; margin-right: 5px;"></i>
                      <p style="margin: 0;">Chào ' . $userName . '</p>
                      <a href="logout.php" style="margin-left: 10px; color: red;" class="fa fa-sign-out"></a>
                   </div>';
        }
    
        $s .= '<a href="giohang.php" style="display: flex; align-items: center;"><img src="img/icon/cart.png" alt=""> <span style="margin-top: -5px;">';
        if(!isset($_SESSION['cart'])) $s.= '0';
        else $s.= count($_SESSION['cart']);
        $s.= '</span></a>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>';
    }
        echo $s;
    }
    
    function jumbotron(){
        $s ='
       <section class="hero">
        <div class="hero__slider owl-carousel">
           <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">';
               $q1 = Database::query("SELECT * FROM `banner`");
               while($r1 = $q1->fetch_array()) {
                $s .= '<div class="carousel-item active" data-bs-interval="3000">
                  <img src="asset/images/'.$r1['image'].'" class="d-block w-100" alt="...">
                </div>';
               }
                $s .= '</div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
             <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
            </button>
          </div>  
        </div>
    </section>
        ';
        echo $s;
    }
    function body(){
        $s = '';
        $s .= '
      <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Nhà ở</li>
                        <li data-filter=".new-arrivals">Toà Thương Mại</li>
                        <li data-filter=".hot-sales">Đất Công Nghiệp</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">';
            $q1 = Database::query("SELECT * FROM `products`");
                while($r1 = $q1->fetch_array()) {
                $s .= '<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="asset/images/'.$r1['image'].'">
                        </div>
                        <div class="product__item__text">
                            <h6>'.$r1['name'].'</h6>
                            <a href="';
            
            if (!isset($_SESSION['user'])) {
                $s .= 'login.php';
            } else {
                $s .= 'sanpham.php?id_product=' . intval($r1['id']);
            }
            
            $s .= '" class="add-cart"><i class="fa fa-shopping-cart"></i></a>
                            <h5><sup>$</sup>'.$r1['price'].'</h5> 
                        </div>
                    </div>
                
              </div>';
                }
            
            $s .= '</div>
        </div>
    </section>
        ';
            
        echo $s;
        }
    function _section() {
        $s = '
         <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">';
                $q= Database::query("SELECT * FROM `products` ORDER BY RAND() LIMIT 6");
                while($r = $q->fetch_array()) {
                    $s .= '<div class="instagram__pic">
                    <div class="instagram__pic__item set-bg" data-setbg="asset/images/'.$r['image'].'"></div>
                </div>';
                }
                $s .= '</div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

        ';
        echo $s;
    }
    function login(){
        if (isset($_POST['emailphone']) && isset($_POST['password'])) {
            if (is_numeric($_POST['emailphone'])) {
                $x = 'phone';
            } else {
                $x = 'email';
            }
            
            $q = Database::query("SELECT * FROM users WHERE $x = '{$_POST['emailphone']}' AND password = '{$_POST['password']}'");
            if ($r = $q->fetch_array()) {
                if ($r['role'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    $_SESSION['user'] = $r;
                    if (isset($_POST['remember_me'])) {
                        setcookie('emailphone', $_POST['emailphone'], time() + (86400 * 30), "/"); 
                        setcookie('password', $_POST['password'], time() + (86400 * 30), "/"); 
                    } else {
                        setcookie('emailphone', '', time() - 3600, "/");
                        setcookie('password', '', time() - 3600, "/");
                    }
                    
                    header("Location:  index.php");
                }
            } else {
                $_SESSION['login_fail'] = 'Dữ liệu nhập không chính xác!!!';
                header("Location: dangnhap.php");
            }
        }
    
        $saved_emailphone = isset($_COOKIE['emailphone']) ? $_COOKIE['emailphone'] : '';
        $saved_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
    
        $s = '
        <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">';
            $q = Database::query("SELECT * FROM `dangnhap`");
            while($r = $q->fetch_array()) {
            $s .= '<div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/'.$r['image'].'"
                class="img-fluid" alt="Sample image">
            </div>';
            }
            $s .= '<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="post">
                <h2 style="padding: 40px 0 25px 0">Đăng Nhập</h2>';
               if (isset($_SESSION['login_fail'])) {
                   $s .= '<div style="color: red;">'.$_SESSION['login_fail'].'</div>';
                   unset($_SESSION['login_fail']); 
               }
               
                $s .= '<!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="emailphone" class="form-control form-control-lg"
                    placeholder="Nhập vào số điện thoại của bạn" value="' . htmlspecialchars($saved_emailphone) . '" />
                </div>
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                    <input type="password" name="password" class="form-control form-control-lg"
                    placeholder="Nhập vào mật khẩu" id="password" value="' . htmlspecialchars($saved_password) . '" />
                    <button type="button" onclick="togglePassword()" class="btn btn-secondary btn-sm mt-2">Hiện/Ẩn mật khẩu</button>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Remember Me Checkbox -->
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="form2Example3"' . (!empty($saved_emailphone) ? ' checked' : '') . ' />
                        <label class="form-check-label" for="form2Example3">
                            Ghi nhớ mật khẩu    
                        </label>
                    </div>
                    <a href="#!" class="text-body">Quên mật khẩu?</a>
                </div>
    
                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="dangky.php"
                        class="link-danger">Đăng ký</a></p>
                </div>
                </form>
            </div>
            </div>
        </div>
        
        </section>
    
        <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
        </script>
        ';
    
        echo $s;
    }
    
     function splitName($str){
            $rs = NULL;
            $word = mb_split(' ', $str);
            $n = count($word)-1;
            if ($n > 0) {$rs = $word[$n];}
    
            return $rs;
    }
    function register(){
        $errName = $errPhone = $errPass = $errRepass = '';
    
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['name'])) {
                $errName = "Vui lòng nhập vào tên của bạn!";
            }
            if (empty($_POST['phone'])) {
                $errPhone = "Cần có 1 số điện thoại!";
            } else {
                if (!preg_match('/^\d{10}$/', $_POST['phone'])) {
                    $errPhone = "Số điện thoại phải có đúng 10 chữ số!";
                } else {
                    $phoneCheckQuery = "SELECT COUNT(*) FROM users WHERE phone='" . $_POST['phone'] . "'";
                    $phoneCheckResult = Database::query($phoneCheckQuery);
                    $phoneExists = $phoneCheckResult->fetch_array()[0];
    
                    if ($phoneExists > 0) {
                        $errPhone = "Số điện thoại đã tồn tại!";
                    }
                }
            }
            if (empty($_POST['pass'])) {
                $errPass = "Vui lòng nhập mật khẩu!";
            }
            if (empty($_POST['repass'])) {
                $errRepass = "Vui lòng xác nhận mật khẩu!";
            } else {
                if ($_POST['pass'] != $_POST['repass']) {
                    $errRepass = "Mật khẩu không khớp!";
                }
            }
            if ($errName == '' && $errPhone == '' && $errPass == '' && $errRepass == '') {
                $insertQuery = "INSERT INTO users(name, phone, password, role) VALUES('".$_POST['name']."', '".$_POST['phone']."', '".$_POST['pass']."', '')";
                Database::query($insertQuery);
                $userQuery = "SELECT * FROM users WHERE phone='" . $_POST['phone'] . "' AND password='" . $_POST['pass'] . "'";
                $userResult = Database::query($userQuery);
                $_SESSION['user'] = $userResult->fetch_array();
                header("location: index.php");
            }
        }
    
        $s = '
            <section class="vh-80" style="background-color: #eee; border: none; border-radius: none;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-3">
                        <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
    
                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký</p>
    
                            <form class="mx-1 mx-md-4" action="" method="post">
    
                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fa fa-user"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Tên của bạn</label>
                                <input type="text" name="name" class="form-control" />
                                <span style="color: red;">'.$errName.'</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fa fa-phone"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example3c">Số điện thoại của bạn</label>
                                <input type="text" name="phone" class="form-control" />
                                <span style="color: red;">'.$errPhone.'</span>
                                </div>
                            </div>
    
                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fa fa-lock"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4c">Mật Khẩu</label>
                                <input type="password" id="pass" name="pass" class="form-control" />
                                <span style="color: red;">'.$errPass.'</span>
                                <input type="checkbox" onclick="togglePassword(\'pass\')"> Hiển thị mật khẩu
                                </div>
                            </div>
    
                            <div class="d-flex flex-row align-items-center mb-3">
                                <i class="fa fa-key"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4cd">Xác nhận mật khẩu</label>
                                <input type="password" id="repass" name="repass" class="form-control" />
                                <span style="color: red;">'.$errRepass.'</span>
                                <input type="checkbox" onclick="togglePassword(\'repass\')"> Hiển thị mật khẩu
                                </div>
                            </div>
    
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Đăng ký</button>
                            </div>
    
                            </form>
    
                        </div>';
                        $q = Database::query("SELECT * FROM `dangky`");
                        while($r = $q->fetch_array()) {
                        $s .= '<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img src="assets/images/'.$r['image'].'"
                            class="img-fluid" alt="Sample image">
                        </div>';
                        }
                       $s .= '</div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            
            <script>
            function togglePassword(fieldId) {
                var field = document.getElementById(fieldId);
                if (field.type === "password") {
                    field.type = "text";
                } else {
                    field.type = "password";
                }
            }
            </script>
        ';
        echo $s;
    }
    function addtoCartProduct($id_product) {
        $q = Database::query("SELECT * FROM `products` WHERE id =". $id_product);
        $r = $q->fetch_array();
        if(isset($_SESSION['cart'])) {
            $a = $_SESSION['cart'];
            for($i = 0; $i <count($a); $i++) 
                if($r['id']==$a[$i]->id)break;
            if($i<count($a))$a[$i]->quantity++;
            else  $a[count($a)] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
            
        }else {
            $a = array();
            $a[0] = new cart($r['id'], $r['name'], $r['image'], $r['price'], 1);
        }
        $_SESSION['cart'] = $a;
    }

    function cart() {
        $total = 0.0;
        $discountPercentage = 0.0;
        $discountMessage = '';
    
        // Kết nối với cơ sở dữ liệu
        $conn = Database::getConnection();
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // xoá sản phẩm
        if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
            $deleteIndex = (int)$_GET['delete'];
            if (isset($_SESSION['cart'][$deleteIndex])) {
                unset($_SESSION['cart'][$deleteIndex]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); 
            }
        }
    
        // thêm số lượng vào giỏ hàng
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
            foreach ($_POST['quantities'] as $index => $quantity) {
                if (isset($_SESSION['cart'][$index]) && is_numeric($quantity) && $quantity > 0) {
                    $_SESSION['cart'][$index]->quantity = (int)$quantity;
                }
            }
        }
    
        // mã giảm giá
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['discount_code'])) {
            $discountCode = $conn->real_escape_string(trim($_POST['discount_code']));
            $query = "SELECT discount_percentage FROM discount_codes WHERE code = '$discountCode' AND is_active = 1";
            $result = $conn->query($query);
    
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $discountPercentage = $row['discount_percentage'];
                $discountMessage = "Mã giảm giá áp dụng thành công! Bạn được giảm $discountPercentage%.";
            } else {
                $discountMessage = "Mã giảm giá không hợp lệ hoặc đã hết hạn.";
            }
        }
    
        // tổng tiền giỏ hàng
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $item_total = $item->quantity * $item->price;
                $total += $item_total;
            }
        }
    
        // Áp dụng mã giảm giá (nếu nhập đúng thì số tiền sẽ giảm)
        if ($discountPercentage > 0) {
            $discountAmount = ($total * $discountPercentage) / 100;
            $total -= $discountAmount;
        }
    
        // Hiển thị giỏ hàng
        $s = '
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="post">
                            <div class="shopping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>';
        
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
                $item_total = $item->quantity * $item->price;
                $s .= '
                <tr>
                    <td class="product__cart__item">
                        <div class="product__cart__item__pic">
                            <img src="asset/images/'.$item->image.'" width="150px" height="150px" alt="">
                        </div>
                        <div class="product__cart__item__text">
                            <h6>'.$item->name.'</h6>
                            <h5><sup>$</sup>' . number_format($item->price, 2).'</h5>
                        </div>
                    </td>
                    <td class="quantity__item">
                        <div class="quantity">
                            <div class="pro-qty-2">
                               <input type="number" name="quantities[' . $index . ']" value="' . $item->quantity . '" min="1" style="width: 50px;">
                            </div>
                        </div>
                    </td>
                    <td class="cart__price">$ ' . number_format($item_total, 2) . '</td>
                    <td class="cart__close"><a href="?delete=' . $index . '"><i class="fa fa-close"></i></a></td>
                </tr>';
            }
        } else {
            $s .= '<tr><td colspan="4">Giỏ hàng của bạn đang trống.</td></tr>';
        }
    
        $s .= '
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="continue__btn">
                                            <a href="index.php">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="continue__btn update__btn">
                                            <button type="submit" name="update_cart"><i class="fa fa-spinner"></i> Cập nhật giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__discount">
                                <h6>Mã giảm giá</h6>
                                <form method="post">
                                    <input type="text" name="discount_code" placeholder="Nhập mã">
                                    <button type="submit">Áp dụng</button>
                                </form>';
        if ($discountMessage) {
            $s .= '<p>' . $discountMessage . '</p>';
        }
        $s .= '</div>
                            <div class="cart__total">
                                <h6>Giỏ hàng của bạn</h6>
                                <ul>
                                    <li>Tổng tiền <span>$ ' . number_format($total, 2) . '</span></li>
                                </ul>
                                <a href="checkout.php" class="primary-btn">Tiếp tục thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    
        echo $s;
    
        $conn->close();
    }
    
    function _contact() {
        $s = '
         <div class="map">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.353684910666!2d107.58544287460766!3d16.457619228924464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a14771646be3%3A0x2fd0ad0d9227d5b0!2zNzAgTmd1eeG7hW4gSHXhu4csIFbEqW5oIE5pbmgsIEh14bq_LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1733945247533!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin</span>
                            <h2>Liên Hệ</h2>
                        </div>
                        <ul>
                            <li>
                                <h4>Địa chỉ</h4>
                                <p>70 nguyễn huệ - Phường vĩnh ninh - TP Huế <br />0367722389</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Tin nhắn"></textarea>
                                    <button type="submit" class="site-btn">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
        ';
        echo $s;
    }
    function _shop() {
        $s = '';
        $s .= '
             <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop__sidebar">
                            <div class="shop__sidebar__search">
                                <form action="" method="post">
                                    <input type="text" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>
                            </div>
                            <div class="shop__sidebar__categories">
                                <ul class="nice-scroll">';
        $q_categories = Database::query("SELECT * FROM `categories`");
        while ($r_category = $q_categories->fetch_array()) {
            $s .= '<li><a href="?id_category=' . intval($r_category['id']) . '">'.$r_category['name'].'</a></li>';
        }
        $s .= '</ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">';
        $id_category = isset($_GET['id_category']) ? intval($_GET['id_category']) : 0;
        $query = $id_category
            ? "SELECT * FROM `products` WHERE status=true AND id_category=" . $id_category
            : "SELECT * FROM `products` WHERE status=true";
        $q1 = Database::query($query);
        while ($r1 = $q1->fetch_array()) {
            $s .= '<div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" style="background-image: url(\'asset/images/'.$r1['image'].'\');">
                                    </div>
                                    <div class="product__item__text">
                                        <h6>'.$r1['name'].'</h6>
                                        <a href="';
            
            if (!isset($_SESSION['user'])) {
                $s .= 'login.php';
            } else {
                $s .= 'sanpham.php?id_product=' . intval($r1['id']);
            }
            
            $s .= '" class="add-cart"><i class="fa fa-shopping-cart"></i></a>
                                        <h5><sup>$</sup>'.$r1['price'].'</h5>
                                    </div>
                                </div>
                            </div>';
        }
    
        $s .= '</div>
                    </div>
                </div>
            </div>
        </section>';
    
        echo $s;
    }
    
    function _baiviet() {
        $s = '
         <section class="blog spad">
        <div class="container">
            <div class="row">';
            if(!isset($_GET['id_blog']))
              $q = Database::query("SELECT * FROM `blog`");
            else
            $q = Database::query("SELECT * FROM `blog` WHERE id=".$_GET['id_blog']);
              while($r = $q->fetch_array()) {
                $s .= '<div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="asset/images/'.$r['image'].'"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt="">'.$r['day'].'</span>
                            <h5>'.$r['title'].'</h5>
                            <a href="baiviet-detail.php?id_blog= '.$r['id'].'">Xem Ngay</a>
                        </div>
                    </div>
                </div>';
              }
            $s .= '</div>
        </div>
    </section>
        
        ';
        echo $s;
    }

    function _detail() {
        if(!isset($_GET['id_blog']))
        $q = Database::query("SELECT * FROM `blog`");
      else
      $q = Database::query("SELECT * FROM `blog` WHERE id=".$_GET['id_blog']);
        while($r = $q->fetch_array()) {
        if(!isset($_GET['id_blog']))
        $q = Database::query("SELECT * FROM `baiviet` WHERE status=true and id_blog=".$r['id']);
        else
        $q = Database::query("SELECT * FROM `baiviet` WHERE id_blog=".$r['id']);
        while($r = $q->fetch_array()) {
            $s = '
            <section class="blog-details spad" style="padding-top: 80px;"> <!-- Added padding-top here -->
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <div class="blog__details__pic">
                                <img src="asset/images/'.$r['image'].'" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="blog__details__content">
                                <div class="blog__details__share">
                                    <span>share</span>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="blog__details__text">
                                    <p>'.$r['pagraph'].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
        }
    }
        echo $s;
    }
    

    function _checkout() {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->quantity * $item->price * 1000;
        }
        $s = '
          <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="process_order.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Chi tiết thanh toán</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                          <p>Họ Tên <span>*</span></p>
                                        <input type="text" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ <span>*</span></p>
                                <input type="text" name="address" placeholder="Nhập địa chỉ của bạn" required>
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="phone" required>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú</p>
                                <input type="text" name="note" placeholder="Ghi chú về đơn hàng (nếu có)">
                            </div>    
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Đơn Hàng của bạn</h4>
                                <div class="checkout__order__products">Sản Phẩm <span>Tổng tiền</span></div>';
                                foreach ($cart as $item) {
                                    $item_total = $item->quantity * $item->price * 1000;
                                $s .= '<ul class="checkout__total__products">
                                    <li>'.$item->name.'x'.$item->quantity.' <span>$ '.number_format($item_total, 2).'</span></li>
                                 
                                </ul>';
                                }
                                $s .= '<ul class="checkout__total__all">
                                    <li>Tổng tiền <span>$'.number_format($total, 2).'</span></li>';
                                $s .= '</ul>
                              
                                <button type="submit" class="site-btn">Đặt Đơn</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
        ';
        echo $s;
    }
    ?>