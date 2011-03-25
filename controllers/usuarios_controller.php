<?php

class UsuariosController extends AppController {

    var $components = array('RequestHandler');
    var $uses = array('Usuario', 'Importado', 'Perdido', 'Precadastro', 'UsuarioPrivacidade', 'RamoAtividade', 'RamoTipo', 'RamoDetalhe', 'Escolha', 'UsuarioEscolha');
    var $helpers = array('Html', 'Form', 'Privacidade', 'Interesse');

    function precadastro($acao = null) {
        $this->scripts_layout = array('validaPrecadastro');
        $this->keyword = 'sua empresa nosso negócio, Telefônica Negócios, Telefônica, clientes Telefônica Negócios, oportunidades, oportunidades de negócios, negócios, benefícios empresas';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: Cadastre-se já! ';
        $this->meta = 'Cadastre-se no portal SUA EMPRESA, NOSSO NEGÓCIO. Aqui, clientes Telefônica Negócios têm descontos, notícias do mercado de PMES, oportunidades de negócios e muito mais.';

        if (isset($this->data)) {
            if (isset($acao) && $acao = 'add') {

                $dados_sessao['telefone'] = $this->Session->read('precadastrono.ddd') . $this->Session->read('precadastrono.nu_telefone');
                $dados_sessao['cpf_cnpj'] = $this->Session->read('precadastrono.nu_documento');
                $dados_sessao['documento_novo'] = $this->Session->read('precadastrono.nu_documento');
                $dados_sessao['doc'] = $this->Session->read('precadastrono.doc');
                $dados['Precadastro'] = array_merge($dados_sessao, $this->data['Precadastro']);

                $precadastro_existente = $this->Precadastro->findByTelefone($dados['Precadastro']['telefone']);

                if (!$precadastro_existente && count($precadastro_existente == 0)) {
                    if ($this->Precadastro->save($dados)) {
                        $this->Session->setFlash('Obrigado! Em breve retornaremos via e-mail<br /> a confirmação do seu cadastro.', 'modal');
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Ocorreu um erro ao tentar salvar seus dasos, favor tentar novamente', 'modal');
                        $this->redirect('/');
                    }
                } else {
                    $this->Session->setFlash('Você já efetuou um pré-cadastro com os dados informados, favor aguarde validação dos dados informados', 'modal');
                    $this->redirect('/');
                }
            } else {
                $conditions = array(
                    'Importado.nu_telefone' => $this->data['Importado']['ddd'] . $this->data['Importado']['nu_telefone'],
                    //'Importado.nu_documento' => $this->data['Importado']['nu_documento'],
                    'Importado.ativo' => 1,
                    'Importado.inativo' => 0
                );

                $exists = $this->Importado->find('first', array('conditions' => $conditions));


                $jacadastrado = $this->Usuario->find('count', array('conditions' => array(
                                'Usuario.ddd' => $this->data['Importado']['ddd'],
                                'Usuario.telefone' => $this->data['Importado']['nu_telefone']
                                )));

                if ($jacadastrado == 0) {
                    if (isset($exists) && is_array($exists) && count($exists) > 0) {
                        $this->Session->write('dados_usuario', $exists['Importado']);
                        $this->redirect(array('action' => 'cadastro'));
                        $this->set('cadastro', 'null');
                    } else {
                        $this->Session->write('precadastrono', $this->data['Importado']);
                        $this->set('cadastro', "no");
                        $this->set('showModal', 'hidefrm');
                    }
                } else {
                    $this->Session->setFlash('Telefone já cadastrado, verifique se digitou corretamente.', 'modal');
                }
            }
        } else {
            $this->set('cadastro', 'null');
        }
    }

    function lost() {
        $data = array_merge($this->data['Perdido'], $this->Session->read('precadastrono'));
        unset($data['ativo']);
        unset($data['inativo']);
        $this->Perdido->save($data);
        $this->redirect('/');
    }

    function editar() {
        $this->scripts_layout = array('perfil');

        if (isset($this->data)) {

            if (isset($this->data['Usuario']['senha']) && $this->data['Usuario']['senha'] == '') {
                unset($this->data['Usuario']['senha']);
            }

            if (isset($this->data['Escolha'])) {
                /*
                 * @todo refatorar, esta gerando um registro com escolha_id 0 quando o usuário desmarca uma opção.
                 */

                $this->Usuario->saveAll($this->data);
            }
            if (isset($this->data['Usuario'])) {
                if ($this->data['Usuario']['senha'] == $this->data['Usuario']['senha2']) {
                    if (isset($this->data['Usuario']['senha'])) {
                        $this->data['Usuario']['senha'] = $this->Usuario->hashPasswords($this->data['Usuario']['senha']);
                    }
                    if ($this->Usuario->save($this->data, array('validate' => false))) {
                        if (isset($this->data['UsuarioPrivacidade'])) {
                            $this->UsuarioPrivacidade->salvaPrivacidade($this->Usuario->id, $this->data['UsuarioPrivacidade']['campo']);
                        }
                        $usuario = $this->Usuario->findById($this->data['Usuario']['id']);
                        $this->Session->write('LoginUsuario', $usuario['Usuario']);
                        $this->Session->setFlash('Dados salvos com sucesso', 'modal');
                    } else {

                        //debug($this->Usuario->invalidFields());
                        $this->Session->setFlash('Ocorreu um erro ao tentar salvar seus dados, favor tentar novamente', 'modal');
                    }
                } else {
                    $this->Session->setFlash('As senhas não batem e não pode ser vazias', 'modal');
                }
            }
        }

        $this->data = $this->Usuario->find('first', array(
                    'conditions' => array(
                        'Usuario.id' => $this->Session->read('LoginUsuario.id')
                    )
                ));

        $this->setRamosToView();

        $this->set('escolhas', $this->Escolha->find('list', array('fields' => array('id', 'titulo'))));

        /*
         * carregar enquete
         */
        $this->_loadEnquete();
    }

    function cadastro() {
        $this->keyword = 'sua empresa nosso negócio, Telefônica Negócios, Telefônica, clientes Telefônica Negócios, oportunidades, oportunidades de negócios, negócios, benefícios empresas';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: Cadastre-se já! ';
        $this->meta = 'Cadastre-se no portal SUA EMPRESA, NOSSO NEGÓCIO. Aqui, clientes Telefônica Negócios têm descontos, notícias do mercado de PMES, oportunidades de negócios e muito mais.';
        $this->scripts_layout = array('validaCadastro', 'perfil');
        if (!$this->Session->read('dados_usuario')) {
            $this->redirect(array('action' => 'precadastro'));
        }
        if (isset($this->data)) {

            /*
             * valida se o email informado já existe na base
             */
            $ex_email = $this->Usuario->find('count', array(
                        'conditions' => array(
                            'email' => $this->data['Usuario']['email']
                        )
                    ));
            if ($ex_email > 0) {
                $this->Session->setFlash('Este e-mail já está cadastrado no nosso sistema', 'modal');
                $this->set('erroValidacao', true);
                $this->setRamosToView();
            } else {
                $sess = $this->Session->read('dados_usuario');
                //montar endereço
                $this->data['Usuario']['endereco'] = $sess['ds_tipo_logradouro'] . ' ' . $sess['nm_logradouro'] . ', ' . $sess['nu_logradouro'];
                $this->data['Usuario']['complemento'] = $sess['ds_complemento'];
                $this->data['Usuario']['bairro'] = $sess['nm_bairro'];
                $this->data['Usuario']['cep'] = $sess['nu_cep'];
                //@todo tirar esse estado fixo
                $this->data['Usuario']['estado'] = 'SP';
                $this->data['Usuario']['cidade'] = $sess['ds_municipio'];
                $this->data['Usuario']['documento'] = $sess['nu_documento'];
                $this->data['Usuario']['id_telefonica'] = $sess['cd_cliente'];
                $this->data['Usuario']['documento_novo'] = $this->Session->read('precadastrono.nu_documento');

                // deleta valores inuteis
                unset($sess['id']);
                unset($sess['nm_cliente']);
                //unset($sess['nm_razao_social']);
                unset($sess['ds_subsegmentacao']);
                //unset($sess['ds_tipo_documento']);
                //unset($sess['nu_documento']);
                //unset($sess['nu_telefone']);
                unset($sess['d_localidade']);
                unset($sess['Ativo']);
                unset($sess['Inativo']);
                unset($sess['Cargo_Contato']);
                unset($sess['Nome_Contato']);
                //unset($sess['ds_tipo_logradouro']);
                //unset($sess['nm_logradouro']);
                //unset($sess['nu_logradouro']);
                unset($sess['ds_complemento']);
                unset($sess['nm_bairro']);
                unset($sess['nu_cep']);
                unset($sess['ds_municipio']);
                unset($sess['id_localidade']);
                unset($sess['cd_logradouro']);
                unset($sess['nu_tronco']);
                $this->data['Usuario']['validate'] = mt_rand(7295464556548, 3489546546546545645465);
                $this->data['Usuario'] = array_merge($this->data['Usuario'], $sess);
                $this->data['Usuario']['senha'] = $this->Usuario->hashPasswords($this->data['Usuario']['senha']);

                $this->Usuario->set($this->data);

                if ($this->Usuario->validates()) {
                    if ($this->Usuario->save($this->data)) {
                        $this->data['Usuario']['id'] = $this->Usuario->id;

                        // @TODO: Esse e-mail será o e-mail de envio de link para confirmar cadastro
                        $this->Session->setFlash('Cadastro efetuado com sucesso! Você receberá um e-mail de confirmação', 'modal');
                        $info['to'] = $this->data['Usuario']['email'];
                        $info['subject'] = 'SUA EMPRESA, NOSSO NEGÓCIO: Cadastro concluído com sucesso.';
                        $info['fromname'] = 'Telefônica Negócios';
                        $info['fromemail'] = 'faleconosco@suaempresanossonegocio.com.br';
                        $info['layout'] = 'default';
                        $info['template'] = 'cadastro';

                        $this->data['Usuario']['link'] = "{$_SERVER['HTTP_HOST']}/usuarios/newvalidate/" . $this->data['Usuario']['validate'];

                        if ($this->_sendmail($info, $this->data['Usuario'])) {
                            $this->Session->setFlash('<p>Parabéns! O cadastro foi finalizado com sucesso.</p><p>Você receberá um email de confirmação de cadastro, com os seus dados de acesso ao portal.</p><p>Atenção: o sistema de segurança do seu email pode impedir que você o receba.</p><p>Verifique também a sua caixa de anti-Spam.</p><p>Obrigado,</p><p>Equipe Telefônica Negócios</p>', 'modal');
                        } else {
                            $this->Session->setFlash('Problemas ao enviar o e-mail. Contate o administrador do sistema.', 'modal');
                        }
                        $this->data['Usuario']['logo'] = 'default.gif';
                        $this->data['Usuario']['created'] = '1';
                        $this->data['Usuario']['updated'] = '1';
                        $this->redirect('/');
                    }
                } else {
                    $this->set('erroValidacao', true);
                    $this->setRamosToView();
                    $this->Session->setFlash('Preencha todos os campos corretamente para continuar', 'modal');
                }
            }
        } else {
            $this->data['Usuario'] = $this->Session->read('dados_usuario');
            $this->data['Usuario']['ddd'] = substr($this->data['Usuario']['nu_telefone'], 0, 2);
            $this->data['Usuario']['telefone'] = substr($this->data['Usuario']['nu_telefone'], 2);
            $this->data['Usuario']['razaosocial'] = $this->data['Usuario']['nm_razao_social'];
        }

//        if (is_array($old_data)) {
//            $this->data = $old_data;
//        }
        $this->setRamosToView();
    }

    function setRamosToView() {
        $ra = $this->RamoAtividade->find('list', array('conditions' => array('onoff' => 1)));
        $rt = $this->RamoTipo->find('list', array('conditions' => array('onoff' => 1)));
        $rd = $this->RamoDetalhe->find('list', array('conditions' => array('onoff' => 1)));
        $this->set('ra', $ra);
        $this->set('rt', $rt);
        $this->set('rd', $rd);
    }

    function perfilajax($pessoa_id) {
        $this->layout = 'ajax';
        $this->set('perfilajax', $this->Usuario->find('first', array(
                    'conditions' => array(
                        'Usuario.id' => $pessoa_id
                    ),
                    'contain' => array('RamoAtividade')
                ))
        );
    }

    function login() {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->Usuario->recursive = -1;
        $usuario = $this->Usuario->find('first', array(
                    'conditions' => array(
                        'email' => $this->data['Usuario']['email'],
                        'validate' => ''
                    )
                ));
        if (isset($usuario) && !empty($usuario) && is_array($usuario) && count($usuario) > 0) {
            $temp = explode(':', $usuario['Usuario']['senha']);
            $hash = $temp['1'];
            $compara = md5($this->data['Usuario']['senha'] . $hash) . ':' . $hash;

            if ($compara == $usuario['Usuario']['senha']) {
                $this->Session->write('LoginUsuario', $usuario['Usuario']);
                $sess = $this->Session->read('loginredirect');
                if ($this->Session->check('loginredirect')) {
                    $sess = $this->Session->read('loginredirect');
                    $this->redirect('/');
                } else {
                    $this->redirect('/home/logado/');
                }
            } else {
                $this->Session->setFlash('Login ou senha Inválidos. Confira se você validou seu cadastro clicando no link do e-mail', 'modal');
                $this->redirect('/');
            }
        } else {
            $this->Session->setFlash('Login ou senha Inválidos. Confira se você validou seu cadastro clicando no link do e-mail', 'modal');
            $this->redirect('/');
        }
    }

    function esqueci() {
        $this->layout = 'ajax';
        $exists = $this->Usuario->find('first', array(
                    'conditions' => array(
                        'email' => $this->data['Usuario']['email'],
                    ),
                    'fields' => array('id', 'nome', 'email'),
                    'recursive' => -1
                ));

        if (isset($exists) && is_array($exists) && count($exists) > 0) {
            $hash = mt_rand(7295464556548, 3489546546546545645465);
            $data['id'] = $exists['Usuario']['id'];
            $data['hash'] = $hash;

            if ($this->Usuario->save($data)) {

                $info['to'] = $exists['Usuario']['email'];
                $info['subject'] = 'Esqueci Minha Senha';
                $info['fromname'] = 'Fale Conosco Telefonica';
                $info['fromemail'] = 'faleconosco@suaempresanossonegocio.com.br';
                $info['layout'] = 'default';
                $info['template'] = 'senha';
                $exists['Usuario']['link'] = 'http://www.suaempresanossonegocio.com.br' . '/usuarios/resetar/' . $hash . '/';
                if ($this->_sendmail($info, $exists['Usuario'])) {
                    $this->Session->setFlash('Sua nova senha foi enviada para o e-mail cadastrado', 'modal');
                } else {
                    $this->Session->setFlash('E-mail não encontrado em nosso banco de dados, verifique se você digitou corretamente.', 'modal');
                }
            } else {
                $this->Session->setFlash('Problema ao resetar a senha, tente novamente', 'modal');
            }
        } else {
            $this->Session->setFlash('Registros não encontrados no nosso banco de dados, verifique se você digitou corretamente.', 'modal');
        }
        $this->redirect('/');
        die;
    }

    function resetar($hash = null) {

        if (isset($this->data)) {
            if ($this->data['Usuario']['senha'] != $this->data['Usuario']['senha2']) {
                $this->Session->setFlash('As senhas não estão iguais.', 'modal');
            } elseif ($this->data['Usuario']['senha'] == '' || $this->data['Usuario']['senha2'] == '') {
                $this->Session->setFlash('É necessario preencher os campos de senha', 'modal');
            } elseif ($this->data['Usuario']['email'] == '') {
                $this->Session->setFlash('É necessario preencher o campo de email', 'modal');
            } else {
                $exists = $this->Usuario->find('first', array(
                            'conditions' => array(
                                'email' => $this->data['Usuario']['email'],
                                'hash' => $this->data['Usuario']['hash']
                            ),
                            'fields' => array('id', 'nome')
                        ));
                if (isset($exists) && is_array($exists) && count($exists) > 0) {
                    $user['senha'] = $this->Usuario->hashPasswords($this->data['Usuario']['senha']);
                    $user['hash'] = '';
                    $user['id'] = $exists['Usuario']['id'];
                    if ($this->Usuario->save($user)) {
                        $this->Session->setFlash('Nova senha salva com sucesso', 'modal');
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Problema ao salvar os dados', 'modal');
                    }
                } else {
                    $this->Session->setFlash('Este código não bate com este usuario', 'modal');
                }
            }
        }

        $this->data['Usuario']['hash'] = $hash;
    }

    function confirmar($hash) {
//        $ext = $this->Usuario->find('first', array(
//                    'conditions' => array('Usuario.hash' => $hash),
//                    'fields' => array('id')
//                ));

        if (isset($this->data)) {
            if ($this->data['Usuario']['senha'] != $this->data['Usuario']['senha2']) {
                $this->Session->setFlash('As senhas não estão iguais.', 'modal');
            } elseif ($this->data['Usuario']['senha'] == '' || $this->data['Usuario']['senha2'] == '') {
                $this->Session->setFlash('É necessario preencher os campos de senha', 'modal');
            } elseif ($this->data['Usuario']['email'] == '') {
                $this->Session->setFlash('É necessario preencher o campo de email', 'modal');
            } else {
                $exists = $this->Usuario->find('first', array(
                            'conditions' => array(
                                'email' => $this->data['Usuario']['email'],
                                'hash' => $this->data['Usuario']['hash']
                            ),
                            'fields' => array('id', 'nome')
                        ));
                if (isset($exists) && is_array($exists) && count($exists) > 0) {
                    $user['senha'] = $this->Usuario->hashPasswords($this->data['Usuario']['senha']);
                    $user['hash'] = '';
                    $user['id'] = $exists['Usuario']['id'];
                    if ($this->Usuario->save($user)) {
                        $this->Session->setFlash('Nova senha salva com sucesso', 'modal');
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Problema ao salvar os dados', 'modal');
                    }
                } else {
                    $this->Session->setFlash('Este código não bate com este usuario', 'modal');
                }
            }
        }

        $this->data['Usuario']['hash'] = $hash;
    }

    function newvalidate($hash) {
        if (isset($hash)) {
            $exists = $this->Usuario->find('first', array(
                        'conditions' => array(
                            'validate' => $hash
                        )
                    ));
            if (isset($exists) && is_array($exists) && count($exists) > 0) {
                $data['Usuario']['validate'] = '';
                $data['Usuario']['id'] = $exists['Usuario']['id'];
                $this->Usuario->save($data['Usuario']);
                $this->Session->setFlash('Parabéns! Cadastro confirmado com sucesso.', 'modal');
            } else {
                $this->Session->setFlash('Ocorreu um problema de validação.', 'modal');
            }
        }
        $this->redirect('/');
    }

    function logout() {
        $this->Session->delete('LoginUsuario');
        $this->redirect('/');
    }

    function getJsonRamoAtividade() {
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $ra = $this->RamoAtividade->find('all', array('conditions' => array('onoff' => 1)));
            $itens = $this->_builRetornoRamo('RamoAtividade', $ra);
            return json_encode($itens);
        }
    }

    function getJsonRamoTipo($atividade_id) {
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $ra = $this->RamoTipo->find('all', array('conditions' => array('ramo_atividade_id' => $atividade_id, 'onoff' => 1)));
            $itens = $this->_builRetornoRamo('RamoTipo', $ra);
            return json_encode($itens);
        }
    }

    function getJsonRamoDetalhe($tipo_id) {
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $ra = $this->RamoDetalhe->find('all', array('conditions' => array('ramo_tipo_id' => $tipo_id, 'onoff' => 1)));
            $itens = $this->_builRetornoRamo('RamoDetalhe', $ra);
            return json_encode($itens);
        }
    }

    function _builRetornoRamo($nomeModel, $dados) {
        foreach ($dados as $dado) {
            $item = new StdClass();
            $item->id = $dado[$nomeModel]['id'];
            $item->desc = $dado[$nomeModel]['desc'];
            $itens[] = $item;
        }

        return $itens;
    }

    function admin_index() {
        $this->Usuario->recursive = 0;
        $this->paginate['Usuario']['order'] = 'Usuario.created DESC';
        $this->set('dados', $this->paginate('Usuario'));
    }

    function admin_view($id_comm) {
        $this->set('dados', $this->Usuario->read(null, $id_comm));
    }

    function admin_export() {
        Configure::write('debug', 0);
        $this->helpers[] = 'Csv';
        header("Content-type: application/force-download; charset=iso-8859-1");
        header('Content-Disposition: inline; filename="export.csv"');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment;"');
        $this->layout = 'csv';

        $this->Usuario->recursive = -1;
        $usuarios = $this->Usuario->find('all', array());

        $atividade = $this->RamoAtividade->find('list');
        $tipo = $this->RamoTipo->find('list');
        $detalhe = $this->RamoDetalhe->find('list');

        $funcionarios = array(
            '1' => '1 a 2',
            '2' => '3 a 5',
            '3' => '6 a 10',
            '4' => '11 a 25',
            '5' => '26 a 50',
            '6' => 'Acima de 50'
        );
        $faturamento = array(
            '1' => 'Até 100.000',
            '2' => '100.000,00 a 200.000,00',
            '3' => '300.000,00 a 500.000,00',
            '4' => '500.000,00 a 900.000,00',
            '5' => 'acima de 1.000.000.00'
        );
        $idade = array(
            '1' => 'até 3 meses',
            '2' => '3 a 6 meses',
            '3' => '6 a 12 meses',
            '4' => '1 a 2 anos',
            '5' => '2 a 5 anos',
            '6' => 'Acima de 5 anos'
        );
        $final = array();
        $iuser = 0;

        foreach ($usuarios as $user) {
            $user['Usuario']['nome'] = trim($user['Usuario']['nome']);
            $user['Usuario']['tipo'] = $tipo[$user['Usuario']['tipo']];
            $user['Usuario']['detalhe'] = $detalhe[$user['Usuario']['detalhe']];
            $user['Usuario']['funcionarios'] = $funcionarios[$user['Usuario']['funcionarios']];
            $user['Usuario']['faturamento'] = $faturamento[$user['Usuario']['faturamento']];
            //$user['Usuario']['idade'] = $idade[$user['Usuario']['idade']];
            if ($user['Usuario']['ramo'] != 0) {
                $user['Usuario']['ramo'] = $atividade[$user['Usuario']['ramo']];
            }
            $user['Usuario']['sobre'] = str_replace('"', '', $user['Usuario']['sobre']);


            if ($user['Usuario']['aceito_novidade'] == 1) {
                $user['Usuario']['aceito_novidade'] = 'sim';
            } else {
                $user['Usuario']['aceito_novidade'] = 'não';
            }

            if ($user['Usuario']['email_mensagem'] == 1) {
                $user['Usuario']['email_mensagem'] = 'sim';
            } else {

                $user['Usuario']['email_mensagem'] = 'não';
            }

            unset($user['Usuario']['hash']);
            unset($user['Usuario']['senha']);
            unset($user['Usuario']['logo']);
            unset($user['Usuario']['segmento']);
            //$user//['Usuario']['sobre'] = nl2br(trim($user['Usuario']['sobre']));
            $user['Usuario']['sobre'] = ereg_replace("\n", "", trim($user['Usuario']['sobre']));
            $user['Usuario']['sobre'] = ereg_replace("\r", "", trim($user['Usuario']['sobre']));

            $final[$iuser]['Usuario'] = $user['Usuario'];
            $iuser++;
        }

        $this->set('dados', $final);
    }

    function admin_exportprecadastro() {
        $this->layout = 'csv';
        $this->helpers[] = 'Csv';
        header("Content-type: application/force-download;");
        header('Content-Disposition: inline; filename="export.csv"');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment; filename="ListaEspera.csv"');
        $this->Precadastro->recursive = -1;
        $this->set('dados', $this->Precadastro->find('all'));
    }

    function admin_ramo() {
        if (isset($this->data)) {
            //debug($this->data);die;
            if ($this->data['RamoAtividade']['desc'] != '') {
                $this->RamoAtividade->save($this->data['RamoAtividade']);
            }
            if ($this->data['RamoDetalhe']['desc'] != '') {
                $this->RamoDetalhe->save($this->data['RamoDetalhe']);
            }
            if ($this->data['RamoTipo']['desc'] != '') {

                $this->RamoTipo->save($this->data['RamoTipo']);
            }
        }
        $this->setRamosToView();
    }

    function admin_ramo_list() {
        $this->paginate = array(
            'limit' => 25,
            'order' => array(
                'RamoAtividade.desc' => 'asc'
            )
        );

        $this->RamoAtividade->recursive = -1;
        //   	$dados = $this->RamoAtividade->find('all');
        $dados = $this->paginate('RamoAtividade');
        $this->set('dados', $dados);
        $this->render('admin_ramo_list');
    }

    function admin_ramo_list_save() {
        $this->layout = 'ajax';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $onoff = isset($_POST['onoff']) ? $_POST['onoff'] : '';

        if ($id != '') {
            $data['RamoAtividade']['id'] = $id;
            if ($desc != '')
                $data['RamoAtividade']['desc'] = $desc;
            if ($onoff != '')
                $data['RamoAtividade']['onoff'] = $onoff;

            if ($this->RamoAtividade->save($data)) {
                $dados = array('error' => '', 'save' => 'OK');
            } else {
                $dados = array('error' => 'err', 'save' => 'bad');
            }
        } else {
            $dados = array('error' => 'idNull');
        }
        echo json_encode($dados);
        die;
        //        $this->render('admin_ramo_list');
    }

    function admin_ramo_tipo_list() {
        $this->paginate = array(
            'limit' => 25,
            'order' => array(
                'RamoTipo.desc' => 'asc'
            )
        );

        //$this->RamoTipo->recursive=-1;
        $atvd = $this->RamoAtividade->find('list');
        $dados = $this->paginate('RamoTipo');
        $this->set('dados', $dados);
        $this->set('atvd', $atvd);
        $this->render('admin_ramo_tipo_list');
    }

    function admin_ramo_tipo_list_save() {
        $this->layout = 'ajax';

        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $onoff = isset($_POST['onoff']) ? $_POST['onoff'] : '';

        if ($id != '') {
            $this->RamoTipo->read(null,$id);

            //$data['RamoTipo']['id'] = $id;

            if ($desc != ''){
                //$data['RamoTipo']['desc'] = $desc;
                $this->RamoTipo->set('desc',$desc);
            }
            if ($onoff != ''){
                $this->RamoTipo->set('onoff',$onoff);
                //$data['RamoTipo']['onoff'] = $onoff;
            }

            if ($this->RamoTipo->save()) {
                $dados = array('error' => '', 'save' => 'OK');
            } else {
                $dados = array('error' => 'err', 'save' => 'bad');
            }
        } else {
            $dados = array('error' => 'idNull');
        }
        echo json_encode($dados);
        die;
    }

}

?>
