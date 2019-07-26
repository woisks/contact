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

namespace Woisks\Contact\Models\Services;


use Woisks\Contact\Models\Repository\ClassRepository;
use Woisks\Contact\Models\Repository\IspRepository;

/**
 * Class GetInfoServices.
 *
 * @package Woisks\Contact\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/26 9:47
 */
class GetInfoServices
{
    /**
     * classRepo.  2019/7/26 9:47.
     *
     * @var  \Woisks\Contact\Models\Repository\ClassRepository
     */
    private $classRepo;
    /**
     * ispRepo.  2019/7/26 9:47.
     *
     * @var  \Woisks\Contact\Models\Repository\IspRepository
     */
    private $ispRepo;

    /**
     * GetInfoServices constructor. 2019/7/26 9:47.
     *
     * @param \Woisks\Contact\Models\Repository\ClassRepository $classRepo
     * @param \Woisks\Contact\Models\Repository\IspRepository   $ispRepo
     *
     * @return void
     */
    public function __construct(ClassRepository $classRepo, IspRepository $ispRepo)
    {
        $this->classRepo = $classRepo;
        $this->ispRepo = $ispRepo;
    }


    /**
     * class. 2019/7/26 9:47.
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Woisks\Contact\Models\Entity\ClassEntity[]|\Woisks\Contact\Models\Repository\ClassRepository[]
     */
    public function class()
    {
        return $this->classRepo->all();
    }

    /**
     * isp. 2019/7/26 9:47.
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Woisks\Contact\Models\Repository\IspRepository[]
     */
    public function isp()
    {
        return $this->ispRepo->all();
    }
}