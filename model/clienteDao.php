<?php
    require_once "cidadeDao.php";
    require_once "cidade.php";
    require_once "cliente.php";

    class ClienteDao {
        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function inserir(Cliente $cliente) {
            $sql = 'INSERT INTO cliente (idCidade, nome, idade) VALUES (:idCidade, :nome, :idade)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':idCidade', $cliente->__get('cidade')->__get('id'));
            $stmt->bindValue(':nome', $cliente->__get('nome'));
            $stmt->bindValue(':idade', $cliente->__get('idade'));
            $stmt->execute();
        }

        public function listarTudo() {
            $sql = 'SELECT * FROM cliente';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $clientes = array();

            $conexao = new Conexao();
            $cidadeDao = new CidadeDao($conexao);
            foreach ($resultados as $id => $objeto) {
                $cidade = $cidadeDao->pesquisarId($objeto->idCidade);
                $cliente = new cliente($objeto->nome, $objeto->idade, $cidade);
                $cliente->__set('id', $objeto->id);
                $clientes[] = $cliente;
            }
            return $clientes;
        }
        
        public function pesquisarId($id) {
            $sql = 'SELECT * FROM cliente WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $cidadeDao = new CidadeDao($conexao);
            
            $cidade = $cidadeDao->pesquisarId($resultado->idCidade);
            $cliente = new Cliente($resultado->nome, $resultado->idade, $cidade);
            $cliente->__set('id', $resultado->id);
            return $cliente;            
        }

        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM cliente WHERE nome = :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $cidadeDao = new CidadeDao($conexao);
            
            $cidade = $cidadeDao->pesquisarId($resultado->idCidade);
            $cliente = new Cliente($resultado->nome, $resultado->idade, $cidade);
            $cliente->__set('id', $resultado->id);
            return $cliente;            
        }
    }
?>