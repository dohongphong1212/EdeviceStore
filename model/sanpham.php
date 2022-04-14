<?php

function insert_sanpham($tensp, $giasp, $filename, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$filename','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "delete from sanpham where id = " . $id;
    pdo_execute($sql);
}
function demsoluongsanpham_theodm($iddm){
    $sql = "select count(*) from sanpham where iddm = " . $iddm;
    $soluong =  pdo_query_value($sql);
    return $soluong;
}
function loadAll_sanpham($kyw, $iddm)
{
    $sql = "Select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_sanpham()
{
    $sql = "Select * from sanpham ";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_sanpham_top10()
{
    $sql = "Select * from sanpham order by luotxem desc limit 10";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function soluong_spHome()
{
    $sql = "Select count(id) from sanpham";

    $Sosanpham = pdo_query_value($sql);
    return $Sosanpham;
}
function load_sanpham_home($item_per_page,$offset)
{
    $sql = "Select * from sanpham where 1 order by id desc limit ".$item_per_page." OFFSET ".$offset."";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadOne_sanpham($id)
{
    $sql = "select * from sanpham where id =" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id =" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = '{$iddm}' and id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function updatesp($id, $tensp, $giasp, $mota, $filename, $iddm)
{
    if ($filename != "")
        $sql = "update sanpham set name = '{$tensp}',price = '{$giasp}',img = '{$filename}',mota = '{$mota}',iddm = '{$iddm}' where id = '{$id}'";
    else
        $sql = "update sanpham set name = '{$tensp}',price = '{$giasp}',mota = '{$mota}',iddm = '{$iddm}' where id = '{$id}'";

    pdo_execute($sql);
    //  var_dump($sql);
}
