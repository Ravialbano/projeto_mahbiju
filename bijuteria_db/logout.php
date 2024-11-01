<?php
session_start();
session_unset();
session_destroy();
header('Locatiom: login.php');
exit;
?>