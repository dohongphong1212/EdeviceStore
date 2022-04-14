<?php
session_start();

include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "config/cauhinhemail.php";
include "lib/email.php";
include "./view/header.php";
include "../bcaoWeb/global.php";


if (!isset($_SESSION['mycart']))
  $_SESSION['mycart'] = [];
// phan trang
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
$current_page =  !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
$offset = ($current_page - 1) * $item_per_page;
$spnew = load_sanpham_home($item_per_page, $offset);
$soluongSp = soluong_spHome();
$totalPage = ceil((int)$soluongSp / $item_per_page);

$dsdm = loadAll_danhmuc();
$dstop10 = load_sanpham_top10();
if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'sanpham':
      if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
        $kyw = $_POST['kyw'];
      } else {
        $kyw = "";
      }
      if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {

        $iddm = $_GET['iddm'];
      } else {
        $iddm = 0;
      }
      $dssp = loadAll_sanpham($kyw, $iddm);
      $tendm = load_ten_dm($iddm);
      include "view/sanpham.php";
      break;
    case 'sanphamct':

      if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {

        $id = $_GET['idsp'];

        $onesp = loadOne_sanpham($id);
        extract($onesp);
        $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
        include "view/sanphamct.php";
      } else {
        include "view/home.php";
      }
      break;

    case 'dangky':
      if (isset($_POST['dangky'])) {
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        insert_taikhoan($email, $user, $pass);
        $thongbao = "Dang ky thanh cong";
      }
      include "view/taikhoan/dangky.php";
      break;
    case 'dangnhapgoogle':

      if (isset($_POST['dn'])) {

        $user = $_POST['user'];
        $email = $_POST['email'];
        // print_r($user);
        $checkUser =  get_userGoogle($user, $email);

        if (is_array($checkUser)) {
          $_SESSION['user'] = $checkUser;

          // active time khong hoat dong auto dang xuat
          $_SESSION['IS_LOGIN'] = 'yes';
          $_SESSION['LAST_ACTIVITY_TIME'] = time();
          header("Location: http://duan.test:8999/");
        }
      }
      break;
    case 'dangnhap':
      if (isset($_POST['dangnhap'])) {
        if (empty($_POST['user'])) {
          $erroruser = " <span style='color:red'>Không để trống user</span>";
        }
        if (empty($_POST['pass'])) {
          $errorpass = " <span style='color:red'>Không để trống pass</span>";
        }
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $checkUser =  get_user($user, $pass);

        if (is_array($checkUser)) {
          $_SESSION['user'] = $checkUser;
          // active time khong hoat dong auto dang xuat
          $_SESSION['IS_LOGIN'] = 'yes';
          $_SESSION['LAST_ACTIVITY_TIME'] = time();
          header("Location: index.php");
        } else {
          $thongbao = "Tai khoan ko ton tai";
        }
      }

      include "view/home.php";
      break;

    case 'edit_taikhoan':
      if (isset($_POST['capnhat'])) {

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        $address = $_POST['address'];
        $phone = $_POST['tel'];
        $id = $_POST['id'];

        updatetk($email, $user, $phone, $address, $id);
        // cap nhat lai session
        $_SESSION['user'] = get_user($user, $pass);
        header("Location: index.php?act=edit_taikhoan");
      }
      include "view/taikhoan/edit_taikhoan.php";
      break;
    case 'quenmk':
      // print_r($_SESSION['user']['user']);
      if (isset($_POST['guiemail'])) {

        $email = $_POST['email'];

        $check_email = check_email($email);
        if (is_array($check_email)) {
          send_mail($email, "", "Lay lai mat khau", "Mat khau cua ban la: {$check_email['pass']}");
          //   $thongbao = "Mat khau cua ban la:" . $check_email['pass'];
        } else {
          $thongbao = "Email ko ton tai trong he thong";
        }
      }
      include "view/taikhoan/quenmk.php";

      break;
    case 'lienhe':
      include "view/lienhe.php";
      break;
    case 'addtocart':
      if (isset($_POST['addtocart'])) {
        // if (isset($_GET['id'])) {

        // echo '<pre>';
        //   print_r($_POST);
        //   echo '</pre>';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $soluong = 1;
        if (isset($_POST['soluong']))
          $soluong = $_POST['soluong'];

        $thanhtien = $soluong * $price;

        // $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
        // array_push($_SESSION['mycart'], $spadd);
        // cho các dữ liệu vào mảng
        $item = [
          'id' => $id,
          'name' => $name,
          'img' => $img,
          'price' => $price,
          'soluong' => $soluong,
          'thanhtien' => $thanhtien
        ];
        // echo '<pre>';
        // print_r($_SESSION['mycart']);
        // echo '</pre>';

        // kiểm tra hàng xem đã thêm trc đó chưa => nếu có thì số lượng tăng lên 1 ngược lại thì ko cập nhật số lượng
        if (isset($_SESSION['mycart'][$id])) {
          $_SESSION['mycart'][$id]['soluong'] += $soluong;
        } else {
          // echo "<pre>";
          $_SESSION['mycart'][$id] = $item;

          // print_r($_SESSION['mycart']);
        }

        // }
        include "view/cart/viewcart.php";
      }

      break;

    case 'updatecart':

      if (isset($_POST['btn_updatecart'])) {
        //echo 'hello';
        // echo '<pre>';
        // print_r( $_SESSION['mycart']);
        // echo '</pre>';

        update_cart_buy($_POST['qty']);
      }
      include "view/cart/viewcart.php";
      break;
    case 'delcart':
      //$_SESSION['mycart'] = [];

      if (isset($_GET['idcart'])) {
        $id = (int)$_GET['idcart'];
        // array_splice các parameter
        // Tham số 1 là mảng cần thao tác
        // Tham số thứ 2 là vị trí phần tử cần xóa trong mảng
        // Tham số thứ 3 là Chỉ định số lượng phần tử sẽ bị xóa và cả độ dài của mảng được trả về
        array_splice($_SESSION['mycart'], $id, 1);
      } else {
        $_SESSION['mycart'] = [];
      }
      //include "view/cart/viewcart.php";

      header("Location:index.php?act=viewcart");


      break;

    case 'viewcart':

      include "view/cart/viewcart.php";
      break;
    case 'thoat':
      session_unset();
      header("Location:index.php");
      break;
    case 'bill':
      if (isset($_SESSION['user'])) {
        include "view/cart/bill.php";
      } else {
        echo "<script>
          window.alert('Bạn cần đăng nhập để mua hàng');
            </script>";
        include "view/cart/viewcart.php";
        break;
      }

      break;
    case 'billConfirm':

      // tạo đơn hàng(bill)
      if (isset($_POST['yes']) && $_POST['yes']) {
        if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['email']) || empty($_POST['tel'])) {
          echo "<script>
              window.alert('Thông tin khách hàng đang trống');
                </script>";
          include "view/cart/bill.php";
          break;
        } else if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
        else
          $iduser = 0;
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $pttt = $_POST['pttt'];
        //Lay gio hien tai va dinh dang format
        $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        $getdatetime = $date->format('d-m-Y H:i:s a');
        $ngaydathang = $getdatetime;

        $tongdonhang = tongdonhang();

        $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
        // insert into cart (tạo giỏ hàng)

        foreach ($_SESSION['mycart'] as $cart) {
          insert_cart($_SESSION['user']['id'], $cart['id'], $cart['name'], $cart['img'], $cart['price'], $cart['soluong'], $cart['thanhtien'], $idbill);
        }
        $_SESSION['cart'] = [];
      }

      $bill = loadone_bill($idbill);
      $billct = loadAll_cart($idbill);

      include "view/cart/billConfirm.php";
      break;
    case 'mybill':

      $listbill = loadAll_bill($_SESSION['user']['id']);


      include "view/cart/mybill.php";
      break;
      // case 'loginFB':

      //   include "./Social_Login/loginFB.php";
      //   break;
      //   case 'google':

      //     include "Social_Login/index.php";
      //     break;
    case 'edit_mk':
      // print_r($_SESSION['user']);
      if (isset($_SESSION['user']) && isset($_POST['guimk'])) {
        $mkOld = $_POST['mk'];
        $mkNew = $_POST['newmk'];
        $mkAgain = $_POST['mkAgain'];
        $id = $_POST['id'];

        if (empty($mkOld)) {
          $validate2 = '<span style="color:red;">Mật khẩu hiện tại không được để trống</span>';
        } else if ($mkOld != get_mk($id)) {
          print_r(get_mk($id));
          echo $mkOld;
          $validate1 = '<span style="color:red;">Mật khẩu hiện tại không tồn tại trong hệ thống</span>';
        }
        if (empty($mkNew)) {
          $validate3 = '<span style="color:red;">Mật khẩu mới không được để trống</span>';
        }
        if (empty($mkAgain)) {
          $validate4 = '<span style="color:red;">Nhập lại mật khẩu không được để trống</span>';
        }
        if ($mkNew != $mkAgain) {
          $validate5 = '<span style="color:red;">Mật khẩu mới và nhập lại mật khẩu không được khác nhau</span>';
        }
        if ($mkOld == get_mk($id) && !empty($mkOld) && !empty($mkNew) && !empty($mkAgain) && $mkNew == $mkAgain) {
          edit_mk($id, $mkAgain);
        }
      }

      include "view/taikhoan/edit_mk.php";
      break;
    default:
      include "view/home.php";
      break;
  }
} else {
  include "./view/home.php";
}

include "./view/footer.php";
