<?php

namespace sistema\Core;

use sistema\Suporte\Template;

/**
 * Description of Controlador
 *
 * @author leoam
 */
class BaseController
{
    protected Template $template;
    
    public function __construct(string $diretorio)
    {
        $this->template = new Template($diretorio);
    }
}
