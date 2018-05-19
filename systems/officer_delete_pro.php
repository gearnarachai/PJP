<?php
include '../js/function_db.php';
include '../js/session_check.php';

$sql = " DELETE FROM tb_officer WHERE ofc_id = '".$_POST['id']."' ";
$rs = in_up_delSql($sql);
echo "OK";
?>
