<?php

use Pecee\SimpleRouter\SimpleRouter;
use sistema\Core\Helpers;

try {
    SimpleRouter::setDefaultNamespace('sistema\Controllers');

    SimpleRouter::get("{URL_BASE}", 'SiteController@index');
    SimpleRouter::get('{URL_BASE}/sobre', 'SiteController@about');

    SimpleRouter::get('{URL_BASE}/404', 'ErrorController@erro404');

    SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {

    if (Helpers::localhost()) {
        echo $ex;
    } else {
        Helpers::redirectTo('404');
    }
}