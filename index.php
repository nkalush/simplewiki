<?php
	$GLOBALS['base_url']="http://localhost/simplewiki/index.php";//This should be set in a config prolly, or pulled from the $_SERVER
	
	include dirname(__FILE__)."/system/markdown/Markdown.inc.php";
	include dirname(__FILE__)."/system/views.php";
	include dirname(__FILE__)."/system/pages.php";
	include dirname(__FILE__)."/system/routes.php";
	
	Routes::init();
?>