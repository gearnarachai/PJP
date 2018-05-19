<?php

include '../js/function_db.php';
include '../js/session_check.php';

$sql = ' SELECT tb_symptom.std_code, concat(tb_tiname.ti_name," ",tb_student.std_firstname," ",tb_student.std_lastname) as nameStd
,sym_weight,sym_height,sym_allergic,sym_disease,tb_student.std_firstname,tb_student.std_lastname,tb_student.std_tiname,
tb_student.std_faculty,tb_student.std_year,tb_symptom.sym_weight,tb_symptom.sym_height,tb_symptom.sym_allergic,tb_symptom.sym_disease FROM tb_symptom
LEFT JOIN tb_student
ON tb_student.std_code = tb_symptom.std_code
LEFT JOIN tb_tiname
ON tb_tiname.ti_id = tb_student.std_tiname
WHERE tb_symptom.std_code = '.$_POST['id'].'
 ';
 $results = selectSql($sql);
 foreach ($results as $row)
 {
 ?>
<div class="">
  <form>

  <div class="container">
    <table align="center" class="" border="0" width="35%">
      <tr>
        <td>
        รหัสนักศึกษา
        </td>
        <td>
        <input type="text" class="form-control" id="std_code"  placeholder="รหัสนักศึกษา" value="<?php echo $row['std_code']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        คำนำหน้าชื่อ
        </td>
        <td>
          <select class="form-control" id="std_tiname">
    <?php

      $sql1 = "SELECT * From tb_tiname";
      $results1 = selectSql($sql1);
      foreach ($results1 as $row1) {
        ?>

          <option value="<?php echo $row1['ti_id']; ?>"<?php if($row1['ti_id']==$row['std_tiname']){echo "selected";}?> > <?php echo $row1['ti_name'];?></option>
    <?php  } ?>

    </select>
        </td>
      </tr>
      <tr>
        <td>
        ชือ
        </td>
        <td>
        <input type="text" class="form-control" id="std_firstname"  placeholder="ชื่อจริง" value="<?php echo $row['std_firstname']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        นามสกุล
        </td>
        <td>
        <input type="text" class="form-control" id="std_lastname"  placeholder="นามสกุล" value="<?php echo $row['std_lastname']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        คณะ
        </td>
        <td>
          <select class="form-control" id="std_faculty">
    <?php

      $sql1 = "SELECT * From tb_faculty";
      $results1 = selectSql($sql1);
      foreach ($results1 as $row1) {
        ?>

          <option value="<?php echo $row1['fac_id']; ?>"<?php if($row1['fac_id']==$row['std_faculty']){echo "selected";}?> > <?php echo $row1['fac_name'];?></option>
    <?php  } ?>

    </select>
        </td>
      </tr>
      <tr>
        <td>
        ปี
        </td>
        <td>
        <input type="text" class="form-control" id="std_year"  placeholder="ปี" value="<?php echo $row['std_year']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        น้ำหนัก
        </td>
        <td>
        <input type="text" class="form-control" id="sym_weight"  placeholder="น้ำหนัก" value="<?php echo $row['sym_weight']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        ส่วนสูง
        </td>
        <td>
        <input type="text" class="form-control" id="sym_height"  placeholder="ส่วนสูง" value="<?php echo $row['sym_height']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        ยาที่แพ้
        </td>
        <td>
        <input type="text" class="form-control" id="sym_allergic"  placeholder="ยาที่แพ้" value="<?php echo $row['sym_disease']; ?>">
        </td>
      </tr>
      <tr>
        <td>
        โรคประจำตัว
        </td>
        <td>
        <input type="text" class="form-control" id="sym_disease"  placeholder="โรคประจำตัว" value="<?php echo $row['sym_allergic']; ?>">
        </td>
      </tr>
      <tr><td><button type="submit" id="update_data" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> บันทึก</button></td></tr>

    </table>
  </div><?php } ?>

  </form>

</div>
<script type="text/javascript">

$("#update_data").click(function()
{
  var std_code = $("#std_code").val();
  var std_tiname = $("#std_tiname").val();
  var std_firstname = $("#std_firstname").val();
  var std_lastname = $("#std_lastname").val();
  var std_faculty = $("#std_faculty").val();
  var std_year = $("#std_year").val();
  var sym_weight = $("#sym_weight").val();
  var sym_height = $("#sym_height").val();
  var sym_allergic = $("#sym_allergic").val();
  var sym_disease = $("#sym_disease").val();

    //var times = $("#time").val();

    $.post("systems/student_edit_pro.php",{
      std_code : std_code,
      std_tiname : std_tiname,
      std_firstname : std_firstname,
      std_lastname : std_lastname,
      std_faculty : std_faculty,
      std_year : std_year,
      sym_weight : sym_weight,
      sym_height : sym_height,
      sym_allergic : sym_allergic,
      sym_disease : sym_disease
        //times : times
    },function(msg){
        //alert(msg);
        if(msg == "OK")
        {
            alert("แก้ไขข้อมูลสำเร็จ");
            $("#showmain").load("systems/symphom_show.php");
        }
        else{
            alert(msg +" | "+"Can not Insert");
        }
    });
});

</script>
