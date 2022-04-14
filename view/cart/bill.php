<div class="row mb "  style="padding: 30px 104px;">
    <div class="boxtrai mr">
    <form action="index.php?act=billConfirm" method="post">
        <div class="row mb">

            <div class="boxtitle" style="background-color: #F12A43;">Thông tin đặt hàng</div>
            <div class="row boxcontent billform">
            
                <table>
                <?php
            if (isset($_SESSION['user'])) {
                 $name = $_SESSION['user']['user'];
                $address = $_SESSION['user']['address'];
                $email = $_SESSION['user']['email'];
                $tel = $_SESSION['user']['tel'];

            } 
            else {
                $name = "";
                $address = "";
                $email = "";
                $tel = "";
            }
            ?>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td><input type="text" name="name" id="" value="<?=$name?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" id="" value="<?=$address?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" id="" value="<?=$email?>"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="tel" id="" value="<?=$tel?>"></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="row mb">

            <div class="boxtitle" style="background-color: #F12A43;">Phương thức thanh toán</div>
            <div class="row boxcontent billform">
                <table>
                    <tr>
                        <td><input type="radio" value="1" name="pttt" checked>Trả tiền khi nhận hàng</td>
                    </tr>
                    <tr>
                        <td><input type="radio" value="2" name="pttt" >Chuyển khoản ngân hàng</td>
                    </tr><tr>
                        <td><input type="radio" value="3" name="pttt" >Thanh toán online</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mb">
           
           <div class="boxtitle" style="background-color: #F12A43;">Thông tin đơn hàng</div>
           <div class="row boxcontent  frmcontent">
                  <table style="width: 100%;">
                  
                  <?php
                   viewcart(0);
                  ?>
                  </table>
           </div>
       </div>
        <div class="row mb bill">
            <!-- <a href="index.php?act=billConfirm"><input type="submit" name="yes" value="Đồng ý đặt hàng"></a> -->
            <a href="index.php?act=billConfirm"><input style="background-color: #2b478c;
    color: white;
    width: 274px;
    height: 42px;
    float: right;" type="submit" name="yes" value="Đặt mua"></a>   
        </div>
        </form>
    </div>

    <div class="boxphai">
        <?php
        include "view/boxright.php";
        ?>
    </div>
</div>