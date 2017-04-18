<?php
date_default_timezone_set('prc');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->get('/','personal@selecetData',function (){});
$app->get('city/{name}','getCity@getCity',function (){});