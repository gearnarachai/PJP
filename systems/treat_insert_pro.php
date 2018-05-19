<?php
include '../js/function_db.php';
include '../js/session_check.php';

$sql3 =" SELECT std_code FROM tb_student ";
$results3 = selectSql($sql3);
foreach ($results3 as $row3 ) {



if($_POST['std_code']==$row3['std_code']){


  $sql1 ="  SELECT CONCAT('1.',tb_typedrug.typ_name,' : ',tb_drug.dru_name) as dru_name  FROM tb_drug
LEFT JOIN tb_typedrug
ON tb_typedrug.typ_id = tb_drug.typ_id
  WHERE tb_typedrug.typ_id = '".$_POST['tre_drug2']."' AND tb_drug.dru_id = '".$_POST['showdrug']."' ";
  //$results1 = in_up_delSql($sql1);

  $sql2 ="  SELECT CONCAT('2.',tb_typedrug.typ_name,' : ',tb_drug.dru_name) as dru_name1  FROM tb_drug
LEFT JOIN tb_typedrug
ON tb_typedrug.typ_id = tb_drug.typ_id
  WHERE tb_typedrug.typ_id = '".$_POST['tre_drug1']."' AND tb_drug.dru_id = '".$_POST['showdrug1']."' ";
  //$results2 = in_up_delSql($sql2);


  $results1 = selectSql($sql1);
      foreach ($results1 as $row1)
      {

           $tre_drug = $row1['dru_name'];

   }
   $results2 = selectSql($sql2);
       foreach ($results2 as $row2)
       {

            $tre_drug1 = $row2['dru_name1'];

    }
   date_default_timezone_set("Asia/Bangkok");
   $tre_date = date('Y/m/d H:i:s');

    $sql =" INSERT INTO tb_treat (std_code, tre_detail, tre_drug, tre_date)
    VALUES ('".$_POST['std_code']."', '".$_POST['tre_detail']."', '".$tre_drug."\n".$tre_drug1."', '".$tre_date."') ";
    $rs = in_up_delSql($sql);

    echo "OK";
  }
}

 ?>
