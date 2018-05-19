<?php
include '../js/function_db.php';
include '../js/session_check.php';

$sql = " SELECT *,concat(tb_tiname.ti_name,' ',ofc_firstname,' ',ofc_lastname) as ofc_name
FROM tb_officer LEFT JOIN tb_tiname
ON tb_tiname.ti_id=tb_officer.ofc_tiname
WHERE ofc_id = '".$_POST['id']."' ";
  $rs = selectSql($sql);

 ?>

 <form>
 <table border="1" class="table table-bordered">
     <?php foreach($rs as $row){?>
 <div class="row">
   <div class=" col-md-offset-1" >
   <thead>
      <tr>
        <th>ชื่อผู้ใช้</th>
        <th><?php echo $row['ofc_username']; ?></th>

      </tr>
      <tr>
        <th>รหัสผ่าน</th>
        <th><?php echo $row['ofc_password']; ?></th>

      </tr>
      <tr>
        <th>ชื่อ-นามสกุล</th>
        <th><?php echo $row['ofc_name']; ?></th>
      </tr>
      <tr>
        <th>ตำแหน่ง </th>
        <th><?php echo $row['ofc_position']; ?></th>
      </tr>
      <tr>
        <th>เบอร์โทรศัพท์</th>
        <th><?php echo $row['ofc_call']; ?></th>
      </tr>
      <tr>
        <tr>
          <th>สถานะ</th>
          <th><?php if ($row['ofc_status']==0) {
            echo 'ผู้ดูแลระบบ';
          }else if ($row['ofc_status']==1) {
            echo 'เจ้าหน้าที่';
          }

          ?></th>
        </tr>


   <?php  } ?>

 </div>
 </div>

 </table>
 </form>
