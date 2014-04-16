<?php
	include dirname(__FILE__)."/markdown/Markdown.inc.php";
	include dirname(__FILE__)."/views.php";
	
	use \Michelf\Markdown;	
	
	$GLOBALS['base_url']="http://localhost/simplewiki/index.php";//This should be set in a config prolly, or pulled from the $_SERVER
	
	$path=explode("/",$_SERVER['SCRIPT_FILENAME']);
	array_pop($path);

	if(isset($_SERVER['PATH_INFO'])){
		$folders=explode("/",substr($_SERVER['PATH_INFO'], 1));
		$file=array_pop($folders).".md";
		
		$fullpath=implode("/",$path)."/content/".implode("/",$folders)."/".$file;
		
		if(!is_file($fullpath)){
			$fullpath=implode("/",$path)."/defaults/404.md";
		}
	}else{
		$fullpath=implode("/",$path)."/defaults/home.md";
	}
	
	$content=file_get_contents($fullpath);
	
	
	
	$content=preg_replace('/@site_url\(([A-Za-z0-9-_.\/]+)\)/',$GLOBALS['base_url'].'/$1',$content);
	$data["content"]=Markdown::defaultTransform($content);
	
	$view=new Views;
	$view->load("single",$data);
?>