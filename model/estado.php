<?php 
    class Estado {
        private $id;
        private $nome;
        private $sigla;

        public function __construct($nome, $sigla)
        {
            $this->nome = $nome;
            $this->sigla = $sigla;
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