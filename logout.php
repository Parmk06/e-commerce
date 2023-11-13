<?php
// session has started
session_start();
$_SESSIONS = array();

// session has destroyed
session_destroy();
header("Location: index.php?logout=1");
exit;
?>

header("Location: index.php?logout=1");
exit;
?>
