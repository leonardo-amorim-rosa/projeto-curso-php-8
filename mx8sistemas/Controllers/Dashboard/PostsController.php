<?php

namespace mx8sistemas\Controllers\Dashboard;

/**
 * Description of PostsController
 *
 * @author leoam
 */
class PostsController extends BaseDashboardController
{
    public function index(): void
    {
        echo $this->template->render('posts/index.html', []);
    }
}
