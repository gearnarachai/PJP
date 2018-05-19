<?php

include '../js/function_db.php';
include '../js/session_check.php';

echo $_POST['param1'];
$sql1 = " SELECT * From tb_drug WHERE typ_id = '".$_POST['param1']."'";
$results1 = selectSql($sql1);
//echo "$sql1";
foreach ($results1 as $row1) {
  ?>

    <option value="<?php echo $row1['dru_id']; ?>" > <?php echo $row1['dru_name'];?></option>
<?php  }

 ?>
