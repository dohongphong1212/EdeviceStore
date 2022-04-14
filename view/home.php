<?php
// auto đăng xuất khi user không hoạt động trên trang

if (isset($_SESSION['LAST_ACTIVITY_TIME'])) {

    if ((time() - $_SESSION['LAST_ACTIVITY_TIME']) > 3600) {
        header('location:index.php?act=thoat');

        die();
        // session timed out
        // session_unset();     // unset $_SESSION variable for the run-time 
        //session_destroy();   // destroy session data in storage
    }
}
$_SESSION['LAST_ACTIVITY_TIME'] = time();
//print_r($_SESSION); 
?>
<div class="row mb " style="padding: 30px 104px;background-color: #f7f7f7;">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner" style="margin-bottom: 50px;">

                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">

                        <img src="view/images/slide-phone-01.png" style="width:100%">

                    </div>

                    <div class="mySlides fade">

                        <img src="view/images/silde-phone-02.png" style="width:100%">

                    </div>

                    <div class="mySlides fade">

                        <img src="view/images/slide-phone-03.png" style="width:100%">

                    </div>

                    <!-- Next and previous buttons -->
                    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);

                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $imgpath . $img;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                echo '<div class="boxsp ' . $mr . '"  style="background-color: white;">
                <div class="row img"><a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a></div>
                <a href="' . $linksp . '" style="text-align: center;
                color: #222;font-size:16px;
                margin: 15px 0px 5px 0px;
                line-height: normal;    display: block;">' . $name . '</a>
                <p style="display: block;
                text-align: center;
                color: #f12a43;
                font-size: 15px;
                font-weight: normal;
                margin-right: 5px;">' . currency_format($price, 'vnđ') . '</p>
               
                <form style="margin: 30px 40px;" action="index.php?act=addtocart" method="post">
                 <input type="hidden" name="id" value="' . $id . '">
                 <input type="hidden" name="name"  value="' . $name . '">
                 <input type="hidden" name="img"  value="' . $img . '">
                 <input type="hidden" name="price"  value="' . $price . '">

                <input class="gio" style="    border: 1px solid #333;
                width: 96px;
                height: 32px;margin-right: 30px;" type="submit" name="addtocart" value="Thêm giỏ hàng">
                <a href="' . $linksp . '">
                <input class="chitietsp" style=" border: 1px solid red;
                width: 96px;
                height: 32px;" type="button" name="chitietsp" value="Xem ngay">
                </a>
               
                </form>
            </div>';
                $i++;
            }
            ?>

        </div>
        <!-- phan trang home -->
        <div class="row" style="text-align: center;">
            <?php

            if ($current_page > 3) {
                $first_page = 1; ?>
                <a style="    border: 1px solid black;
    font-size: 16px;
    padding: 2px;" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>


            <?php
            }
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
            ?>
                <a style="    border: 1px solid black;
    font-size: 16px;
    padding: 2px;" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>

            <?php } ?>

            <?php
            for ($i = 1; $i <= $totalPage; $i++) { ?>
                <?php if ($i != $current_page) { ?>
                    <?php if ($i > $current_page - 3 && $i < $current_page + 3) { ?>
                        <a style="    border: 1px solid black;
    font-size: 16px;
    padding: 2px;" href="?per_page=<?= $item_per_page ?>&page=<?= $i ?>"><?= $i ?></a>

                    <?php } ?>
                <?php } else { ?>
                    <strong style="  border: 1px solid black;
    font-size: 16px;
    padding: 2px; background-color: black;
    color: white;"><?= $i ?></strong>
                <?php } ?>
            <?php } ?>
            <!-- --------------- -->
            <?php
            if ($current_page < $totalPage - 1) {
                $next_page = $current_page + 1; ?>
                <a style="border: 1px solid black;
    font-size: 16px;
    padding: 2px;" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>

                <?php
                if ($current_page < $totalPage - 3) {
                    $end_page = $totalPage;
                ?>
                    <a style="border: 1px solid black;font-size: 16px;padding: 2px;" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>

                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="boxphai">
        <?php
        include "boxright.php";
        ?>
    </div>
</div>