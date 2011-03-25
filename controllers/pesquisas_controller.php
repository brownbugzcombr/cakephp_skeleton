<?php
class PesquisasController extends AppController {

    function admin_add() {
        if (isset($this->data)) {
            if ($this->Pesquisa->save($this->data)) {
                $this->Session->setFlash('Salvo com sucesso!', 'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao Salvar os dados', 'erro');
            }
        }
    }

    function admin_index() {
        $this->Pesquisa->recursive = 0;
        $this->paginate['Pesquisa']['order'] = 'Pesquisa.created DESC';
        $this->set('dados', $this->paginate('Pesquisa'));
    }

}
?>