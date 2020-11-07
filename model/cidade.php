<?php 
    class Cidade {
        private $id;
        private $nome;
        private $estado;

        public function __construct($nome, $estado)
        {
            $this->nome = $nome;
            $this->estado = $estado;
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