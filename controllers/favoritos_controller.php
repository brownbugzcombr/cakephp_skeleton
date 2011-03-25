<?php

class FavoritosController extends AppController {

    var $uses = array('Favorito', 'Post', 'Categoria');

    function index() {
        $favoritos = $this->Favorito->find('list',
                        array(
                            'conditions' => array(
                                'usuario_id' => $this->LoginUsuario['id'],
                                'gostar' => 1,
                            ),
                            'fields' => array('id', 'post_id'),
                ));

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
        $this->paginate['Post']['conditions']['Post.id'] = $favoritos;

        $this->paginate['Post']['limit'] = 25;
        $dados = $this->paginate('Post');
        $this->set('dados', $dados);
        $categorias = $this->Post->find('list', array('fields' => array('id', 'categoria_id'), 'conditions' => array('Post.id' => $favoritos)));
        $this->set('categorias', $this->Categoria->find('list', array('fields' => array('id', 'titulo'), 'conditions' => array('id' => $categorias))));
        $this->_loadEnquete();
    }

}

?>
