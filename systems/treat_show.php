<?php
include '../js/function_db.php';
include '../js/session_check.php';

 ?>
 <div class="container">
<table  border="0" style="width:80%" align="center">
<tr>
  <th width="20%"> <button type="button" id="add_data" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> เพิ่มข้อมูลการรักษา</button></th>
  <td width="40%"><input type="text" class="form-control" id="search"  placeholder="ค้นหา (รหัสนักศึกษา หรือ ชื่อ-นามสกุล นักศึกษา) "></td>
<td width="50%"></td>
</tr>
</table>
  <div id="show_list"></div>

<?php    $total_data =" SELECT COUNT(*) as num_row FROM tb_treat ";
   $results1 = selectSql($total_data);
   foreach ($results1 as $row1) {
    $num_rows = $row1['num_row'];
   }

   $rows =5;
   $total_page = ceil($num_rows/$rows);

   ?>

  <div  align="center">
   <ul class="pagination">
     <li class="page-item"><a class="page-link" href="#"><<</a></li>
     <?php for($i=1;$i<=$total_page;$i++){ ?>

  <li class="page-item"><a class="page-link" href="#" id="page_list" name="<?php echo ($i-1)*$rows; ?>"><?php echo $i; ?></a></li>


<?php } ?>
<li class="page-item"><a class="page-link" href="#">>></a></li>
</ul>
</div>

<script type="text/javascript">

$("*[id^=page_list]").click(function()
      {
          var page = $(this).attr('name');
          $.post("systems/treat_list.php",{
              page : page
          },function(data){
              //alert(msg);

                  //alert("ลบข้อมูลเรียบร้อยแล้ว");
                  $('#show_list').html(data);


          });
      });

$("*[id^=add_data]").click(function()
{
    $("#showmain").load("systems/treat_insert.php");
});
 $("#show_list").load("systems/treat_list.php");

$('#search').keyup(function(){
  searchshow();
//alert(data);
});

searchshow();
function searchshow(){

    $.post('systems/treat_list.php',{
        search : $('#search').val()

        //id : "5555"

    },function(data){
        //alert(data);
      $('#show_list').html(data);
    });
  }

</script>
