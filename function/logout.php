<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah Logout');
		window.location='index.php'</script>";

?>