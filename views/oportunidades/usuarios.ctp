<?php echo $this->Element('oportunidades'); ?>



<div id="content-min">
    <h4 class="main-title title-negocios graphic ajuste oportunidades">Ponto de Negócios</h4>
    <!--FAVORITOS-->
    <div id="favoritos">

        <p class="p-negocios">A Telefônica Negócios criou esta área para que você e todas as empresas cadastradas no portal possam se encontrar e realizar novos negócios. Trata-se de uma excelente oportunidade para trocar informações, experiências, promover seus produtos e serviços e ainda estabelecer uma nova rede de contatos.

<br /><br />

                Aproveite! Sua empresa também pode publicar promoções especiais e ainda divulgar seus produtos e serviços nesta página. Basta acessar a área “Minhas publicações” e digitar seu anúncio. É simples, rápido e gratuito.</p>
        <p></p>
        <p><strong>Veja as empresas com oportunidades por ordem alfabética.</strong></p>

        <div class="listaletras">
            <ol class="por-letra">
                <li><a href="/oportunidades/usuarios/" title="">TODAS </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:a" title="">A </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:b" title="">B </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:c" title="">C </a><span>|</span>&nbsp;</li>

                <li><a href="/oportunidades/usuarios/titulo:d" title="">D </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:e" title="">E </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:f" title="">F </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:g" title="">G </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:h" title="">H </a><span>|</span>&nbsp;</li>

                <li><a href="/oportunidades/usuarios/titulo:i" title="">I </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:j" title="">J </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:k" title="">K </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:l" title="">L </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:m" title="">M </a><span>|</span>&nbsp;</li>

                <li><a href="/oportunidades/usuarios/titulo:n" title="">N </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:o" title="">O </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:p" title="">P </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:q" title="">Q </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:r" title="">R </a><span>|</span>&nbsp;</li>

                <li><a href="/oportunidades/usuarios/titulo:s" title="">S </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:t" title="">T </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:v" title="">U </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:v" title="">V </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:w" title="">W </a><span>|</span>&nbsp;</li>

                <li><a href="/oportunidades/usuarios/titulo:x" title="">X </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:y" title="">Y </a><span>|</span>&nbsp;</li>
                <li><a href="/oportunidades/usuarios/titulo:z" title="">Z </a><span></span>&nbsp;</li>
            </ol><!--/BUSCA-POR-LETRA-->
        </div>
        <h4 class="oportunidades">Empresas cadastradas</h4>
        <?php //debug($dados); ?>
        <?php foreach ($dados as $d) {
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
                <h2><?php echo $d['Usuario']['nome']; ?></h2>
                <p><?php echo $d['Usuario']['segmento']; ?></p>
                <p><strong>Sobre a empresa:</strong><?php echo $d['Usuario']['sobre']; ?></p>
                <p><strong>Funcionarios:</strong>
                    <?php
                    switch ($d['Usuario']['funcionarios']) {
                        case 1:
                            echo '1 a 2';
                            break;
                        case 2:
                            echo '3 a 5';
                            break;
                        case 3:
                            echo '6 a 10';
                            break;
                        case 4:
                            echo '11 a 25';
                            break;
                        case 5:
                            echo '26 a 50';
                            break;
                        case 6:
                            echo 'Acima de 50';
                            break;
                    } ?>

                </p>
                <p><strong>Dados de contato</strong></p>
                <p><?php echo $d['Usuario']['contato']; ?></p>
                <p>Telefone (<?php echo $d['Usuario']['ddd'] . ') ' .$d['Usuario']['telefone']; ?></p>
                <p><a href="http://<?php echo $d['Usuario']['site']; ?>" target="_blank"><?php echo $d['Usuario']['site']?></a></p>
                <a href="" class="perfil-empresa" title="Perfil da empresa" style="display: none;">» Perfil da empresa</a>
                <a href="/usuarios/perfilajax/<?php echo $d['Usuario']['id'] ?>" class="falar jqLinkBox" title="Fale com a empresa" style="margin-top: 10px;">Fale com a empresa</a>
            </div>
</div>
</div>
        </div>
        <?php } ?>

        <?php $this->Element('paginator_site'); ?>
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
    $().ready(function() {
        $('.jqmWindow').jqm(
        {
            ajax: '@href',
            trigger: 'a.jqLinkBox',
            modal: true
        }
    );
    });
</script>