<?php

namespace mx8sistemas\Controllers\Dashboard;

use mx8sistemas\Core\BaseController;

/**
 * Description of BaseDashboardController
 *
 * @author leoam
 */
class BaseDashboardController extends BaseController
{
    public function __construct()
    {
        parent::__construct('templates/dashboard/views');
    }
}
