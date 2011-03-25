<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('controller' => $controllerName, 'action' => 'add')); ?>" enctype="multipart/form-data" method="POST">
        <p>
            <label>Título:</label><br>
            <?php echo $this->Form->hidden('Post.id'); ?>
            <?php echo $this->Form->text('Post.titulo', array('class' => 'text big', 'onblur' => 'slugMe()')); ?>

        </p>

        <p>
            <label>URL:</label><br>
            <?php echo $this->Form->text('Post.slug', array('class' => 'text big')); ?><br/>
            <a id="geraSlug">Gerar URL Automática</a>
        </p>

        <p>
            <label>Descricao:</label><br>
            <?php echo $this->Form->textarea('Post.texto'); ?>
        </p>

        <p>
            <label>Resumo:</label><br>
            <?php echo $this->Form->textarea('Post.resumo'); ?>
        </p>
        <p>
            <label>categoria:</label><br>
            <?php echo $this->Form->select('Post.categoria_id', $categorias, null, array('class' => 'styled')); ?>
        </p>
        <p>
            <label>Privacidade:</label><br>
            <?php echo $this->Form->select('Post.publica', array('0' => 'privado', '1' => 'publico'), null, array('class' => 'styled')); ?>
        </p>
        <p>
            <label>Tipo de Conteúdo:</label><br>
            <?php echo $this->Form->select('Post.conteudo', array('1' => 'Matéria', '2' => 'Vídeos', '3' => 'Podcasts'), null, array('class' => 'styled')); ?>
        </p>
        <p>
            <label>Title:</label><br>
            <?php echo $this->Form->text('Post.title', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Keyword:</label><br>
            <?php echo $this->Form->textarea('Post.title', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Metas:</label><br>
            <?php echo $this->Form->textarea('Post.title', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Home destaque:</label><br>
            <?php echo $this->Form->text('Post.chamada', array('class' => 'text big')); ?>
        </p>
        <p>
            <?php
            if ($this->data['Post']['img_destaque'] != '') {
                echo '<label>Imagem Destaque Atual:</label><br>';
                echo '<img src="' . "/upload/posts/destaque/" . $this->data['Post']['img_destaque'] . '" />';
            }
            ?>
            <br /><br />
            <label>Nova Imagem Destaque:</label><br>
            <?php echo $this->Form->file('Post.img_destaque', array('type' => 'file')); ?>
        </p>

        <p>
            <label>Destaque Home:</label><br>
            <?php echo $this->Form->file('Post.img_home', array('type' => 'file')); ?>
        </p>
        <p>

            <?php echo $this->Form->checkbox('Post.home', array('class' => 'checkbox')); ?>
            <label>Destaque Home:</label>
        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>



    </form>
</div>
<script type="text/javascript">
    CKEDITOR.plugins.add( 'flvPlayer','en') ;
    CKEDITOR.replace('PostTexto', {
        filebrowserBrowseUrl: '/app/webroot/fmenager/index.html',
        toolbar: [
            ['Source','-','Save','NewPage','Preview','-','Templates'],
            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
            ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
            ['BidiLtr', 'BidiRtl'],
            '/',
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['Link','Unlink','Anchor'],
            ['Image','Flash','flvPlayer','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
            '/',
            ['Styles','Format','Font','FontSize'],
            ['TextColor','BGColor'],
            ['Maximize', 'ShowBlocks','-','About']
        ]
    });

    function slugMe(){
        if ($('#PostSlug').val()==''){
            var t = $('#PostTitulo').val();
            var t2 = t.replace(/[^a-z0-9_]/ig, '_');
            t2 = t2.replace(/_[_]*/ig, '_');
        
            t2 = t2.replace(/_$/i, '');
            t2 = t2.replace(/^_/i, '');
            
            $('#PostSlug').val(t2);
        }
    }
    $('#geraSlug').click(function(){
        $('#PostSlug').val('');
        slugMe();
    });
</script>