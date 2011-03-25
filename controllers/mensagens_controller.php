<?php

class MensagensController extends AppController {

    var $uses = array('Mensagem', 'Usuario');

    function index() {
        $this->Mensagem->Behaviors->attach('Containable');
        $this->Mensagem->recursive = -1;
        $this->paginate['Mensagem']['order'] = 'Mensagem.created DESC';
        $this->paginate['Mensagem']['recursive'] = 2;
        $this->paginate['Mensagem']['conditions']['para'] = $this->LoginUsuario['id'];
        $this->paginate['Mensagem']['conditions']['para_esconder'] = 0;
        $this->paginate['Mensagem']['limit'] = 25;
        $this->paginate['Mensagem']['contain'] = array('UsuarioRecebida');

        $this->set('dados', $this->paginate('Mensagem'));
        $this->set('enviadas', $this->Mensagem->find('count', array(
                    'conditions' => array(
                        'de' => $this->LoginUsuario['id'],
                        'de_esconder' => 0
                    )
                )));


        $mensagens = $this->Mensagem->find('list', array(
                    'conditions' => array(
                        'para' => $this->LoginUsuario['id'],
                        'lido' => 0
                    )
                ));
        $msgs['lido'] = 1;
        foreach ($mensagens as $id) {
            $msgs['id'] = $id;
            $this->Mensagem->save($msgs);
        }


        $this->_loadEnquete();
    }

    function enviadas() {
        $this->Mensagem->Behaviors->attach('Containable');
        $this->Mensagem->recursive = -1;
        $this->paginate['Mensagem']['order'] = 'Mensagem.created DESC';
        $this->paginate['Mensagem']['recursive'] = 2;
        $this->paginate['Mensagem']['conditions']['de'] = $this->LoginUsuario['id'];
        $this->paginate['Mensagem']['conditions']['de_esconder'] = 0;
        $this->paginate['Mensagem']['limit'] = 25;
        $this->paginate['Mensagem']['contain'] = array('UsuarioEnviada');
        $this->set('dados', $this->paginate('Mensagem'));
        $this->set('enviadas', $this->Mensagem->find('count', array(
                    'conditions' => array(
                        'de' => $this->LoginUsuario['id'],
                        'para_esconder' => 0
                    )
                )));
        $this->_loadEnquete();
    }

    function enviar() {
        $this->data['Mensagem']['de'] = $this->LoginUsuario['id'];
        if ($this->Mensagem->save($this->data['Mensagem'])) {
            $this->Session->setFlash('Mensagem enviada com sucesso!', 'modal');
        } else {
            $this->Session->setFlash('Falha ao enviar mensagem, tente novamente', 'modal');
        }
        $this->redirect('/' . $this->data['Outros']['_url']);
    }

    function enviarmodal($para) {
        $this->layout = 'ajax';
        $this->set('para', $para);
        if (isset($this->data)) {
            $this->data['Mensagem']['de'] = $this->LoginUsuario['id'];
            if ($this->Mensagem->save($this->data['Mensagem'])) {
                $this->Session->setFlash('Mensagem enviada com sucesso!', 'modal');
            } else {
                $this->Session->setFlash('Falha ao enviar mensagem, tente novamente', 'modal');
            }
            $this->redirect('/' . $this->data['Outros']['_url']);
        }
    }

    function delde($idmsg) {
        $exists = $this->Mensagem->find('first', array(
                    'conditions' => array(
                        'Mensagem.de' => $this->LoginUsuario['id'],
                        'Mensagem.id' => $idmsg
                    )
                ));
        if (isset($exists) && is_array($exists) && count($exists) > 0) {
            $data['id'] = $idmsg;
            $data['de_esconder'] = 1;
            if ($this->Mensagem->save($data)) {
                $this->Session->setFlash('Mensagem deletada com sucesso', 'modal');
                $this->redirect(array('action' => 'enviadas/'));
            }
        }
    }

    function delpara($idmsg) {
        $exists = $this->Mensagem->find('first', array(
                    'conditions' => array(
                        'Mensagem.para' => $this->LoginUsuario['id'],
                        'Mensagem.id' => $idmsg
                    )
                ));
        if (isset($exists) && is_array($exists) && count($exists) > 0) {
            $data['id'] = $idmsg;
            $data['para_esconder'] = 1;
            if ($this->Mensagem->save($data)) {
                $this->Session->setFlash('Mensagem deletada com sucesso', 'modal');
                $this->redirect(array('action' => 'index/'));
            }
        }
    }

}

?>
