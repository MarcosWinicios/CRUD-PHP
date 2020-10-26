<?php 
    require_once "../model/cidade.php";
    require_once "../model/cidadeDao.php";
    require_once "../model/cliente.php";
    require_once "../model/clienteDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $cidadeDao = new CidadeDao($conexao);
    $clienteDao = new ClienteDao($conexao);

    //Teste Pesquisar Por nome
    echo "<h2>Pesquisar cliente por nome</h2> <br>";

    $cliente = $clienteDao->pesquisarNome('Joana');
    echo "<pre>";
    print_r($cliente);
    echo "</pre>";

    //Teste de Listar Todos os Clientes
    echo "<h2>Listar todos os Clientes</h2> <br>";
    $clientes = $clienteDao->listarTudo();
    echo "<pre>";
    print_r($clientes);
    echo "</pre>";

    //Teste pesquisar Cliente por ID
    echo "<h2>Pesquisar cliente por ID</h2> <br>";
    $cliente2 = $clienteDao->pesquisarId(2);
    echo "<pre>";
    print_r($cliente2);
    echo "</pre>";


    //Teste inserir Cliente
    echo "<h2>Inserindo um cliente e listando todos os clientes</h2> <br>";

    $cidade = $cidadeDao->pesquisarNome('Ceres');

    $cliente3 = new Cliente('Pedro', 22, $cidade);

    $clienteDao->inserir($cliente3);

    $clientes2 = $clienteDao->listarTudo();
    echo "<pre>";
    print_r($clientes2);
    echo "</pre>";


?>