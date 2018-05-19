<?php

include '../js/function_db.php';
include '../js/session_check.php';
 ?>

 <div class="container">

   <form>

     <table align="center" class="" border="0" width="60%">

       <tr height="50">
         <td>รหัสนักศึกษา</td><td>  <div id="show_list" class=""></div><input type="text" class="form-control" id="std_code"  placeholder="รหัสนักศึกษา"></td>
       </tr>

       <tr height="50">
         <td>อาการ</td><td><input type="text" class="form-control" id="tre_detail"  placeholder="อาการ"></td>
       </tr>
       <tr height="50">
         <td>ยาที่จ่าย(1)</td><td><select class="form-control" id="tre_drug2">
         <option value="" > --เลือกประเภทยา-- </option>
     <?php

       $sql = "SELECT * From tb_typedrug";
       $results = selectSql($sql);
       foreach ($results as $row) {
         ?>

           <option value="<?php echo $row['typ_id']; ?>" > <?php echo $row['typ_name'];?></option>
     <?php  } ?>

     </select></td>
     <td> <select class="form-control" id="showdrug">
     <option value="0" > --กรุณาเลือกประเภทยาก่อน-- </option>
     </select></td>

       </tr>


       <tr height="50">
         <td>ยาที่จ่าย(2)</td><td><select class="form-control" id="tre_drug1">
         <option value="" > --เลือกประเภทยา-- </option>
     <?php

       $sql1 = "SELECT * From tb_typedrug";
       $results1 = selectSql($sql1);
       foreach ($results1 as $row1) {
         ?>

           <option value="<?php echo $row1['typ_id']; ?>" > <?php echo $row1['typ_name'];?></option>
     <?php  } ?>

     </select></td>
     <td> <select class="form-control" id="showdrug1">
     <option value="0" > --กรุณาเลือกประเภทยาก่อน-- </option>
     </select></td>

       </tr>

       <tr height="50">
         <td><button type="submit" id="insert_data" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> บันทึก</button></td>
       </tr>
     </table>

   </form>


 </div>
 <script type="text/javascript">
 $("*[id^=tre_drug2]").change(function()
    {

        var tre_drug2 = $(this).val();

        $.post("systems/treat_insert_drug.php",{
            param : tre_drug2,

        },function(msg){
          //alert(msg);
                //alert("Insert OK");
                $("#showdrug").html(msg);


        });
    });

    $("*[id^=tre_drug1]").change(function()
       {

           var tre_drug1 = $(this).val();

           $.post("systems/treat_insert_drug1.php",{
               param1 : tre_drug1,

           },function(msg1){
             //alert(msg1);
                   //alert("Insert OK");
                   $("#showdrug1").html(msg1);


           });
       });

    $("#insert_data").click(function()
    {
        var std_code = $("#std_code").val();
        var tre_detail = $("#tre_detail").val();
        var tre_drug2 = $("#tre_drug2").val();
        var showdrug = $("#showdrug").val();
        var tre_drug1 = $("#tre_drug1").val();
        var showdrug1 = $("#showdrug1").val();

        //var times = $("#time").val();

        $.post("systems/treat_insert_pro.php",{
            std_code : std_code,
            tre_detail : tre_detail,
            tre_drug2 : tre_drug2,
            showdrug : showdrug,
            tre_drug1 : tre_drug1,
            showdrug1 : showdrug1
            //times : times
        },function(msg){
            //alert(msg);
            if(msg == "OK")
            {
                //alert("เพิ่มข้อมูลสำเร็จ");
                $("#showmain").load("systems/treat_show.php");
            }
            else{
                alert(msg +" | "+"ไม่มีข้อมูลจากรหัสนักศึกษา");
            }
        });
    });


$('#std_code').keyup(function(){
  searchshow();
  //alert(data);
});

function searchshow(){
    $.post('systems/treat_insert_check.php',{
        code : $('#std_code').val()
    },function(data){
        //alert(data);

      $('#show_list').html(data);

    });
  }


</script>
