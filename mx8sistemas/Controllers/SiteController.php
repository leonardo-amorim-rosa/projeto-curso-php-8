<?php

namespace mx8sistemas\Controllers;

use mx8sistemas\Core\BaseController;
use mx8sistemas\Model\Post;
use mx8sistemas\Model\Category;
use mx8sistemas\Core\Helpers;

/**
 * Description of SiteController
 *
 * @author leoam
 */
class SiteController extends BaseController
{
    public function __construct()
    {
        parent::__construct('templates/site/views');
    }
    
    public function index(): void
    {
        echo $this->template->render('index.html', [
            'titulo' => 'Titulo teste',
            'posts' => (new Post())->findAll(),
            'categories' => (new Category())->findAll()
        ]);
    }
    
    public function post(int $id): void
    {
        $post = (new Post())->findById($id);
        if (!$post) {
            Helpers::redirectTo('404');
        }
        
        echo $this->template->render('post.html', [
            'post' => $post,
            'categories' => (new Category())->findAll()
        ]);        
    }
    
    public function about(): void
    {
        echo $this->template->render('sobre.html', [
            'titulo' => 'Titulo teste página sobre',
            'subtitulo' => 'subtitulo teste página sobre'
        ]);
    }
}
