<div id="content-all">
    <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
    <h4 class="main-title title-cadastro graphic">Cadastro</h4>
    <!--FALE-CONOSCO-->

    <?php echo $this->Form->create('Usuarios', array('id' => 'cadastro', 'class' => 'precadastro')); ?>
    <fieldset>
        <legend>Dados da Empresa:</legend>
        <div id="messageBox2">
        	<p>Atenção! Verifique os campos em vermelho.</p><br clear="all" />
        </div>
        <label for="telefone" style="display: table;"><span class="campo-txt">Telefone</span>
            <?php echo $this->Form->text('Importado.ddd', array('class' => 'ddd', 'maxlength' => '2')); ?>
            <?php echo $this->Form->text('Importado.nu_telefone', array('class' => 'tel', 'maxlength' => '8')); ?>
			(Somente números)
        </label>
        <label for="documentacao"><span class="campo-txt">Documento (CPF/CNPJ)</span>
            <span class="documentacao"><input class="doc cpf" type="radio" name="data[Importado][doc]" value="CPF" checked="checked" />CPF</span>
            <span class="documentacao"><input class="doc cnpj" type="radio" name="data[Importado][doc]" value="CNPJ" />CNPJ</span>
            <span class="documento"><?php echo $this->Form->text('Importado.nu_documento'); ?> (Somente números)</span>
        </label>
    </fieldset>
    <span class="link-button"><input type="submit" value="Acessar dados deste telefone" /></span>
    <?php echo $form->end(); ?>
    <!--p class="falar-telefonica">Para falar com a Telefônica utilize os telefones: São Paulo (011)  0000-0000 | Outras localidades</p -->
</div>

<div id="hidefrm" class="jqmConfirm">
    <div class="jqmConfirmWindow msg1faleconosco">
    	<div class="fecharModal jqmClose"><a href="#">close</a> or Esc Key</div>
    	<div id="titleModal">
    		<h3 class="pbt13">Digite seu e-mail, para que possamos lhe enviar os seus dados de acesso a sua página exclusiva do Sua Empresa, Nosso Negócio</h3>
    	</div>
        <form id="premail" action="/usuarios/precadastro/add" method="post">
            <fieldset>
            	<p style="margin: 0 0 10px 0;font-size: 12px">Por favor, digite seu e-mail no campo abaixo para receber a sua confirmação de cadastro.</p>
                <label class="acertoPrelabel">
                    <strong>E-mail</strong>
                    <input class="senha" type="text" value="" name="data[Precadastro][email]" style="width: 290px;" />
                </label>
                <span class="link-button"><input type="submit" name="cadastro-email" value="Enviar" /></span>
            </fieldset>
        </form>
        <p class="center mb20">*Caso tenha problemas com o seu e-mail, entre em contato através do <a href="/contatos/" title="Fale Conosco">Fale Conosco</a>
        	<br />Verifique se o e-mail não está na caixa de spam.
        </p>
    <script type="text/javascript">
            $(document).ready(function() {
            	var validator = $("#premail").validate({
            		rules: {
            			'data[Precadastro][email]': {
            				required: true
            			}
            		},
            		messages: {
            			'data[Precadastro][email]': ""
            		},
            		errorClass: "invalid"
            	});

            });
            </script>
    </div>
</div>
