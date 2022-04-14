
<div class="row mb " style="    padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
          
            <div class="boxtitle" style="background-color: #F12A43;">Đổi mật khẩu</div>
            <div class="row boxcontent formtaikhoan">
                <h3 style="font-size: 18px;
    color: #2b7bb9;
    margin: 0 0 50px 0;text-align: center;">Thay đổi mật khẩu</h3>
                <form action="index.php?act=edit_mk" method="post" style="padding: 0px 314px;
    display: flex;
    flex-direction: column;">
    <input type="hidden" style="width: 300px;" name="id" value="<?php if(isset($_SESSION['user'])) extract($_SESSION['user']); echo $id;?>" name="mk">
                Mật khẩu hiện tại *
                <input type="text" style="width: 300px;" name="mk" placeholder="Mật khẩu cũ"> <?php if(isset($validate2)) echo $validate2; if(isset($validate1)) echo $validate1;?><br>
                Mật khẩu mới *
                <input type="text" style="width: 300px;" name="newmk" placeholder="Mật khẩu mới"> <?php if(isset($validate3)) echo $validate3;?><br>
                Nhập lại mật khẩu mới *
                <input type="text" style="width: 300px;margin-bottom: 25px;" name="mkAgain" placeholder="Nhập lại mật khẩu mới"> <?php if(isset($validate4)) echo $validate4;if(isset($validate5)) echo $validate5?>
                <div style="text-align: center;">
                <input style="color: #fff;
    background-color: #286090;
    border-color: #204d74;width: 238px;height: 42px;" type="submit" value="Thay đổi mật khẩu" name="guimk">
                </div>
               
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