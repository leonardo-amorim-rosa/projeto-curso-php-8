<?php

namespace sistema\Nucleo;

use sistema\Suporte\Template;

/**
 * Description of Controlador
 *
 * @author leoam
 */
class Controlador
{
    protected Template $template;
    
    public function __construct(string $diretorio)
    {
        $this->template = new Template($diretorio);
    }
}
