<?php

namespace mx8sistemas\Controllers;

use mx8sistemas\Core\BaseController;
use mx8sistemas\Model\Post;
use mx8sistemas\Model\Category;
use mx8sistemas\Core\Helpers;

/**
 * Description of SiteController
 *
 * @author leoam
 */
class SiteController extends BaseController
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index(): void
    {
        echo $this->template->render('index.html', [
            'titulo' => 'Titulo teste',
            'posts' => (new Post())->findAll(),
            'categories' => (new Category())->findAll()
        ]);
    }

    public function post(int $id): void
    {
        $post = (new Post())->findById($id);
        if (!$post) {
            Helpers::redirectTo('404');
        }

        echo $this->template->render('post.html', [
            'post' => $post,
            'categories' => (new Category())->findAll()
        ]);
    }

    public function searchAsync(): void
    {
        $searchData = filter_input(INPUT_POST, 'search', FILTER_DEFAULT);
        $posts = (new Post())->search($searchData);

        if (isset($searchData)) {
            foreach ($posts as $post) {
                $url = Helpers::url('post/'.$post->id);
                echo "<li class='list-group-item fw-bold'><a href='{$url}'>{$post->title}</a></li>";
            }
        }
    }

    public function search(): void
    {
        $searchData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $posts = (new Post())->search($searchData['search']);

        if (isset($searchData)) {
            echo $this->template->render('search.html', [
                'posts' => $posts,
                'categories' => (new Category())->findAll()
            ]);
        }
    }

    public function categories(int $id): void
    {
        $posts = (new Category())->findPostsByCategory($id);

        echo $this->template->render('categories.html', [
            'posts' => $posts,
            'categories' => (new Category())->findAll()
        ]);
    }

    public function about(): void
    {
        echo $this->template->render('sobre.html', [
            'titulo' => 'Titulo teste página sobre',
            'subtitulo' => 'subtitulo teste página sobre',
            'categories' => (new Category())->findAll()
        ]);
    }
}
