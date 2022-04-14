<div class="row mb " style="    padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
          <?php
          if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
            extract($_SESSION['user']);

          } 
          ?>
            <div class="boxtitle" style="background-color: #F12A43;">Thông tin tài khoản</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=edit_taikhoan" method="post">
                    <h3 style="font-size: 14px;
    font-weight: bold;
    color: #444;
    text-transform: none;
    margin-bottom: 25px; text-align: center;">Cập nhật thông tin tài khoản</h3>
                Email
                <input type="text" name="email" placeholder="email" value="<?=$email?>">
              <br>  Tên tài khoản
                <input type="text" name="user" placeholder="user" value="<?=$user?>">
                <input type="hidden" name="pass" placeholder="pass" value="<?=$pass?>">
                Địa chỉ
                <input type="text" name="address" placeholder="address" value="<?=$address?>">
                Số điện thoại
                <input type="text" name="tel" placeholder="phone number"value="<?=$tel?>">

                <input type="hidden" name="id" value="<?=$id?>">
                <div style="text-align: center;">
                <input style="    font-weight: bold;
    font-size: 14px;
    border-radius: 4px;
    padding: 10px 60px;
    outline: none;
    background: linear-gradient(rgb(31, 101, 171) 0%, rgb(43, 123, 185) 100%);color: white;" type="submit" value="Cập nhật" name="capnhat" style="background-color: #2b478c;
    color: white;">
                </div>
                

                <!-- <input type="reset" value="Nhập lại" style="background-color: #2b478c;
    color: white;"> -->
                </form>
                <?php if(isset($thongbao)) echo $thongbao;?>
            </div>
        </div>
        
    </div>
  
   
   
    <div class="boxphai">
        <?php
        include "view/boxright.php";
        ?>
    </div>
</div>