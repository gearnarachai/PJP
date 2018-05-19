<?php
include '../js/function_db.php';
include '../js/session_check.php';
    $sql =" UPDATE tb_officer SET  ofc_username ='".$_POST['ofc_username']."',
                                   ofc_password = '".$_POST['ofc_password']."',
                                   ofc_tiname = '".$_POST['ofc_tiname']."',
                                   ofc_firstname = '".$_POST['ofc_firstname']."',
                                   ofc_lastname = '".$_POST['ofc_lastname']."',
                                   ofc_position = '".$_POST['ofc_position']."',
                                   ofc_call  = '".$_POST['ofc_call']."',
                                   ofc_status  = '".$_POST['ofc_status']."'
                                   WHERE ofc_id = '".$_POST['ofc_id']."'";
      $rs = in_up_delSql($sql);


    echo "OK";
 ?>
