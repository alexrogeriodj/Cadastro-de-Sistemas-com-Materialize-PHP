<?php
	require_once("servico/usuario.servico.php");
	require_once("modelo/usuario.modelo.php");
	require_once("conexao/config.php");
	
	
	@$acao = isset($_GET['acao'])?$_GET['acao']:$acao;
	@$id = isset($_GET['id'])?$_GET['id']:$id;
	
	//inserir
	if($acao == 'inserir'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		
    
		$conexao = new Conexao();
		
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuarioServico->inserir();
		
		header('Location: index.php');
		
		//atualizar
	}else if($acao == 'atualizar'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		$usuario->__set('id',$_POST['id']);
		
		$conexao = new Conexao();
		
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuarioServico->atualizar();
		
		header('Location: index.php?page=cadastros');

		//excluir
	}else if($acao == 'remover'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		$usuario->__set('id',$_POST['id']);
		
		$conexao = new Conexao();
		
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuarioServico->remover();
		
		header('Location: index.php?page=cadastros');

		//Caso exclua o usuário 'logado'
	}else if($acao == 'removerlog'){
		$usuario = new Usuario();
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);
		$usuario->__set('id',$_POST['id']);
		
		$conexao = new Conexao();
		
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuarioServico->remover();
		
		header('Location: index.php?exit');
	}else if($acao == 'recuperar'){
		$usuario = new Usuario();
		$conexao = new Conexao();
		
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
        $usuario = $usuarioServico->recuperar();
			
	}else if($acao == 'recuperarUsuario'){
		$usuario = new Usuario();
		$conexao = new Conexao();

		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuario = $usuarioServico->recuperarUsuario($id);
			
	}else if($acao == 'recuperarLogin'){
		$usuario = new Usuario();
		$conexao = new Conexao();
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
	
		$usuarioServico = new 
					UsuarioServico($conexao, $usuario);
		$usuario = $usuarioServico->recuperarLogin($senha, $email);
		
		if(!isset($usuario->senha)){
			echo '<script>
				alert("Email ou senha incorreto");
			</script>
				<meta http-equiv="refresh" content="0;url=index.php?page=login">';
		}else{
			$_SESSION['usuarioLogado'] = $usuario->nome;
			$_SESSION['emailLogado'] = $usuario->email;
			$_SESSION['idLogado'] = $usuario->id;
			echo '<script> window.location.href="index.php"</script>';
		}
			
	}
?>