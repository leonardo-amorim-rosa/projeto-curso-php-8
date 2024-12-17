<?php

namespace sistema\Controllers;

use sistema\Core\BaseController;
use sistema\Model\Post;
use sistema\Core\Helpers;

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
            'posts' => (new Post())->findAll()
        ]);
    }
    
    public function post(int $id): void
    {
        $post = (new Post())->findById($id);
        if (!$post) {
            Helpers::redirectTo('404');
        }
        
        echo $this->template->render('post.html', [
            'post' => $post
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
