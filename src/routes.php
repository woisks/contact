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
    ->middleware('throttle:60,1')
    ->namespace('Woisks\Contact\Http\Controllers')
    ->group(function () {

        //获取模块ID的联系信息
        Route::get('/{type}/{numeric}', 'GetController@get')->where(['type' => '[a-z]+', 'numeric' => '[0-9]+']);

        //获取服务提供商信息
        Route::get('isp', 'IspController@get');

        Route::middleware('token')->group(function () {
            Route::post('/', 'CreateController@create');
            Route::post('del/{id}', 'DelController@del')->where(['id' => '[0-9]+']);
        });
    });
