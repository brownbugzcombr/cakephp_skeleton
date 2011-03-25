<!--SIDEBAR-->
<div id="sidebar">
    <div class="categorias">
        <?php echo $this->element('categorias'); ?>
    </div>
    <ul class="nossos-parceiros">
        <li class="filtros-title">Nossos Parceiros:</li>
        <?php foreach ($parc as $url => $logotipo) {
        ?>
            <li>
                <a title="" href="<?php echo $url; ?>" target="_blank"><img src="/upload/tvantagem/<?php echo $logotipo; ?>"></a>
            </li>
        <?php } ?>
    </ul>
</div><!--/SIDEBAR-->
<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-bibliografia graphic">Bibliografia Recomendade</h4>
    <!--FAVORITOS-->
    <div id="favoritos" class="favoritos3Col">
        <br clear="all" />
        <p><a title="« Mais recentes" class="mais-recentes" href="/livros/">« Mais recentes</a></p>

        <div class="listaletras">
            <ol class="por-letra">
                <li><a href="/livros/index/" title="">TODAS </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:a" title="">A </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:b" title="">B </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:c" title="">C </a><span>|</span>&nbsp;</li>

                <li><a href="/livros/index/titulo:d" title="">D </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:e" title="">E </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:f" title="">F </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:g" title="">G </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:h" title="">H </a><span>|</span>&nbsp;</li>

                <li><a href="/livros/index/titulo:i" title="">I </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:j" title="">J </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:k" title="">K </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:l" title="">L </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:m" title="">M </a><span>|</span>&nbsp;</li>

                <li><a href="/livros/index/titulo:n" title="">N </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:o" title="">O </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:p" title="">P </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:q" title="">Q </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:r" title="">R </a><span>|</span>&nbsp;</li>

                <li><a href="/livros/index/titulo:s" title="">S </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:t" title="">T </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:v" title="">U </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:v" title="">V </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:w" title="">W </a><span>|</span>&nbsp;</li>

                <li><a href="/livros/index/titulo:x" title="">X </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:y" title="">Y </a><span>|</span>&nbsp;</li>
                <li><a href="/livros/index/titulo:z" title="">Z </a><span>|</span>&nbsp;</li>
            </ol><!--/BUSCA-POR-LETRA-->
        </div>
        <?php
        //debug($dados);
        foreach ($dados as $d) {
        ?>
            <div class="post">
            <?php if (isset($d['Post']['img_destaque']) && $d['Post']['img_destaque'] != '') {
            ?>
                <a class="post-img" href="#" title="">
                    <img src="/upload/posts/<?php echo $d['Post']['img_destaque']; ?>" height="135" width="165" />
                </a>
            <?php } ?>
            <h2><?php echo $this->Html->link($d['Post']['titulo'], array('action' => 'view', $d['Post']['id'])); ?></h2>
            <p><?php echo $d['Post']['resumo'] ?></p>
            <div class="post-info">
                <a href="#" class="comment-blog" title=""><?php echo count($d['Comentario']); ?> comentários</a>
                <ul class="curtir">
                    <li class="gostei"><a href="javascript:void(null);" title="Gostei" onclick="gostei(<?php echo $d['Post']['id']; ?>, 1)" >Gostei</a></li>
                    <li class="nao-gostei"><a href="javascript:void(null);" class="graphic" title="Não Gostei" onclick="gostei(<?php echo $d['Post']['id']; ?>, 1)">Não Gostei</a></li>
                </ul>
            </div>
        </div>
        <?php } ?>
        <!--PAGINACAO-->
        <?php echo $this->element('paginator_site'); ?>
        <!--/PAGINACAO-->
    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div><!--/SIDEBAR-->