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
use Woisks\Contact\Http\Requests\DelContactRequest;
use Woisks\Contact\Models\Services\DelContactServices;

class DelController extends BaseController
{
    private $delContactServices;

    public function __construct(DelContactServices $delContactServices)
    {
        $this->delContactServices = $delContactServices;
    }

    public function del(DelContactRequest $request)
    {
        $id = $request->input('id');

        $contact = $this->delContactServices->contact($id);
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