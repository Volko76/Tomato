<?php
    $response = $_POST["g-recaptcha-response"];
    if ($response) {
        echo 'Ok';
      } else {
       echo 'pas ok';
      }
    
?>