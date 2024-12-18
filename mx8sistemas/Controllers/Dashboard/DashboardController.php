<?php

namespace mx8sistemas\Controllers\Dashboard;

/**
 * Description of DashboardController
 *
 * @author leoam
 */
class DashboardController extends BaseDashboardController
{
    /**
     * Index page of dashboard
     * @return void
     */
    public function index(): void
    {
        echo $this->template->render('dashboard.html', []);
    }
}
