<?php 
    class Conexao{
        private $local = 'localhost';
        private $banco = 'crud_php';
        private $usuario = 'root';
        private $senha = '';

        public function conectar(){
            try{
				$conexao = new PDO(
				"mysql:host=$this->local; dbname=$this->banco",
				"$this->usuario",
				"$this->senha");
				return $conexao;
			}catch(PDOException $e){
			echo $e->getMessege();
        }
    }
}
?>