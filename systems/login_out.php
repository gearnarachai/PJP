<?php
session_start();
if(!isset($_SESSION["ssUserid"])){
?>
<div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" placeholder="ผู้ใช้">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd" placeholder="รหัสผ่าน">
</div>
<button type="button" name="button" id="oklogin">Login</button>
<script>
  $(function(){
    $('#oklogin').click(function(){
      //alert('test');
      $.post('systems/login_out_pro.php',{
        user : $('#usr').val(),
        pass : $('#pwd').val()
        status : '0'
      },function(data){
        if(data=='OK'){
          $('#login').load('systems/login_out.php');
          alert('Login สำเร็จ'+data);
        }
        else{
          alert('Login ไม่สำเร็จ'+data);
        }
      });
    });
  });
</script>
<?php }else{ ?>
<button type="button" name="button" id="oklogout">ออกจากระบบ</button>
<script>
  $(function(){
    $('#oklogout').click(function(){
      $.post('systems/login_out_pro.php',{
        status : '1'
      },function(data){
        $('#login').load('systems/login_out.php');
        alert('Logout สำเร็จ');
      });
    });
  });
</script>
<?php } ?>
