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

    $cliente = $clienteDao->pesquisarNome('Joana');
    echo "<pre>";
    print_r($cliente);
    echo "</pre>";

    //Teste de Listar Todos os Clientes 
    $clientes = $clienteDao->listarTudo();
    echo "<pre>";
    print_r($clientes);
    echo "</pre>";

    //Teste pesquisar Cliente por ID
    $cliente2 = $clienteDao->pesquisarId(2);
    echo "<pre>";
    print_r($cliente2);
    echo "</pre>";


    //Teste inserir Cliente
    $cidade = $cidadeDao->pesquisarNome('Ceres');

    $cliente3 = new Cliente('Pedro', 22, $cidade);

    $clienteDao->inserir($cliente3);

    $clientes2 = $clienteDao->listarTudo();
    echo "<pre>";
    print_r($clientes2);
    echo "</pre>";


?>