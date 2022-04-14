<?php
require_once "./validation.php";
/*
 * BIỂU THỨC CHÍNH QUY
 * 1.Username : /^[A-Za-z0-9_\.]{6,32}$/
 * 2.Password : /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/ 
 * 3.Email: /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/
 */

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Phất cờ
    $error = array(); // Chưa có lỗi
    // Kiểm tra lỗi username
    if (empty($_POST['user'])) {
        $error['username'] = "Bạn cần nhập username";
    } else {
        // Kiểm tra định dạng username

        if (!is_username($_POST['user'])) {
            $error['username'] = "Username không đúng định dạng";
        } else {
            $username = $_POST['user'];
        }
    }
    //Kiểm tra lỗi password
    if (empty($_POST['pass'])) {
        $error['password'] = "Bạn cần nhập vào password";
    } else {
        // Kiểm tra định dạng password

        if (!is_password($_POST['pass'])) {
            $error['password'] = "Password không đúng định dạng";
        } else {
            $password = $_POST['pass'];
        }
    }
    // Kết luận
    if (empty($error)) {
        echo "{$username} <br/> {$password}";
        //Xử lý theo tình huống dữ liệu đã nhập đầy đủ
    }
}
?>

<div class="row mb ">
    <div class="boxtitle" style="background-color: #F12A43;font-size: 12px;">TÀI KHOẢN</div>
    <div class="boxcontent formtaikhoan" style="font-size: 18px;">
        <?php

        if (isset($_SESSION['user'])) {
            //var_dump($_SESSION['user']);

            extract($_SESSION['user']);

        ?>
            <div class="row mb10" style="font-size: 18px;color: red; ">
                Xin chào <?= $user ?><br>
            </div>
            <div class="row mb10">
                <li style="list-style: none;">
                    <i class="fas fa-key" style="margin-right: 10px;font-size: 14px;"></i>
                    <a style="text-decoration: none;font-size: 12px;color: red;" href="index.php?act=edit_mk">Đổi mật khẩu?</a>
                </li>
                <li style="list-style: none;">
                    <i class="fas fa-user-edit" style="margin-right: 10px;font-size: 14px;"></i>
                    <a style="text-decoration: none;font-size: 12px;color: red;" href="index.php?act=edit_taikhoan">Cập nhật thông tin cá nhân</a>
                </li>
                <li style="list-style: none;">
                    <i class="fas fa-shopping-cart" style="margin-right: 10px;font-size: 14px;"></i>
                    <a style="text-decoration: none;font-size: 12px;color: red;" href="index.php?act=mybill">Đơn hàng của tôi</a>
                </li>
                <?php if ($role == 1) { ?>
                    <li style="list-style: none;">
                        <i class="fas fa-sign-in-alt" style="margin-right: 10px;font-size: 14px;"></i>
                        <a style="text-decoration: none;font-size: 12px;color: red;" href="admin/index.php?">Đăng nhập admin</a>
                    </li>
                <?php } ?>

                <li style="list-style: none;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 10px;font-size: 14px;"></i>
                    <a style="text-decoration: none;font-size: 12px;color: red;" href="index.php?act=thoat">Thoát</a>
                </li>
            </div>
        <?php } else {
        ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    Tên đăng nhập<br>
                    <input type="text" name="user" placeholder="Nhập tên đăng nhập">
                    <?php if (isset($erroruser)) echo $erroruser; ?>
                    <?php if (isset($error)) form_error('username'); ?>
                </div>
                <div class="row mb10">
                    Mật khẩu<br>

                    <input type="password" name="pass" placeholder="Nhập mật khẩu">
                    <?php if (isset($errorpass)) echo $errorpass; ?>
                    <?php if (isset($error)) form_error('password'); ?>
                </div>
                <div class="row mb10" style="display: flex;    line-height: 15px;">
                    <li style="list-style: none;display: flex;"> <input type="checkbox" name="" id="">
                        <p>Ghi nhớ tài khoản?</p>
                    </li>
                    <li style="list-style: none;padding-left: 55px;">
                        <a style="text-decoration: none;color: black;" href="index.php?act=quenmk">Quên mật khẩu?</a>
                    </li>
                </div>
                <div class="row mb10">
                    <input style="width: 100%;background-color: #F12A43;color:white; height: 36px;" type="submit"
                    onclick="alert('Chào mừng đến với cửa hàng')" name="dangnhap" value="Đăng nhập">
                </div>\
            </form>


            <div class="row mb10">
                <div style="width: 100%;height: 36px;background-color: #F12A43;text-align: center;line-height: 40px;border-radius: 5px 5px 5px 5px;">
                    <a style="text-decoration: none;color:white; " href="index.php?act=dangky">Đăng ký thành viên</a>
                </div>
            </div>


        <?php } ?>
        <!-- login facebook or google -->
        <?php
        // if(isset($_SESSION['logincust']))
        // {
        //     header('Location: Home.php');
        // }
        // else
        // {
        //     session_unset();
        // }
        if (!isset($_SESSION['user'])) {
            echo '<div style="text-align:center;"><a href="http://localhost:8080/bcaoWeb/Social_Login/loginFB.php"><i style="font-size: 30px;color: rgb(12,134,239);margin-right: 10px;" class="fab fa-facebook-square"></i></a>';
            include_once './Social_Login/loginG.php';
            if (isset($_GET['code'])) {
                $gClient->authenticate($_GET['code']);
                $_SESSION['token'] = $gClient->getAccessToken();
                header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
            }
            if (isset($_SESSION['token'])) {
                $gClient->setAccessToken($_SESSION['token']);
            }
            if ($gClient->getAccessToken()) {
                $gpUserProfile = $google_oauthV2->userinfo->get();
                $_SESSION['oauth_provider'] = 'Google';
                $_SESSION['oauth_uid'] = $gpUserProfile['id'];
                $_SESSION['first_name'] = $gpUserProfile['given_name'];
                $_SESSION['last_name'] = $gpUserProfile['family_name'];
                $_SESSION['email'] = $gpUserProfile['email'];
                $_SESSION['logincust'] = 'yes';
            } else {
                $authUrl = $gClient->createAuthUrl();
                $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"> <i style="font-size: 30px;color: rgb(12,134,239);margin-right: 10px;" class="fab fa-facebook-square"></i></a></div>';
            }
            echo $output;
        }
        ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle" style="background-color: #F12A43;    font-size: 12px;">DANH MỤC</div>
    <div class="boxcontent2 menudoc">
        <ul>
            <?php
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                echo '<li>
                        <a href=' . $linkdm . '>' . $name . '</a>
                    </li>';
            }
            ?>

        </ul>
    </div>
    <!-- <div class="boxfooter searbox">
        <form action="index.php?act=sanpham" method="post">
            <input type="text" name="kyw">
            <input type="submit" name="tim kiem" value="Search">
        </form>
    </div> -->
</div>
<div class="row">
    <div class="boxtitle" style="background-color: #F12A43;    font-size: 12px;">TOP 10 YÊU THÍCH</div>
    <div class="row boxcontent">
        <?php
        foreach ($dstop10 as $dstop) {
            // echo '<pre>';
            // print_r($dstop10);
            // echo  '</pre>';
            extract($dstop);

            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $imgpath . $img;
            echo '<div class="row mb10 top10">
                    <img src=' . $img . ' alt=""><br>
                    <a href=' . $linksp . '>' . $name . '</a><br><br>
                    <span style="color: #f12a43;">' . currency_format($price, '') . ' VNĐ</span>
                </div>';
        }
        ?>
    </div>
</div>