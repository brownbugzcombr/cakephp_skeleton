<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2>Pesquisa Cultural - Perguntas</h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('action' => 'add', $this->data['Pergunta']['pesquisa_id'])); ?>" method="POST">
        <p>
            <label>Pergunta:</label><br>
            <?php echo $this->Form->hidden('Pergunta.id'); ?>
            <?php echo $this->Form->hidden('Pergunta.pesquisa_id', array('class' => 'text big')); ?>
            <?php echo $this->Form->text('Pergunta.pergunta', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Respostas:</label><br>
            <?php echo $this->Form->hidden('Resposta.0.id'); ?>
            <?php echo $this->Form->text('Resposta.0.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('Resposta.1.id'); ?>
            <?php echo $this->Form->text('Resposta.1.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('Resposta.2.id'); ?>
            <?php echo $this->Form->text('Resposta.2.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('Resposta.3.id'); ?>
            <?php echo $this->Form->text('Resposta.3.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('Resposta.4.id'); ?>
            <?php echo $this->Form->text('Resposta.4.resposta', array('class' => 'text little')); ?>
            <br />
        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>

    </form>
</div>