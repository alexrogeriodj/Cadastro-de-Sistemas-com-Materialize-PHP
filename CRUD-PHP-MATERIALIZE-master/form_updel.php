<?php 
if(isset($_GET['metodo'])){
    $metodo = $_GET['metodo'];
    $id = $_GET['id'];
    $acao = 'recuperarUsuario';
    
    require('controller/usuario.controller.php');
    foreach($usuario as $indice => $usuario){
        $nome = $usuario->nome;
        $email = $usuario->email;
        $senha = $usuario->senha;
    }
}
    if(isset ($_SESSION['idLogado']) == true){
?>
<div class="row">
    <div class="col s6 offset-s3 center-align">
        <div class="card-panel">
            <div class="row">
                <form action="usuario.controller.php?acao=<?php if(!isset($metodo)){echo 'inserir';}
                                                                elseif($metodo == 'excluirid'){echo 'removerlog';}
                                                                elseif($metodo == 'alterar'){echo 'atualizar';}
                                                                else {echo 'remover';}?>" method="post">
                    <div class="row">
                        <h2>Cadastre-se</h2>
                    </div>   
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nome" type="text" name="nome" value="<?php if(isset($nome)){echo $nome;}else{echo '';}?>">
                            <label for="nome">Nome</label>
                        </div> 
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" name="email" class="validate" value="<?php if(isset($email)){echo $email;}else{echo '';}?>">
                            <label for="email">Email</label>
                        </div> 
                        <?php if(!isset($_SESSION['usuarioLogado']) || $metodo == 'alterar' || $metodo == 'inserir')   {
                        echo '
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="senha" type="password" name="senha" class="validate">
                            <label for="senha">Senha</label>
                        </div>';}
                        ?>
                        <button class="btn waves-effect waves-light black darken-3" type="submit" name="action">
                        <?php if(!isset($metodo)){
					          echo 'Cadastrar';}
					          elseif($metodo == 'alterar'){
                              echo 'Alterar';}
                              elseif($metodo == 'excluirid'){
                              echo 'excluir e sair';}
                              else{echo 'Excluir';}?>  
                        <i class="material-icons right">send</i>
                        </button>
                    </div>      
                    <input id="id" name="id" type="hidden" class="validate" value="<?php if(isset($id)){echo $id;}else{echo '';}?>">
                </form>
            </div>
        </div>
    </div>
</div> 
<?php
}else{
                    echo 'Sem permissão para acessar essa página. Redirecionando para a página de login...';
                    echo '<meta http-equiv="refresh" content="3;url=index.php?page=login">';
                }    
?>