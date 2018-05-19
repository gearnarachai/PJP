<?php
include '../js/function_db.php';
include '../js/session_check.php';
    $sql =" INSERT INTO tb_officer (ofc_username, ofc_password, ofc_tiname, ofc_firstname, ofc_lastname, ofc_position,ofc_call,ofc_status)
VALUES ('".$_POST['ofc_username']."', '".$_POST['ofc_password']."', '".$_POST['ofc_tiname']."','".$_POST['ofc_firstname']."',
   '".$_POST['ofc_lastname']."', '".$_POST['ofc_position']."', '".$_POST['ofc_call']."', '".$_POST['ofc_status']."') ";
    $rs = in_up_delSql($sql);


    echo "OK";
 ?>
