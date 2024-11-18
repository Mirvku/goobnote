<?php
session_start();
session_unset();
session_destroy();
 
header("Location: /goobnote_2/index.php");
exit();
?>