<div id="content-all">
    <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
    <h4 class="main-title title-cadastro graphic">Reset de Senha</h4>
    <!--FALE-CONOSCO-->
    <?php echo $this->Form->create('Usuarios', array('id' => 'cadastro', 'class' => 'precadastro')); ?>
    <fieldset>
        <legend>Dados da conta:</legend>
        <label for="documentacao"><span class="campo-txt">Nova Senha</span>
            <span class=""><?php echo $this->Form->text('Usuario.senha'); ?> </span>
        </label>
        <label for="documentacao"><span class="campo-txt">confirmar Nova Senha</span>
            <span class=""><?php echo $this->Form->text('Usuario.senha2'); ?> </span>
        </label>
        <label for="documentacao"><span class="campo-txt">E-mail</span>
            <span class=""><?php echo $this->Form->text('Usuario.email'); ?> </span>
            <?php echo $this->Form->hidden('Usuario.hash'); ?>
        </label>
    </fieldset>
    <span class="link-button"><input type="submit" value="Acessar Dados deste Telefone" /></span>
    <?php echo $form->end(); ?>
    <!--p class="falar-telefonica">Para falar com a Telefônica utilize os telefones: São Paulo (011)  0000-0000 | Outras localidades</p -->
</div>

<div id="hidefrm" class="jqmConfirm">
    <div class="jqmConfirmWindow msg1faleconosco">
        <div class="fecharModal jqmClose"><a href="#">close</a> or Esc Key</div>
        <div id="titleModal">
            <h3 class="pbt13">Digite seu e-mail, para que possamos lhe enviar os seus dados de acesso a sua página exclusiva do Sua Empresa, Nosso Negócio</h3>
        </div>
        <form id="esqueceu-senha" action="/usuarios/precadastro/add" method="post">
            <fieldset>
                <label class="acertoPrelabel">
                    <strong>E-mail</strong>
                    <input class="senha" type="text" value="" name="data[Precadastro][email]" style="width: 290px;" />
                </label>
                <span class="link-button"><input type="submit" name="cadastro-email" value="Enviar" /></span>
            </fieldset>
        </form>
        <p class="center mb20">*Caso tenha problemas com o seu e-mail, entre em contato através do <a href="/index.php?option=com_content&amp;view=article&amp;id=4&amp;Itemid=19" title="Fale Conosco">Fale Conosco</a></p>
    </div>
</div>
