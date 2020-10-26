<?php 
    require_once "../model/estado.php";
    require_once "../model/estadoDao.php";
    require_once "../model/cidade.php";
    require_once "../model/cidadeDao.php";
    require_once "../db/conexao.php";

    $conexao = new Conexao();
    $estadoDao = new EstadoDao($conexao);
    $cidadeDao = new CidadeDao($conexao);

    //Teste de Inserir cidade
    $estado = $estadoDao->pesquisarNome('Goiás');

    $cidade3 = new Cidade('Rialma', $estado);

    $cidadeDao->inserir($cidade3);

    //Teste Listar dodas as Cidades
    $cidades = $cidadeDao->listarTudo();

    echo "<pre>";
    print_r($cidades);
    echo "</pre>";

    //Teste pesquisar Cidade por ID
    $cidade = $cidadeDao->pesquisarId(3);

    echo "<pre>";
    print_r($cidade);
    echo "</pre>";

    //Teste de Pesquisar cidade por Nome
    $cidade2 = $cidadeDao->pesquisarNome('Ceres');

    echo "<pre>";
    print_r($cidade2);
    echo "</pre>";

    

    
?>