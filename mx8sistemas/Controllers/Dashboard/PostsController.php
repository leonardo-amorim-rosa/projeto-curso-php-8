<?php

namespace mx8sistemas\Controllers\Dashboard;

use mx8sistemas\Model\Post;

/**
 * Description of PostsController
 *
 * @author leoam
 */
class PostsController extends BaseDashboardController
{

    public function index(): void
    {
        $posts = (new Post())->findAll();
        echo $this->template->render('posts/index.html', [
            'posts' => $posts
        ]);
    }

    public function form(): void
    {
        echo $this->template->render('posts/form.html', []);
    }

    public function save(): void
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($formData);

        if (isset($formData)) {
            echo 'Post salvo com sucesso!';
        }
    }
}
