<div class="row adddm" >
            <div class="row frmtitle"style="    background-color: white;
    border: 0px;">
                <H1 style="    font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">THÊM MỚI SẢN PHẨM</H1>
            </div>
            <div class="row frmcontent" style="    padding-left: 20px;" >
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        Danh mục<br>
                        <select name="iddm" >
                        <?php
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo ' <option value="'.$id.'">'.$name.'</option>';
                        } 
                        ?>
                        </select>
                       
                    </div>
                    <div class="row mb10">
                        Tên sản phẩm<br>
                        <input style="    display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" type="text" name="tensp">
                        <?php if (isset($thongbaotenloai)) {
                            echo $thongbaotenloai;
                        }?>
                    </div>
                    <div class="row mb10">
                        Giá<br>
                        <input style="    display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" type="text" name="giasp" >
                    </div>
                    <div class="row mb10">
                        Hình<br>
                        <input type="file" name="hinh" >
                    </div>
                    <div class="row mb10">
                        Mô tả<br>
                        <textarea style="    display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 50%;
    height: 150px;
    margin-bottom: 15px;" name="mota"  cols="30" rows="10"></textarea>
                    </div>
                    <div class="row mb10">
                        <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="submit" name="themmoi" value="THÊM MỚI">
                        <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listsp"><input style="    border: none;
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