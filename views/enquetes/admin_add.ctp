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
            <label>Pergunta:</label><br>
            <?php echo $this->Form->hidden('Enquete.id'); ?>
            <?php echo $this->Form->text('Enquete.pergunta', array('class' => 'text big')); ?>

        </p>
        <p>
            <label>Respostas:</label><br>
            <?php echo $this->Form->hidden('EnqueteResposta.0.id'); ?>
            <?php echo $this->Form->text('EnqueteResposta.0.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('EnqueteResposta.1.id'); ?>
            <?php echo $this->Form->text('EnqueteResposta.1.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('EnqueteResposta.2.id'); ?>
            <?php echo $this->Form->text('EnqueteResposta.2.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('EnqueteResposta.3.id'); ?>
            <?php echo $this->Form->text('EnqueteResposta.3.resposta', array('class' => 'text little')); ?>
            <br />
            <?php echo $this->Form->hidden('EnqueteResposta.4.id'); ?>
            <?php echo $this->Form->text('EnqueteResposta.4.resposta', array('class' => 'text little')); ?>
            <br />
        </p>
        <p>
            <label>Ativo:</label><br>
            <?php echo $this->Form->select('Enquete.ativo', array('1' => 'ativo', '0' => 'inativo'), 1, array('class' => 'styled')); ?>

        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>

    </form>
</div>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true, uploadURI : '/media/imageUpload/'}).panelInstance('PostTexto');
    });
</script>