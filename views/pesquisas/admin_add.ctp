<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('action' => 'add')); ?>" method="POST">
        <p>
            <label>Texto de Introdução:</label><br>
            <?php echo $this->Form->hidden('Enquete.id'); ?>
            <?php echo $this->Form->textarea('Pesquisa.pergunta_cultural', array()); ?>
        </p>
        <p>
            <label>Regulamento:</label><br>
            <?php echo $this->Form->textarea('Pesquisa.regulamento', array()); ?>
        </p>
        <p>
            <label>imagem:</label><br>
            <?php echo $this->Form->file('Pesquisa.destaque', array()); ?>
        </p>

        <!--p>
            <label>Ativo:</label><br>
            <?php echo $this->Form->select('Pesquisa.ativo', array('1' => 'ativo', '0' => 'inativo'), 1, array('class' => 'styled')); ?>

        </p-->
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>
    </form>
</div>