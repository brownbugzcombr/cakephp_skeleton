<?php echo $this->Element('oportunidades'); ?>

<div id="content-min">
<<<<<<< HEAD
    <h4 class="main-title title-negocios graphic ajuste oportunidades">Ponto de Negócios</h4>
=======
    <h4 class="main-title title-negocios graphic">Ponto de Negócios</h4>
>>>>>>> 619159684b78fd86b7409c632a7a927fa3f531f7
    <!--FAVORITOS-->
    <div id="favoritos">


        <h4 class="oportunidades">Adicionar Oportunidade</h4>

        <?php echo $this->Form->create('Oportunidades', array('action' => 'add')); ?>
        <fieldset>
            <legend>Dados da Oportunidade:</legend>
            <p class="ajusteLabel"><label for="telefone"><span class="campo-txt ajusteLabelSpan">Título</span></label>
                <?php echo $this->Form->text('Oportunidade.titulo'); ?></p>

            <p class="ajusteLabel"><label for="telefone"><span class="campo-txt ajusteLabelSpan">Descrição</span></label>
                <?php echo $this->Form->textarea('Oportunidade.texto'); ?></p>

        </fieldset>
        <span class="link-button"><input type="submit" value="Cadastrar" /></span>
        <?php echo $form->end(); ?>



    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->

<div id="sidebar" class="oportSide">
    <?php echo $this->Element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div>