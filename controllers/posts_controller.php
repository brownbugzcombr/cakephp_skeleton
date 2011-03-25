<?php
/**
 * PostsController - Controls all the interactions with the Post
 * 
 * @see Post Model for post
 * @see Categoria Model for categoria
 * @see Favorito Model for Favoritos
 * @package Skeleton
 * @category Controllers
 * @author Gregory Brown <brown@bugz.com.br>
 */
class PostsController extends AppController {

    /**
     * @var array $components Components used by this class
     */
    var $components = array('RequestHandler');
    /**
+     * @var array $uses Models used by this class
     */
    var $uses = array('Post', 'Categoria', 'Favorito');
    /**
     * @var array $helpers Helpers used by this class
     */
    var $helpers = array('Html', 'Javascript', 'Number', 'Fck');
    /**
     * @var array $paginate Generic parameters for paginator 
     */
    var $paginate = array(
        'Post' => array(
            'limit' => 20
        )
    );

    /**
     * Verifica se existe um arquivo de view específico para o controller que extendeu
     * PostController, caso haja ignore a pasta /app/views/posts e usa o arquivo encontrado
     * @todo: ADICIONAR NO ADMIN O CAMPO CONTEUDO, QUE PODE SER 1,2,3 sendo Matérias, Videos e Podcasts
     * @author Gregory Brown
     * @access Public
     * @return void
     */
    function beforeRender() {
        $this->viewPath = 'posts';
        if (is_file(VIEWS . $this->params['controller'] . DS . $this->params['action'] . '.ctp')) {
            $this->viewPath = strtolower($this->name);
        }
        // carregar enquete
        $this->_loadEnquete();
        parent::beforeRender();
    }

    /**
     * Index - Render the main post action 
     * 
     * @author Gregory Brown
     * @access Public
     * @return void
     */
    function index() {
        if (isset($this->params['named']['categoria'])) {
            $cat = explode(',', $this->params['named']['categoria']);
            unset($cat[count($cat) - 1]);
            $this->paginate['Post']['conditions']['categoria_id'] = $cat;
        }
        $this->Post->recursive = 2;
        $this->paginate['Post']['order'] = 'Post.created DESC';
        $this->paginate['Post']['limit'] = 1;
        $this->set('dados', $this->paginate('Post'));
        $this->set('categorias', $this->Categoria->find('list', array('fields' => array('id', 'titulo'))));
    }
    /**
     * 
     * Favoritar - Adicionar post aos favoritos
     * 
     * @author Gregory Brown
     * @access Public
     * @param int $idpost
     * @param boolean $gostar
     */
    function favoritar($idpost, $gostar) {
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($this->RequestHandler->isAjax()) {
            $dados['usuario_id'] = $this->LoginUsuario['id'];
            $dados['post_id'] = $idpost;

            $exists = $this->Favorito->find('first', array(
                        'conditions' => $dados,
                        'fields' => array('id', 'gostar')
                    ));


            $dados['gostar'] = $gostar;
            if (isset($exists) && is_array($exists) && count($exists) > 0) {
                $dados['id'] = $exists['Favorito']['id'];
            }

            if ($this->Favorito->save($dados)) {
                echo 1;
            } else {
                echo 0;
            }
            die();
        }
    }
    /**
     * Busca - Recebe do post o parametro de busca e faz a busca por texto
     * ou titulo
     * 
     * @author Gregory Brown
     * @access Public
     */
    function busca() {
        $this->Post->recursive = 1;
        $this->paginate['Post']['order'] = 'Post.created DESC';
        $this->paginate['Post']['recursive'] = -1;
        $this->paginate['Post']['conditions']['or']['texto like '] = '%' . $this->data['Post']['busca'] . '%';
        $this->paginate['Post']['conditions']['or']['titulo like '] = '%' . $this->data['Post']['busca'] . '%';
        $this->paginate['Post']['conditions']['tipo not'] = 'NULL';
        $this->paginate['Post']['limit'] = 25;
        $this->set('dados', $this->paginate('Post'));
    }
    /**
     * Generate the RSS view for posts.
     * @author Gregory Brown
     * @access Public
     * @param int|null $tipo Tipo de post para buscar.
     * @param int|null $categoria A categoria de post para buscar
     */
    function rss($tipo = null, $categoria = null) {
        $this->layout = 'rss';
        $cond = array();
        if ($tipo != null)
            $cond['tipo'] = $tipo;

        if ($categoria != null)
            $cond['categoria_id'] = $categoria;

        $this->set('dados', $this->Post->find('all', array(
                    'conditions' => $cond,
                    'recursive' => -1
                )));
    }
    /**
     * Administrative index lists the posts in paginated form
     * 
     * @author Gregory Brown
     * @access Public
     */
    function admin_index() {
        $this->Post->recursive = 0;
        $this->paginate['Post']['order'] = 'Post.created DESC';
        $this->set('dados', $this->paginate('Post'));
    }
    /**
     * Administrative post editing controller, uses add for mechanics
     * @see PostsController::admin_add()
     * @author Gregory Brown
     * @access Public
     * @param int|null $post_id The post ID to edit
     */
    function admin_edit($post_id = null) {
        $this->admin_add($post_id);
        $this->render('admin_add');
    }
    /**
     * Administrative post editing/adding controller
     * Will automatically generate a slug if field is empty using
     * the function.
     * @see PostsController::_getStringAsURL()
     * @author Gregory Brown
     * @access Public
     * @param int|null $post_id The post ID to edit
     */
    function admin_add($post_id = null) {

        if (isset($this->data)) {
            if ($this->data['Post']['slug']=='')
                    $this->data['Post']['slug'] = $this->_getStringAsURL($this->data['Post']['titulo']);
            if ($this->Post->save($this->data)) {
                $this->Session->setFlash('Salvo com sucesso!', 'sucesso');
                //$this->redirect(array('action'=>'index'));
            } else {
                if ($this->Post->invalidFields()) {
                    $this->Session->setFlash($this->Post->invalidFields(), 'validate');
                } else {
                    $this->Session->setFlash('Erro ao Salvar os dados', 'erro');
                }
            }
        }

        if ($post_id != null) {
            $this->data = $this->Post->findById($post_id);
        }

        $this->set('categorias', $this->Categoria->find('list', array('fields' => array('id', 'titulo'))));
    }
    /**
     * Delete a specific post
     * 
     * @author Gregory Brown
     * @access Public
     * @param int post_id the post id
     */
    function admin_del($post_id) {
        if (isset($post_id)) {
            if ($this->Post->delete($post_id)) {
                $this->Session->setFlash('Registro deletado com sucesso', 'default', array('class' => 'message success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao deletar os dados', array('class' => 'message error'));
            }
        }
    }

    function getUniqueUrl($string, $field) {
        // Build URL

        $currentUrl = $this->_getStringAsURL($string);

        // Look for same URL, if so try until we find a unique one

        $conditions = array($this->name . '.' . $field => 'LIKE ' . $currentUrl . '%');

        $result = $this->findAll($conditions, $this->name . '.*', null);

        if ($result !== false && count($result) > 0) {
            $sameUrls = array();

            foreach ($result as $record) {
                $sameUrls[] = $record[$this->name][$field];
            }
        }

        if (isset($sameUrls) && count($sameUrls) > 0) {
            $currentBegginingUrl = $currentUrl;

            $currentIndex = 1;

            while ($currentIndex > 0) {
                if (!in_array($currentBegginingUrl . '_' . $currentIndex, $sameUrls)) {
                    $currentUrl = $currentBegginingUrl . '_' . $currentIndex;

                    $currentIndex = -1;
                }

                $currentIndex++;
            }
        }

        return $currentUrl;
    }
    /**
     * Strip funny character from string, generate a lowercase url friendly
     * version of the string for posts. All characters will be replaced with
     * the "_" character
     * @todo Remove this from post and place in a helper.
     * @author Gregory Brown
     * @access Private
     * @param string $string the string to be converted
     * @return string The url friendly string
     */
    private function _getStringAsURL($string) {
        // Define the maximum number of characters allowed as part of the URL

        $currentMaximumURLLength = 100;

        $string = strtolower($string);

        // Any non valid characters will be treated as _, also remove duplicate _

        $string = preg_replace('/[^a-z0-9_]/i', '_', $string);
        $string = preg_replace('/_[_]*/i', '_', $string);

        // Cut at a specified length

        if (strlen($string) > $currentMaximumURLLength) {
            $string = substr($string, 0, $currentMaximumURLLength);
        }

        // Remove beggining and ending signs

        $string = preg_replace('/_$/i', '', $string);
        $string = preg_replace('/^_/i', '', $string);

        return $string;
    }

}

?>
