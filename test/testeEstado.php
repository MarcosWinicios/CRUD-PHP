<?php 
    require_once "../model/estado.php";
    require_once "../model/estadoDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $estadoDao = new EstadoDao($conexao);

    echo "<h3>Não está testado, mas se alterar/apagar algum estado, todas as cidades e clientes ligados ao mesmo também será apagado.<br/> Pois criei o banco com as ações de DELETE e UPDATE como CASCADE, para que sigam um efeito Cascata</h3>";
    //Teste Pesquisar Estado por nome

    $estado = $estadoDao->pesquisarNome('Goiás');

    echo "<h2>Pesquisando estado por Nome</h2> <br>";
    echo "<pre>";
    print_r($estado);
    echo "</pre>";

    echo "<br><br>";

    //Teste Pesquisar estado por Id
    echo "<h2>Pesquisando estado por ID</h2> <br>";
    $estado2 = $estadoDao->pesquisarId(4);
    echo "<pre>";
    print_r($estado2);
    echo "</pre>";
    echo "<br><br>";

    //Teste pesquisar por Sigla
    echo "<h2>Pesquisando estado por Sigla</h2> <br>";

    $estado5 = $estadoDao->pesquisarSigla('DF');
    echo "<pre>";
    print_r($estado5);
    echo "</pre>";
    echo "<br><br>";

    //Teste inserir Estado
    echo "<h2>Inserir um estado e listar todos</h2> <br>";

    $estado4 = new Estado('Teste', 'TT');
    $estadoDao->salvar($estado4);
    

    //Teste Listar todos os Estados
    $estados = $estadoDao->listarTudo();

    echo "<pre>";
    print_r($estados);
    echo "</pre>";

    //Deletar um estado
    echo "<h2>Deletar um estado</h2> <br>";

    $estado6 = $estadoDao->pesquisarSigla('TT');
    echo "<pre>";
    print_r($estado6);
    echo "</pre>";
    $estadoDao->deletar($estado6);

    $estados2 = $estadoDao->listarTudo();
    echo "<pre>";
    print_r($estados2);
    echo "</pre>";

    //Alterar um estado
    echo "<h2>Alterar um estado</h2> <br>";

    $est = $estadoDao->pesquisarNome('São Paulo');
    $est->__set('nome', 'São Pauloo');
    $est->__set('sigla', 'PS');
    $estadoDao->salvar($est);

    $estados3 = $estadoDao->listarTudo();
    echo "<pre>";
    print_r($estados3);
    echo "</pre>";

?>