<?php

session_start();
if (!isset($_SESSION["username"])){
?>
  <script type="text/javascript">
    $("#showmain").load("systems/login.php");
  </script>

  <?php
}

 ?>
