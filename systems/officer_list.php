<?php
include '../js/function_db.php';
include '../js/session_check.php';
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

         </tr>

     </thead>
   <thead>
       <tr>
         <th>  ลำดับ</th>
           <th> รหัสนักศึกษา </th>
           <th> ชื่อ-นามสกุล </th>
           <th> ตำแหน่ง</th>
           <th>  </th>
           <th>  </th>
       </tr>
   </thead>
   <tbody>
   <?php

$num = 0+$_POST['page'];
   $sql = " SELECT *,concat(tb_tiname.ti_name,' ',ofc_firstname,' ',ofc_lastname) as ofc_name
 FROM tb_officer LEFT JOIN tb_tiname
 ON tb_tiname.ti_id=tb_officer.ofc_tiname ";

  if (($_POST['search'])!=null) {
             //$sql .= " AND (tb_treat.std_code LIKE '%".$_POST['search']."%'";
             //$sql .= " OR tb_treat.std_code   LIKE '%".$_POST['search']."%')";
             $sql .= ' WHERE (ofc_username LIKE "%'.$_POST['search'].'%" OR ofc_firstname LIKE "%'.$_POST['search'].'%"
             OR ofc_lastname LIKE "%'.$_POST['search'].'%" )
             ORDER BY ofc_id DESC limit '.$num.',5
             ';
          }else
          {
               $sql .= ' ORDER BY ofc_id ASC limit '.$num.',5 ' ;

          }

   $results = selectSql($sql);
       foreach ($results as $row)
       {  $i++ ?>
       <tr >
         <td><?php echo $i; ?></td>
           <td onclick="button" style="cursor:pointer" data-toggle="modal" data-target="#myModal" id="showdata" name="<?php echo $row['ofc_id']; ?>">
             <?php echo $row['ofc_username']; ?></td>
           <td onclick="button" style="cursor:pointer" data-toggle="modal" data-target="#myModal" id="showdata" name="<?php echo $row['ofc_id']; ?>">
             <?php echo $row['ofc_name']; ?></td>
           <td onclick="button" style="cursor:pointer" data-toggle="modal" data-target="#myModal" id="showdata" name="<?php echo $row['ofc_id']; ?>">
             <?php echo $row['ofc_position']; ?></td>

             <td>

             <button type="button"  id="edit_data" class="btn btn-warning" name="<?php echo $row['ofc_id']; ?>" >แก้ไข <i class="glyphicon glyphicon-wrench"></i> </button>
             </td>
           <td>

           <button type="button" style="cursor:pointer" data-toggle="modal" data-target="#myDelete" id="delete_data" class="btn btn-danger" name="<?php echo $row['ofc_id']; ?>" >ลบ <i class="glyphicon glyphicon-remove"></i> </button>
           </td>
       </tr>
     <?php }  ?>
   </tbody>
   </table>

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
            <button type="button" class="btn btn-danger"  id="delete_data1"><i class="glyphicon glyphicon-ok"></i> ยืนยัน</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" >                 <i class="glyphicon glyphicon-remove"></i> ยกเลิก</button>
            </div>
          </div>
        </div>
   </div>

   <!--    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
   <div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header p-3 mb-2 bg-primary text-white">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;ข้อมูลเจ้าหน้าที่</h4>
         </div>
         <div class="modal-body" id="showOfficer">
           <p>Some text in the modal.</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
         </div>
       </div>
     </div>
   </div>

      <script type="text/javascript">
         $("*[id^=showdata]").click(function()
         {

             var id = $(this).attr('name');
             $("#showOfficer").load("systems/officer_data.php",{id : id});
         });

         $("*[id^=edit_data]").click(function()
         {
           var id = $(this).attr('name');
           $("#showmain").load("systems/officer_edit.php",{id : id});

         });

       $("*[id^=delete_data]").click(function()
         {

           var id = $(this).attr('name');
           $("*[id^=delete_data1]").click(function()
         {

               $.post("systems/officer_delete_pro.php",{
                   id : id
               },function(msg){
                   //alert(msg);
                   if(msg == "OK")
                   {
                       //alert("ลบข้อมูลเรียบร้อยแล้ว");
                       location.reload();

                       $("#showmain").load("systems/officer_show.php");
                   }
                   else{alert(msg +" | "+"Can not Delete");}
               });

             });
         });

         /*function searchshow(){
             $.post('systems/treat_search.php',{
               search : $('#search').val(),
               //search1 : $('#search1').val()
             },function(data){
               $('#show_list').html(data);
             });
           }*/

     </script>
