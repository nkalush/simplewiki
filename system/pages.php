<?php
use \Michelf\Markdown;
	
class Pages{
	public function create($fullpath){
	
	}
	
	public function read($fullpath){
		$content=file_get_contents($fullpath);

		$content=preg_replace('/@site_url\(([A-Za-z0-9-_.\/]+)\)/',$GLOBALS['base_url'].'/$1',$content);
		$data["content"]=Markdown::defaultTransform($content);
		
		$view=new Views;
		$view->load("single",$data);
	}
	
	public function edit($fullpath){
	
	}
	
	public function destroy($fullpath){
	
	}
}