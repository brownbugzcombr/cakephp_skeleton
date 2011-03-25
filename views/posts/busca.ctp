<div id="content">
    <h4 class="main-title title-busca graphic">Busca</h4>
    <!--MINHAS-MENSAGENS-->
    <div id="mensagens">
        <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
        <h2><strong>Resultados da busca (<?php echo count($dados); ?>)</strong></h2>
        <?php
        foreach ($dados as $d) {
            $tipo = null;
            if ($d['Post']['tipo'] == 1) {
                $tipo = 'noticias';
            } elseif ($d['Post']['tipo'] == 2) {
                $tipo = 'blog';
            } elseif ($d['Post']['tipo'] == 3) {
                $tipo = 'livros';
            }elseif ($d['Post']['tipo'] == 4) {
                $tipo = 'dicas';
            }
        ?>


            <div class="msg">
                <h4><a href="<?php echo "/{$tipo}/view/{$d['Post']['id']}";?>"><?php echo $d['Post']['titulo']; ?></a></h4>
                <p><?php echo $d['Post']['resumo']; ?></p>
            </div><!--/BUSCA-->
        <?php } ?>
        <?php echo $this->element('paginator_site'); ?>
    </div><!--MINHAS-MENSAGENS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar">
    <?php echo $this->Element('enquete'); ?>
    <div id="rss">
        <p>
            <a href="#" class="assine" title="Assine nosso RSS">Assine nosso RSS</a>
            <span><a href="#" title="O que é RSS?">(O que é RSS?)</a></span></p>
    </div>
    <?php echo $this->element('banner'); ?>
</div>