<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('action' => 'add')); ?>" method="POST">
        <p>
            <label>Nome:</label><br>
            <?php echo $this->Form->hidden('Administrador.id'); ?>
            <?php echo $this->Form->text('Administrador.nome', array('class' => 'text big')); ?>

        </p>
        <p>
            <label>Login:</label><br>
            <?php echo $this->Form->text('Administrador.login', array('class' => 'text big')); ?>
        </p>

        <p>
            <label>Senha:</label><br>
            <?php echo $this->Form->password('Administrador.senha', array('class' => 'text big')); ?>
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

 
</script>