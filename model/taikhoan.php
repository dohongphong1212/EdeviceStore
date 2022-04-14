<?php
function Kiemtra_TkFB_DaTonTaiChua($email, $user)
{
 $sql1 = "select * from taikhoan where user ='".$user."' and email ='".$email."'";
  $kq = pdo_query_value($sql1);
  return $kq;
}
function insert_TKFB($email, $user){
   
       $sql = "insert into taikhoan(email,user) values('$email','$user')";
       pdo_execute($sql);
    
}
function get_userGoogle($user,$email)
{
    $sql = "select * from taikhoan where user = '".$user."' and email = '".$email."' ";
    $dm = pdo_query_one($sql);
    return $dm;

}
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
} 

function get_user($user,$pass)
{
   if ($user == " ' or '1'='1" || $pass == " ' or '1'='1") {
     return false;
   }
   
    $sql = "select * from taikhoan where user = '".$user."' and pass = '".$pass."' ";
    $dm = pdo_query_one($sql);
    return $dm;

}
function get_mk($id)
{
    $sql = "select pass from taikhoan where id = '".$id."'";
    $dm = pdo_query_value($sql);
    return $dm;
}
function get_tenuser($id)
{
    if ($id == " ' or '1'='1") {
        return false;
      }
      
       $sql = "select user from taikhoan where id = '".$id."' ";
       $dm = pdo_query_value($sql);
       return $dm;
      
}
function updatetk($email,$user,$phone,$address,$id)
{
    
        $sql = "update taikhoan set user = '{$user}',email = '{$email}',address = '{$address}',tel = '{$phone}' where id = '{$id}'";

    pdo_execute($sql);
    //  var_dump($sql);
}
function edit_mk($id,$pass)
{
    
        $sql = "update taikhoan set pass = '{$pass}' where id = '{$id}'";

    pdo_execute($sql);
}
function check_email($email)
{
    $sql = "select * from taikhoan where  email = '".$email."' ";
    $dm = pdo_query_one($sql);
    return $dm;
}
function loadAll_taikhoan(){
    $sql = "Select * from taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_tk($id){
    $sql = "delete from taikhoan where id = " . $id;
    pdo_execute($sql);
}

?>