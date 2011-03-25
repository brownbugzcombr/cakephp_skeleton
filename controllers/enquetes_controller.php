<?php

class EnquetesController extends AppController {

    var $name = 'Enquetes';
    var $uses = array('Enquete', 'EnqueteResposta', 'EnqueteRespostaUsuario');

    function votar($respost_id = null, $voto = 1) {
        $this->layout = 'ajax';

        if (isset($respost_id) && $respost_id != null) {
            $this->data['EnqueteRespostaUsuario']['enquete_resposta_id'] = $respost_id;
        }
        if (isset($this->data)) {
            $this->data['EnqueteRespostaUsuario']['usuario_id'] = $this->LoginUsuario['id'];
            if ($voto > 0) {
                $this->EnqueteRespostaUsuario->save($this->data);
            }
            $enquete = $this->EnqueteResposta->find('first', array('fields' => array('EnqueteResposta.enquete_id'), 'conditions' => array('EnqueteResposta.id' => $this->data['EnqueteRespostaUsuario']['enquete_resposta_id'])));

            $enquete = $this->EnqueteResposta->find('list', array(
                        'conditions' => array(
                            'EnqueteResposta.enquete_id' => $enquete['EnqueteResposta']['enquete_id']
                        ),
                        'fields' => array('id', 'resposta')
                    ));

            $respostas = $this->EnqueteRespostaUsuario->find('list', array(
                        'conditions' => array(
                            'enquete_resposta_id' => array_keys($enquete)
                        ),
                        'group' => array('enquete_resposta_id'),
                        'fields' => array('enquete_resposta_id', 'contagem')
                    ));
            
            $total = array_sum($respostas);
            $percent = array();

            foreach($enquete as $id => $pergunta){
                $percent[urlencode($pergunta)] = ($respostas[$id]/ $total)*100;
            }

            $ret['item'] = $percent;
            echo json_encode($ret);
            die;
        }
    }

    function admin_index() {
        $this->layout = 'admin';
        $this->Enquete->recursive = 0;
        $this->set('dados', $this->paginate());
    }

    function admin_add($id = null) {
        $this->layout = 'admin';

        if (!empty($this->data)) {
            if ($this->Enquete->saveAll($this->data)) {
                $this->Session->setFlash('Enquete salva com sucesso', 'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Problema ao salvar enquete', 'erro');
            }
        } else {
            if ($id != null) {
                $this->data = $this->Enquete->read(null, $id);
            }
        }
    }

    function admin_del($id = null) {
        $this->autoRender = false;
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for enquete', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Enquete->delete($id, true)) {
            $this->Session->setFlash('Enquete deletada', 'sucesso');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Não foi possível deletar a enquete, favor tente novamente', 'erro');
            $this->redirect(array('action' => 'index'));
        }
    }

}

?>