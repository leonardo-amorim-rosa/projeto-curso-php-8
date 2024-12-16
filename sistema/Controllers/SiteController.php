<?php

namespace sistema\Controllers;

use sistema\Core\BaseController;

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
            'subtitulo' => 'subtitulo teste'
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
