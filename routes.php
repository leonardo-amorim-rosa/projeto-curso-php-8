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
        SimpleRouter::get(DASHBOARD_BASE.'posts', 'PostsController@index');
        SimpleRouter::get(DASHBOARD_BASE.'categories', 'CategoriesController@index');
    });
    
    SimpleRouter::start();
    
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if (Helpers::localhost()) {
        echo $ex;
    } else {
        Helpers::redirectTo('404');
    }
}