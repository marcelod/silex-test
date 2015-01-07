<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

use MD\Sistema\Service\ClienteService;
use MD\Sistema\Entity\Cliente;
use MD\Sistema\Mapper\ClienteMapper;



$app['clienteService'] = function() {

    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($clienteEntity, $clienteMapper);

    return $clienteService;
};


$response = new Response();

$app->get('/', function() use($response) {
    $response->setContent('Meu teste com resposta ok');
    return $response;
});

$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});


$clientes = array(
    array('nome' => 'Meu primeiro Cliente', 'email' => 'cliente@cliente.com', 'cpf_cnpj' => '57.129.144/0001-60'),
    array('nome' => 'Cliente XPTO', 'email' => 'contato@clientexpto.com.br', 'cpf_cnpj' => '41.130.853/0001-25'),
    array('nome' => 'Salão Dom Quize', 'email' => 'contato@salao.com', 'cpf_cnpj' => '85.204.835/0001-16'),
    array('nome' => 'Local Aqui', 'email' => 'local@aqui.com.br', 'cpf_cnpj' => '31.168.121/0001-70'),
    array('nome' => 'Somente mais esse', 'email' => 'cliente@esse.com', 'cpf_cnpj' => '74.684.981/0001-70')
);
$app->get('/clientes', function() use($app, $clientes) {
    return $app->json($clientes);
});


$app->get('/cliente', function() use($app) {

    $dados['nome'] = "Cliente";
    $dados['email'] = "email@cliente.com";

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);

});

$app->run(); 
