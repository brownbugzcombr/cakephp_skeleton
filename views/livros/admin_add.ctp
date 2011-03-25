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
            <label>Nome do Projeto:</label><br>
            <?php echo $this->Form->hidden('Post.id'); ?>
            <?php echo $this->Form->text('Post.titulo', array('class' => 'text big')); ?>

        </p>

        <p>
            <label>Resumo:</label><br>
            <?php echo $this->Form->textarea('Post.resumo'); ?>
        </p>
        <p>
            <label>Imagem Destaque:</label><br>

            <?php echo $this->Form->file('Post.img_destaque', array('type' => 'file')); ?>
        </p>
        <p>
            <label>categoria:</label><br>
            <?php echo $this->Form->select('Post.categoria_id', $categorias, null, array('class' => 'styled')); ?>
        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>

    </form>
</div>