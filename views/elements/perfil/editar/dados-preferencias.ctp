<div id="perfil-empresa" class="dados-preferencias" style="display:none;">
	<form id="cadastro" class="preferencias" action="<?php echo $this->Html->url(array('action' => 'editar')); ?>" method="post">
		<?php echo $this->Form->hidden('Usuario.id'); ?>
		<fieldset class="quebra-line">
			<p><b>Assuntos de interesse</b><br />
				Selecione nos campos abaixo os seus interesses dentro do site Sua Empresa, Nosso Negócio
			</p>
			<?php				
				foreach ($escolhas as $id => $titulo) {
			?>
			<label>
				<?php
					
					echo $this->Interesse->checkbox($id,$this->data['Escolha']) . ' ' . $titulo;
					
				?>
				
				<?php } ?>
			</label>
		</fieldset>
		<span class="link-button"><input type="submit" name="cadastro" value="Salvar Alterações" /></span>
	</form>
</div>