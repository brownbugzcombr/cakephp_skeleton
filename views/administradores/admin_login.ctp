<div class="block small center login">
    <?php echo $session->flash(); ?>
    <div class="block_head">
        
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Login</h2>
        
    </div>
    
    <div class="block_content">
        <?php echo $this->Form->create('Administradores', array('action' => 'login')); ?>
        <p>
            <label>E-mail:</label> <br />
            <?php echo $this->Form->text('Administrador.login', array('class' => 'text')); ?>
        </p>
        <p>
            <label>Senha:</label> <br />
            <?php echo $this->Form->password('Administrador.senha', array('class' => 'text')); ?>
        </p>
        <p>
            <input type="submit" class="submit" value="Login" /> &nbsp;
        </p>
        <?php echo $form->end(); ?>
    </div>

    <div class="bendl"></div>
    <div class="bendr"></div>
</div>
