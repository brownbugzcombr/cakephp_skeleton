<?php
	$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
	<form action="<?php echo $this->Html->url(array('controller'=>$controllerName,'action'=>'add')); ?>" enctype="multipart/form-data" method="POST">
	    <p>
	        <label>Título:</label><br>
	        <?php echo $this->Form->hidden('Post.id'); ?>
	        <?php echo $this->Form->text('Post.titulo', array('class' => 'text big')); ?>

	    </p>
	    <p>
	        <label>Descricao:</label><br>
	        <?php echo $this->Form->textarea('Post.texto'); ?>
	    </p>

	    <p>
	        <label>Resumo:</label><br>
	        <?php echo $this->Form->textarea('Post.resumo', array('class' => 'ckeditor')); ?>
	    </p>
	    <p>
	    	<?php
		        if($this->data['Post']['img_destaque'] != '') {
		        	echo '<label>Imagem Destaque Atual:</label><br>';
		        	echo '<img src="'."/upload/posts/destaque/".$this->data['Post']['img_destaque'].'" />';
		        }
	        ?>
	        <br /><br />
	        <label>Nova Imagem Destaque:</label><br>
	        <?php echo $this->Form->file('Post.img_destaque', array('type' => 'file')); ?>
	    </p>
	    <p>
	        <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
	        <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
	    </p>

	</form>
</div>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
$('.jquery_ckeditor').ckeditor(config);
</script>