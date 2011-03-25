<?php

class PerguntasController extends AppController {

    function admin_add($pesquisa_id = null, $id = null) {
        if (!empty($this->data)) {
            if ($this->Pergunta->saveAll($this->data)) {
                $this->Session->setFlash('Enquete salva com sucesso', 'sucesso');
                $this->redirect(array('action' => 'index', $this->data['Pergunta']['pesquisa_id']));
            } else {
                $this->Session->setFlash('Problema ao salvar enquete', 'erro');
            }
        } else {
            if ($id != null) {
                $this->data = $this->Pergunta->read(null, $id);
            }
            $this->data['Pergunta']['pesquisa_id'] = $pesquisa_id;
        }
    }

    function admin_index($pesquisa_id) {
        $this->Pergunta->recursive = 0;
        $this->paginate['Pergunta']['order'] = 'Pergunta.created DESC';
        $this->paginate['Pergunta']['conditions']['pesquisa_id'] = $pesquisa_id;
        $this->set('dados', $this->paginate('Pergunta'));
    }

    function admin_ordem() {
        if (isset($this->data)) {
            foreach ($this->data['Pergunta']['ordem'] as $ordem => $id) {
                if ($id != 'undefined') {
                    $dados['id'] = $id;
                    $dados['ordem'] = $ordem;
                    $this->Pergunta->save($dados);
                }
            }
            echo 1;
        }
        die;
    }

}

?>
