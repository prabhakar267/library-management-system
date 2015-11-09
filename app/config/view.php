<?php

$view_config = array(

	/*
	|--------------------------------------------------------------------------
	| View Storage Paths
	|--------------------------------------------------------------------------
	|
	| Most templating systems load templates from disk. Here you may specify
	| an array of paths that should be checked for your views. Of course
	| the usual Laravel view path has already been registered for you.
	|
	*/

	'paths' => array(__DIR__.'/../views'),        

	/*
	|--------------------------------------------------------------------------
	| Pagination View
	|--------------------------------------------------------------------------
	|
	| This view will be used to render the pagination link output, and can
	| be easily customized here to show any view you like. A clean view
	| compatible with Twitter's Bootstrap is given to you by default.
	|
	*/

	'pagination' => 'pagination::slider-3',
    
        /* Scripts and static files */
    
        'static' => '/static'

);

$view_config['bootstrap'] = array(
    'base'  => $view_config['static'] . "/bootstrap",
    'js'    => $view_config['static'] . "/bootstrap/js",
    'css'   => $view_config['static'] . "/bootstrap/css",
    'img'   => $view_config['static'] . "/bootstrap/img"
);

$view_config['script'] = $view_config['static'] . "/scripts";
$view_config['images'] = $view_config['static'] . "/images";
$view_config['css'] = $view_config['static'] . "/css";

$view_config['custom'] = array(
    'base'  => $view_config['static'] . "/custom",
    'js'    => $view_config['static'] . "/custom/js",
    'css'   => $view_config['static'] . "/custom/css",
    'font'  => $view_config['static'] . "/custom/fonts",
    'img'   => $view_config['static'] . "/custom/img",
    'tpl'   => $view_config['static'] . "/custom/tpl"
);

return $view_config;
