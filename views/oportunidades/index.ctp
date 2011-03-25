<?php echo $this->Element('oportunidades'); ?>
<div id="content-min">
    <h4 class="main-title title-negocios graphic ajuste oportunidades">Ponto de Negócios</h4>
    <!--FAVORITOS-->
    <div id="favoritos">
        <?php if (isset($this->params['named']['usuario_id'])) {
        ?>
            <!-- Inicio minhas publicacoes -->
            <h4 class="oportunidades">Minhas Publicações</h4>
            <p class="p-negocios">A Telefônica Negócios criou esta área para que você e todas as empresas cadastradas no portal possam se encontrar e realizar novos negócios. Trata-se de uma excelente oportunidade para trocar informações, experiências, promover seus produtos e serviços e ainda estabelecer uma nova rede de contatos.
                <br /><br />
                Aproveite! Sua empresa também pode publicar promoções especiais e ainda divulgar seus produtos e serviços nesta página. Basta acessar a área “Minhas publicações” e digitar seu anúncio. É simples, rápido e gratuito.</p>
            <p></p>
            
        <?php //echo $this->Form->create('Oportunidades', array('action' => 'add')); ?>
            <!--fieldset>
                <legend>Inserir nova oportunidade</legend>
                <p class="ajusteLabel"><label for="telefone"><span class="campo-txt ajusteLabelSpan">Título da oportunidade</span></label>
                <?php echo $this->Form->text('Oportunidade.titulo'); ?></p>

            <p class="ajusteLabel">
                <label for="telefone">
                    <span class="campo-txt ajusteLabelSpan">Descrição da oportunidade</span>
                    <span class="contCaractere ajusteLabelSpan">(máx. <input type="text" id="cont" style="border: none;background: none;width: 20px" value="500" /> caracteres)</span>
                </label>
                <?php echo $this->Form->textarea('Oportunidade.texto', array('onclick' => 'this.focus();', 'onkeyup' => 'blocTexto(this.value);', 'maxlenght' => '500')); ?>
                <script type="text/javascript">
                    function blocTexto(valor)
                    {
                        quant = 500;
                        total = valor.length;
                        if(total <= quant)
                        {
                            resto = quant - total;
                            document.getElementById('cont').value = resto;
                        }
                        else
                        {
                            document.getElementById('OportunidadeTexto').value = valor.substr(0,quant);
                        }
                    }

                </script>
            </p>
            <p>
                <span class="link-button right mr6"><input type="submit" value="Enviar" /></span>
            </p>
        </fieldset-->

        <?php //echo $form->end(); ?>
                <!-- Fim publicacoes -->

        <?php } else {
        ?>
                <p class="p-negocios">A Telefônica Negócios criou esta área para que você e todas as empresas cadastradas no portal possam se encontrar e realizar novos negócios. Trata-se de uma excelente oportunidade para trocar informações, experiências, promover seus produtos e serviços e ainda estabelecer uma nova rede de contatos.

                    <br /><br />

                    Aproveite! Sua empresa também pode publicar promoções especiais e ainda divulgar seus produtos e serviços nesta página. Basta acessar a área “Minhas publicações” e digitar seu anúncio. É simples, rápido e gratuito.</p>
                <p></p>
                <p><strong>Veja as empresas com oportunidades por ordem alfabética.</strong></p>

                <div class="listaletras">
                    <ol class="por-letra">
                        <li><a href="/oportunidades/index/" title="">TODAS </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:a" title="">A </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:b" title="">B </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:c" title="">C </a><span>|</span>&nbsp;</li>

                        <li><a href="/oportunidades/index/titulo:d" title="">D </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:e" title="">E </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:f" title="">F </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:g" title="">G </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:h" title="">H </a><span>|</span>&nbsp;</li>

                        <li><a href="/oportunidades/index/titulo:i" title="">I </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:j" title="">J </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:k" title="">K </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:l" title="">L </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:m" title="">M </a><span>|</span>&nbsp;</li>

                        <li><a href="/oportunidades/index/titulo:n" title="">N </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:o" title="">O </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:p" title="">P </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:q" title="">Q </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:r" title="">R </a><span>|</span>&nbsp;</li>

                        <li><a href="/oportunidades/index/titulo:s" title="">S </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:t" title="">T </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:v" title="">U </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:v" title="">V </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:w" title="">W </a><span>|</span>&nbsp;</li>

                        <li><a href="/oportunidades/index/titulo:x" title="">X </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:y" title="">Y </a><span>|</span>&nbsp;</li>
                        <li><a href="/oportunidades/index/titulo:z" title="">Z </a><span></span>&nbsp;</li>
                    </ol><!--/BUSCA-POR-LETRA-->
                </div>
                <h4 class="oportunidades">Oportunidades Publicadas</h4>
        <?php } ?>

        <?php
            if (isset($dados) && is_array($dados) && count($dados) > 0) {
                foreach ($dados as $d) {
        ?>
                    <div class="livro">
                        <div class="livroBt">
                            <div class="contentLiv">
                                <div class="post-img">
                                    <a class="centralizar" href="#" title="ShopTime">
                            <?php
                            if ($d['Usuario']['logo'] == '') {
                                $d['Usuario']['logo'] = 'default.gif';
                            }
                            ?>
                            <img src="/upload/usuarios/logos/thumb/perfil/<?php echo $d['Usuario']['logo']; ?>" height="140" width="140" alt="" />
                        </a>
                    </div>
                    <div class="post-content">
                        <h2><?php echo $d['Oportunidade']['titulo']; ?></h2>

                        <p class="data-msg"><?php echo date('d/m/Y', strtotime($d['Oportunidade']['created'])); ?>
                            <?php
                            //debug($d['Oportunidade']);
                            $final = date('Y-m-d H:i:00');
                            $inicial = $d['Oportunidade']['created'];
                            $interval = $this->Texto->get_time_difference($inicial, $final);
                            $total = $interval['days'] * 24;
                            $total += $interval['hours'];
                            if ($total < 24) {
                            ?>
                                - enviado às <?php echo $total; ?> horas
<?php } ?>
                        </p>
                        <h3><?php echo $d['Usuario']['nome']; ?></h3>
                        <p><?php echo $d['Oportunidade']['texto']; ?></p>
                        <?php if($this->params['named']['usuario_id'] == $LoginUsuario['id']){ ?>
                        <a href="/oportunidades/del/<?php echo $d['Oportunidade']['id'] ?>" class="falar" title="Deletar oportunidade" style="margin-top: 10px; background: url(/img/icones.jpg) no-repeat scroll 0 -82px transparent;">Deletar Oportunidade</a>
                        <?php }else{ ?>
                        <a href="/usuarios/perfilajax/<?php echo $d['Usuario']['id'] ?>" class="falar jqLinkBox" title="Fale com a empresa" style="margin-top: 10px;">Fale com a empresa / Ver perfil</a>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
<?php
                        }
                    } else {
                        echo '<p>Nenhuma oportunidade encontrada</p>';
                    }
?>

<?php echo $this->Element('paginator_site'); ?>
                </div><!--/FAVORITOS-->
            </div><!--/CONTEUDO-->
            <!--SIDEBAR-->
            <div id="sidebar" class="oportSide">
<?php echo $this->Element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div>
<div class="jqmWindow" id="ex2">Carregando...</div>
<script type="text/javascript">
    $(window).ready(function() {
        $('.jqmWindow').jqm(
        {
            ajax: '@href',
            trigger: 'a.jqLinkBox',
            modal: false
        }
    );
    });
</script>