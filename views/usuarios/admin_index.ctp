<?php 
	$controllerName = strtolower($this->name ); 
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
    <ul>
        <li></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0">

        <tbody>
            <tr>
                <!--td width="10"><input type="checkbox" class="check_all"></td-->
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th><?php echo $paginator->sort('Nome Fantasia', 'nome') ?></th>
                <th><?php echo $paginator->sort('Telefone', 'telefone') ?></th>
                <th><?php echo $paginator->sort('Razão social', 'razaosocial') ?></th>
                <th><?php echo $paginator->sort('Cadastro em', 'created') ?></th>
                <th><?php echo $paginator->sort('Última atualização', 'created') ?></th>
                <td>&nbsp;</td>
            </tr>
            <?php 
            if(isset($dados) && is_array($dados) && count($dados) > 0){
            foreach ($dados as $d) {

            ?>
                <tr>
                    <!--td><input type="checkbox"></td-->
                    <td><?php echo $d['Usuario']['id']; ?></td>
                     <td><?php echo $this->Html->link($d['Usuario']['nome'], array('action'=>'view', $d['Usuario']['id'])); ?></td>
                    <td><?php echo $d['Usuario']['telefone']; ?></td>
                    <td><?php echo $d['Usuario']['razaosocial']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($d['Usuario']['created'])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($d['Usuario']['updated'])); ?></td>
                    <td class="delete">
					<?php echo $this->Html->link('Deletar',array('action' => 'del', $d['Usuario']['id']),array(),"Tem certeza que deseja deletar este registro?");?>
                    </td>
                </tr>
            <?php }} //foreach clientes  ?>
        </tbody>
    </table>
    <?php echo $this->Element('pagination'); ?>
</div>
