<?php

namespace mx8sistemas\Controllers;

use mx8sistemas\Core\BaseController;

/**
 * Description of ErrorController
 *
 * @author leoam
 */
class ErrorController extends BaseController
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function erro404(): void
    {
        echo $this->template->render('404.html', []);        
    }
}
