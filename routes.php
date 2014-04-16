<?php
	include dirname(__FILE__)."/markdown/Markdown.inc.php";
	include dirname(__FILE__)."/views.php";
	
	use \Michelf\Markdown;
	
	$path=explode("/",$_SERVER['SCRIPT_FILENAME']);
	array_pop($path);

	if(isset($_SERVER['PATH_INFO'])){
		$folders=explode("/",substr($_SERVER['PATH_INFO'], 1));
		$file=array_pop($folders).".md";
		
		$fullpath=implode("/",$path)."/".implode("/",$folders)."/".$file;
		
		if(!is_file($fullpath)){
			$fullpath=implode("/",$path)."/defaults/404.md";
		}
	}else{
		$fullpath=implode("/",$path)."/defaults/home.md";
	}
	
	$content=file_get_contents($fullpath);
	
	//$data["content"]=Markdown::defaultTransform($content);
	
	Views::make("layout",$data);
?>