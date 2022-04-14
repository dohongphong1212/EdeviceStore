<div class="row adddm">
    <div class="row frmtitle" style="background-color: white;
    border: 0px;">
        <H1 style="    font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px; ">DANH SÁCH LOẠI HÀNG</H1>
    </div>
    <div class="row frmcontent">

        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>

                <?php

                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm =  "index.php?act=suadm&id=" . $id;
                    $xoadm =  "index.php?act=xoadm&id=" . $id;

                    echo    '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td><a href="' . $suadm . '"><input type="button" style="    background-color: green;
                            width: 30px;
                            height: 30px;" class="icon" ></a> 

                            <a href="' . $xoadm . '"><input type="button" style="    background-color: red;
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
    padding: 8px 20px;
    margin-bottom: 50px;" type="button" value="Chọn tất cả">
            <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="button" value="Bỏ chọn tất cả">
            <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=adddm"><input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;
    margin-bottom: 50px;" type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>