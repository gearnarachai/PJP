<?php
include '../js/function_db.php';
include '../js/session_check.php';
    $sql =" INSERT INTO tb_student (std_code, std_tiname, std_firstname, std_lastname, std_faculty, std_year)
VALUES ('".$_POST['std_code']."', '".$_POST['std_tiname']."', '".$_POST['std_firstname']."','".$_POST['std_lastname']."', '".$_POST['std_faculty']."', '".$_POST['std_year']."') ";
    $rs = in_up_delSql($sql);

    $sql1 =" INSERT INTO tb_symptom (std_code, sym_weight, sym_height, sym_allergic, sym_disease)
    VALUES ('".$_POST['std_code']."', '".$_POST['sym_weight']."', '".$_POST['sym_height']."',
      '".$_POST['sym_allergic']."', '".$_POST['sym_disease']."') ";
    $rs1 = in_up_delSql($sql1);

    echo "OK";
 ?>
