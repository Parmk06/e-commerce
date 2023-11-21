<?php
session_start();

$_SESSION['logout_message'] = 'You have been successfully logged out.';

$_SESSION = array();
session_destroy();

header("Location: login_admin.php?logout_admin=1");
exit;
?>
