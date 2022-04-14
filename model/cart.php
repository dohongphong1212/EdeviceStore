<?php
function viewcart($del)
{

   global $imgpath;
   $tong = 0;
   $id = 0;
   if ($del == 1) {
      $xoasp_th = '<th>Thao tác</th>';
   } else {
      $xoasp_th = "";
   }
   echo '<tr >
    <th>Hình</th>
     <th>Sản phẩm</th>
     <th>Đơn giá</th>
     <th>Số lượng</th>
     <th>Thành tiền</th>
    ' . $xoasp_th . '
    </tr>';
   foreach ($_SESSION['mycart'] as $cart) {
      $hinh = $imgpath . $cart['img'];
      $ttien = $cart['price'] * $cart['soluong'];
      $tong += $ttien;
      if ($del == 1) {
         $xoasp_td = '<a href="index.php?act=delcart&idcart=' . $id . '"><input  type="button" value="X"></a>';
      } else {
         $xoasp_td = "";
      }
      echo '
         <tr style="text-align:center">
         <td><img  style="margin: 20px;" src="' . $hinh . '" alt="" width="80px" height=""80px></td>
         <td>' . $cart['name'] . '</td>
         <td  style="    padding: 20px;" >' . currency_format($cart['price'], '') . '</td>
         <td><input  style="margin: 20px;"  type="number" min ="1" max="10" name="qty[' . $cart['id'] . ']" value="' . $cart['soluong'] . '" class="num-order"></td>
         <td style=" text-align: center;   padding: 20px;">' . currency_format($ttien, '') . '</td>
        <td style=" text-align:center;"> ' . $xoasp_td . ' </td>
         </tr>';
      $id++;
   }
   echo '
    <tr >
      <td colspan="4"></td>
         <td style="color:red;text-align: center;">Tổng đơn hàng:' . currency_format($tong, '') . 'VNĐ</td>

         </tr>

    ';
}

function update_cart_buy($qty)
{
   // cập nhật lại số lượng và thành tiên cho mảng session
   foreach ($qty as $id => $newqty) {
      $_SESSION['mycart'][$id]['soluong'] = $newqty;
      $_SESSION['mycart'][$id]['thanhtien'] = $newqty * $_SESSION['mycart'][$id]['price'];
   }
   //   echo '<pre>';
   //   print_r( $_SESSION['mycart']);
   //   echo '</pre>';
   // tính lại số lượng vs tổng tiền của mặt hàng đó
   //   if (isset($_SESSION['mycart'])) {
   //    $num_order = 0;
   //    $total = 0;
   //    foreach ($_SESSION['mycart'] as $item) {
   //        $num_order += $item['soluong'];
   //        $total += $item['thanhtien'];
   //    }


   //}
}
function show_chitiet_bill($listbill)
{
   global $imgpath;
   $tong = 0;
   $id = 0;
   //  echo '<pre>';
   // print_r($listbill);
   // echo '</pre>';
   echo '<tr>
    <th>Hình</th>
     <th>Sản phẩm</th>
     <th>Đơn giá</th>
     <th>Số lượng</th>
     <th>Thành tiền</th>
   
    </tr>';
   foreach ($listbill as $cart) {
      $hinh = $imgpath . $cart['name'];
      $cart['thanhtien'] = $cart['price'] * $cart['soluong'];
      $tong += $cart['thanhtien'];

      echo '
         <tr>
         <td><img src="' . $hinh . '" alt="" width="80px" height=""80px></td>
         <td>' . $cart['img'] . '</td>
         <td>' . $cart['price'] . '</td>
         <td>' . $cart['soluong'] . '</td>
         <td>' . $cart['thanhtien'] . '</td>
        
         </tr>';
      $id++;
   }
   echo '
    <tr >
      <td colspan="4">Tông đơn hàng</td>
         <td>' . $tong . '</td>

         </tr>
    ';
}
function tongdonhang()
{

   $tong = 0;

   foreach ($_SESSION['mycart'] as $cart) {


      // $ttien = $cart['thanhtien']*$cart['soluong'];
      $tong += $cart['thanhtien'];
   }
   return $tong;
}
function demsoluonggiohang()
{
   $tongsoluong = 0;
   foreach ($_SESSION['mycart'] as $cart) {
      $tongsoluong += $cart['soluong'];
   }
   return $tongsoluong;
}
function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
   $sql = "insert into bill(bill_name,bill_address,bill_tel,bill_email,bill_pttt,total,ngaydathang,iduser) values('$name', '$address', '$tel', '$email','$pttt','$tongdonhang','$ngaydathang','$iduser')";

   return pdo_execute_lastInsertID($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
   $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser', '$idpro', '$img', '$name','$price','$soluong','$thanhtien','$idbill')";
   return pdo_execute($sql);
}
function loadone_bill($id)
{
   $sql = "select * from bill where id =" . $id;
   $bill = pdo_query_one($sql);
   return $bill;
}
function  updatebill($id, $ten, $dc, $sdt, $email, $giasp, $tt, $ngaydat)
{

   $sql = "update bill set bill_name = '{$ten}',bill_address = '{$dc}',bill_tel = '{$sdt}',bill_email = '{$email}',total = '{$giasp}',bill_status = '{$tt}',ngaydathang = '{$ngaydat}' where id = '{$id}'";


   pdo_execute($sql);
   //  var_dump($sql);
}
function loadAll_cart($idbill)
{
   $sql = "select * from cart where idbill =" . $idbill;
   $bill = pdo_query($sql);
   return $bill;
}
function  delete_cart($id)
{
   $sql = "delete from cart where idbill = " . $id;
   pdo_execute($sql);
}
function delete_hoadondat($id)
{
   $sql = "delete from bill where id = " . $id;
   pdo_execute($sql);
}
function loadAll_bill($id)
{
   // $id là tìm theo mã bill
   $sql = "select * from bill where 1 ";
   if ($id > 0)
      $sql .= "AND id =" . $id;

   $listbill = pdo_query($sql);
   return $listbill;
}
function load_cart_count($idbill)
{
   $sql = "select sum(soluong) as soluong from cart where idbill=" . $idbill;
   $listbill = pdo_query_one($sql);
   return $listbill;
}
function get_ttdh($n)
{
   switch ($n) {
      case '0':
         $tt = "Đơn hàng mới";
         break;
      case '1':
         $tt = "Đang xử lý";
         break;
      case '2':
         $tt = "Đang giao hàng";
         break;
      case '3':
         $tt = "Hoàn tất giao hàng";
         break;
      default:
         $tt = "Đơn hàng mới";
         break;
   }
   return $tt;
}
function currency_format($number, $suffix = 'đ')
{
   return number_format($number) . $suffix;
}
function loadAll_thongke()
{
   $sql = "select danhmuc.id as madm, danhmuc.name as tendm,count(sanpham.id) as countsp,min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
   $sql .= " from sanpham left join danhmuc on danhmuc.id = sanpham.iddm";
   $sql .= " group by danhmuc.id order by danhmuc.id desc";
   $listTK = pdo_query($sql);
   return $listTK;
}
function load_tongtiendonhang_theothang1()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-01-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang2()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-02-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang3()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-03-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang4()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-04-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang5()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-05-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang6()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-06-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang7()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-07-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang8()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-08-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang9()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-09-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang10()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-10-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang11()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-11-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function load_tongtiendonhang_theothang12()
{
   $sql1 = "SELECT sum(total) as tongtiendonhang FROM `bill` WHERE  ngaydathang like '%-12-%'";
   $listTK1 = pdo_query($sql1);
   return $listTK1;
}
function loadAll_bill_New($id)
{
   // $id là tìm theo mã bill
   $sql = "select * from bill where bill_status = 0 ";
   if ($id > 0)
      $sql .= "AND id =" . $id;

   $listbill = pdo_query($sql);
   return $listbill;
}
