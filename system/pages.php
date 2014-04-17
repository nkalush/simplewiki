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
		$content=file_get_contents($fullpath);

		$content=preg_replace('/@site_url\(([A-Za-z0-9-_.\/]+)\)/',$GLOBALS['base_url'].'/$1',$content);
		$data["raw"]=$content;
		$data["content"]=Markdown::defaultTransform($content);
		
		if(!empty($_POST)){
			$path=Routes::get_uri();
			$file=Routes::get_file_path($path);
			if(!empty($_POST['content'])){
				$content=trim($_POST['content']);
				file_put_contents($file, $content);
				header( 'Location: '.Routes::site_url(Routes::action_uri($path,"read")));
			}
		}
		
		$view=new Views;
		$view->load("editor",$data);
	}
	
	public function destroy($fullpath){
	
	}
}