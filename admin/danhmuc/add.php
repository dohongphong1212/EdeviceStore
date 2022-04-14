<div class="row adddm">
            <div class="row frmtitle" style="    background-color: white;
    border: 0px;">
                <H1 style="    font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">THÊM MỚI LOẠI HÀNG HÓA</H1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=adddm" method="post" style="padding-left: 20px;">
                    <div class="row mb10">
                        Mã loại<br>
                        <input type="text" name="maloai" disabled style="    display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;">
                    </div>
                    <div class="row mb10">
                        Tên loại<br>
                        <input type="text" name="tenloai" style="    display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;">
                        <?php if (isset($thongbaotenloai)) {
                            echo $thongbaotenloai;
                        }?>
                    </div>
                    <div class="row mb10">
                        <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="submit" name="themmoi" value="THÊM MỚI">
                        <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listdm"><input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                    if(isset($thongbao))
                    echo $thongbao; 
                    ?>
                </form>
            </div>
        </div>
        </div>
    </div>