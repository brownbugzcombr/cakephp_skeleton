<?php

class ContatosController extends AppController {

    var $helpers = array('Html', 'Form', 'Csv');

    function index() {
        $this->keyword = 'sua empresa nosso negócio , Telefônica Negócios, Telefônica, fale conosco , reclamações ,elogio,sugestões';
        $this->pageTitle = 'Telefônica Negócios | SUA EMPRESA, NOSSO NEGÓCIO: fale conosco';
        $this->meta = 'A Telefônica Negócios quer ouvir a sua opinião. Preencha o formulário e envie suas dúvidas, reclamações, elogios ou sugestões sobre o nosso portal SUA EMPRESA, NOSSO NEGÓCIO.';

        Configure::write('debug', 2);
        $this->scripts_layout = array('validaFaleConosco');
        if (isset($this->data)) {
            $this->data['Contato']['telefone'] = $this->data['Contato']['ddd'] . $this->data['Contato']['telefone'];

            if ($this->Contato->save($this->data)) {
                $info['to'] = 'faleconosco@suaempresanossonegocio.com.br';
                $info['bcc'] = array('suaempresanossonegocio@telefonica.com.br');
                $info['subject'] = 'Fale Conosco';
                $info['fromname'] = 'Fale Conosco Telefonica';
                $info['fromemail'] = 'faleconosco@suaempresanossonegocio.com.br';
                $info['layout'] = 'default';
                $info['template'] = 'contato';

                if ($this->_sendmail($info, $this->data['Contato'])) {
                    $info = array();
                    $info['to'] = $this->data['Contato']['email'];
                    $info['subject'] = 'SUA EMPRESA, NOSSO NEGÓCIO: Sua mensagem foi enviada com sucesso!';
                    $info['fromname'] = 'Fale Conosco Telefonica';
                    $info['fromemail'] = 'faleconosco@suaempresanossonegocio.com.br';
                    $info['layout'] = 'default';
                    $info['template'] = 'faleconosco';
                    if ($this->_sendmail($info, $this->data['Contato'])) {
                        $this->Session->setFlash("Mensagem enviada com sucesso.", "modal");
                        $this->data = null;
                    }
                }
            } else {
                $this->Session->setFlash("Mensagem não pode ser enviada", "modal");
            }
        } else {

        }
    }

    function admin_index() {
        $this->Contato->recursive = 0;
        $this->paginate['Contato']['order'] = 'Contato.created DESC';
        $this->set('dados', $this->paginate('Contato'));
    }

    function admin_view($id_comm) {
        $this->set('dados', $this->Contato->read(null, $id_comm));
    }

    function admin_export() {
        header("Content-type: application/force-download; charset=utf-8");
        header('Content-Disposition: inline; filename="export.csv"');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment; filename="export.csv"');
        $this->layout = 'csv';
        $this->Contato->recursive = -1;
        $contatos = $this->Contato->find('all');
        $retorno = array();
        $ifor = 0;
        foreach ($contatos as $con) {
            foreach ($con['Contato'] as $chave => $valor) {
                $retorno[$ifor]['Contato'][$chave] = $valor;
                $retorno[$ifor]['Contato'][$chave] = ereg_replace("\n", "", trim($retorno[$ifor]['Contato'][$chave]));
                $retorno[$ifor]['Contato'][$chave] = ereg_replace("\r", "", trim($retorno[$ifor]['Contato'][$chave]));
            }
            $ifor++;
        }
        $this->set('dados', $retorno);
    }

}

?>
