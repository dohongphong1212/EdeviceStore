<div style="display: flex; color: whitesmoke;justify-content: center;">
    <div style=" background-color: #037BFF; width: 25%;    padding: 30px;
    line-height: 30px;">
        <h3>ĐƠN HÀNG THÀNH CÔNG</h3>
        <small style="font-size: 15px;">
            <?php

            if (isset($soluongDonThanhCong)) {
                echo  $soluongDonThanhCong;
            } ?>
        </small>
        <p>Đơn giao dịch thành công</p>
    </div>
    <div style="background-color: #DD3545;width: 25%;    padding: 30px;
    line-height: 30px;">
        <h3>ĐANG XỬ LÝ</h3>
        <small style="font-size: 15px;">
            <?php

            if (isset($soluongDangXuLy)) {
                echo  $soluongDangXuLy;
            } ?>
        </small>
        <p>Số lượng đơn đang xử lý</p>
    </div>
    <div style="background-color: #27A547;width: 25%;    padding: 30px;
    line-height: 30px;">
        <h3>DOANH SỐ</h3>
        <small style="font-size: 15px;">
            <?php

            if (isset($doanhthu)) {
                echo  $doanhthu . " VNĐ";
            } ?>
        </small>
        <p>Doanh số hệ thống</p>
    </div>
    <div style="background-color: #333541;width: 25%;    padding: 30px;
    line-height: 30px;">
        <h3>ĐANG GIAO HÀNG</h3>
        <small style="font-size: 15px;">
            <?php

            if (isset($soluongDangGiaoHang)) {
                echo $soluongDangGiaoHang;
            } ?>
        </small>
        <p>Số đơn đang giao</p>
    </div>
</div>


<!-- ---------- -->
<div class="row adddm">
    <div class="row frmtitle" style="background-color: white;border: 0px;">
        <H1 style="    font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">DANH SÁCH HÓA ĐƠN MỚi ĐẶT HÀNG</H1>
    </div>
    <form style="padding: 0px 20px;" action="index.php?" method="post">
        <input style="    width: 30%;
    padding: 0px;
    padding: 8px 20px;" type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="submit" value="tìm kiếm" name="listok">
    </form>
    <div class="row frmcontent">

        <div class="row mb10 frmdsloai" style="padding: 0px 20px;">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ Đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Số lượng hàng</th>
                    <th>GIÁ trị đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Thao tác</th>

                </tr>
                <?php

                $i = 1;
                foreach ($listbill as $bill) {
                    extract($bill);
                    $suabl =  "index.php?act=updatebill&id=" . $id;
                    $xoabl =  "index.php?act=xoadondat&id=" . $id;
                    $kh = $bill["bill_name"] . '
                    <br>' . $bill["bill_email"] . '
                    <br>' . $bill["bill_address"] . '
                    <br>' . $bill["bill_tel"];
                    $countsp = load_cart_count($bill['id']);
                    extract($countsp);
                    $ttdh = get_ttdh($bill["bill_status"]);

                    $gia = currency_format($bill['total'], "");
                    if ($i % 2 != 0) {
                        echo ' <tr>
                    <td><input type="checkbox"></td>
                    <td>DAM-' . $bill['id'] . '</td>
                    
                    <td>' . $kh . '</td>
                    <td>' . $soluong . '</td>
                    <td><Strong>' . $gia . '</Strong>VNĐ</td>
                    <td ><div style="color: white;
                    background-color: green;
                    text-align: center;
                    border-radius: 10px 10px;
                    height: 28px;
                    line-height: 27px;">' . $ttdh . '</div></td>
                    <td>' . $bill['ngaydathang'] . '</td>
                    <td>
                    <a href="' . $suabl . '"><input type="button"  style="    background-color: green;
                            width: 30px;
                            height: 30px;" class="icon"></a> <a href="' . $xoabl . '"><input type="button"  style="    background-color: red;
                            width: 30px;
                            height: 30px;"  class="button-add"></a>
                    </td>
                    </tr>
                  ';
                    } else {
                        echo ' <tr style="background-color: #f3f2f3;">
                    <td><input type="checkbox"></td>
                    <td>DAM-' . $bill['id'] . '</td>
                    
                    <td>' . $kh . '</td>
                    <td>' . $soluong . '</td>
                    <td><Strong>' . $gia . '</Strong>VNĐ</td>
                    <td ><div style="color: black;
                    background-color: yellow;
                    text-align: center;
                    border-radius: 10px 10px;
                    height: 28px;
                    line-height: 27px;">' . $ttdh . '</div></td>
                    <td>' . $bill['ngaydathang'] . '</td>
                    <td>
                    <a href="' . $suabl . '"><input type="button"  style="    background-color: green;
                            width: 30px;
                            height: 30px;" class="icon"></a> <a href="' . $xoabl . '"><input type="button"  style="    background-color: red;
                            width: 30px;
                            height: 30px;"  class="button-add"></a>
                    </td>
                    </tr>
                  ';
                    }
                    $i++;
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

        </div>
    </div>
</div>