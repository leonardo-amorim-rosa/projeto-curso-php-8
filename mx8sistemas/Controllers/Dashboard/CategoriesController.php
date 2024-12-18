<?php

namespace mx8sistemas\Controllers\Dashboard;

/**
 * Description of CategoriesController
 *
 * @author leoam
 */
class CategoriesController extends BaseDashboardController
{
    public function index(): void
    {
        echo $this->template->render('categories/index.html', []);
    }
}
