<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "../model/bill.php";


if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
    // print_r($_SESSION['user']['role']);
    include "header.php";

    // controller danh muc
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':

                // kiem tra nguoi dung co click vao nut add hay khong??
                if (isset($_POST['themmoi'])) {
                    if (empty($_POST['tenloai'])) {
                        $thongbaotenloai = "<span style='color:red'>Ban chua nhap ten loai</span>";
                    } else {
                        $tenloai = $_POST['tenloai'];
                        insert_danhmuc($tenloai);
                        $thongbao = "Them thanh cong";
                    }
                }

                include "danhmuc/add.php";
                break;
            case 'listdm':

                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $soluongsp = demsoluongsanpham_theodm($_GET['id']);


                    // echo $soluong;
                    $none = 'none';
                    $nhay = "'";
                    if ($soluongsp > 0) {
                        echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=' . $nhay . '' . $none . '' . $nhay . ';">&times;</span> 
                    <strong style="line-height:20px;font-size:15px;padding-left: 37px;">Danh mục có sản phẩm bạn không thể xóa danh mục!</strong>.
                  </div>';
                    } else {
                        delete_danhmuc($_GET['id']);
                    }
                }

                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $dm = loadOne_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                // kiem tra nguoi dung co click vao nut update hay khong??
                if (isset($_POST['capnhat'])) {
                    if (empty($_POST['tenloai'])) {
                        $thongbaotenloai = "<span style='color:red'>ten loai dang trong</span>";
                    } else {
                        $tenloai = $_POST['tenloai'];
                        $id = $_POST['id'];
                        updatedm($tenloai, $id);
                        $thongbao = "cap nhat thanh cong";
                    }
                }


                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

                // controller san pham
            case 'addsp':

                // kiem tra nguoi dung co click vao nut add hay khong??
                if (isset($_POST['themmoi'])) {
                    if (empty($_POST['tensp'])) {
                        $thongbaotenloai = "<span style='color:red'>Ban chua nhap ten loai</span>";
                    } else {
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        // Khoi tao $filename nay để thêm vào phần cơ sở dữ liệu mysql
                        $filename = $_FILES['hinh']['name'];
                        // Phần này thêm file ảnh vào thư mục upload 
                        $target_dir = "../upload/"; // vi tri file chua anh
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]); // link nguon chua anh (../upload/ten file anh vua moi them)
                        if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }

                        insert_sanpham($tensp, $giasp, $filename, $mota, $iddm);
                        $thongbao = "Them thanh cong";
                    }
                }
                $listdanhmuc = loadAll_danhmuc();

                include "sanpham/add.php";
                break;
            case 'phanhoi':


                $listbinhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'listsp':
                if (isset($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsanpham = loadAll_sanpham($kyw, $iddm);
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_sanpham($_GET['id']);
                }

                $listsanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $sanpham = loadOne_sanpham($_GET['id']);
                }
                $listdanhmuc = loadAll_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                // kiem tra nguoi dung co click vao nut cap nhat hay khong??
                if (isset($_POST['capnhat'])) {

                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $filename = $_FILES['hinh']['name'];

                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    updatesp($id, $tensp, $giasp, $mota, $filename, $iddm);
                    $thongbao = "cap nhat thanh cong";
                }
                $listdanhmuc = loadAll_danhmuc();

                $listsanpham = load_sanpham();


                include "sanpham/list.php";
                break;

            case 'updatebill':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $billhoadondat = loadOne_bill($_GET['id']);
                }
                //   $listhoadondat = loadAll_bill();
                include "bill/updatebill.php";
                break;
            case 'suabill':
                if (isset($_POST['capnhat'])) {

                    $id = $_POST['ma'];
                    $ten = $_POST['ten'];
                    $dc = $_POST['dc'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];

                    $sl = $_POST['soluong'];
                    $giasp = $_POST['giatri'];
                    $tt = $_POST['tinhtrangdon'];
                    $ngaydat = $_POST['ngaydat'];

                    updatebill($id, $ten, $dc, $sdt, $email, $giasp, $tt, $ngaydat);
                    $thongbao = "cap nhat thanh cong";
                }
                $listbill = loadAll_bill($_SESSION['user']['id']);
                include "bill/listbill.php";

                break;
            case 'dskh':

                $listtaikhoan = loadAll_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'xoabl':
                if (isset($_GET['id'])) {
                    delete_bl($_GET['id']);
                }
                $listbinhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'dsbl':
                $listbinhluan = loadAll_binhluan(0);
                include "binhluan/list.php";
                break;
            case 'xoadondat':
                if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_cart($_GET['id']);
                    delete_hoadondat($_GET['id']);
                }
                $listbill = loadAll_bill($kyw, 0);
                include "bill/listbill.php";
                break;
            case 'danhsachhoadon':
                if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listbill = loadAll_bill($kyw, 0);
                include "bill/listbill.php";
                break;
            case 'thongke':
                $listtk = loadAll_thongke();
                include "thongke/list.php";
                break;
            case 'bieudo':
                $listbieudo = loadAll_thongke();

                include "thongke/bieudo.php";

                break;
            case 'doanhthu':
                $listtongdon1 = load_tongtiendonhang_theothang1();
                $listtongdon2 = load_tongtiendonhang_theothang2();
                $listtongdon3 = load_tongtiendonhang_theothang3();
                $listtongdon4 = load_tongtiendonhang_theothang4();
                $listtongdon5 = load_tongtiendonhang_theothang5();
                $listtongdon6 = load_tongtiendonhang_theothang6();
                $listtongdon7 = load_tongtiendonhang_theothang7();
                $listtongdon8 = load_tongtiendonhang_theothang8();
                $listtongdon9 = load_tongtiendonhang_theothang9();
                $listtongdon10 = load_tongtiendonhang_theothang10();
                $listtongdon11 = load_tongtiendonhang_theothang11();
                $listtongdon12 = load_tongtiendonhang_theothang12();

                // print_r($listtongdon1);
                include "thongke/doanhthu.php";
                break;
            case 'xoatk':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_tk($_GET['id']);
                }

                $listtaikhoan = loadAll_taikhoan();
                include "taikhoan/list.php";
                break;
            default:
                include "home.php";
                break;
        }
    } else {
        $soluongDonThanhCong = demsoluongDonHangThanhCong();
        $soluongDangXuLy = demsoluongDangXuly();
        $soluongDangGiaoHang = demsoluongDangGiaoHang();
        $doanhthu = TongDoanhSo();
        if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
            $kyw = $_POST['kyw'];
        } else {
            $kyw = "";
        }
        $listbill = loadAll_bill_New($kyw, 0);
        // include "home.php";

        include "home.php";
    }

    include "footer.php";
} else {
    echo '<script>alert("Ban chua dang nhap")</script>';
    header('location:http://duan.test:8999/index.php?act');
}
