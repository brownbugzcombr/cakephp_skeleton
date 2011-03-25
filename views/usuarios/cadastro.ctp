<?php if(isset($erroValidacao)) { echo $this->Javascript->codeBlock('var valorBanco = true; ', array("inline" => false)); } ?>
<div id="content-all">
    <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
    <h4 class="main-title title-cadastro graphic">Cadastro</h4>
    <!--FALE-CONOSCO-->
    <?php echo $this->Form->create('Usuarios', array('id' => 'cadastro', 'class' => 'validacadastro')); ?>
    <fieldset class="quebra-line">
        <legend>Dados da Empresa:</legend>
        <div id="messageBox2">
        	<p>Atenção! Verifique os campos em vermelho.</p><br clear="all" />
        </div>
        <label for="telefone"><span class="campo-txt">Telefone</span>
            <?php echo $this->Form->text('Usuario.ddd', array('class' => 'ddd desab', 'disabled' => 'disabled')); ?>
            <?php echo $this->Form->hidden('Usuario.ddd'); ?>
            <?php echo $this->Form->text('Usuario.telefone', array('class' => 'tel desabtel', 'disabled' => 'disabled', 'maxlenght'=>'8')); ?>
            <?php echo $this->Form->hidden('Usuario.telefone'); ?>
        </label>
        <label for="documentacao"><span class="campo-txt">Documento (CPF/CNPJ)</span>
            <?php echo $this->Form->text('Usuario.nu_documento', array('class' => 'telefone', 'disabled' => 'disabled')); ?>
            <?php echo $this->Form->hidden('Usuario.nu_documento'); ?>
            <span class="link-button outro-tel"><a href="<?php echo $this->Html->url(array('action' => 'precadastro')); ?>" style="display: table" title="Acessar dados de outro telefone">Acessar dados de outro telefone</a></span>
        </label>
        <label for="razao-social"><span class="campo-txt">Razão Social</span>
            <?php echo $this->Form->text('Usuario.razaosocial', array('disabled' => 'disabled')); ?>
            <?php echo $this->Form->hidden('Usuario.razaosocial'); ?>
        </label>
        <label for="nome-fantasia"><span class="campo-txt">Nome Fantasia*</span>
            <?php echo $this->Form->text('Usuario.nome'); ?>
        </label>
        <p class="obrigatorio1">* Dados obrigatórios</p>
    </fieldset>
    <fieldset class="quebra-line">
        <legend>Dados Adicionais:</legend>
        <p class="obrigatorio">* Dados obrigatórios</p>
        <label for="nome-responsavel"><span class="campo-txt">Nome do Responsável*</span>
            <?php echo $this->Form->text('Usuario.contato', array()); ?>
        </label>
        <label for="sexo"><span class="campo-txt">Sexo*</span>
            <span class="documentacao"><input type="radio" value="m" class="doc" name="data[Usuario][sexo]">Masculino</span>
            <span class="documentacao"><input type="radio" value="f" name="data[Usuario][sexo]" class="doc">Feminino</span>
        </label>
        <label for="cargo-responsavel"><span class="campo-txt">Cargo do Responsável*</span>
            <?php echo $this->Form->text('Usuario.cargo', array()); ?>
        </label>
        <label for="outro-telefone"><span class="campo-txt">Outro Telefone</span>
            <?php echo $this->Form->text('Usuario.outroddd', array('class' => 'ddd', 'maxlength' => '2')); ?>
            <?php echo $this->Form->text('Usuario.outrotelefone', array('class' => 'tel', 'maxlength' => '8')); ?>
        </label>
        <label for="celular"><span class="campo-txt">Celular</span>
            <?php echo $this->Form->text('Usuario.celddd', array('class' => 'ddd', 'maxlength' => '2')); ?>
            <?php echo $this->Form->text('Usuario.celtelefone', array('class' => 'tel', 'maxlength' => '8')); ?>
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
            echo $this->Form->select('Usuario.funcionarios', $options)
            ?>
        </label>
        <label for="faturamento-anual"><span class="campo-txt">Faturamento Anual</span>
            <?php
            $options = array(
				'1' => 'Até 100.000',
				'2' => '100.000,00 a 200.000,00',
				'3' => '300.000,00 a 500.000,00',
				'4' => '500.000,00 a 900.000,00',
				'5' => 'acima de 1.000.000.00'
            );
            echo $this->Form->select('Usuario.faturamento', $options, '1', $options)
            ?>
        </label>
        <div class="empresa-destaque">
			<label for="ramo-atividade"><span class="campo-txt ajustecampo">Ramo de Atividade*</span>
				<?php echo $this->Form->select('Usuario.ramo',$ra,null,array('id'=>'ramo_atividade')); ?>
			</label>
			<label for="tipo"><span class="campo-txt ajustecampo">Tipo*</span>
				<?php echo $this->Form->select('Usuario.tipo',$rt,null,array('id'=>'ramo_tipo')); ?>
			</label>
			<label for="detalhe"><span class="campo-txt ajustecampo">Detalhe*</span>
				<?php echo $this->Form->select('Usuario.detalhe',$rd,null,array('id'=>'ramo_detalhe')); ?>
			</label>
		</div>
        <label for="idade-empresa"><span class="campo-txt">Idade da Empresa*</span>
            <?php
                $options = array(
                    '1' => 'até 3 meses',
                    '2' => '3 a 6 meses',
                    '3' => '6 a 12 meses',
                    '4' => '1 a 2 anos',
                    '5' => '2 a 5 anos',
                    '6' => 'Acima de 5 anos'
                );
                echo $this->Form->select('Usuario.idade', $options)
            ?>
            </label>
            <label for="site"><span class="campo-txt">Site</span>
            <?php echo $this->Form->text('Usuario.site', array()); ?>
            </label>
            <label for="blog"><span class="campo-txt">Blog</span>
            <?php echo $this->Form->text('Usuario.blog', array()); ?>
            </label>
            <script type="text/javascript">
							function blocTexto(valor)
							{
							    quant = 500;
							    total = valor.length;
							    if(total <= quant)
							    {
							        resto = quant - total;
							        document.getElementById('ntlig-counter').value = resto;
							    }
							    else
							    {
							        document.getElementById('UsuarioSobre').value = valor.substr(0,quant);
							    }
							}

						</script>
            <label for="sobre-empresa"><span class="campo-txt">Sobre a empresa<br />caracteres restantes:<br /><input type="text" id="ntlig-counter" style="border: none;background: none;padding: 0;cursor: inherit;width: 20px;margin: 0" value="500"" /></span>

            <?php echo $this->Form->textarea('Usuario.sobre', array('onclick' => 'this.focus();', 'onkeyup' => 'blocTexto(this.value);')); ?>
            </label>
        </fieldset>
        <fieldset class="quebra-line">
            <legend>Dados Adicionais:</legend>
            <p class="obrigatorio">* Dados obrigatórios</p>
            <label for="email"><span class="campo-txt">E-mail*</span>
            <?php echo $this->Form->text('Usuario.email', array()); ?>
            </label>
            <label for="senha"><span class="campo-txt">Senha*</span>
            <?php echo $this->Form->password('Usuario.senha', array()); ?>
            </label>
            <label for="confirmar-senha"><span class="campo-txt">Confirmar Senha*</span>
            <?php echo $this->Form->password('Usuario.senha2', array()); ?>
            </label>
        </fieldset>
        <fieldset>

			<label class="bottom-margin" for="aceito-email"><span class="documentacao">
				<span class="campo-txt">&nbsp;</span>
				<?php echo $this->Form->checkbox('Usuario.aceito_novidade',array('legend'=>false,'class'=>'checkbox doc')); ?>Aceito receber e-mail com novidades e informação da Sua Empresa, Nosso Negócio</span>
			</label>
			<label class="bottom-margin" for="li-aceito"><span class="documentacao">
				<span class="campo-txt">&nbsp;</span>
				<?php echo $this->Form->checkbox('Usuario.email_mensagem',array('legend'=>false,'class'=>'checkbox doc')); ?>Desejo receber por e-mail alertas de mensagens de outros usuários</span>
			</label>

            <label for="li-aceito"><span class="campo-txt">&nbsp;</span>
                <span class="documentacao"><input name="data[Usuario][aceito]" class="checkbox doc" type="checkbox" />Li e aceito o termo de uso da Sua Empresa, Nosso Negócio</span>
            </label>
            <br clear="all" />
            <label class="" for="termo-uso">
            	<span class="campo-txt">&nbsp;</span>
                <span class="termos">Termos de Uso:</span>
			</label>

        <div style="overflow: auto; width: 550px; height: 200px; margin-left: 205px;">
            <h4 class="bold">Política de Confidencialidade</h4>
            <p>Pelo presente termo, as empresas A.TELECOM S.A., com sede na Rua do   Rocio, 291 &ndash; 2º. andar, São Paulo - S inscrita no CNPJ/MF sob o nº   03.498.897/0001-13 IE sob nº 117.216.670.110, São Paulo - Capital,   doravante denominada ATELECOM e TELECOMUNICAÇÕES DE SÃO PAULO S/A., com   sede na Rua Martiniano de Carvalho, nº 851, São Paulo/SP, inscrita no   CNPJ/MF sob o nº 02.558.157/0001-62, doravante denominada TELESP (em   conjunto  denominadas EMPRESAS) informam aos usuários do portal da   Internet “Sua Empresa Nosso Negócio” de sua propriedade (doravante   denominados de USUÁRIOS e PORTAL, respectivamente) sobre sua política de   proteção de dados pessoais fornecidos pelos USUÁRIOS, para que estes   possam fazer uso de seu PORTAL. Nesse sentido, o USUARIO está ciente e   concorda que:</p>
            <p>1) A entrega dos dados solicitados para obter o registro como USUÁRIO é obrigatória para que o registro se aperfeiçoe.</p>
            <p>2) Os USUÁRIOS garantem que os DADOS PESSOAIS fornecidos ao PORTAL   são verdadeiros, e se obrigam a comunicar ao PORTAL qualquer modificação   dos mesmos. Os USUÁRIOS autorizam expressamente as EMPRESAS a   verificar/consultar a veracidade dos referidos DADOS PESSOAIS.</p>
            <p>3) Os dados cadastrados serão utilizados única e exclusivamente para o   uso do portal, ficando expressamente proibido o compartilhamento ou a   venda para terceiros.</p>
            <p>4) Divulgações difamatórias, conteúdo ou opiniões ilegais ou vulgares   poderão ser excluídas do site sem necessidade de aviso prévio.</p>
            <p>5) Os DADOS PESSOAIS informados serão tratados automaticamente e   incorporados ao sistema do PORTAL. O PORTAL proporciona aos USUÁRIOS   recursos técnicos para que, previamente, possam acessar o aviso sobre a   Política de Privacidade desses DADOS PESSOAIS, bem como a qualquer outra   informação relevante que precise de seu consentimento, para que assim, o   PORTAL proceda posteriormente ao tratamento automático dos mencionados   DADOS PESSOAIS.</p>
            <p>6) A digitação e o tratamento automático dos DADOS PESSOAIS tem a   finalidade de manter a relação estabelecida com as EMPRESAS, a gestão,   administração, prestação, ampliação e melhora dos serviços que os   USUÁRIOS decidam inscrever-se, ou adequar os referidos serviços a suas   preferências e gostos, possibilitando as EMPRESAS estudar a utilidade   dos serviços por parte dos usuários, desenhando novos serviços, o envio   de informações técnicas, operacionais, comerciais referentes aos seus   produtos e serviços. A finalidade do recolhimento desses DADOS PESSOAIS e   seu tratamento automático, inclui ainda, o envio de formulários de   enquetes, os quais o USUÁRIOS não estão obrigados a responder.</p>
            <p>7) Os usuários autorizam as EMPRESAS a enviar comunicações comerciais, incluídas as eletrônicas (via e-mail).</p>
            <p>8) O acesso ao PORTAL será apenas para clientes que possuem terminal   telefônico (apenas telefone comercial), sendo que só será permitido um   cadastro por endereço instalado, independente do número de terminais   existentes no endereço.</p>
            <p>9) Caso o usuário possua outro terminal telefônico (apenas telefone   comercial) no mesmo endereço e cancele o terminal que consta no cadastro   do PORTAL, o serviço continuará sendo prestado normalmente, entretanto,   caso o USUÁRIO cancele o terminal e não tenha outro terminal no mesmo   endereço o serviço estará automaticamente cancelado.</p>
            <p>10) As EMPRESAS se reservam no direito de liberar o acesso no portal   em até 1 mês contados a partir da data de instalação do terminal.</p>
            <p>11) As EMPRESAS se reservam no direito de modificar a presente   política quando a lei assim exigir, e/ou quando ocorrerem modificações   nas regras praticadas no mercado, sem a necessidade de aviso prévio.   Nessa hipótese, as empresas divulgarão em seu PORTAL as modificações   introduzidas.</p>
            <p>12) Os conteúdos (tais como artigos, notícias, vídeos e podcasts)   disponibilizados no portal são para fins pessoais e não comerciais,   portanto não é permitido distribuir, modificar, transmitir, utilizar ou   reutilizar nenhum dos conteúdos do portal denominado “Sua Empresa nosso   Negócio” para fins públicos ou comerciais sem a autorização escrita da   Telefônica. Todos os avisos de direitos autorais e de propriedade do   conteúdo deverão ser mantidos.</p>
            <p>13) As EMPRESAS não se responsabilizam em nenhuma hipótese pelos   produtos e/ou serviços oferecidos por seus parceiros bem como de   qualquer divulgação feita pelos usuários.</p>
            <p>14) As EMPRESAS estão totalmente isentas de quaisquer   responsabilidades advindas de problemas com serviços ou produtos   adquiridos neste PORTAL, sendo a responsabilidade integral do fornecedor   dos serviços ou do produto.</p>
            <p>15) As EMPRESAS adotam os níveis de segurança da informação dos DADOS   PESSOAIS requeridos por lei, e procura instalar outros meios e medidas   técnicas adicionais que estejam ao seu alcance para evitar a perda, mau   uso, alteração, acesso não autorizado e/ou furto/roubo dos DADOS   PESSOAIS fornecidos ao PORTAL. Não obstante, o USUÁRIO está ciente de   que as medidas de segurança na Internet são superáveis.</p>
            <p>16) As EMPRESAS reconhecem o direito dos USUÁRIOS de acesso, cancelamento, retificação e/ou oposição de seus dados.</p>
            <p>17) As EMPRESAS poderão utilizar cookies quando um USUÁRIO navegar   pelos sites do PORTAL. Os cookies que poderão ser utilizados em tais   sites, se associam unicamente a um navegador de um computador   determinado (usuário anônimo) e não indicam o nome e sobrenome do   usuário. Os cookies utilizados não podem ler os arquivos cookies criados   por outros provedores. O USUÁRIO tem a possibilidade de configurar o   seu navegador para ser avisado na sua tela da recepção de cookies e para   impedir a sua instalação em seu hard disk. Para maiores informações, o   USUÁRIO deverá consultar as instruções e manuais do seu navegador.</p>
            <h4>Código de Ética</h4>
            <p>O uso dos serviços e conteúdos do Portal está sujeito à legislação   vigente e aos princípios de boa-fé, em especial às normas nacionais e   internacionais dos direitos humanos.</p>
            <p>O usuário não utilizará o Portal para transmitir, comunicar ou   difundir, de qualquer forma, opiniões ou conteúdos ilegais,   difamatórios, vulgares ou que de qualquer outro modo possam atentar   contra os valores ou dignidade das pessoas.</p>
            <p>Proíbe-se todo o uso do Portal com fins ilícitos, ou que possam   prejudicar impedir, danificar e/ou sobrecarregar, de qualquer forma, o   uso e normal funcionamento do Portal, ou que direta ou indiretamente   atentem contra o mesmo ou contra qualquer terceiro.</p>
            <p>As EMPRESAS se reservam no direito de, sem necessidade de aviso   prévio, suspender o serviço caso a conduta do usuário for contrária a   este Código de Ética.</p>
        </div>

    </fieldset>
    <span class="link-button"><input type="submit" name="cadastro" value="Enviar" /></span>
        <?php echo $form->end(); ?>
</div>