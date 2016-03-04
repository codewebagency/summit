<?php
$app['router']->get('index/index', "App\\Http\\Controllers\\IndexController@index");
$app['router']->get('/', "App\\Http\\Controllers\\IndexController@index");
$app['router']->post('index/checkUrl', "App\\Http\\Controllers\\IndexController@checkUrl");
$app['router']->post('index/checkUrl2', "App\\Http\\Controllers\\IndexController@checkUrl2");
$app['router']->any('index/create_log', "App\\Http\\Controllers\\IndexController@create_log");
$app['router']->any('index/log_template', "App\\Http\\Controllers\\IndexController@log_template");
$app['router']->get('admin', "App\\Http\\Controllers\\AdminController@index");
$app['router']->any('admin/login', "App\\Http\\Controllers\\AdminController@login");
$app['router']->get('admin/register_form', "App\\Http\\Controllers\\AdminController@register_form");
$app['router']->post('admin/do_register', "App\\Http\\Controllers\\AdminController@do_register");
$app['router']->get('server', "App\\Http\\Controllers\\ServerController@index");
$app['router']->post('server/create', "App\\Http\\Controllers\\ServerController@create");
$app['router']->post('index/test', "App\\Http\\Controllers\\IndexController@test");
$app['router']->any('server/delete', "App\\Http\\Controllers\\ServerController@delete"); // ajax
$app['router']->any('index/show_uptime_table', "App\\Http\\Controllers\\IndexController@show_uptime_table"); // ajax
$app['router']->any('index/show_ping_table', "App\\Http\\Controllers\\IndexController@show_ping_table"); // ajax
$app['router']->any('index/show_port_table', "App\\Http\\Controllers\\IndexController@show_port_table"); // ajax
$app['router']->get('admin/logout', "App\\Http\\Controllers\\AdminController@logout");