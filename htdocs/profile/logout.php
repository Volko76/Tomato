<?php
  session_start();
  if( !isset($_SESSION["email"]) ){
    header("location:../login/");
    exit();
  }
  else{
    session_destroy();
    header("location:../login/?logout=successful");
    exit();
  }
?>