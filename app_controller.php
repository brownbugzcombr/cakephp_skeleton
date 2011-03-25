<?php
Class AppController extends Controller {

    var $uses = array('Enquete', 'Mensagem', 'EnqueteRespostaUsuario');
    var $LoginUsuario = null;
    var $scripts_layout = array();
    var $components = array('PluginHandler', 'Email', 'Session');
    var $helpers = array('Minify','Html', 'Javascript', 'Time', 'Session', 'Paginator', 'Video', 'Texto');
    var $allows = array(
        'home' => array('index', 'termos', 'sobreoportal', 'negocios', 'login', 'err404'),
        'contatos' => array('index'),
        'usuarios' => array('cadastro', 'login', 'esqueci', 'resetar', 'precadastro', 'getJsonRamoAtividade', 'getJsonRamoTipo', 'getJsonRamoDetalhe', 'newvalidate'),
        'noticias' => array('view'),
        'api_generator' => array('*'),
        //'imagebank' => array('index'),
        //'imagebank' => array('ib_home','index','createimage_step2','createimage_step3'),
        //'ib_home' => array('index','createimage_step2','createimage_step3','upload'),
        //'imagebank/ib_home' => array('index','createimage_step2','createimage_step3','upload'),
        'blog' => array('view')
    );
    
    var $keyword = '';
    var $meta = '';
    var $pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO';

    function beforeRender() {

        $this->set('scripts_layout', $this->scripts_layout);
        $this->set('title_for_layout', $this->pageTitle);
        $this->set('keywords_for_layout', $this->keyword);
        $this->set('meta_for_layout', $this->meta);

        parent::beforeFilter();
    }

    function beforeFilter() {

        Configure::load('skeleton');

        $this->set('bodyclass', 'login-off');
        if (isset($this->params['admin'])) {
            $this->layout = 'admin';
        }
        if ($this->Session->check('LoginUsuario') && !isset($this->params['admin'])) {
            $this->LoginUsuario = $this->Session->read('LoginUsuario');
            $this->set('LoginUsuario', $this->LoginUsuario);
            $this->set('bodyclass', 'login-on');
            $this->set('msgnlida', $this->Mensagem->find('count', array('conditions' => array('para' => $this->LoginUsuario['id'], 'lido' => 0))));
        } else {

            if (!isset($this->params['admin'])) {
                if (!isset($this->allows[$this->params['controller']]) || !in_array($this->params['action'], $this->allows[$this->params['controller']])) {
                    if (!isset($this->params['pass'][0]))
                        $this->params['pass'][0] = null;

                    $this->Session->write('loginredirect', array('controller' => $this->params['controller'], 'action' => $this->params['action'], 'param' => $this->params['pass'][0]));
                    $this->redirect(array('controller' => 'usuarios', 'action' => 'precadastro'));
                }else {

                }
            } else {

                if (!$this->Session->check('Administrador')) {

                    $this->Session->setFlash('Você não esta autorizado a acessar esta area. Faça o login para ter acesso', 'warning');
                    if ($this->params['controller'] != 'administradores' && $this->params['action'] != 'login') {
                        $this->redirect(array('controller' => 'administradores', 'action' => 'login'));
                    }
                } else {
                    $this->set('Administrador', $this->Session->read('Administrador'));
                }
            }
            $this->set('bodyclass', 'login-off');
        }

        parent::beforeFilter();
    }

    function _loadEnquete() {
        $enquete_load = $this->Enquete->find('first', array(
                    'conditions' => array(
                        'ativo' => 1
                    ),
                    'order' => 'rand()',
                        )
        );
        $this->set('enquete', $enquete_load);

        if (isset($this->LoginUsuario)) {
            $resp_ids = array();
            $iiforeachen = 0;
            foreach ($enquete_load['EnqueteResposta'] as $en) {
                $resp_ids[$iiforeachen] = $en['id'];
                $iiforeachen++;
            }
            Configure::write('debug', 2);
            $user_exists = $this->EnqueteRespostaUsuario->find('count', array(
                        'conditions' => array(
                            'usuario_id' => $this->LoginUsuario['id'],
                            'enquete_resposta_id' => $resp_ids,
                            )));

            Configure::write('debug', 0);
            if ($user_exists == 0) {
                $this->set('userjavotou', 0);
            } else {
                $this->set('userjavotou', 1);
            }
        }
    }

    function _sendmail($info, $params) {
        $this->Email->to = $info['to']; //$info['to'];
        $this->Email->subject = $info['subject'];
        if(isset($info['bcc']) && !empty ($info['bcc'])){
            $this->Email->bcc = $info['bcc'];
        }
        $this->Email->from = 'Telefônica Negócios <faleconosco@suaempresanossonegocio.com.br>';
        $this->Email->template = $info['template'];
        $this->Email->layout = $info['layout'];
        $this->Email->sendAs = 'html';
        $this->set('params', $params);
        $this->Email->smtpOptions = array(
            'host' => 'smtphosting.suaempresanossonegocio.com.br'
        );
        $this->Email->delivery = 'smtp';

        if ($this->Email->send()) {
            return true;
        } else {
            $this->Session->setFlash($this->Email->smtpError, 'modal');
            return false;
        }
    }

}
