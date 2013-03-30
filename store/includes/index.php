<?php 
$server = $_SERVER['REQUEST_URI'];
$file = $_SERVER['SCRIPT_NAME']; ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL <?php echo $file ?> was not found on this server.</p>
</body></html>
