<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="../view/css/newstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Admin</title>

</head>

<style>
    .exit {
        display: none;
    }

    .headeradmin .right:hover .exit {
        cursor: pointer;
        display: block;
    }
</style>

<body>
    <div class="boxcenter">
        <div class="row mb headeradmin">
            <div class="left">
                <h1 style="color: white;">ShopIsmart</h1>
            </div>
            <div class="right">
                <div> <img src="../view//images/admin.png" style="    margin-top: 28px;" width="25" height="25"></div>
                <small style="padding-left:5px; color: white;    line-height: 83px;"><?php if (isset($_SESSION['user'])) extract($_SESSION['user']);
                                                                                        echo $user ?></small>
                <div class="exit" style=" 
                
    position: absolute;
    top: 58px;
    background-color: white;
    width: 91px;
    text-align: center;
    height: 30px;
    line-height: 33px;"><a href="http://localhost:8080/bcaoWeb" style="color: black;">Thoát</a></div>
            </div>

        </div>
        <div class="row">
            <div class="row mb menu">
                <ul>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-home-page-24.png" alt=""></div>
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-opened-folder-24.png" alt=""></div>
                        <a href="index.php?act=adddm">Danh mục</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-fast-moving-consumer-goods-24.png" alt=""></div>
                        <a href="index.php?act=addsp">Hàng hóa</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-customer-24.png" alt=""></div>
                        <a href="index.php?act=dskh">Khách hàng</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-comments-24.png" alt=""></div>
                        <a href="index.php?act=dsbl">Bình luận</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-statistics-24.png" alt=""></div>
                        <a href="index.php?act=thongke">Thống kê</a>
                    </li>
                    <li>
                        <div style="float: left;"><img src="../view//images/icons8-mobile-order-24.png" alt=""></div>
                        <a href="index.php?act=danhsachhoadon">Đơn hàng</a>
                    </li>

                </ul>
            </div>