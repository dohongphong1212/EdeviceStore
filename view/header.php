<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ismart</title>
    <!-- logo tab icon -->
    <link rel="shortcut icon" href="view/images/logotab.png" type="image/x-icon">
    <link href="view/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/newstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101374722297388");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    function dieuhuong() {
        location.replace("http://bcaoWeb.test:8999/index.php?act");
    }
</script>

<body>
    <div class="boxcenter">

        <div class="row mb menuclient">

            <ul class="logo">

                <li><a href="">Hình thức thanh toán</a></li>
            </ul>

            <ul>
                <?php
                //  if(isset($_SESSION['user'])) 
                //  {

                // print_r($_SESSION['user']);

                // echo "<br>";
                //extract($_SESSION['user']);
                ?>
                <li>
                    <?php
                    //  if ($role == 1) {
                    //  echo '';
                    //} 
                    ?>
                    <a href="index.php?act">Trang chủ</a>
                </li>
                <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                <li><a href="index.php?act=gopy">Góp ý</a></li>
                <li><a href="index.php?act=hoidap">Hỏi đáp</a></li>

            </ul>


        </div>
        <div class="row mb undermenu" style="margin-bottom: 0px;">
            <div style="padding: 10px 0px;">
                <p style="    width: 150px;
                         height: 50px;
                    font-size: 50px;cursor: pointer;" onclick="dieuhuong()">Ismart</p>

            </div>
            <div style="    width: 500px;
    padding: 10px 0px;">
                <form class="search" action="index.php?act=sanpham" method="post">
                    <input type="text" name="kyw" placeholder="Nhập từ khóa tìm sản phẩm">
                    <button class="btntim" style="background-color: black;color: white;" name="tim kiem">Tìm kiếm</button>
                </form>
            </div>
            <div class="phone" style="display: flex;">

                <div class="round">
                    <i class="fa fa-phone" aria-hidden="true" style="font-size: 30px;line-height:58px"></i>
                </div>
                <div style="display: flex;flex-direction: column;margin: 9px 5px;line-height: 28px;">
                    <span style="font-size: 16px;">Tư vấn</span>
                    <span style="font-size: 16px;">0987.654.321</span>
                </div>

            </div>
            <div class="cart">
                <div class="round">
                    <a href="index.php?act=viewcart" style="color: white;">
                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 30px;line-height:58px"></i>
                    </a>
                    <?php $soluongiohangkhithem ?>
                    <span class="soluong"><?php


                                            $sl = demsoluonggiohang();
                                            $mod = isset($_GET['act']) ? $_GET['act'] : "act";

                                            switch ($mod) {
                                                case 'addtocart':
                                                    $sl++;
                                                    echo $sl;
                                                    break;
                                                case 'act':
                                                    echo $sl;
                                                    break;

                                                default:
                                                    echo $sl;
                                                    break;
                                            }



                                            ?></span>
                </div>

            </div>
        </div>