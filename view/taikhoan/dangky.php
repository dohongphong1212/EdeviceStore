<div class="row mb " style="    padding: 30px 104px;">
    <div class="boxtrai mr">
        <div class="row mb">
          
            <div class="boxtitle" style="background-color: #F12A43;">Đăng ký thành viên</div>
            <div class="row boxcontent formtaikhoan">
                <form action="index.php?act=dangky" method="post">
                <input type="email" name="email" placeholder="email">
                <input type="text" name="user" placeholder="user">
                <input type="password" name="pass" placeholder="pass">
                <input type="submit" value="Dang ky" name="dangky">
               
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