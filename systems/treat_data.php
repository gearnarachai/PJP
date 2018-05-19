<?php
include '../js/function_db.php';
include '../js/session_check.php';

$sql=' SELECT tb_treat.std_code , CONCAT(tb_tiname.ti_name," ",tb_student.std_firstname," ",tb_student.std_lastname) AS nameStd,
tb_treat.tre_detail,tb_treat.tre_drug,tb_treat.tre_date	 FROM tb_treat
   LEFT JOIN tb_student
   ON tb_student.std_code = tb_treat.std_code
   LEFT JOIN tb_tiname
   ON tb_tiname.ti_id = tb_student.std_tiname
   WHERE tb_treat.tre_id = '.$_POST['id'].'  ';
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
        <th>รายละเอียด </th>
        <th><?php echo $row['tre_detail']; ?></th>
      </tr>
      <tr>
        <th >ยาที่จ่ายให้</th>
        <th> <textarea rows="2" cols="50" readonly><?php echo $row['tre_drug']; ?></textarea> </th>
      </tr>
      <tr>
        <th>วันที่/เวลา</th>
        <th><?php
        date_default_timezone_set("Asia/Bangkok");
        //$date = $row['tre_date'];
        $date = date_create($row['tre_date']);

        echo date_format($date, 'd-m-Y / H:i น.'); ?></th>
      </tr>

   <?php  } ?>

 </div>
</div>

</table>
 </form>
