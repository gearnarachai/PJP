<?php
include '../js/function_db.php';
include '../js/session_check.php';
    $sql =" UPDATE tb_student SET std_code ='".$_POST['std_code']."',
                                   std_tiname = '".$_POST['std_tiname']."',
                                   std_firstname = '".$_POST['std_firstname']."',
                                   std_lastname = '".$_POST['std_lastname']."',
                                   std_faculty = '".$_POST['std_faculty']."',
                                   std_year = '".$_POST['std_year']."'
                                   WHERE std_code = '".$_POST['std_code']."' ";
      $rs = in_up_delSql($sql);

      $sql1 =" UPDATE tb_symptom SET std_code = '".$_POST['std_code']."',
                                     sym_weight = '".$_POST['sym_weight']."',
                                     sym_height = '".$_POST['sym_height']."',
                                     sym_allergic =   '".$_POST['sym_allergic']."',
                                     sym_disease = '".$_POST['sym_disease']."'
                                     WHERE std_code = '".$_POST['std_code']."' ";
      $rs1 = in_up_delSql($sql1);
    echo "OK";
 ?>
