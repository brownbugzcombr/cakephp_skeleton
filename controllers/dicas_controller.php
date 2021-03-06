<?php

App::import('Controller', 'Posts');

class DicasController extends PostsController {

    var $uses = array('Post', 'Categoria', 'Comentario');

    function index() {
        if (isset($this->params['named']['categoria'])) {
            $cat = explode(',', $this->params['named']['categoria']);
            $this->paginate['Post']['conditions']['categoria_id'] = $cat;
        }

        if (isset($this->params['named']['conteudo'])) {
            $cat = explode(',', $this->params['named']['conteudo']);
            $this->paginate['Post']['conditions']['conteudo'] = $cat;
        }

        $this->Post->recursive = 1;
        $this->paginate['Post']['order'] = 'Post.created DESC';
        $this->paginate['Post']['conditions']['tipo'] = '4'; //1 noticia, 2 blog, 3 livro
        $this->paginate['Post']['limit'] = 25;
        $dados = $this->paginate('Post');
        $this->set('dados', $dados);

        $categorias = $this->Post->find('list', array('fields' => array('id', 'categoria_id'), 'conditions' => array('tipo' => '4')));
        $this->set('categorias', $this->Categoria->find('list', array('fields' => array('id', 'titulo'), 'conditions' => array('id' => $categorias))));
    }

    /**
     * View the Dica
     * @param mixed $iditem - Either a slug or an ID
     */
    function view($iditem = null) {
        if ($iditem != null) {
            $this->Post->recursive = -1;
            
            if (is_numeric($iditem)) {
                $noticia = $this->Post->find('first', array('conditions' => array('Post.id' => $iditem)));
            } else {
                $noticia = $this->Post->find('first', array('conditions' => array('Post.slug' => $iditem)));
            }
            if ($noticia['Post']['publica'] == 0 && !isset($this->LoginUsuario)) {
                $this->Session->write('loginredirect', array('controller' => $this->params['controller'], 'action' => $this->params['action'], 'param' => $this->params['pass'][0]));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'precadastro'));
            }
            $this->set('dado', $noticia);
            $this->set('comentarios', $this->Comentario->find('all', array('conditions' => array('Comentario.post_id' => $iditem), 'fields' => array('Comentario.id', 'Comentario.texto', 'Comentario.created', 'Usuario.id', 'Usuario.nome', 'Usuario.logo'))));
        } else {
            $this->redirect(array('action' => 'index'));
        }

        $this->pageTitle = $noticia['Post']['title'];
        $this->keyword = $noticia['Post']['keywords'];
        $this->meta = $noticia['Post']['meta'];
    }

    function admin_index() {
        $this->paginate['Post']['conditions'] = array('tipo' => '4'); //1 noticia, 2 blog
        parent::admin_index();
    }

    function admin_add($post_id = null) {
        if (isset($this->data)) {
            $this->data['Post']['tipo'] = '4';
        }
        parent::admin_add($post_id);
    }

}

?>
