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

         Route::any('create', 'CreateController@create');
         Route::any('del', 'DelController@del');
         Route::any('get', 'GetController@get');

     });