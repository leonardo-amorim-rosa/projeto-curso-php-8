<?php

namespace mx8sistemas\Core;

use mx8sistemas\Support\Template;

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
