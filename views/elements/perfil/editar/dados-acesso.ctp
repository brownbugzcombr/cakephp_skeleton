<div id="perfil-empresa" class="dados-acesso" style="display:none;">
	<form id="cadastro" class="adicionais" action="<?php echo $this->Html->url(array('action' => 'editar')); ?>" method="post">
		<?php echo $this->Form->hidden('Usuario.id'); ?>
		<fieldset>
			<label for="email"><span class="campo-txt">E-mail</span>
				<span class="documentacao empresa"><?php echo $LoginUsuario['email']; ?></span>
			</label>
			<br class="clear" />
			<div id="areasenha">
				<label for="senha"><span class="campo-txt">Senha</span>
					<a href="javascript:void(null);" onclick="$('#novos').toggle('display', '');" title="Alterar Senha" class="senha">Alterar Senha</a>
				</label>
				<div id="novos" style="display: none">
					<label for="senha"><span class="campo-txt">Nova Senha</span>
						<input name="data[Usuario][senha]" type="password" />
					</label>
					<label for="re-senha"><span class="campo-txt">Confirmar Nova Senha</span>
						<input name="data[Usuario][senha2]" type="password" />
					</label>
				</div>
			</div>
		</fieldset>
		<span class="link-button"><input type="submit" name="cadastro" value="Salvar Alterações" /></span>
	</form>
</div>