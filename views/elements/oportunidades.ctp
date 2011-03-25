<div id="sidebar" class="side50">
    <div class="categorias">
        <!--NOSSOS-PARCEIROS-->
        <ul class="filtros-negocios">
            <li class="filtros-title">Filtros:</li>
            <li>
                <a href="/oportunidades/index/" title="">
                    <?php
                    if (!isset($this->params['named']['usuario_id']) && $this->params['action'] == 'index' && $this->params['controller'] == 'oportunidades') {
                    ?>
                        <b>Oportunidades</b>
                    <?php } else {
                    ?>
                        Oportunidades
                    <?php } ?>

                </a>
            </li>
            <li>
                <a href="/oportunidades/add/" title="">
                    <?php
                    if ($this->params['action'] == 'add') {
                    ?>
                        <b>Adicionar Oportunidade</b>
                    <?php } else {
                    ?>
                        Adicionar Oportunidade
                    <?php } ?>

                </a>
            </li>
            <li>
                <a href="/oportunidades/index/usuario_id:<?php echo $LoginUsuario['id']; ?>" title="">
                    <?php
                    if (isset($this->params['named']['usuario_id'])) {
                    ?>
                        <b>Minha Publicações</b>
                    <?php } else {
                    ?>
                        Minhas Publicações
                    <?php } ?>
                </a>
            </li>
            <li>
                <a href="/oportunidades/usuarios/" title="">
                    <?php
                    if ($this->params['action'] == 'usuarios') {
                    ?>
                        <b>Empresas Cadastradas</b>
                    <?php } else {
                    ?>
                        Empresas Cadastradas
                    <?php } ?>
                </a>
            </li>
        </ul>
    </div>
<<<<<<< HEAD
=======

    <a href="/oportunidades/add/">ADICIONAR OPORTUNIDADE</a>

>>>>>>> 619159684b78fd86b7409c632a7a927fa3f531f7
        <div class="categorias">
        <!--NOSSOS-PARCEIROS-->
        <ul class="filtros-negocios">
            <li class="filtros-title">Minhas Mensagens:</li>
            <li>
                <a href="/mensagens/index/" title="">
                    <?php
                    if ($this->params['controller'] == 'mensagens' && $this->params['action'] == 'index') {
                    ?>
                        <b>Mensagens Recebidas</b>
                    <?php } else {
                    ?>
                        Mensagens Recebidas
                    <?php } ?>

                </a>
            </li>
            <li>
                <a href="/mensagens/enviadas/" title="">
                    <?php
                    if ($this->params['action'] == 'enviadas') {
                    ?>
                        <b>Mensagens Enviadas</b>
                    <?php } else {
                    ?>
                        Mensagens Enviadas
                    <?php } ?>
                </a>
            </li>
        </ul>
    </div>
    
</div>