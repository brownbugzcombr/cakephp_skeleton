<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('action' => 'ramo')); ?>" enctype="multipart/form-data" method="POST">

        <p>
            <label>Ramo Atividade:</label><br>
            <?php echo $this->Form->select('RamoAtividade.id', $ra, null, array('id' => 'ramo_atividade', 'class' => 'styled')); ?>
            <label>Alterar Nome:</label><br>
            <?php echo $this->Form->text('RamoAtividade.desc', array('class' => 'text little')); ?>
        </p>
        <p>
            <label>Tipo:</label><br>
            <?php echo $this->Form->select('RamoTipo.id', $rt, null, array('id' => 'ramo_tipo', 'class' => 'styled')); ?>
            <label>Alterar Nome:</label><br>
            <?php echo $this->Form->text('RamoTipo.desc', array('class' => 'text little')); ?>
        </p>
        <p>
            <label>Detalhe:</label><br>
            <?php echo $this->Form->select('RamoDetalhe.id', $rd, null, array('id' => 'ramo_detalhe', 'class' => 'styled')); ?>
            <label>Alterar Nome:</label><br>
            <?php echo $this->Form->text('RamoDetalhe.desc', array('class' => 'text little')); ?>
        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>



    </form>
</div>