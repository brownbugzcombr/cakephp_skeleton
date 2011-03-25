<div id="content">
    <h4 class="main-title title-dicas graphic">Dicas</h4>
    <!--FAVORITOS-->
    <div id="favoritos">
        <!--POST-->
        <div class="post">
            <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
            <p class="data-post"><?php echo date('d/m/Y', strtotime($dado['Post']['created'])); ?></p>
            <h2><?php echo $dado['Post']['titulo']; ?></h2>
            <!--AUTOR-NOME-DIA-->
            <?php echo $dado['Post']['texto']; ?>
            <div class="post-info">
                <a href="#" class="comment" title=""><?php echo count($comentarios); ?> comentários</a>
                <?php echo $this->Element('postscurtir'); ?>
            </div>
        </div><!--/POST-->
        <?php echo $this->Element('comentarios'); ?>
                <!--VEJA-TB-->
        <?php echo $this->element('veja-tambem', array('tipo' => 1)); ?>
        <!--VEJA-TB-->
    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->
<!-- modal -->
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