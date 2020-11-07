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
    echo "<h2>Inserindo cidade e listando tudo</h2> <br>";

    $estado = $estadoDao->pesquisarNome('Goiás');

    $cidade3 = new Cidade('Rialma', $estado);

    $cidadeDao->inserir($cidade3);

    //Teste Listar dodas as Cidades
    $cidades = $cidadeDao->listarTudo();

    echo "<pre>";
    print_r($cidades);
    echo "</pre>";

    //Teste pesquisar Cidade por ID
    echo "<h2>Pesquisar Cidade por ID</h2> <br>";

    $cidade = $cidadeDao->pesquisarId(4);

    echo "<pre>";
    print_r($cidade);
    echo "</pre>";

    //Teste de Pesquisar cidade por Nome
    echo "<h2>Pesquisar Cidade por nome</h2> <br>";

    $cidade2 = $cidadeDao->pesquisarNome('Ceres');

    echo "<pre>";
    print_r($cidade2);
    echo "</pre>";

    

    
?>