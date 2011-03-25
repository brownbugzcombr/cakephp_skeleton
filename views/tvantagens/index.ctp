<div id="content">
    <!--T-VANTAGENS-NEGOCIOS-->
    <div id="t-vantagens-negocios">
        <h4 class="main-title title-t-vantagens graphic">t vantagens Negócios</h4>
        <h2>Mais do que descontos, <span>oportunidades imperdíveis de grandes marcas</span> para sua empresa aproveitar.</h2>
        <p class="ofertas">A Telefônica Negócios está sempre em busca de novos parceiros, para trazer as melhores oportunidades para você.<br />
					Confira as ofertas abaixo e clique na opção desejada para obter mais informações: </p>
        <?php
        $class = 'post';
        $iEach = 2;
        foreach ($data as $d) {
            if ($iEach % 2 > 0) {
                $class = 'post last-margin';
            } else {
                $class = 'post';
            }
        ?>
            <div class="<?php echo $class; ?>">
                <div class="post-img">
                    <a href="<?php echo $d['Tvantagem']['url'] ?>"  target="_blank" title="">
                        <img src="/upload/tvantagem/<?php echo $d['Tvantagem']['logotipo'] ?>"/>
                    </a>
                </div>
                <div class="post-content">
                    <p><?php echo $d['Tvantagem']['nome'] ?></p>
                <?php if (!empty($LoginUsuario) && is_array($LoginUsuario)) {
                ?>
                    <a href="<?php echo $d['Tvantagem']['url'] ?>" target="_blank" title="Saiba mais" class="saiba-mais">Saiba mais</a>
                <?php } ?>
            </div>
        </div>
        <?php
                $iEach++;
            }
        ?>


        <p class="sugestoes"><span style="color: #003399">Se tiver sugestões de benefícios e descontos para sua empresa, mande um e-mail para</span> <a href="mailto:vantagensnegocios@telefonica.com.br">vantagensnegocios@telefonica.com.br</a></p>
    </div><!--/T-VANTAGENS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div>