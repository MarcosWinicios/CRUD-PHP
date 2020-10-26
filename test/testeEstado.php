<?php 
    require_once "../model/estado.php";
    require_once "../model/estadoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $estadoDao = new EstadoDao($conexao);

    //Teste Pesquisar Estado por nome

    $estado = $estadoDao->pesquisarNome('Goias');

    echo "<h2>Pesquisando estado por Nome</h2> <br>";
    echo "<pre>";
    print_r($estado);
    echo "</pre>";

    echo "<br><br>";

    //Teste Pesquisar estado por Id
    echo "<h2>Pesquisando estado por ID</h2> <br>";
    $estado2 = $estadoDao->pesquisarId(2);
    echo "<pre>";
    print_r($estado2);
    echo "</pre>";
    echo "<br><br>";

    //Teste pesquisar por Sigla
    echo "<h2>Pesquisando estado por Sigla</h2> <br>";

    $estado5 = $estadoDao->pesquisarSigla('SP');
    echo "<pre>";
    print_r($estado5);
    echo "</pre>";
    echo "<br><br>";

    //Teste inserir Estado
    echo "<h2>Inserir um estado e listar todos</h2> <br>";

    $estado4 = new Estado('Acre', 'AC');
    $estadoDao->inserir($estado4);
    

    //Teste Listar todos os Estados
    $estados = $estadoDao->listarTudo();

    echo "<pre>";
    print_r($estados);
    echo "</pre>";

?>