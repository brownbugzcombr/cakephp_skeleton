
<div id="header" class="container_12">
    <div id="mainLogo" class="grid_6"><?php
        // if we are at home, we dont need to anchor back to the homepage
        if (($this->params['controller'] == 'home' && $this->params['action'] == 'index') || ($this->params['controller'] == 'home' && $this->params['action'] == 'logado')) {
        ?>
        <h1 class="logoHeader">[LOGO HERE]</h1><br clear="all"/>
        <h2 >[Chamada do site aqui]</h2>
        <?php
        } else {
        ?>
        <h1 class="logoHeader"><a href="/" title="Telefônica" class="graphic">[LOGO HERE]</a></h1><br clear="all"/>
        <a href="/" title="Telefônica"><h2 class=" ">[Chamada do site aqui]</h2></a>
        <?php } ?>
    </div>

    <div id="headRight" class="grid_6">
        <?if (!isset($LoginUsuario)) {?>
        <div class="right loginBox">
            <h3 class="pl5">Login</h3>
            <?php echo $this->Form->create('Usuarios', array('action' => 'login', 'id' => 'cadastro', 'class' => 'login')); ?>
            <fieldset>
                <input class="ok-button graphic" type="submit" name="login-entrar" value="Entrar" />
                <label for="email">E-mail
                    <?php echo $this->Form->text('Usuario.email', array()); ?>
                </label><br/>
                <label for="senha">Senha
                    <?php echo $this->Form->password('Usuario.senha', array()); ?>
                </label>
                <span><a href="javascript:void(null);" onclick="esqueci();"><?echo __('Esqueceu sua senha?')?></a></span>
            </fieldset>
            <?php echo $form->end(); ?>
        </div>
        <?}else{?>
        <div class="right loginBox">
            <fieldset>
                <img src="img/avatar-perfil.gif" width="65" height="65" border="0" class="left mr10 pr10 "/>
                <span class="loginName">Olá [NOME]</span><br/>
                <span><span class="pontosNum">XXX</span> Mensagens</span><br/>
                <span><span class="pontosNum">XXX</span> Pontos</span><br/>
                <span><a href="javascript:void(null);" onclick="esqueci();"><?echo __('Efetuar Logoff')?></a></span>
            </fieldset>
        </div>
        <?}?>
    </div>
</div>
