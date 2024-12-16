<?php

require 'vendor/autoload.php';
//require 'rotas.php';

use sistema\Model\Post;

$result = (new Post())->findAll();
//var_dump($result);

foreach ($result as $post) {
    echo $post->title . '<hr>';
}