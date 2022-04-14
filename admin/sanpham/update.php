<?php

if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' alt='' height = '80'>";
} else {
    $hinh = "No photo picture";
}

?>

<div class="row adddm">
    <div class="row frmtitle">
        <H1>CẬP NHẬT LOẠI HÀNG HÓA</H1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
            <select name="iddm">
                <option value="0" selected>tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
          
                    if ($iddm == $id) {
                        echo ' <option value="' . $id . '" selected>' . $name . '</option>';
                    }
                    else {
                        echo ' <option value="' . $id . '">' . $name . '</option>';
                     
                    }
                  
                }
                ?>
            </select>
                    </div>
            <div class="row mb10">
                Tên sản phẩm<br>
                <input type="text" name="tensp" value="<?php if (isset($sanpham['name']) && $sanpham['name'] != "") echo $sanpham['name'] ?>">
                <?php if (isset($thongbaotenloai)) {
                    echo $thongbaotenloai;
                } ?>
            </div>
            <div class="row mb10">
                Giá<br>
                <input type="text" name="giasp" value="<?php if (isset($sanpham['price']) && $sanpham['price'] != "") echo $sanpham['price'] ?>">
            </div>
            <div class="row mb10">
                Hình<br>
                <input type="file" name="hinh" value="<?php if (isset($sanpham['img']) && $sanpham['img'] != "") echo $sanpham['img'] ?>">
                <?php echo $hinh;?>
            </div>
            <div class="row mb10">
                Mô tả<br>
                <textarea name="mota" cols="30" rows="10"><?php if (isset($sanpham['mota']) && $sanpham['mota'] != "") echo $sanpham['mota'] ?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>