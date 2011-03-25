<div id="perfil-empresa" class="dados-empresa">
        <form id="cadastro" action="<?php echo $this->Html->url(array('action' => 'editar')); ?>" method="post">
            <?php echo $this->Form->hidden('Usuario.id'); ?>
            <fieldset class="quebra-line">
                <label for="nome-fantasia"><span class="campo-txt">Nome Fantasia*</span>
                    <?php echo $this->Form->text('Usuario.nome'); ?>
                </label>
                <p class="obrigatorio">* Dados básicos que serão exibidos em seu perfil</p>
            </fieldset>
            <fieldset class="quebra-line">
                <label for="documentacao"><span class="campo-txt">Documento (CPF/CNPJ)</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['documento']; ?>&nbsp;</span>

                </label>
                <br clear="all" />
                <label for="razao-social"><span class="campo-txt">Razão Social</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['razaosocial']; ?></span>
                </label>
                <label for="sms"><span class="campo-txt">&nbsp;</span>
                    <span class="documentacao"><?php echo $this->Privacidade->checkbox('doc_razao', array('class' => 'checkbox doc')); ?>Exibir documento e razão social em meu perfil</span>
                </label>
            </fieldset>
            <fieldset class="quebra-line">
                <p class="fale">
                    <img src="/img/img_fale_conosco.jpg" title="Logo" alt="logo" />
			Caso haja alguma<br /> informação errada,<br /> entre em contato conosco<br /> através do nosso<br />
                    <a href="/contatos/" title="Fale Conosco">fale conosco</a>
                </p>
                <label for="logradouro"><span class="campo-txt">Logradouro</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['endereco']; ?></span>
                </label>
                <br class="clear" />
                <label for="bairro"><span class="campo-txt">Bairro</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['bairro']; ?></span>
                </label>
                <br class="clear" />
                <label for="complemento"><span class="campo-txt">Complemento</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['complemento']; ?></span>
                </label>
                <br class="clear" />
                <label for="uf"><span class="campo-txt">Estado</span>
                    <span class="documentacao empresa"><?php //echo $this->data['Usuario']['estado'];      ?></span>
                </label>
                <br class="clear" />
                <label for="cidade"><span class="campo-txt">Cidade</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['cidade']; ?></span>
                </label>
                <br class="clear" />
                <label for="cep"><span class="campo-txt">CEP</span>
                    <span class="documentacao empresa"><?php echo $this->data['Usuario']['cep']; ?></span>
                </label>
                <label for="sms"><span class="campo-txt">&nbsp;</span>
                    <span class="documentacao"><?php echo $this->Privacidade->checkbox('endereco', array('class' => 'checkbox doc')); ?>Exibir informações de endereço em meu perfil</span>
                </label>
            </fieldset>
            <fieldset class="quebra-line">
                <label for="nome-responsavel"><span class="campo-txt">Nome do Contato*</span>
                    <?php echo $this->Form->text('Usuario.contato'); ?>
                </label>
                <label for="sexo"><span class="campo-txt">Sexo*</span>
                    <span class="documentacao">
                        <?php echo $this->Form->radio('Usuario.sexo', array('m' => 'Masculino&nbsp;&nbsp;', 'f' => 'Feminino'), array('legend' => '', 'class' => 'doc')); ?>
                    </span>
                </label>
                <label for="cargo-responsavel"><span class="campo-txt">Cargo*</span>
                    <?php echo $this->Form->text('Usuario.cargo'); ?>
                    </label>
                    <label for="email"><span class="campo-txt">E-mail</span>
                    <?php echo $this->Form->hidden('Usuario.email'); ?><span class="documentacao empresa"><?php echo $this->data['Usuario']['email']; ?></span>
                    </label>
                <br />
                    <label for="telefone"><span class="campo-txt">Telefone</span>
                        <span class="documentacao empresa"><?php echo $this->data['Usuario']['ddd']; ?>&nbsp;<?php echo $this->data['Usuario']['telefone']; ?></span>
                    </label>
                    <label for="sms"><span class="campo-txt">&nbsp;</span>
                        <span class="documentacao"><?php echo $this->Privacidade->checkbox('contato', array('class' => 'checkbox doc')); ?>Exibir informações do contato em meu perfil</span>
                    </label>

                </fieldset>
                <fieldset>
                    <label class="bottom-margin" for="aceito-email"><span class="documentacao"><?php echo $this->Form->checkbox('Usuario.aceito_novidade', array('legend' => false, 'class' => 'checkbox doc')); ?>Aceito receber e-mail com novidades e informação da Sua Empresa, Nosso Negócio</span>
                    </label>
                    <label class="bottom-margin" for="li-aceito"><span class="documentacao"><?php echo $this->Form->checkbox('Usuario.email_mensagem', array('legend' => false, 'class' => 'checkbox doc')); ?>Desejo receber por e-mail alertas de mensagens de outros usuários</span>
                    </label>
                </fieldset>
                <span class="link-button"><input type="submit" name="cadastro" value="Salvar Alterações" /></span>
            </form>
        </div><!--/FAVORITOS-->