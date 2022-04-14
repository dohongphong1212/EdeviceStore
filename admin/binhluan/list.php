<div class="row adddm">
    <div class="row frmtitle" style="background-color: white;border: 0px;">
        <H1 style="font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">DANH SÁCH TÀI KHOẢN</H1>
    </div>
    <div class="row frmcontent">

        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>Nội dung bình luận</th>
                    <th>User</th>
                    <th>Id pro(sản phẩm)</th>
                    <th>Ngày bình luân</th>

                    <th></th>


                </tr>

                <?php
              
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                   
                    $xoabl =  "index.php?act=xoabl&id=" . $id;
                    $tenuserBinhluan = get_tenuser($iduser);
                    //print_r( $tenuserBinhluan);


                    
                         
                  
     
                    echo    '<tr>
                    
                            <td><input type="checkbox" name="" id=""></td>
                            
                            <td>' . $id . '</td>
                           
                            <td>' . $noidung . '<br>  
                            
                             
                            
                            </td>
                           
                            <td>' . $tenuserBinhluan . '</td>
                            <td>' . $idpro . '</td>
                            <td>' . $ngaybinhluan . '</td>
                           
                            <td> <a href="' . $xoabl . '"><input type="button"  style="    background-color: red;
                            width: 30px;
                            height: 30px;"  class="button-add"></a></td>
                        </tr>';
                 
                    
                
                   
                }



                ?>

            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>