<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;

/**
 * Description of SiteController
 *
 * @author leoam
 */
class SiteController extends Controlador
{
    public function __construct()
    {
        parent::__construct('templates/site/views');
    }
    
    public function index(): void
    {
        echo $this->template->renderizar('index.html', [
            'titulo' => 'Titulo teste',
            'subtitulo' => 'subtitulo teste'
        ]);
    }
    
    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'Titulo teste página sobre',
            'subtitulo' => 'subtitulo teste página sobre'
        ]);
    }
}
