<?php 
  function demsoluongDonHangThanhCong(){
    $sql = "SELECT count(id) as soluong FROM `bill` WHERE bill_status = 3 " ;
    $soluong =  pdo_query_value($sql);
    return $soluong;
  }
  function demsoluongDangXuly(){
    $sql = "SELECT count(id) as soluong FROM `bill` WHERE bill_status = 1 " ;
    $soluong =  pdo_query_value($sql);
    return $soluong;
  }
  function demsoluongDangGiaoHang(){
    $sql = "SELECT count(id) as soluong FROM `bill` WHERE bill_status = 2 " ;
    $soluong =  pdo_query_value($sql);
    return $soluong;
  }
  function TongDoanhSo(){
    $sql = "SELECT sum(total) as tong FROM `bill` WHERE bill_status = 3 " ;
    $tong =  pdo_query_value($sql);
    return $tong;
  }
?>