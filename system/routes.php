<?php	
class Routes{

	static function init(){
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
		
		$page=new Pages;
		$page->read($fullpath);
	}
}
?>