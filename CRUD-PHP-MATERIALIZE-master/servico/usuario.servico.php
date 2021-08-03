<?php
	class UsuarioServico{
		private $conexao;
		private $usuario;
		
		public function __construct(Conexao $conexao, Usuario $usuario){
			$this->conexao = $conexao->conectar();
			$this->usuario = $usuario;
		}
		
		//função inseri
		public function inserir(){
			$query = "insert into usuarios (nome, email, senha)
				values(:nome, :email, :senha);";
			
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome',$this->usuario->__get('nome'));
			$stmt->bindValue(':email',$this->usuario->__get('email'));
			$stmt->bindValue(':senha',$this->usuario->__get('senha'));
			$stmt->execute();
		}
		public function atualizar(){
			$query = "update usuarios set nome= :nome, email= :email, senha= :senha where id = :id;";
			
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome',$this->usuario->__get('nome'));
			$stmt->bindValue(':email',$this->usuario->__get('email'));
			$stmt->bindValue(':senha',$this->usuario->__get('senha'));
			$stmt->bindValue(':id',$this->usuario->__get('id'));
			$stmt->execute();
		}public function remover(){
			$query = "delete from usuarios where id = :id;";
			
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id',$this->usuario->__get('id'));
			$stmt->execute();
		}
		public function recuperar(){
			$query = "select * from usuarios;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchall(PDO::FETCH_OBJ);
		}
		public function recuperarUsuario($id){
			$query = "select * from usuarios where id = :id;";

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id',$id);
            $stmt->execute();
			return $stmt->fetchall(PDO::FETCH_OBJ);
		}
		public function recuperarLogin($senha, $email){
			$query = "select * from usuarios where email = :email and senha = :senha;";
				
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email',$email);
			$stmt->bindValue(':senha',$senha);
            $stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
		
		
	}

?>