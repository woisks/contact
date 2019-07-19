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


use Woisks\Contact\Http\Requests\GetContactRequest;
use Woisks\Contact\Models\Services\GetServices;

/**
 * Class GetController.
 *
 * @package Woisks\Contact\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 20:31
 */
class GetController extends BaseController
{
    /**
     * getServices.  2019/7/19 20:31.
     *
     * @var  \Woisks\Contact\Models\Services\GetServices
     */
    private $getServices;

    /**
     * GetController constructor. 2019/7/19 20:31.
     *
     * @param \Woisks\Contact\Models\Services\GetServices $getServices
     *
     * @return void
     */
    public function __construct(GetServices $getServices)
    {
        $this->getServices = $getServices;
    }


    /**
     * get. 2019/7/19 20:31.
     *
     * @param \Woisks\Contact\Http\Requests\GetContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(GetContactRequest $request)
    {
        $type = $request->input('type');
        $numeric = $request->input('numeric');

        $contact = $this->getServices->contact($type, $numeric);

        $passport_id = [];

        foreach ($contact as $v) {
            $passport_id[] = $v->passport_id;
        }


        $passport = $this->getServices->passport($passport_id);

        $data = [];
        foreach ($contact as $k => $v) {

            foreach ($passport as $item) {

                if ($item->id == $v->passport_id) {
                    $data[$k]['id'] = $v->id;
                    $data[$k]['type'] = $v->type;
                    $data[$k]['alias'] = $v->alias;
                    $data[$k]['title'] = $v->title;
                    $data[$k]['passport'] = $item->name;
                }
            }
        }
        if (empty($data)) {
            return res(404, 'not exists');
        }

        return res(200, 'success', $data);
    }
}