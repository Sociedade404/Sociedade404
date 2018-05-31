<?php

session_start();
require("vendor/autoload.php");

use \Rain\Tpl;
use \Slim\Slim;
use \Sociedade404\Db\Sql;
use \Sociedade404\Page;
use \Sociedade404\PageAdmin;
use \Sociedade404\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);


$app->get('/', function() {
    
    $sql = new Sql();

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/home', function(){

	$page = new Page();
	$page->setTpl("index");
});

$app->get('/sobre', function(){

	$page = new Page();
	$page->setTpl("sobre");
});

$app->get('/servicos', function(){

	$page = new Page();
	$page->setTpl("servicos");
});

$app->get('/produtos', function(){

	$page = new Page();
	$page->setTpl("produtos");
});

$app->get('/parceiros', function(){

	$page = new Page();
	$page->setTpl("parceiros");
});

$app->get('/termosUso', function(){

	$page = new Page();
	$page->setTpl("termosUso");

});

$app->get('/contato', function(){

	$page = new Page();
	$page->setTpl("contato");
});



//###### Menu Rodapé #######


$app->get('/divulgue', function(){

	$page = new Page();
	$page->setTpl("divulgue");
});


$app->get('/curiosidades', function(){

	$page = new Page();
	$page->setTpl("curiosidades");
});


$app->get('/politicaPrivacidade', function(){

	$page = new Page();
	$page->setTpl("politicaPrivacidade");

});

$app->get('/seguranca', function(){

	$page = new Page();
	$page->setTpl("seguranca");
});

//####### Página Admin #######

$app->get('/admin', function(){

	User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("index");
});

$app->get('/admin/home', function(){

	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");
});

$app->get('/admin/login', function(){

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("login");
});

$app->post('/admin/login', function(){

	User::login($_POST['login'], $_POST['password']);

	header("Location: /admin");
	exit();


});

$app->get('/admin/logout', function() {

	User::logout();
	
	header("Location: /admin/login");
	exit();
});

$app->get("/admin/users", function(){


	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();
	$page->setTpl("users", array(

		"users"=>$users

	));
});

$app->get("/admin/users/create", function(){


	User::verifyLogin();

	//$users = User::listAll();

	$page = new PageAdmin();
	$page->setTpl("users-create");
});

$app->get("/admin/users/:iduser/delete", function($iduser){

	User::verifyLogin();
	
});


$app->get("/admin/users/:iduser", function($iduser){


	User::verifyLogin();

	//$users = User::listAll();

	$page = new PageAdmin();
	$page->setTpl("users-update");
});

$app->post("/admin/users/create", function(){

	User::verifyLogin();

});

$app->post("/admin/users/:iduser", function($iduser){

	User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("users-update");
	
});

$app->run();
