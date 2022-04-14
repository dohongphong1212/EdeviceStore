<div class="row mb " style="padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
           
            <div class="boxtitle" style="background-color: #F12A43;">Sản phẩm: <?=$tendm?></div>
            <div class="row boxcontent">
                    <?php
                    $i = 0;
                     foreach ($dssp as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=".$id;
                        $hinh = $imgpath . $img;
                        if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
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
                       
                        <form style="margin: 30px 40px;" action="index.php?act=addtocart" method="post">
                         <input type="hidden" name="id" value="'.$id.'">
                         <input type="hidden" name="name"  value="'.$name.'">
                         <input type="hidden" name="img"  value="'.$img.'">
                         <input type="hidden" name="price"  value="'.$price.'">
        
                        <input class="gio" style="    border: 1px solid #333;
                        width: 96px;
                        height: 32px;" type="submit" name="addtocart" value="Thêm giỏ hàng">
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
        </div>
    
    </div>
   
    <div class="boxphai">
        <?php
        include "boxright.php";
        ?>
    </div>
</div>