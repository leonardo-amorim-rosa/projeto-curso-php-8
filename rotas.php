<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Controlador');

SimpleRouter::get("{URL_BASE}", 'SiteController@index');
SimpleRouter::get('{URL_BASE}/sobre', 'SiteController@sobre');

SimpleRouter::start();
