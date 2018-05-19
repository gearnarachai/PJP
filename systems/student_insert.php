<?php

include '../js/function_db.php';
include '../js/session_check.php';
 ?>
<div class="">
  <form>

  <div class="container">
    <table align="center" class="" border="0" width="35%">
      <tr height="50">
        <td>
        รหัสนักศึกษา
        </td>
        <td>
        <input type="text" class="form-control" id="std_code"  placeholder="รหัสนักศึกษา">
        </td>
      </tr>
      <tr height="50">
        <td>
        คำนำหน้าชื่อ
        </td>
        <td>
        <select class="form-control" id="std_tiname">
    <?php

      $sql = "SELECT * From tb_tiname";
      $results = selectSql($sql);
      foreach ($results as $row) {
        ?>

          <option value="<?php echo $row['ti_id']; ?>" > <?php echo $row['ti_name'];?></option>
    <?php  } ?>

    </select>
        </td>
      </tr>
      <tr height="50">
        <td>
        ชือ
        </td>
        <td>
        <input type="text" class="form-control" id="std_firstname"  placeholder="ชื่อจริง">
        </td>
      </tr>
      <tr height="50">
        <td>
        นามสกุล
        </td>
        <td>
        <input type="text" class="form-control" id="std_lastname"  placeholder="นามสกุล">
        </td>
      </tr>
      <tr height="50">
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

          <option value="<?php echo $row1['fac_id']; ?>" > <?php echo $row1['fac_name'];?></option>
    <?php  } ?>

    </select>
        </td>
      </tr>
      <tr height="50">
        <td>
        ปี
        </td>
        <td>
        <input type="text" class="form-control" id="std_year"  placeholder="ปี">
        </td>
      </tr>
      <tr height="50">
        <td>
        น้ำหนัก
        </td>
        <td>
        <input type="text" class="form-control" id="sym_weight"  placeholder="น้ำหนัก">
        </td>
      </tr>
      <tr height="50">
        <td>
        ส่วนสูง
        </td>
        <td>
        <input type="text" class="form-control" id="sym_height"  placeholder="ส่วนสูง">
        </td>
      </tr>
      <tr height="50">
        <td>
        ยาที่แพ้
        </td>
        <td>
        <input type="text" class="form-control" id="sym_allergic"  placeholder="ยาที่แพ้">
        </td>
      </tr>
      <tr height="50">
        <td>
        โรคประจำตัว
        </td>
        <td>
        <input type="text" class="form-control" id="sym_disease"  placeholder="โรคประจำตัว">
        </td>
      </tr>
      <tr><td><button type="submit" id="insert_data" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> บันทึก</button></td></tr>

    </table>
  </div>

  </form>


  <?php
  $sql3 =" SELECT std_code FROM tb_student ";
  $results3 = selectSql($sql3);

   ?>


</div>
<script type="text/javascript">

    $("#insert_data").click(function()
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
{
        $.post("systems/student_insert_pro.php",{
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
                alert("Insert OK");
                $("#showmain").load("systems/symphom_list.php");
            }
            else{
                alert(msg +" | "+"Can not Insert");
            }
        });
}
    });

</script>
