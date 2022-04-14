<?php
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
} 
function delete_bl($id){
    $sql = "delete from binhluan where id = " . $id;
                pdo_execute($sql);
}
function loadAll_binhluan($idpro){
    $sql = "Select * from binhluan where 1";
    if($idpro > 0)
    $sql .= " AND idpro = '".$idpro."'";
    $sql .= "  order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function loadName_binhluan($iduser){
    $sql = "Select user from taikhoan where id =". $iduser;
    $listbl = pdo_query_value($sql);
    return $listbl;
}

