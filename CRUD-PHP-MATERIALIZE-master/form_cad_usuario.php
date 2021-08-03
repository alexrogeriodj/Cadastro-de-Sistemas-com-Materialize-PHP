<?php
	require('controller/usuario.controller.php');
?>
<div class="row">
    <div class="col s6 offset-s3 center-align">
        <div class="card-panel">
            <div class="row">
                <form action="usuario.controller.php?acao=inserir" method="post">
                    <div class="row">
                        <h2>Cadastre-se</h2>
                    </div>   
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nome" type="text" name="nome">
                            <label for="nome">Nome</label>
                        </div> 
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" name="email" class="validate" >
                            <label for="email">Email</label>
                        </div> 
                        
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="senha" type="password" name="senha" class="validate">
                            <label for="senha">Senha</label>
                        </div>
                      
                        <button class="btn waves-effect waves-light black darken-3" type="submit" name="action">
                        Cadastrar 
                        <i class="material-icons right">send</i>
                        </button>
                    </div>      
                    
                </form>
            </div>
        </div>
    </div>
</div> 
