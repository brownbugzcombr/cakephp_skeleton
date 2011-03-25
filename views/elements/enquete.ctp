<h4 class="main-title title-enquete graphic">Dicas para você</h4>
<?php echo $this->Form->create('Enquete', array('action' => 'votar', 'id' => 'enquete')); ?>
<label for="enquete"><?php echo $enquete['Enquete']['pergunta'] ?></label>
<div id="radiorespostas" <?php if ($userjavotou == 1) { ?>style="display: none;" <?php } ?>>
    <?php
    foreach ($enquete['EnqueteResposta'] as $resposta) {
    ?>
        <p><input type="radio" name="radiobtn" value="<?php echo $resposta['id']; ?>" onclick="$('#valenquete').val(<?php echo $resposta['id']; ?>);" /><?php echo $resposta['resposta']; ?></p>
    <?php } ?>
</div>

<div id="resultadoenquete" <?php if ($userjavotou == 0) { ?> style="display: none;" <?php } ?>>
    <span id="r1"></span><br />
    <span id="p1"></span><br />
    <span id="r2"></span><br />
    <span id="p2"></span><br />
    <span id="r3"></span><br />
    <span id="p3"></span><br />
    <span id="r4"></span><br />
    <span id="p4"></span><br />
    <span id="r5"></span><br />
    <span id="p5"></span>
</div>
<?php echo $this->Form->hidden('Outro.urlback', array('value' => $this->params['url']['url'])) ?>
    <input type="hidden" name="data[EnqueteRespostaUsuario][enquete_resposta_id]" id="valenquete" value="<?php echo $enquete['EnqueteResposta'][0]['id']; ?>" />
<?php if ($userjavotou == 0) { ?>
        <span class="link-button">
            <input type="submit" name="enviar-enquete" value="Voltar" onclick="enquetevoltar();return false;" style="padding:0 11px 2px 14px; display: none;" id="btnenquete3" />
            <input type="submit" name="enviar-enquete" value="Votar" onclick="votar();return false;" style="padding:0 11px 2px 14px" id="btnenquete1" />
        </span>
        <span class="link-button" style="margin-top: 0;">
            <input type="submit" name="enviar-enquete" value="Resultado" onclick="resultado();return false;" style="padding:0 11px 2px 14px" id="btnenquete2" />
        </span>
<?php } ?>
<?php echo $form->end(); ?>
<?php if ($userjavotou == 1) {
?>
        <script type="text/javascript">
            resultado();
        </script>
<?php } ?>