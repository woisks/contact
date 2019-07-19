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
use Woisks\Contact\Http\Requests\CreateContactRequest;
use Woisks\Contact\Models\Services\CreateContactServices;

/**
 * Class CreateController.
 *
 * @package Woisks\Contact\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 12:07
 */
class CreateController extends BaseController
{
    /**
     * contactServices.  2019/7/19 12:07.
     *
     * @var  \Woisks\Contact\Models\Services\CreateContactServices
     */
    private $contactServices;

    /**
     * CreateController constructor. 2019/7/19 12:07.
     *
     * @param \Woisks\Contact\Models\Services\CreateContactServices $contactServices
     *
     * @return void
     */
    public function __construct(CreateContactServices $contactServices)
    {
        $this->contactServices = $contactServices;
    }


    /**
     * create. 2019/7/19 12:08.
     *
     * @param \Woisks\Contact\Http\Requests\CreateContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateContactRequest $request)
    {
        return $this->services(
            $request->input('type'),
            $request->input('numeric'),
            $request->input('isp_id'),
            $request->input('passport'),
            $request->input('title', ''),
            $request->input('descript', '')
        );
    }


    /**
     * services. 2019/7/19 12:07.
     *
     * @param $type
     * @param $numeric
     * @param $isp_id
     * @param $passport
     * @param $title
     * @param $descript
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function services($type, $numeric, $isp_id, $passport, $title, $descript)
    {
        $count = $this->contactServices->count($type);
        if (!$count) {
            return res(422, 'type param error');
        }

        try {
            DB::beginTransaction();

            $count->increment('count');

            $isp = $this->contactServices->isp($isp_id);
            $isp->increment('count');
            $this->contactServices->class($isp->isp_class_id)->increment('count');
            $passport_db = $this->contactServices->passport($passport);
            $contact_db = $this->contactServices->contact($type, $numeric, $isp_id, $passport_db->id, $title, $descript, $isp->name);

        } catch (Throwable $e) {
            DB::rollBack();

            return res(422, 'param error');
        }

        DB::commit();

        return res(200, 'success', [
            'id'       => $contact_db->id,
            'alias'    => $isp->name,
            'title'    => $title,
            'passport' => $passport
        ]);
    }
}