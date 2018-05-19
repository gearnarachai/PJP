<?php
include '../js/function_db.php';
include '../js/session_check.php';
$sql = " DELETE FROM tb_student WHERE tb_student.std_code = '".$_POST['id']."' ";
$rs = in_up_delSql($sql);

$sql1 = " DELETE FROM tb_symptom WHERE tb_symptom.std_code = '".$_POST['id']."' ";
$rs1 = in_up_delSql($sql1);

echo "OK";
?>
