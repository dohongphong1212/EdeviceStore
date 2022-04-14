<div class="row mb " style="    padding: 30px 104px;">

    <div class="boxtrai mr">
    <form action="index.php?act=updatecart" method="POST">
        <div class="row mb" >
          
            <div class="boxtitle" style="background-color: #F12A43;">Giỏ hàng</div>
            
            <div class="row boxcontent frmcontent">
                   <table style="    width: 100%;">
                
                  <?php
                  viewcart(1); 
                  ?>
                   </table>
            </div>
        </div>
    <div class="row mb bill" style="    display: flex;
    justify-content: end;">
       <a href="index.php?act=delcart"><input style="margin-right: 15px;
    /* background-color: #2b478c; */
    color: white;
    width: 130px;
    height: 42px;
    background: #ececec;
    color: black;
    border: 0px;" type="button" value="Xóa giỏ hàng"></a><br><br>
       <a href="index.php?act=updatecart"><input style="    background-color: #2b478c;
    color: white;
    width: 130px;
    height: 42px;" type="submit" id="btn_updatecart" name="btn_updatecart" value="Cập nhật giỏ hàng"></a>
    </div>
    </form>
    <a href="index.php?act=bill"><input style="background-color: #2b478c;
    color: white;
    width: 274px;
    height: 42px;
    float: right;" type="submit" value="Đồng ý đặt hàng"></a>
    </div>

    <div class="boxphai">
        <?php
        include "view/boxright.php";
        ?>
    </div>
</div>