<?php

use Pecee\SimpleRouter\SimpleRouter;
use sistema\Nucleo\Helpers;

try {
    SimpleRouter::setDefaultNamespace('sistema\Controlador');

    SimpleRouter::get("{URL_BASE}", 'SiteController@index');
    SimpleRouter::get('{URL_BASE}/sobre', 'SiteController@sobre');

    SimpleRouter::get('{URL_BASE}/404', 'ErrorController@erro404');

    SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {

    if (Helpers::localhost()) {
        echo $ex;
    } else {
        Helpers::redirectTo('404');
    }
}