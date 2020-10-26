<?php
    require_once "estadoDao.php";
    require_once "estado.php";
    require_once "cidade.php";

    class CidadeDao {
        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function inserir(Cidade $cidade) {
            $sql = 'INSERT INTO cidade (idEstado, nome) VALUES (:idEstado, :nome)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':idEstado', $cidade->__get('estado')->__get('id'));
            $stmt->bindValue(':nome', $cidade->__get('nome'));
            $stmt->execute();
        }

        public function listarTudo() {
            $sql = 'SELECT * FROM cidade';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ); 
            $cidades = array();

            $conexao = new Conexao();
            $estadoDao = new EstadoDao($conexao);
            foreach ($resultados as $id => $objeto) {
                $estado = $estadoDao->pesquisarId($objeto->idEstado);
                $cidade = new Cidade($objeto->nome, $estado);
                $cidade->__set('id', $objeto->id);
                $cidades[] = $cidade;
            }
            return $cidades;
        }
        
        public function pesquisarId($id) {
            $sql = 'SELECT * FROM cidade WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $estadoDao = new EstadoDao($conexao);
            
            $estado = $estadoDao->pesquisarId($resultado->idEstado);
            $cidade = new Cidade($resultado->nome, $estado);
            $cidade->__set('id', $resultado->id);
            return $cidade;            
        }

        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM cidade WHERE nome = :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);

            $conexao = new Conexao();
            $estadoDao = new estadoDao($conexao);
            
            $estado = $estadoDao->pesquisarId($resultado->idEstado);
            $cidade = new cidade($resultado->nome, $estado);
            $cidade->__set('id', $resultado->id);
            return $cidade;            
        }
    }
?>