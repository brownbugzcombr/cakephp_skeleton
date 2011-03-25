<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2>Pesquisa Cultural</h2>
    <ul>
        <li><?php echo $this->Html->link('ADICIONAR', "/admin/pesquisas/add/"); ?></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th><?php echo $paginator->sort('Texto', 'pergunta_cultural') ?></th>
                <th><?php echo $paginator->sort('Data', 'created') ?></th>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            if (isset($dados) && is_array($dados) && count($dados) > 0) {
                foreach ($dados as $d) {
            ?>
                    <tr>
                        <td><?php echo $d['Pesquisa']['id']; ?></td>
                        <td>
                    <?php echo $d['Pesquisa']['pergunta_cultural']; ?>
                </td>
                <td><?php echo date('d/m/Y', strtotime($d['Pesquisa']['created'])); ?></td>
                <td class="delete">
                    <?php echo $this->Html->link('Gerenciar Perguntas', array('controller' => 'perguntas', 'action' => 'index', $d['Pesquisa']['id']), array()); ?>
                </td>
                <td class="delete">
                    <?php echo $this->Html->link('Deletar', array('action' => 'del', $d['Pesquisa']['id']), array(), "Tem certeza que deseja deletar este registro?"); ?>
                </td>
            </tr>
            <?php }
            } //foreach   ?>
        </tbody>
    </table>
    <?php echo $this->Element('pagination'); ?>
</div>
