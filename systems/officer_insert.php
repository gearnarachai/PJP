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
        ชื่อผู้ใช้งาน
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_username"  placeholder="">
        </td>
      </tr>
      <tr height="50">
        <td>
        รหัสผ่าน
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_password"  placeholder="">
        </td>
      </tr>
      <tr height="50">
        <td>
        เพศ
        </td>
        <td>
        <select class="form-control" id="ofc_tiname">
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
        <input type="text" class="form-control" id="ofc_firstname"  placeholder="ชื่อจริง">
        </td>
      </tr>
      <tr height="50">
        <td>
        นามสกุล
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_lastname"  placeholder="นามสกุล">
        </td>
      </tr>

      <tr height="50">
        <td>
        ตำแหน่ง
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_position"  placeholder="">
        </td>
      </tr>
      <tr height="50">
        <td>
        เบอร์โทรศัพท์
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_call"  placeholder="">
        </td>
      </tr>
      <tr height="50">
        <td>
        สเตตัส
        </td>
        <td>
          <select class="form-control" id="ofc_status">
          <option value="" > --เลือก-- </option>
          <option value="1" > เจ้าหน้าที่ </option>
          <option value="0" > ผู้ดูแลระบบ </option>
          </select>
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
        var ofc_username = $("#ofc_username").val();
        var ofc_password = $("#ofc_password").val();
        var ofc_tiname = $("#ofc_tiname").val();
        var ofc_firstname = $("#ofc_firstname").val();
        var ofc_lastname = $("#ofc_lastname").val();
        var ofc_position = $("#ofc_position").val();
        var ofc_call = $("#ofc_call").val();
        var ofc_status = $("#ofc_status").val();

        //var times = $("#time").val();
{
        $.post("systems/officer_insert_pro.php",{
            ofc_username : ofc_username,
            ofc_password : ofc_password,
            ofc_tiname : ofc_tiname,
            ofc_firstname : ofc_firstname,
            ofc_lastname : ofc_lastname,
            ofc_position : ofc_position,
            ofc_call : ofc_call,
            ofc_status : ofc_status
            //times : times
        },function(msg){
            //alert(msg);
            if(msg == "OK")
            {
                alert("Insert OK");
                $("#showmain").load("systems/officer_list.php");
            }
            else{
                alert(msg +" | "+"Can not Insert");
            }
        });
}
    });

</script>
