<?php 
    class Cliente {
        private $id;
        private $nome;
        private $idade;
        private $cidade;

        public function __construct($nome, $idade, $cidade){
            $this->nome = $nome;
            $this->idade = $idade;
            $this->cidade = $cidade;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }
    }

?>