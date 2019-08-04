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
     * contactRepo.  2019/7/27 22:12.
     *
     * @var  ContactRepository
     */
    private $contactRepo;

    /**
     * GetController constructor. 2019/7/27 22:12.
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
     * get. 2019/7/27 22:17.
     *
     * @param $type
     * @param $numeric
     *
     * @return JsonResponse
     */
    public function get($type, $numeric)
    {
        $contact = $this->contactRepo->whereTypeNumeric($type, $numeric);

        if ($contact->isEmpty()) {
            return res(404, 'param error or not exists');
        }

        return res(200, 'success', $contact);
    }
}
