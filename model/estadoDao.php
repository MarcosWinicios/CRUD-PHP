<?php
    require_once "estado.php";

    class EstadoDao {
        private $conexao;
        
        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function salvar(Estado $estado){
            if(empty($estado->__get('id'))){
                $this->inserir($estado);
            }else{
                $this->alterar($estado);
            }
        }
        private function inserir(Estado $estado) {
                $sql = 'INSERT INTO estado (nome, sigla) VALUES (:nome, :sigla)';
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(':nome', $estado->__get('nome'));
                $stmt->bindValue(':sigla', $estado->__get('sigla'));
                $stmt->execute();
        }

        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM estado WHERE nome = :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            $estado = new Estado($resultado->nome, $resultado->sigla);
            $estado->__set('id', $resultado->id);
            return $estado;
        }

        public function pesquisarSigla($sigla) {
            $sql = 'SELECT * FROM estado WHERE sigla = :sigla';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':sigla', $sigla);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);

            $estado = new Estado($resultado->nome, $resultado->sigla);
            $estado->__set('id', $resultado->id);
            return $estado;
        }

        public function pesquisarId($id) {
            $sql = 'SELECT * FROM estado WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            $estado = new Estado($resultado->nome, $resultado->sigla);
            $estado->__set('id', $resultado->id);
            return $estado;
        }

        public function listarTudo() {
            $sql = 'SELECT * FROM estado';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $estados = array();
        
            foreach ($resultados as $id => $objeto) {
                $estado = new Estado($objeto->nome, $objeto->sigla);
                $estado->__set('id', $objeto->id);
                $estados[] = $estado;
            }
            return $estados;
        }

        public function deletar(Estado $estado){
            $sql = 'DELETE FROM estado WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $estado->__get('id'));
            $stmt->execute();
        }

        private function alterar(Estado $estado){
            $sql = 'UPDATE estado SET nome = :nome, sigla = :sigla WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $estado->__get('nome'));
            $stmt->bindValue(':sigla', $estado->__get('sigla'));
            $stmt->bindValue(':id', $estado->__get('id'));
            $stmt->execute();
        }
    }
?>