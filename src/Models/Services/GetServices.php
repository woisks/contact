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


use Woisks\Contact\Models\Repository\ContactRepository;
use Woisks\Contact\Models\Repository\PassportRepository;

/**
 * Class GetServices.
 *
 * @package Woisks\Contact\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 20:35
 */
class GetServices
{
    /**
     * contactRepo.  2019/7/19 20:35.
     *
     * @var  \Woisks\Contact\Models\Repository\ContactRepository
     */
    private $contactRepo;
    /**
     * passportRepo.  2019/7/19 20:35.
     *
     * @var  \Woisks\Contact\Models\Repository\PassportRepository
     */
    private $passportRepo;

    /**
     * GetServices constructor. 2019/7/19 20:35.
     *
     * @param \Woisks\Contact\Models\Repository\ContactRepository  $contactRepo
     * @param \Woisks\Contact\Models\Repository\PassportRepository $passportRepo
     *
     * @return void
     */
    public function __construct(ContactRepository $contactRepo, PassportRepository $passportRepo)
    {
        $this->passportRepo = $passportRepo;
        $this->contactRepo = $contactRepo;
    }

    /**
     * contact. 2019/7/19 20:35.
     *
     * @param $type
     * @param $numeric
     *
     * @return mixed
     */
    public function contact($type, $numeric)
    {
        return $this->contactRepo->whereTypeNumeric($type, $numeric);
    }

    /**
     * passport. 2019/7/19 20:35.
     *
     * @param $passport_id
     *
     * @return mixed
     */
    public function passport($passport_id)
    {
        return $this->passportRepo->find($passport_id);
    }

}