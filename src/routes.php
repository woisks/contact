<?php

declare(strict_types=1);

/*
 * +----------------------------------------------------------------------+
 * |                   At all timesI love the moment                      |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2019 www.Woisk.com All rights reserved.                |
 * +----------------------------------------------------------------------+
 * |  Author:  Maple Grove  <bolelin@126.com>   QQ:364956690   286013629  |
 * +----------------------------------------------------------------------+
 */


Route::prefix('contact')
     ->namespace('Woisks\Contact\Http\Controllers')
     ->group(function () {

         Route::post('/', 'CreateController@create');
         Route::post('del/{id}', 'DelController@del')->where(['id' => '[0-9]+']);
         Route::get('/', 'GetController@get');
         Route::get('info', 'InfoController@get');

     });