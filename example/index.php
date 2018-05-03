<?php

	/**
	* EXAMPLE VERIFY URL PAGE 
	*/

	require __DIR__ .'/../vendor/autoload.php';

	$redirect = new Danbd\Redirect($_GET["url"]);

	if(!$redirect->exists() AND !empty($_GET["url"]))
		echo "The URL '".$redirect->getUrl()."' no exists";