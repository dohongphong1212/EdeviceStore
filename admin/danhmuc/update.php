<?php

if (isset($dm) && is_array($dm)) {
    extract($dm);
}
?>
<div class="row adddm">
    <div class="row frmtitle">
        <H1>CẬP NHẬT LOẠI HÀNG HÓA</H1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatedm" method="post">
            <div class="row mb10">
                Mã loại<br>
                <input type="text" name="maloai" value="<?php if (isset($dm['id']) && $dm['id'] > 0) echo $dm['id'] ?>" disabled>
            </div>
            <div class="row mb10">
                Tên loại<br>
                <input type="text" name="tenloai" value="<?php if (isset($dm['name']) && $dm['name'] != "") echo $dm['name'] ?>">
                <?php if (isset($thongbaotenloai)) {
                    echo $thongbaotenloai;
                } ?>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?php if (isset($dm['id']) && $dm['id'] > 0) echo $dm['id'] ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>