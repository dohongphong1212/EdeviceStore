<div class="row adddm">
    <div class="row frmtitle" style="background-color: white;border: 0px;">
        <H1 style="font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">DANH SÁCH LOẠI HÀNG</H1>
    </div>
    <form style="    padding: 0px 20px;" action="index.php?act=listsp" method="post">
            <input style="width: 30%; padding: 0px;padding: 8px 20px;" type="text" name="kyw" placeholder="Tìm kiếm theo tên">
            <select name="iddm" style="    padding: 8px 20px;">
                <option  value="0" selected>tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo ' <option  value="' . $id . '">' . $name . '</option>';
                }
                ?>
            </select>
            <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    " type="submit" name="listok" value="Tìm kiếm">
        </form>
    <div class="row frmcontent">
        
        <div class="row mb10 frmdsloai" style="padding: 0px 20px;">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>LƯỢT XEM</th>


                    <th></th>
                </tr>

                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp =  "index.php?act=suasp&id=" . $id;
                    $xoasp =  "index.php?act=xoasp&id=" . $id;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' alt='' height = '80'>";
                    } else {
                        $hinh = "No photo picture";
                    }
                    $formatprice = currency_format($price,'vnđ');
                    echo    '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . $formatprice . '</td>
                            <td>' . $luotxem . '</td>

                            <td><a href="' . $suasp . '"><input class="icon" style="    background-color: green;
                            width: 30px;
                            height: 30px;" type="button"></a> <a href="' . $xoasp . '">
                            <input type="button" style="    background-color: red;
                            width: 30px;
                            height: 30px;"  class="button-add"></a></td>
                        </tr>';
                }
                ?>

            </table>
        </div>
        <div class="row mb10">
            <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Chọn tất cả">
            <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Bỏ chọn tất cả">
            <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addsp"><input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>