<?php
session_start();
session_destroy();
?>
<?php
   header('location:index.php?logout');
   ?>