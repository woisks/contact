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


use Woisks\Contact\Models\Repository\ContactRepository;

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
     * DelController constructor. 2019/7/27 22:29.
     *
     * @param ContactRepository $contactRepo
     *
     * @return void
     */
    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }


    /**
     * del. 2019/7/27 22:29.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function del($id)
    {
        if (strlen($id) != 18 && strlen($id) != 19 && !is_int($id)) {
            return res(422, 'param id error');
        }
        if (!$this->contactRepo->destroy($id)) {
            return res(404, 'contact info not exists');
        }
        return res(200, 'success');
    }
}
