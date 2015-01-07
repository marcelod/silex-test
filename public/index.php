<?php

require_once __DIR__.'/../bootstrap.php';

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

$app->run(); 
