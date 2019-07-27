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
use Woisks\Contact\Http\Requests\CreateRequest;
use Woisks\Contact\Models\Repository\ContactRepository;
use Woisks\Contact\Models\Repository\IspRepository;
use Woisks\Contact\Models\Repository\TypeRepository;
use Woisks\Jwt\Services\JwtService;

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
     * contactRepo.  2019/7/27 21:56.
     *
     * @var  ContactRepository
     */
    private $contactRepo;

    /**
     * typeRepo.  2019/7/27 21:56.
     *
     * @var  TypeRepository
     */
    private $typeRepo;

    /**
     * ispRepo.  2019/7/27 21:56.
     *
     * @var  IspRepository
     */
    private $ispRepo;


    /**
     * CreateController constructor. 2019/7/27 21:56.
     *
     * @param ContactRepository $contactRepo
     * @param IspRepository $ispRepo
     * @param TypeRepository $typeRepo
     *
     * @return void
     */
    public function __construct(ContactRepository $contactRepo, IspRepository $ispRepo, TypeRepository $typeRepo)
    {
        $this->contactRepo = $contactRepo;
        $this->ispRepo     = $ispRepo;
        $this->typeRepo    = $typeRepo;
    }


    /**
     * create. 2019/7/27 21:58.
     *
     * @param CreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateRequest $request)
    {
        return $this->services(
            $request->input('type'),
            $request->input('numeric'),
            $request->input('isp'),
            $request->input('passport'),
            $request->input('title', ''),
            $request->input('descript', '')
        );
    }


    /**
     * services. 2019/7/27 21:56.
     *
     * @param $type
     * @param $numeric
     * @param $isp_id
     * @param $passport
     * @param $title
     * @param $descript
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function services($type, $numeric, $isp_id, $passport, $title, $descript)
    {
        if (!$type_db = $this->typeRepo->first($type)) {
            return res(404, 'param type error or not exists');
        }

        if (!$isp_db = $this->ispRepo->find($isp_id)) {
            return res(404, 'param isp error or not exists');
        }

        try {
            DB::beginTransaction();

            $type_db->increment('count');


            $isp_db->increment('count');

            $contact_db = $this->contactRepo->created(JwtService::jwt_account_uid(), $type, $numeric, $isp_db->name, $passport, $title, $descript);

        } catch (Throwable $e) {
            DB::rollBack();
            return res(422, 'param error');
        }

        DB::commit();

        return res(200, 'success', [
            'id'       => $contact_db->id,
            'alias'    => $isp_db->name,
            'passport' => $passport,
            'title'    => $title,
            'descript' => $descript
        ]);
    }
}
