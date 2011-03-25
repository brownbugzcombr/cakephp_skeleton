<?php

class OportunidadesController extends AppController {

    var $uses = array('Mensagem', 'Usuario', 'Oportunidade');

    function beforeRender() {
        $this->set('totaloportunidades', $this->Oportunidade->find('count'));
        $this->set('totalminhasopor', $this->Oportunidade->find('count', array('conditions' => array('usuario_id' => $this->LoginUsuario['id']))));
        $this->set('totalusuarios', $this->Usuario->find('count', array()));

        parent::beforeRender();
    }

    function index() {
        if (isset($this->params['named']['titulo'])) {
            $this->paginate['Oportunidade']['conditions']['or']['titulo like'] = $this->params['named']['titulo'] . "%";
            $this->paginate['Oportunidade']['conditions']['or']['titulo like'] = strtoupper($this->params['named']['titulo']) . "%";
        }

        if (isset($this->params['named']['usuario_id'])) {
            $this->paginate['Oportunidade']['conditions']['usuario_id'] = $this->params['named']['usuario_id'];
        }

        $this->Oportunidade->recursive = 1;
        $this->paginate['Oportunidade']['order'] = 'Oportunidade.created DESC';
        $this->paginate['Oportunidade']['limit'] = 20;
        $this->set('dados', $this->paginate('Oportunidade'));

        // carregar enquete
        $this->_loadEnquete();
    }

    function add() {
        if (isset($this->data)) {
            $this->data['Oportunidade']['usuario_id'] = $this->LoginUsuario['id'];

            if ($this->Oportunidade->save($this->data['Oportunidade'])) {
                $this->Session->setFlash('Oportunidade cadastrada com sucesso!', 'modal');
                $this->redirect('/oportunidades/');
            } else {
                $this->Session->setFlash('Falha ao salvar os dados, tente novamente por favor', 'modal');
            }
        }
        $this->_loadEnquete();
    }

    function del($id_oportunidade = null) {
        if (isset($id_oportunidade)) {
            $exist = $this->Oportunidade->find('count', array(
                        'conditions' => array(
                            'id' => $id_oportunidade,
                            'usuario_id' => $this->LoginUsuario['id']
                        ),
                        'recursive' => -1
                    ));

            if ($exist > 0) {
                if ($this->Oportunidade->delete($id_oportunidade)) {
                    $this->Session->setFlash('Oportunidade deletada com sucesso!', 'modal');
                    
                } else {
                    $this->Session->setFlash('Falha ao deletar os dados, tente novamente por favor', 'modal');
                }
            } else {
                $this->Session->setFlash('Essa oportunidade não é sua!', 'modal');
            }
        }
        $this->redirect('/oportunidades/');
    }

    function usuarios() {
        if (isset($this->params['named']['titulo'])) {
            $this->paginate['Usuario']['conditions']['or']['nome like'] = $this->params['named']['titulo'] . "%";
            $this->paginate['Usuario']['conditions']['or']['nome like'] = strtoupper($this->params['named']['titulo']) . "%";
        }
        $this->Usuario->recursive = 1;
        $this->paginate['Usuario']['limit'] = 25;
        $this->set('dados', $this->paginate('Usuario'));

        // carregar enquete
        $this->_loadEnquete();
    }

    function admin_index() {
        $this->Oportunidade->recursive = 0;
        $this->paginate['Oportunidade']['order'] = 'Oportunidade.created DESC';
        $this->set('dados', $this->paginate('Oportunidade'));
    }

    function admin_del($id_comm) {
        if (isset($id_comm)) {
            if ($this->Oportunidade->delete($id_comm)) {
                $this->Session->setFlash('Registro deletado com sucesso', 'default', array('class' => 'message success'));
            } else {
                $this->Session->setFlash('Erro ao deletar os dados', array('class' => 'message error'));
            }
        }
        $this->redirect(array('action' => 'index'));
    }

}

?>
