<?php

include '../js/function_db.php';
include '../js/session_check.php';
//echo $_POST['id'];

$sql=' SELECT * FROM tb_officer WHERE ofc_id = '.$_POST['id'].' ';
 $results = selectSql($sql);
 foreach ($results as $row)
 {
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
        <input type="text" class="form-control" id="ofc_username"  placeholder="" value="<?php echo $row['ofc_username']; ?>">
        </td>
      </tr>
      <tr height="50">
        <td>
        รหัสผ่าน
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_password"  placeholder=""value="<?php echo $row['ofc_password']; ?>">
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
      foreach ($results as $row1) {
        ?>

          <option value="<?php echo $row1['ti_id']; ?>" <?php if($row1['ti_id']==$row['ofc_tiname']){echo "selected";}?>> <?php echo $row1['ti_name'];?></option>
    <?php  } ?>

    </select>
        </td>
      </tr>
      <tr height="50">
        <td>
        ชือ
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_firstname"  placeholder="ชื่อจริง" value="<?php echo $row['ofc_firstname']; ?>">
        </td>
      </tr>
      <tr height="50">
        <td>
        นามสกุล
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_lastname"  placeholder="นามสกุล" value="<?php echo $row['ofc_lastname']; ?>">
        </td>
      </tr>

      <tr height="50">
        <td>
        ตำแหน่ง
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_position"  placeholder="" value="<?php echo $row['ofc_position']; ?>">
        </td>
      </tr>
      <tr height="50">
        <td>
        เบอร์โทรศัพท์
        </td>
        <td>
        <input type="text" class="form-control" id="ofc_call"  placeholder="" value="<?php echo $row['ofc_call']; ?>">
        </td>
      </tr>
      <tr height="50">
        <td>
        สเตตัส
        </td>
        <td>
          <select class="form-control" id="ofc_status">
            <option value="<?php echo $row['ofc_status']; ?>" ><?php if ($row['ofc_status']==1) {
              echo "เจ้าหน้าที่";
            }
            else if ($row['ofc_status']==0) {
              echo "ผู้ดูแลระบบ";
            }
            ?> </option>
          
          <option value="1" > เจ้าหน้าที่ </option>
          <option value="0" > ผู้ดูแลระบบ </option>
          </select>
        </td>
      </tr>

      <tr><td><button type="submit" id="edit_data" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> บันทึก</button></td></tr>

    </table>
  </div>

  </form>


  <?php
}
  $sql3 =" SELECT std_code FROM tb_student ";
  $results3 = selectSql($sql3);

   ?>


</div>
<script type="text/javascript">

    $("#edit_data").click(function()
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
        $.post("systems/officer_edit_pro.php",{
            ofc_id : <?php echo $_POST['id']; ?>,
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
                alert("Edit OK");
                $("#showmain").load("systems/officer_list.php");
            }
            else{
                alert(msg +" | "+"Can not Insert");
            }
        });
}
    });

</script>
