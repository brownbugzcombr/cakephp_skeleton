<?php

App::import('Controller', 'Noticias');

class LivrosController extends PostsController {

    var $uses = array('Post', 'Categoria', 'Comentario', 'Tvantagem');

    function index() {
    	if (isset($this->params['named']['titulo'])) {
            $this->paginate['Post']['conditions']['or']['Post.titulo like'] = $this->params['named']['titulo'] . "%";
            $this->paginate['Post']['conditions']['or']['Post.titulo like'] = strtoupper($this->params['named']['titulo']) . "%";
        }
        if (isset($this->params['named']['categoria'])) {
            $cat = explode(',', $this->params['named']['categoria']);
            $this->paginate['Post']['conditions']['categoria_id'] = $cat;
        }

        if (isset($this->params['named']['conteudo'])) {
            $this->paginate['Post']['conditions']['conteudo'] = $this->params['named']['conteudo'];
        }

        $this->Post->recursive = 1;
        $this->paginate['Post']['order'] = 'Post.created DESC';
        $this->paginate['Post']['conditions']['tipo'] = 3; //1 noticia, 2 blog, 3 livro, 4 dicas
        $this->paginate['Post']['limit'] = 25;
        $this->set('dados', $this->paginate('Post'));
        $this->set('categorias', $this->Categoria->find('list', array('fields' => array('id', 'titulo'))));
        $this->set('parc', $this->Tvantagem->find('list', array('fields' => array('url', 'logotipo'), 'limit' => 3)));

    }

    function view($iditem = null) {
        if ($iditem != null) {
            $this->Post->recursive = -1;
            $this->set('dado', $this->Post->find('first', array('conditions' => array('Post.id' => $iditem))));
            $this->set('comentarios', $this->Comentario->find('all', array('conditions' => array('Comentario.post_id' => $iditem), 'fields' => array('Comentario.id', 'Comentario.texto', 'Comentario.created', 'Usuario.id', 'Usuario.nome'))));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_index(){
        $this->paginate['Post']['conditions'] = array('tipo' => '3');
        parent::admin_index();
    }

    function admin_add($post_id = null) {
        if (isset($this->data)) {
            $this->data['Post']['tipo'] = '3';
        }
        parent::admin_add($post_id);
    }

}

?>