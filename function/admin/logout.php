<?php
session_start();
unset( $_SESSION['admin'] );
?>
<?php
   header('location:../index.php');
   ?>