<?php
session_start();
if($_POST['status']==0){
    /*if(!isset($_SESSION["ssUserid"])){
        $_SESSION["ssUserid"] = 1;
    }*/
    echo 'OK';
}
else{
    session_destroy();
    echo 'NO';
}
?>
