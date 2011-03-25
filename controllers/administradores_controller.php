<?php

class AdministradoresController extends AppController {

    var $uses = array('Administrador');

    function admin_index() {
        $this->Administrador->recursive = 0;
        $this->set('dados', $this->paginate('Administrador'));
    }

    function admin_add($iduser = null) {
        if (isset($this->data)) {
            $this->data['Administrador']['senha'] = md5($this->data['Administrador']['senha']);
            if ($this->Administrador->save($this->data)) {
                $this->Session->setFlash('Administrador Salvo com sucesso!', 'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Problema ao salvar os dados!', 'ero');
            }
        } else {
            if ($iduser != null) {
                $this->data = $this->Administrador->read(null, $iduser);
            }
        }
    }

    function admin_login($iduser = null) {
        $this->layout = 'admin_login';
        if (isset($this->data)) {
            $this->data['Administrador']['senha'] = md5($this->data['Administrador']['senha']);
            $exists = $this->Administrador->find('first', array(
                        'conditions' => $this->data['Administrador'],
                        'recursive' => -1
                    ));
            if (isset($exists) && is_array($exists) && count($exists) > 0) {
                $this->Session->write('Administrador', $exists['Administrador']);
                $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Usuario ou senha inválidos', 'erro');
                $this->data['Administrador']['senha'] = '';
            }
        }
    }

    function admin_logout() {
        $this->Session->delete('Administrador');
        $this->redirect(array('action' => 'login'));
    }

}

?>
