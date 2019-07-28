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
use Woisks\Contact\Models\Repository\IspRepository;

/**
 * Class IspController.
 *
 * @package Woisks\Contact\Http\Controllers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/26 9:47
 */
class IspController extends BaseController
{

    /**
     * ispRepo.  2019/7/27 22:15.
     *
     * @var  IspRepository
     */
    private $ispRepo;


    /**
     * IspController constructor. 2019/7/27 22:15.
     *
     * @param IspRepository $ispRepo
     *
     * @return void
     */
    public function __construct(IspRepository $ispRepo)
    {
        $this->ispRepo = $ispRepo;
    }


    /**
     * get. 2019/7/27 22:15.
     *
     *
     * @return JsonResponse
     */
    public function get()
    {
        return res(200, 'success', $this->ispRepo->all());
    }
}
