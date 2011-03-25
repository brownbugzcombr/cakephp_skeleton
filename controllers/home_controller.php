<?php
App::import('Controller','HomeAdmin');

class HomeController extends HomeAdminController {

    var $uses = array('Post', 'Tvantagem', 'Categoria', 'Oportunidade', 'Favorito');
    var $helpers = array('Cropimage');
    var $components = array('JqImgcrop');

    /**
     * Index - Main page of site - checks to see if we are logged - if we are, redirects to logado
     */
    function ___index() {

        $this->keyword = 'sua empresa nosso negócio,Telefônica Negócios,Telefônica,clientes Telefônica Negócios,oportunidades ,oportunidades de negócios,negócios,benefícios empresas';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: aqui, você tem mais vantagens.';
        $this->meta = 'A Telefônica Negócios criou um portal interativo com benefícios, notícias e muito mais. Tudo para você levar as melhores oportunidades de negócios para a sua empresa.';

        if (is_array($this->LoginUsuario) && count($this->LoginUsuario) > 0) {
            $this->redirect(array('action' => 'logado'));
        }

        $this->set('not', $this->Post->find('all',
                        array('conditions' => array(
                                'tipo' => 1
                            ),
                            'limit' => 2,
                            'recursive' => -1,
                            'fields' => array('id', 'titulo', 'resumo', 'img_destaque'),
                            'order' => 'Post.created DESC'
                        )
        ));

        $this->set('blog', $this->Post->find('first',
                        array('conditions' => array(
                                'tipo' => 2,
                                'home' => 1
                            ),
                            'limit' => 2,
                            'recursive' => -1,
                            'fields' => array('id', 'titulo', 'resumo', 'img_destaque'),
                            'order' => 'Post.created DESC'
                        )
        ));

        $this->set('tvant', $this->Tvantagem->find('all',
                        array(
                            'limit' => 14,
                            'recursive' => -1,
                            'fields' => array('id', 'nome', 'logotipo', 'url'),
                            'order' => 'rand()'
                        )
        ));
    }

    function rss() {
        $categorias = $this->Post->find('list', array('fields' => array('id', 'categoria_id')));
        $this->set('dados', $this->Categoria->find('list', array('fields' => array('id', 'titulo'), 'conditions' => array('id' => $categorias))));
    }

    function logado() {

        $this->_loadEnquete();

        $this->set('noticia', $this->Post->find('all', array(
                    'limit' => 5,
                    'conditions' => array(
                        'tipo' => 1,
                        'home' => 1
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));


        $this->set('blog', $this->Post->find('all', array(
                    'limit' => 2,
                    'conditions' => array(
                        'tipo' => 2
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));

        $this->set('ponto', $this->Oportunidade->find('all', array(
                    'limit' => 3,
                    'conditions' => array(),
                    'recursive' => 1,
                    'order' => 'Oportunidade.created DESC'
                )));

        $this->set('tvantagem', $this->Tvantagem->find('all', array(
                    'limit' => 3,
                    'conditions' => array(),
                    'recursive' => 1,
                    'order' => 'rand()'
                )));

        $this->set('dica', $this->Post->find('all', array(
                    'limit' => 6,
                    'conditions' => array(
                        'tipo' => 4,
                        'home' => 1
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));


        $this->set('favorito', $this->Favorito->find('all', array(
                    'limit' => 4,
                    'conditions' => array(
                        'Favorito.usuario_id' => $this->LoginUsuario['id'],
                        'gostar' => 1
                    ),
                    'recursive' => 1,
                    'order' => 'Favorito.created DESC',
                    'group' => array('Favorito.post_id')
                )));
    }

    function termos() {
        $this->keyword = 'sua empresa nosso negócio,Telefônica Negócios,Telefônica,termos de uso do site,termos de uso do site sua empresa nosso negócio,sua empresa nosso negócio termos de uso';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: Termos de Uso do site ';
        $this->meta = 'Pelo presente termo, as empresas A.TELECOM S.A., com sede na Rua do Rocio, 291 – 2º. andar, São Paulo - S inscrita no CNPJ/MF sob o nº 03.498.897/0001-13 IE sob nº 117.216.670.110, São Paulo - Capital, doravante denominada ATELECOM e TELECOMUNICAÇÕES DE SÃO PAULO S/A., com sede na Rua Martiniano de Carvalho, nº 851, São Paulo/SP, inscrita no CNPJ/MF sob o nº 02.558.157/0001-62, doravante denominada TELESP (em conjunto denominadas EMPRESAS) informam aos usuários do portal da Internet “Sua Empresa Nosso Negócio” de sua propriedade (doravante denominados de USUÁRIOS e PORTAL, respectivamente) sobre sua política de proteção de dados pessoais fornecidos pelos USUÁRIOS, para que estes possam fazer uso de seu PORTAL. Nesse sentido, o USUARIO está ciente e concorda que:';
    }

    function sobreoportal() {
        $this->scripts_layout = array('sobrePortal');

        $this->keyword = 'sua empresa nosso negócio,Telefônica Negócios,Telefônica,clientes Telefônica Negócios,oportunidades ,negócios,benefícios ,divulgação';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: conheça os benefícios do portal.';
        $this->meta = 'A Telefônica Negócios criou para seus clientes o portal SUA EMPRESA, NOSSO NEGÓCIO, que traz notícias do mercado PME, descontos, oportunidades e muito mais.';
    }

    function negocios() {
        $this->keyword = 'Telefônica Negócios,clientes Telefônica Negócios,negócios,consultoria,soluções ,informática,empresas,mercado';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: soluções e consultoria para empresas.';
        $this->meta = 'A Telefônica Negócios oferece consultoria em soluções de voz, dados, internet e informática para atender às necessidades de diferentes empresas do mercado.';
    }

    function err404() {
        $this->layout = 'ajax';
    }

    function login() {
    }

    function admin_index(){

        $this->set('noticia', $this->Post->find('all', array(
                    'limit' => 5,
                    'conditions' => array(
                        'tipo' => 1,
                        'home' => 1
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));


        $this->set('blog', $this->Post->find('all', array(
                    'limit' => 2,
                    'conditions' => array(
                        'tipo' => 2
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));

        $this->set('dica', $this->Post->find('all', array(
                    'limit' => 6,
                    'conditions' => array(
                        'tipo' => 4,
                        'home' => 1
                    ),
                    'recursive' => -1,
                    'order' => 'Post.created DESC'
                )));


        $this->set('favorito', $this->Favorito->find('all', array(
                    'limit' => 4,
                    'conditions' => array(
                        'Favorito.usuario_id' => $this->LoginUsuario['id'],
                        'gostar' => 1
                    ),
                    'recursive' => 1,
                    'order' => 'Favorito.created DESC',
                    'group' => array('Favorito.post_id')
                )));

    }
}

?>
