<?php
session_start();
if (isset($_SESSION["username"])){
{?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-plus"></span> KRU</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#" id="treat">รายการรักษา</a></li>
        <li><a href="#" id="symphom">ข้อมูลคนไข้</a></li>
        <li><a href="#" id="test">กราฟ</a></li>
<?php if ($_SESSION["username"]==0) {
  ?>
<li><a href="#" id="officer">จัดการผู้ใช้</a></li>
  <?php
} ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a>ยินดีต้อนรับ : <?php echo $_SESSION['tiname']," ",$_SESSION['firstname']," ",$_SESSION['lastname']; ?></a></li>
        <li><a href="#" id="oklogout"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php } ?>
<script type="text/javascript">
$("#symphom").click(function()
 {
 $("#showmain").load("systems/symphom_show.php");
 });

 $("#treat").click(function()
  {
$("#showmain").load("systems/treat_show.php");
});


 $("#officer").click(function()
  {
$("#showmain").load("systems/officer_show.php");
});
$("#test").click(function()
 {
$("#showmain").load("systems/test.php");
});


$(function(){
  $('#oklogout').click(function(){
    $.post('systems/login_pro.php',{
      username : $(null).val(),
      password : $(null).val()
    },function(data){
       //alert(data);
        $('#showmain').load('systems/login.php');
        $('#shownav').load('systems/navbar.php');

      //  alert('ออกจากระบบสำเร็จ');
    });
  });
});
</script>
<?php } ?>
