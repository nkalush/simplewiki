<?php
class Views{
	public $layout="layout";
	
	public function load($template_path, $data){
		extract($data);
		$path=explode("/",$_SERVER['SCRIPT_FILENAME']);
		array_pop($path);
		//$layout["content"]=file_get_contents(implode("/",$path)."/theme/".$template_path.".php");
		
		
		ob_start();
		include(implode("/",$path)."/theme/".$template_path.".php");
		$layout["content"] = ob_get_clean();
		
		$this->insert_in_to_layout($layout);
	}
	
	private function insert_in_to_layout($data){
		extract($data);
		$path=explode("/",$_SERVER['SCRIPT_FILENAME']);
		array_pop($path);
		include(implode("/",$path)."/theme/".$this->layout.".php");
	}
}