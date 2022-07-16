<?php 
	spl_autoload_register(function($className){
		$path = './library/' . strtolower($className) . ".php";
		$path2 = strtolower($className) . ".php";
		if(file_exists($path)) {
			require_once($path);
		}
		elseif (file_exists($path2)) {
		 	require_once($path2);
		 } 
		else {
			echo "File $path is not found.";
		}
	})

 ?>