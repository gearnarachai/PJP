<?php
include '../js/function_db.php';
session_start();
$sql = "SELECT *,tb_tiname.ti_name
 FROM tb_officer LEFT JOIN tb_tiname
 ON tb_tiname.ti_id=tb_officer.ofc_tiname
 Where ofc_username = '".$_POST['username']."' and ofc_password = '".$_POST['password']."' ";
$result = selectSql($sql);
if ($result != null){
  foreach ($result as $row) {
      $_SESSION['username']  = $row['ofc_username'];
      $_SESSION['firstname']  = $row['ofc_firstname'];
      $_SESSION['lastname']  = $row['ofc_lastname'];
      $_SESSION['status']  = $row['ofc_status'];
      $_SESSION['tiname']  = $row['ti_name'];
    }
  echo 'OK';

}
else {
  session_destroy();
  if ($_POST['username']==null||$_POST['password']==null) {
echo '<font color="red">กรุณากรอกข้อมูลให้ครบ</font>';
  }
else {
echo '<font color="red">ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง</font>';
}
}
 ?>
