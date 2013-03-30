<?php
	$functionname = preg_replace('/[^a-zA-Z0-9]/','', urldecode($_GET['func']));
	$widget_id = preg_replace('/[^a-zA-Z0-9]/','', urldecode($_GET['widget_id']));
	
	// The rest of the file is supposed to be javascript.
?>
	function <?php echo $functionname; ?>(twitters){ 
		twitterCallback2(twitters, "<?php echo $widget_id;?>"); 
	}
