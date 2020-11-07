<?php
    require_once "estado.php";

    class EstadoDao {
        private $conexao;
        
        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function salvar(Estado $estado){
            //Se a intenção for alterar, antes de chamar este método, e necesário verificar se tal estado
            //Existe no banco. Se isso não for feito, o mesmo será inserido. 
            //Isso pq talvez o estado em si, exista sim no banco... mas se algum dado do estado entrar neste
            //método com algum erro ortográfico por exemplo... o mesmo será inserido no banco...
            //Isso pode ser resolvido na interface gráfica, ou com um método que verifica o estado digitado pelo 
            //usuário.
            //Não implemente este método, pois acredito que a melhor forma de resolver isto seria não permitindo que
            //o usuário pesquise o nome do estado digitando, mas sim, em uma lista com todos os estados,o usuário possa
            //Selecionar o que deseja alterar/deletar
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