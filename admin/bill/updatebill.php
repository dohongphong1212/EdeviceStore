
<?php
if (isset($billhoadondat) && is_array($billhoadondat)) {
    extract($billhoadondat);
    // echo "<pre>";
    // print_r($billhoadondat);
    // echo "</pre>";
    $countsp = load_cart_count($_GET['id']);
    extract($countsp);
} 
?>
<div class="row adddm">
    <div class="row frmtitle" style="background-color: white;border: 0px;">
        <H1 style="    font-family: 'Roboto Medium';
    font-weight: 600;
    text-transform: uppercase;
    font-size: 18px;
    padding: 24px 0px;">CẬP NHẬT HÓA ĐƠN ĐẶT HÀNG</H1>
    </div>
    <div class="row frmcontent">
        <form style="padding-left: 20px;" action="index.php?act=suabill" method="post" enctype="multipart/form-data">
           
            <div class="row mb10">
                Mã đơn hàng<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="ma" value="<?php if (isset($billhoadondat['id']) && $billhoadondat['id'] != "") echo $billhoadondat['id'] ?>">
                <?php if (isset($thongbaotenloai)) {
                    echo $thongbaotenloai;
                } ?>
            </div>
            <div class="row mb10">
               Tên Khách hàng<br>
               
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="ten" value="<?php if (isset($billhoadondat['bill_name'])) echo  $billhoadondat['bill_name'] ;?>">
            </div>
            <div class="row mb10">
                Địa chỉ<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="dc" value="<?php if (isset( $billhoadondat['bill_address'])) echo  $billhoadondat['bill_address'] ;?>">
                
            </div> <div class="row mb10">
                SỐ điện thoại<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="sdt" value="<?php if (isset( $billhoadondat['bill_tel'])) echo  $billhoadondat['bill_tel']; ?>">
                
            </div> <div class="row mb10">
                Email<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="email" value="<?php if (isset($billhoadondat['bill_email'])) echo $billhoadondat['bill_email'] ?>">
                
            </div>
            <div class="row mb10">
                Số lượng<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="soluong" value="<?php if (isset($countsp) && $countsp != "") echo $soluong ?>">
                
            </div>
            <div  class="row mb10">
                Giá trị đơn hàng<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="giatri" value="<?php if (isset($billhoadondat['total']) && $billhoadondat['total'] != "") echo $billhoadondat['total'] ?>">
                
            </div>
            <div class="row mb10">
            <select name="tinhtrangdon" style="background-color: green;color: whitesmoke;">
               <?php 
               $name0='Đơn hàng mới';
               $name1='Đang xử lý';
               $name2='Đang giao hàng';
               $name3='Đã giao hàng';
 
               if(isset($billhoadondat['bill_status']))
               $value = $billhoadondat['bill_status'];
               if ($value==0) {
                echo ' <option value="' .$value . '">' . $name0 . '</option>';
                echo ' <option value="1">' . $name1 . '</option>';
                echo ' <option value="2">' . $name2 . '</option>';
                echo ' <option value="3">' . $name3 . '</option>';

               }
               elseif($value==1){
                echo ' <option value="' .$value . '">' . $name1 . '</option>';
                echo ' <option value="0">' . $name0 . '</option>';
                echo ' <option value="2">' . $name2 . '</option>';
                echo ' <option value="3">' . $name3 . '</option>';
               }
               elseif($value==2){
                echo ' <option value="' .$value . '">' . $name2 . '</option>';
                echo ' <option value="1">' . $name1 . '</option>';
                echo ' <option value="0">' . $name0 . '</option>';
                echo ' <option value="3">' . $name3 . '</option>';
               }
               elseif($value==3){
                echo ' <option value="' .$value . '">' . $name3 . '</option>';
                echo ' <option value="1">' . $name1 . '</option>';
                echo ' <option value="2">' . $name2 . '</option>';
                echo ' <option value="0">' . $name0 . '</option>';
               }
               ?>
               

            </select>
                    </div>
                    <div class="row mb10">
                Ngày đặt hàng<br>
                <input style="display: block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    width: 35%;
    margin-bottom: 15px;
    border-radius: 0px;" readonly="readonly" type="text" name="ngaydat" value="<?php if (isset($billhoadondat['ngaydathang']) && $billhoadondat['ngaydathang'] != "") echo $billhoadondat['ngaydathang'] ?>">
                
            </div>
            <div class="row mb10">
                <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="submit" name="capnhat" value="Cập nhật">
                <input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="reset" value="Nhập lại">
                <a href="index.php?act=danhsachhoadon"><input style="border: none;
    outline: none;
    background: #428ebb;
    color: #fff;
    padding: 8px 20px;" type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>