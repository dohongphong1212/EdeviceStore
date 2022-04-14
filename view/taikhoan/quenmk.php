<div class="row mb " style="    padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
          
            <div class="boxtitle" style="background-color: #F12A43;">Quên mật khẩu</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=quenmk" method="post">
                <input type="email" style="width: 300px;" name="email" placeholder="Bạn hãy nhập email để lấy lại mật khẩu">
                <input type="submit" value="Gửi" name="guiemail">
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