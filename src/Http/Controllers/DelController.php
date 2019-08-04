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


use Illuminate\Http\JsonResponse;
use Woisks\Contact\Models\Repository\ContactRepository;
use Woisks\Contact\Models\Repository\IspRepository;
use Woisks\Contact\Models\Repository\TypeRepository;
use Woisks\Jwt\Services\JwtService;

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
     * contactRepo.  2019/7/27 22:29.
     *
     * @var  ContactRepository
     */
    private $contactRepo;
    /**
     * ispRepo.  2019/7/28 9:50.
     *
     * @var  IspRepository
     */
    private $ispRepo;
    /**
     * typeRepo.  2019/7/28 9:50.
     *
     * @var  TypeRepository
     */
    private $typeRepo;


    /**
     * DelController constructor. 2019/7/28 9:50.
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
     * del. 2019/7/27 22:29.
     *
     * @param $id
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function del($id)
    {
        if (strlen($id) != 18 && strlen($id) != 19 && !is_int($id)) {
            return res(422, 'param id error');
        }

        try {
            \DB::beginTransaction();

            if (!$contact = $this->contactRepo->find($id)) {
                //效验是否存在
                return res(404, 'contact info not exists');
            }

            if ($contact->account_uid != JwtService::jwt_account_uid()) {
                //效验权限归属
                return res(404, 'your data not exists ');
            }

            $this->typeRepo->decrement($contact->type);
            $this->ispRepo->decrement($contact->isp);
            $contact->delete();

        } catch (\Throwable $e) {

            \DB::rollBack();
            return res(500, 'Come back later');
        }

        \DB::commit();
        return res(200, 'success');
    }
}
