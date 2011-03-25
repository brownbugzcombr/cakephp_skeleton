<div id="perfil-empresa" class="dados-adicionais" style="display:none;">
            <form id="cadastro" enctype="multipart/form-data" class="adicionais" action="#" method="post">
            <?php echo $this->Form->hidden('Usuario.id'); ?>
                        <fieldset>
                            <label for="logotipo">
                                <img src="<?php echo '/upload/usuarios/logos/' . $this->data['Usuario']['logo']; ?>" class="documentacao left" height="140" width="140" />
                                <span class="documentacao file-info">Alterar Imagem <br /><?php echo $this->Form->file('Usuario.logo'); ?><br  />140x140 | Máx.100 KB | JPEG, GIF</span>
                            </label>
                            <p class="obrigatorio">* Dados obrigatórios</p>
                            <label for="outro-telefone"><span class="campo-txt">Outro Telefone</span>
                    <?php echo $this->Form->text('Usuario.outroddd', array('class' => 'ddd')); ?>
                    <?php echo $this->Form->text('Usuario.outrotelefone', array('class' => 'tel')); ?>
                        <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('outrotelefone', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                    </span>
                </label>
                <label for="celular"><span class="campo-txt">Celular</span>
                    <?php echo $this->Form->text('Usuario.celddd', array('class' => 'ddd')); ?>
                    <?php echo $this->Form->text('Usuario.celtelefone', array('class' => 'tel')); ?>
                        <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('celular', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                    </span>
                </label>
                <label class="bottom-margin" for="sms"><span class="campo-txt">&nbsp;</span>
                    <span class="documentacao"><input name="sms" class="checkbox doc" type="checkbox" />Aceito receber SMS com novidades e informação da Sua Empresa, Nosso Negócio</span>
                </label>
                <label for="num-funcionarios"><span class="campo-txt">Nº de Funcionários*</span>
                    <?php
                        $options = array(
                            '1' => '1 a 2',
                            '2' => '3 a 5',
                            '3' => '6 a 10',
                            '4' => '11 a 25',
                            '5' => '26 a 50',
                            '6' => 'Acima de 50'
                        );
                        echo $this->Form->select('Usuario.funcionarios', $options);
                    ?>

                    </label>
                    <label for="faturamento-anual"><span class="campo-txt">Faturamento Anual</span>
                    <?php
                        $options = '';
                        $options = array(
                            '1' => 'Até 100.000',
                            '2' => '100.000,00 a 200.000,00',
                            '3' => '300.000,00 a 500.000,00',
                            '4' => '500.000,00 a 900.000,00',
                            '5' => 'acima de 1.000.000.00'
                        );

                        echo $this->Form->select('Usuario.faturamento', $options);
                    ?>
                        <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('faturamento', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                    </span>
                </label>
                <div class="empresa-destaque">
                    <label for="ramo-atividade"><span class="campo-txt">Ramo de Atividade*</span>
                        <?php echo $this->Form->select('Usuario.ramo', $ra, null, array('id' => 'ramo_atividade')); ?>
                        <span class="exibir">
                            <?php echo $this->Privacidade->checkbox('ramo', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                        </span>
                    </label>
                    <label for="tipo"><span class="campo-txt">Tipo*</span>
                        <?php echo $this->Form->select('Usuario.tipo', $rt, null, array('id' => 'ramo_tipo')); ?>
                        </label>
                        <label for="detalhe"><span class="campo-txt">Detalhe*</span>
                        <?php echo $this->Form->select('Usuario.detalhe', $rd, null, array('id' => 'ramo_detalhe')); ?>
                        </label>
                    </div>
                    <label for="idade-empresa"><span class="campo-txt">Idade da Empresa*</span>
                    <?php
                            $options = array(
                                '1' => 'até 3 meses',
                                '2' => '3 a 6 meses',
                                '3' => '6 a 12 meses',
                                '4' => '6 a 12 meses',
                                '5' => '1 a 2 anos',
                                '6' => '2 a 5 anos',
                                '7' => 'Acima de 5 anos'
                            );
                            echo $this->Form->select('Usuario.idade', $options)
                    ?>
                        </label>
                        <label for="site"><span class="campo-txt">Site</span>
                    <?php echo $this->Form->text('Usuario.site'); ?>
                    <?php //echo $this->Form->checkbox('UsuarioPrivacidade.campo[]',array('legend'=>false,'class'=>'checkbox doc')); ?>
                            <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('site', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                        </span>
                    </label>
                    <label for="blog"><span class="campo-txt">Blog</span>
                    <?php echo $this->Form->text('Usuario.blog'); ?>
                            <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('blog', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                        </span>
                    </label>
                    <label for="sobre-empresa"><span class="campo-txt">Sobre a Empresa <br />(máx 500 caractertes)</span>
                    <?php echo $this->Form->textarea('Usuario.sobre'); ?>
                            <span class="exibir">
                        <?php echo $this->Privacidade->checkbox('sobre', array('class' => 'checkbox doc')); ?>Exibir em meu perfil
                        </span>
                    </label>
                </fieldset>
                <span class="link-button"><input type="submit" name="cadastro" value="Salvar Alterações" /></span>
            </form>
        </div>