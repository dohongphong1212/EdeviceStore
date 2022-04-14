<div class="row adddm frmcontent">
        
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>

                </tr>
                <?php
                  foreach ( $listtk as $tk) {
                    extract($tk);
                    $max = currency_format($maxprice,"vnđ");
                    $min = currency_format($minprice,"vnđ");
                    $avg = currency_format($avgprice,"vnđ");

                    echo '<tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$max.'</td>
                    <td>'.$min.'</td>
                    <td>'.$avg.'</td>
                   

                    </tr>
                    ';
                  } 
                ?>
                
            </table>

            <a href="index.php?act=bieudo"><input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Biểu đồ thống kê"></a>
            <a href="index.php?act=doanhthu"><input style="    border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Biểu đồ doanh thu"></a>
        </div>
</div>