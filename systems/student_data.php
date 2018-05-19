<?php
include '../js/function_db.php';
include '../js/session_check.php';
$sql=' SELECT tb_student.std_code ,concat(tb_tiname.ti_name," ",std_firstname," ",std_lastname) as nameStd ,tb_faculty.fac_name,std_year FROM tb_student
LEFT JOIN tb_tiname
ON tb_tiname.ti_id = tb_student.std_tiname
LEFT JOIN tb_faculty
ON tb_faculty.fac_id = tb_student.std_faculty
WHERE tb_student.std_code = '.$_POST['id'].'  ';
  $rs = selectSql($sql);
 ?>
 <form>
 <table border="1" class="table table-bordered">
     <?php foreach($rs as $row){?>
 <div class="row">
   <div class=" col-md-offset-1" >
   <thead>
      <tr>
        <th>รหัสนักศึกษา</th>
        <th><?php echo $row['std_code']; ?></th>

      </tr>
      <tr>
        <th>ชื่อ-นามสกุล</th>
        <th><?php echo $row['nameStd']; ?></th>
      </tr>
      <tr>
        <th>คณะ </th>
        <th><?php echo $row['fac_name']; ?></th>
      </tr>
      <tr>
        <th>ปี</th>
        <th><?php echo $row['std_year']; ?></th>
      </tr>

   <?php  } ?>

 </div>
 </div>

</table>
 </form>
