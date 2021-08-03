<?php
  if(isset($_SESSION['usuarioLogado'])){
    header('location:index.php');
  }
?>
<div class="row">
    <div class="col s6 offset-s3 center-align">
        <div class="card-panel">
            <div class="row">
                <form action="index.php?acao=recuperarLogin" method="post">
                    <div class="row">
                        <i class="material-icons large blue-text">account_circle</i>
                    </div>   
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" name="email" class="validate">
                            <label for="email">Email</label>
                        </div> 
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="senha" type="password" name="senha" class="validate">
                            <label for="senha">Senha</label>
                        </div>
                        <button class="btn waves-effect waves-light black darken-3" type="submit" name="action">Entrar
	                     <i class="material-icons right">send</i>
                        </button><br><br>
                        <div class="col 3">
                            <a class="black-text" href="index.php?page=cadastrar">Cadastre-se</a>
                        </div>
                    </div>      
                </form>
            </div>
        </div>
    </div>
</div> 