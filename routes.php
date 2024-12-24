<?php

use Pecee\SimpleRouter\SimpleRouter;
use mx8sistemas\Core\Helpers;

try {
    SimpleRouter::setDefaultNamespace('mx8sistemas\Controllers');

    SimpleRouter::get(URL_BASE, 'SiteController@index');
    SimpleRouter::get(URL_BASE.'sobre', 'SiteController@about');
    SimpleRouter::get(URL_BASE.'post/{id}', 'SiteController@post');
    SimpleRouter::get(URL_BASE.'categories/{id}', 'SiteController@categories');
    SimpleRouter::post(URL_BASE.'search', 'SiteController@search');
    SimpleRouter::post(URL_BASE.'searchAsync', 'SiteController@searchAsync');

    SimpleRouter::get(URL_BASE.'404', 'ErrorController@erro404');
    
    SimpleRouter::group(['namespace' => 'Dashboard'], function() {
        SimpleRouter::get(DASHBOARD_BASE, 'DashboardController@index');
        
        // ADMIN POSTS
        SimpleRouter::get(DASHBOARD_BASE.'posts', 'PostsController@index');
//        SimpleRouter::match(['get', 'post'], DASHBOARD_BASE.'posts/cadastrar', 'PostsController@cadastrar');
        SimpleRouter::get(DASHBOARD_BASE.'posts/form', 'PostsController@form');
        SimpleRouter::post(DASHBOARD_BASE.'posts/save', 'PostsController@save');
        SimpleRouter::get(DASHBOARD_BASE.'posts/edit/{id}', 'PostsController@edit');
        SimpleRouter::post(DASHBOARD_BASE.'posts/update/{id}', 'PostsController@update');
        SimpleRouter::post(DASHBOARD_BASE.'posts/delete', 'PostsController@delete');
        
        // ADMIN CATEGORIAS
        SimpleRouter::get(DASHBOARD_BASE.'categories', 'CategoriesController@index');
//        SimpleRouter::match(['get', 'post'], DASHBOARD_BASE.'categories/cadastrar', 'CategoriesController@cadastrar');
        SimpleRouter::get(DASHBOARD_BASE.'categories/form', 'CategoriesController@form');
        SimpleRouter::post(DASHBOARD_BASE.'categories/save', 'CategoriesController@save');
        SimpleRouter::get(DASHBOARD_BASE.'categories/edit/{id}', 'CategoriesController@edit');
        SimpleRouter::post(DASHBOARD_BASE.'categories/update/{id}', 'CategoriesController@update');
        SimpleRouter::post(DASHBOARD_BASE.'categories/delete', 'CategoriesController@delete');
    });
    
    SimpleRouter::start();
    
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if (Helpers::localhost()) {
        echo $ex;
    } else {
        Helpers::redirectTo('404');
    }
}