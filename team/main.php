<?php

session_start();

$base_url='/';

$request = explode($base_url,$_SERVER['REQUEST_URI']);

$page =  explode('?',$request[2]);



	$access = isset($_SESSION["user"])?"app-secure":"app-non-secure";

	if(!empty($page[0])){
		if(file_exists($access.'/'.$page[0].'.php'))
		include $access.'/'.$page[0].'.php';
		else
		include $access.'/404.php';
	}else{
		include $access.'/index.php';
	}

?>