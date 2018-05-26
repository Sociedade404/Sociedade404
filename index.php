<?php

require("vendor/autoload.php");



$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Sociedade404\loadPage();

	$page->setTpl("index");

});

$app->get('/home', function(){

	$page = new $loadPage();
	$page->setTpl("home");
});

$app->run();
