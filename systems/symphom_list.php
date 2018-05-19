<?php
include '../js/function_db.php';
include '../js/session_check.php';
//echo $_POST['page'];
 ?>

 <div class="container">

   <table class="table table-hover" border="0" style="width:80%" align="center">
     <thead>
         <tr>
             <th> </th>
             <th>  </th>
             <th>  </th>
             <th>  </th>
             <th>  </th>
             <th>  </th>
             <th>  </th>
             <th>  </th>
         </tr>

     </thead>
   <thead>
       <tr>
         <th> ลำดับ </th>
           <th> รหัสนักศึกษา </th>
           <th> ชื่อ </th>
           <th> น้ำหนัก </th>
           <th> ส่วนสูง </th>
           <th> ยาที่แพ้ </th>
           <th> โรคประจำตัว </th>
           <th>  </th>
           <th>  </th>
       </tr>
   </thead>
   <tbody>
   <?php
   $num = 0+$_POST['page'];
   $sql = ' SELECT tb_symptom.std_code, concat(tb_tiname.ti_name," ",tb_student.std_firstname," ",tb_student.std_lastname) as nameStd
   ,sym_weight,sym_height,sym_allergic,sym_disease FROM tb_symptom
   LEFT JOIN tb_student
   ON tb_student.std_code = tb_symptom.std_code
   LEFT JOIN tb_tiname
   ON tb_tiname.ti_id = tb_student.std_tiname
    ';

   if (($_POST['search'])!=null) {
              //$sql .= " AND (tb_treat.std_code LIKE '%".$_POST['search']."%'";
              //$sql .= " OR tb_treat.std_code   LIKE '%".$_POST['search']."%')";
              $sql .= ' WHERE (tb_student.std_code LIKE "%'.$_POST['search'].'%" OR tb_student.std_firstname LIKE "%'.$_POST['search'].'%"
              OR tb_student.std_lastname LIKE "%'.$_POST['search'].'%" )
              ORDER BY tb_symptom.std_code ASC limit '.$num.',5 ';
           }else
           {
                $sql .= ' ORDER BY tb_symptom.std_code ASC limit '.$num.',5 ' ;

           }
   $results = selectSql($sql);
       foreach ($results as $row)
       { $i++ ?>
       <tr >
         <td><?php echo $i; ?></td>
           <td onclick="button" style="cursor:pointer" data-toggle="modal" data-target="#myModal" id="showdata" name="<?php echo $row['std_code']; ?>"><?php echo $row['std_code']; ?></td>
           <td onclick="button" style="cursor:pointer" data-toggle="modal" data-target="#myModal" id="showdata" name="<?php echo $row['std_code']; ?>"><?php echo $row['nameStd']; ?></td>
           <td><?php echo $row['sym_weight']; ?></td>
           <td><?php echo $row['sym_height']; ?></td>
           <td><?php echo $row['sym_allergic']; ?></td>
           <td><?php echo $row['sym_disease']; ?></td>
           <td><button type="button" id="edit_data" class="btn btn-warning" name="<?php echo $row['std_code']; ?>" >แก้ไข <i class="glyphicon glyphicon-wrench"></i> </button></td>
           <td><button type="button" style="cursor:pointer" data-toggle="modal" data-target="#myDelete" id="delete_data" class="btn btn-danger" name="<?php echo $row['std_code']; ?>" >ลบ <i class="glyphicon glyphicon-remove"></i> </button></td>

       </tr>
       </tr>
     <?php }  ?>
   </tbody>
   </table>
   </div>


   <!--    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
   <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">

         <div class="modal-header p-3 mb-2 bg-primary text-white">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> ข้อมูลนักศึกษา</h4>
         </div>

         <div class="modal-body" id="showStd">
           <p>Some text in the modal.</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
         </div>

       </div>

     </div>
   </div>


   <div id="myDelete" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header p-3 mb-2 bg-danger text-white">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-remove"></i> &nbsp;ยืนยันการลบข้อมูล</h4>
         </div>
         <div class="modal-body" id="showTreat">
           <p>คุณต้องการลบข้อมูล ใช่ หรือ ไม่.</p>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-danger"  data-dismiss="modal" id="delete_data1"><i class="glyphicon glyphicon-ok"></i> ยืนยัน</button>
         <button type="button" class="btn btn-default" data-dismiss="modal" ><i class="glyphicon glyphicon-remove"></i> ยกเลิก</button>
         </div>
       </div>
     </div>
</div>

      <script type="text/javascript">
         $("*[id^=showdata]").click(function()
         {
             var id = $(this).attr('name');
             $("#showStd").load("systems/student_data.php",{id : id});
         });

         $("*[id^=edit_data]").click(function()
         {
           var id = $(this).attr('name');
           $("#showmain").load("systems/student_edit.php",{id : id});

         });

         $("*[id^=addData]").click(function()
         {
             $("#showmain").load("systems/student_insert.php");
         });

          $("*[id^=delete_data]").click(function()
      {

        var id = $(this).attr('name');
        $("*[id^=delete_data1]").click(function()
      {

            $.post("systems/symphom_delete_pro.php",{
                id : id
            },function(msg){
                //alert(msg);
                if(msg == "OK")
                {
                    //alert("ลบข้อมูลเรียบร้อยแล้ว");
                    location.reload();
                    $("#showmain").load("systems/symphom_list.php");
                }
                else{alert(msg +" | "+"Can not Delete");}
            });

          });
      });
     </script>
