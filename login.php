<?php
        include('inc/database.php');
        ob_start();
        _header('Login Page');
        navbar();
        login();
        _footer();
    ?>