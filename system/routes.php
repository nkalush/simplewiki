<?php	
class Routes{

	static function init(){
		
		$uri=Routes::get_uri();
		
		if($uri){
			$fullpath=Routes::get_file_path($uri);
			
			if(!is_file($fullpath)){
				$fullpath=Routes::get_path()."/defaults/404.md";
			}
		}else{
			$fullpath=Routes::get_path()."/defaults/home.md";
		}
		$action=Routes::get_action($uri);
		
		$page=new Pages;
		
		$page->$action($fullpath);
	}
	
	static function get_uri(){
		if(isset($_SERVER['PATH_INFO'])){
			return $_SERVER['PATH_INFO'];
		}else{
			return false;
		}
	}
	
	static function get_file_path($uri){
		$folders=explode("/",substr($uri, 1));
		$file=array_pop($folders);
		
		if($file=="edit"){
			$action="edit";
			$file=array_pop($folders);
		}
		
		$fullpath=Routes::get_path()."/content/".implode("/",$folders)."/".$file.".md";
		return $fullpath;
	}
	
	static function get_action($uri){
		$folders=explode("/",substr($uri, 1));
		$file=array_pop($folders);
		
		if($file=="edit"){
			$action="edit";
		}else{
			$action="read";
		}
		
		return $action;		
	}
	
	static function action_uri($uri, $type="read"){
		$folders=explode("/",substr($uri, 1));		
		$file=array_pop($folders);
		
		if($file=="edit"){
			$action="edit";
			$file=array_pop($folders);
		}
		
		return implode("/",$folders)."/".$file.($type!="read"?"/".$type:"");	
	}
	
	static function get_path(){
		$path=explode("/",$_SERVER['SCRIPT_FILENAME']);
		array_pop($path);
		$path=implode("/",$path);
		return $path;
	}
	
	static function site_url($uri){
		return $GLOBALS['base_url']."/".$uri;
	}
}
?>