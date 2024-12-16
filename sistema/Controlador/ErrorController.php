<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;

/**
 * Description of ErrorController
 *
 * @author leoam
 */
class ErrorController extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function erro404(): void
    {
        echo $this->template->renderizar('404.html', []);        
    }
}
