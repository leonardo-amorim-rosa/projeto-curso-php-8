<?php

namespace mx8sistemas\Controllers\Dashboard;

use mx8sistemas\Model\Post;
use mx8sistemas\Model\Category;
use mx8sistemas\Core\Helpers;

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
        echo $this->template->render('posts/form.html', [
            "categories" => (new Category())->findAll()
        ]);
    }

    public function save(): void
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (isset($formData)) {
            (new Post())->save($formData);
            Helpers::redirectTo('dashboard/posts');
        }
    }
    
    public function edit(int $id): void
    {
        $post = (new Post())->findById($id);
        
        echo $this->template->render('posts/form.html', [
            'post' => $post,
            "categories" => (new Category())->findAll()
        ]);        
    } 
    
    public function update(int $id)
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (isset($formData)) {
            $formData["id"] = $id;
            (new Post())->update($formData);
            Helpers::redirectTo('dashboard/posts');
        }
    }
}
