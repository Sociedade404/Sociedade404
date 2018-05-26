<?php

require("vendor/autoload.php");



$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Sociedade404\loadPage();

	$page->setTpl("index");

});


$app->get('/home', function() {
    
	$page = new Sociedade404\loadPage();

	$page->setTpl("index");

});



$app->get('/sobre', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("sobre");
});


$app->get('/servicos', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("servicos");
});


$app->get('/produtos', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("produtos");
});



$app->get('/parceiros', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("parceiros");
});


$app->get('/curiosidades', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("curiosidades");
});


$app->get('/termosDeUso', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("termosUso");
});


$app->get('/contato', function(){

	$page = new Sociedade404\loadPage();
	$page->setTpl("contato");
});



$app->run();
