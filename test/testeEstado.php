<?php 
    require_once "../model/estado.php";
    require_once "../model/estadoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $estadoDao = new EstadoDao($conexao);

    //Teste Pesquisar Estado por nome

    $estado = $estadoDao->pesquisarNome('Goias');

    echo "<pre>";
    print_r($estado);
    echo "</pre>";

    //Teste Pesquisar estado por Id
    $estado2 = $estadoDao->pesquisarId(2);
    echo "<pre>";
    print_r($estado2);
    echo "</pre>";

    //Teste pesquisar por Sigla
    $estado5 = $estadoDao->pesquisarSigla('SP');
    echo "<pre>";
    print_r($estado5);
    echo "</pre>";


    //Teste inserir Estado

    $estado4 = new Estado('Acre', 'AC');
    $estadoDao->inserir($estado4);

    //Teste Listar todos os Estados
    $estados = $estadoDao->listarTudo();

    echo "<pre>";
    print_r($estados);
    echo "</pre>";

?>