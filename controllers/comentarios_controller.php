<?php

class ComentariosController extends AppController {

    function comentar() {
        if (isset($this->data)) {
            $this->data['Comentario']['usuario_id'] = $this->LoginUsuario['id'];
            $this->Comentario->save($this->data);
            $this->redirect(array('controller' => $this->data['Outros']['controller'], 'action' => 'view', $this->data['Comentario']['post_id']));
        } else {
            $this->redirect('/');
        }
    }

    function admin_index() {
        $this->Comentario->recursive = 0;
        $this->paginate['Comentario']['order'] = 'Comentario.created DESC';
        $this->set('dados', $this->paginate('Comentario'));
    }

    function admin_del($id_comm) {
        if (isset($id_comm)) {
            if ($this->Comentario->delete($id_comm)) {
                $this->Session->setFlash('Registro deletado com sucesso', 'default', array('class' => 'message success'));
                
            } else {
                $this->Session->setFlash('Erro ao deletar os dados', array('class' => 'message error'));
            }
        }
        $this->redirect(array('action' => 'index'));
    }

}

?>
