<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../timeComment.php";
//Lay gio hien tai va dinh dang format
$date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
$getdatetime = $date->format('d-m-Y H:i:s');

$idpro = $_REQUEST['idpro'];
$dsbl = loadAll_binhluan($idpro);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="row mb">
        <div class="boxtitle" style="background-color: #F12A43;">Bình luận</div>
        <div class="boxfooter binhluanform" style="background-color: white;border:0px">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input style="width: 91%;" type="text" name="noidung" placeholder="Mời bạn để lại bình luận">
                <input type="submit" name="guibinhluan" value="Comment" style="background-color: #288AD6;color: white;width:78px; height:45px;    border-radius: 4px;">
            </form>
        </div>
        <div class="boxcontent2 menudoc" style="background-color: white;padding-left:13px;border:0px;">
       
            
                <?php
       
                foreach ($dsbl as $bl) {
                    extract($bl);
                    $nameComment = loadName_binhluan($iduser);
                    
                    echo '
                    <i class="fas fa-user"></i>
                    <strong style="    line-height: 22px;
                    margin-top: 2px;font-size:16px;">  ' . $nameComment . '</strong>
                    <div style="    font-size: 14px;
                    color: rgb(51, 51, 51);
                    line-height: 24px;"> ' . $noidung  . ' </div>
                    <span style="    font-size: 13px;
                    color: rgb(153, 153, 153);"> ' . getDateTimeDiff($ngaybinhluan) . '</span><br>';
                }
                ?>
                
            
        </div>
       
        <?php
        if (isset($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = $getdatetime;

           insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

        ?>
    </div>

</body>

</html>