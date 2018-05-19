<?php
include '../js/function_db.php';
include '../js/session_check.php';

/*
session_start();
if (!isset($_SESSION["username"])){
?>
  <script type="text/javascript">
    $("#showmain").load("systems/login.php");
  </script>
  <?php
}*/

if($_POST['code'] != null )
{
$sql = 'SELECT * FROM tb_student WHERE std_code = '.$_POST['code'].' ';
$results = selectSql($sql);
foreach ($results as $row)
{
    $row['std_code'];
}

if($_POST['code'] != $row['std_code'] )
{
    echo '<img src="image/load.gif" height="15" width="15"><font color="red"> ไม่มีข้อมูลนักศึกษาในระบบ </font>'; //"* ไม่มีข้อมูลนักศึกษาในระบบ";
}
else if($_POST['code'] == $row['std_code'] )
{
    echo '<img src="image/correct.png" height="15" width="15"><font color="green"> ข้อมูลนักศึกษาถูกต้อง </font>'; //"* ไม่มีข้อมูลนักศึกษาในระบบ";
}
}
else {echo '<font color="red"> * กรุณากรอกรหัสนักศึกษา </font>';}
?>
