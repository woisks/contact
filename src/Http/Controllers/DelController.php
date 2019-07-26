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


use DB;
use Throwable;
use Woisks\Contact\Models\Services\DelServices;

/**
 * Class DelController.
 *
 * @package Woisks\Contact\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/24 15:38
 */
class DelController extends BaseController
{
    /**
     * delContactServices.  2019/7/24 15:38.
     *
     * @var  \Woisks\Contact\Models\Services\DelServices
     */
    private $delContactServices;

    /**
     * DelController constructor. 2019/7/24 15:38.
     *
     * @param \Woisks\Contact\Models\Services\DelServices $delContactServices
     *
     * @return void
     */
    public function __construct(DelServices $delContactServices)
    {
        $this->delContactServices = $delContactServices;
    }

    /**
     * del. 2019/7/24 15:38.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function del($id)
    {
        if (strlen($id) != 18 && strlen($id) != 19 && !is_int($id)) {
            return res(422, 'param id error');
        }

        $contact = $this->delContactServices->contact($id);
        if (!$contact) {
            return res(404, 'contact id not exists');
        }
        try {
            DB::beginTransaction();

            $isp = $this->delContactServices->isp($contact->isp_id);

            $this->delContactServices->class($isp->isp_class_id);
            $isp->decrement('count');

            $this->delContactServices->count($contact->type);
            $this->delContactServices->passport($contact->passport_id);

            $contact->delete();
        } catch (Throwable $e) {
            DB::rollBack();

            return res(422, 'param error');
        }
        DB::commit();

        return res(200, 'success');
    }
}