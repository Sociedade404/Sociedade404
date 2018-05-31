<?php

session_start();
require("vendor/autoload.php");

use \Rain\Tpl;
use \Sociedade404\Db\Sql;
use \Sociedade404\Page;
use \Sociedade404\PageAdmin;
use \Sociedade404\Model\User;

$app = new \Slim\Slim();

$app->config('debug', true);


$app->get('/', function() {
    
    $sql = new Sql();

	$page = new Sociedade404\Page();

	$page->setTpl("index");

});

$app->get('/home', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("index");
});

$app->get('/sobre', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("sobre");
});

$app->get('/servicos', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("servicos");
});

$app->get('/produtos', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("produtos");
});

$app->get('/parceiros', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("parceiros");
});

$app->get('/termosUso', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("termosUso");

});

$app->get('/contato', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("contato");
});



//###### Menu Rodapé #######


$app->get('/divulgue', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("divulgue");
});


$app->get('/curiosidades', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("curiosidades");
});


$app->get('/politicaPrivacidade', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("politicaPrivacidade");

});

$app->get('/seguranca', function(){

	$page = new Sociedade404\Page();
	$page->setTpl("seguranca");
});

//####### Página Admin #######

$app->get('/admin', function(){

	User::verifyLogin();

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("index");
});

$app->get('/admin/home', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("index");
});

$app->get('/admin/login', function(){

	$page = new Sociedade404\PageAdmin([
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

$app->get('/admin/cadastro', function(){

	$page = new Sociedade404\PageAdmin([
		"header" =>false,
		"footer" =>false
	]);

	$page->setTpl("cadastro");
});

$app->get('/admin/usuariosOnline', function(){
	
	$page = new Sociedade404\PageAdmin();
	$page->setTpl("usuariosOnline");
});

$app->get('/admin/usuariosCadastrados', function(){
	
	$page = new Sociedade404\PageAdmin();
	$page->setTpl("usuariosCadastrados");
});

$app->get('/admin/cadastrarUsuarios', function(){
	
	$page = new Sociedade404\PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("cadastrarUsuarios");
});



$app->get('/admin/cadastrarProdutos', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("cadastrarProdutos");
});

$app->get('/admin/produtosCadastrados', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("produtosCadastrados");
});

$app->get('/admin/pedidos', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("pedidos");
});

$app->get('/admin/estoque', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("estoque");
});

$app->get('/admin/renovaSenha', function(){

	$page = new Sociedade404\PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("renovaSenha");
});

$app->get('/admin/servicos', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("servicos");
});

$app->get('/admin/outros', function(){

	$page = new Sociedade404\PageAdmin();
	$page->setTpl("outros");
});

$app->run();
