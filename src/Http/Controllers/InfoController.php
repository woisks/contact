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

namespace Woisks\Contact\Http\Controllers;


use Woisks\Contact\Models\Services\GetInfoServices;

/**
 * Class InfoController.
 *
 * @package Woisks\Contact\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/26 9:47
 */
class InfoController extends BaseController
{
    /**
     * infoServices.  2019/7/26 9:47.
     *
     * @var  \Woisks\Contact\Models\Services\GetInfoServices
     */
    private $infoServices;

    /**
     * InfoController constructor. 2019/7/26 9:47.
     *
     * @param \Woisks\Contact\Models\Services\GetInfoServices $infoServices
     *
     * @return void
     */
    public function __construct(GetInfoServices $infoServices)
    {
        $this->infoServices = $infoServices;
    }


    /**
     * get. 2019/7/26 9:47.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $isp = $this->infoServices->isp();
        $class = $this->infoServices->class();

        $data = [];
        foreach ($class as $v) {

            foreach ($isp as $item) {
                if ($v->id == $item->isp_class_id) {
                    $data[$v->name][] = $item;
                }
            }
        }

        return res(200, 'success', $data);
    }
}