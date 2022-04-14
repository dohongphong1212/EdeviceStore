<div class="row mb " style="padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
        <form action="index.php?act=addtocart" method="post">
            
            <?php
            // echo '<pre>';
            // print_r($onesp);
            // echo '</pre>';

            extract($onesp);
          $gia = currency_format($price,'VNĐ');
            ?>
            <!-- <div class="boxtitle">Ten san pham:</div> -->
            <div class="row boxcontent" style="display: flex;    border: 0px;">
                <?php

                $hinh = $imgpath . $img;
               
               $cart['soluong'] = 1;
                echo ' <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="name"  value="'.$name.'">
                <input type="hidden" name="price"  value="'.$price.'">
                <input  type="hidden" name="img"  value="'.$img.'">
                <img style="width: 350px;
                height: 350px;" src="' . $hinh . '" alt="error img">

               <div>
                 <h3 style="font-size: 24px;
                 padding-bottom: 15px;
                 margin-bottom: 20px;
                 border-bottom: 1px solid #d0d0d0;">'. $name .'</h3>
                <p style="    margin-bottom: 20px;font-size:14px;"> Mô tả:  '.$mota.'</p>
                <p style="font-size: 28px;font-weight:600;
                color: red;
                margin-bottom: 15px;">'. $gia.'</p>
               <div>
                <input style="display:block;width:90px; margin-bottom: 20px" type="number" min="1" max="10" name="soluong" value="'.$cart['soluong'].'"  class="num-order">
               <input class="gio" style="display: inline-block;
               padding: 10px 30px;
               font-size: 16px;
               background: green;
               color: #fff;
               border-radius: 5px;
               text-transform: uppercase;" type="submit" name="addtocart" value="Thêm giỏ hàng">
                </div>
                </div>';
                ?>
                </form>
            </div>
        </div>
    <!-- load du lieu binh luan -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
                $(document).ready(function() {
                    
                        txt = $("input").val();
                        $("#binhluan").load("view/binhluan/binhluanform.php", {
                            idpro: <?=$id?>
                        });
                    });
            
            </script>
        <div class="row mb" id="binhluan">
            <div class="boxtitle">Binh luan</div>
           
            <!-- <div class="row boxcontent">
            <iframe src="view/binhluan/binhluan.php?" frameborder="0" width="100%" height="300px"></iframe>
        </div> -->
        </div>
        <div class="row mb">
            <div class="boxtitle" style="background-color: #F12A43;">Sản phẩm cùng loại</div>
            <div class="row boxcontent" style="display: flex;border:0px">
            
                <?php
                
                $i = 0;
                foreach ($sp_cung_loai as  $sp_cung_loai) {
                    extract($sp_cung_loai);
                   
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
                margin-right: 5px;">' . currency_format($price,'vnđ') . '</p>
               
                <form style="margin: 30px 40px;display:flex;" action="index.php?act=addtocart" method="post">
                 <input type="hidden" name="id" value="'.$id.'">
                 <input type="hidden" name="name"  value="'.$name.'">
                 <input type="hidden" name="img"  value="'.$img.'">
                 <input type="hidden" name="price"  value="'.$price.'">

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
                }
                ?>
            </div>
        </div>
        
    </div>

    <div class="boxphai">
        <?php
        include "boxright.php";
        ?>
    </div>
</div>