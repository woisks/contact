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
use Woisks\Contact\Models\Repository\ContactRepository;
use Woisks\Contact\Models\Repository\CountRepository;
use Woisks\Contact\Models\Repository\IspRepository;
use Woisks\Contact\Models\Repository\PassportRepository;

/**
 * Class CreateServices.
 *
 * @package Woisks\Contact\Models\Services
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:58
 */
class CreateServices
{
    /**
     * contactRepo.  2019/7/19 9:58.
     *
     * @var  \Woisks\Contact\Models\Repository\ContactRepository
     */
    private $contactRepo;
    /**
     * passportRepo.  2019/7/19 9:58.
     *
     * @var  \Woisks\Contact\Models\Repository\PassportRepository
     */
    private $passportRepo;

    /**
     * ispRepo.  2019/7/19 12:09.
     *
     * @var  \Woisks\Contact\Models\Repository\IspRepository
     */
    private $ispRepo;
    /**
     * countRepo.  2019/7/19 12:09.
     *
     * @var  \Woisks\Contact\Models\Repository\CountRepository
     */
    private $countRepo;
    /**
     * classRepo.  2019/7/19 12:09.
     *
     * @var  \Woisks\Contact\Models\Repository\ClassRepository
     */
    private $classRepo;


    /**
     * CreateServices constructor. 2019/7/19 12:09.
     *
     * @param \Woisks\Contact\Models\Repository\ContactRepository  $contactRepo
     * @param \Woisks\Contact\Models\Repository\PassportRepository $passportRepo
     * @param \Woisks\Contact\Models\Repository\IspRepository      $ispRepo
     * @param \Woisks\Contact\Models\Repository\ClassRepository    $classRepo
     * @param \Woisks\Contact\Models\Repository\CountRepository    $countRepo
     *
     * @return void
     */
    public function __construct(ContactRepository $contactRepo,
                                PassportRepository $passportRepo,
                                IspRepository $ispRepo,
                                ClassRepository $classRepo,
                                CountRepository $countRepo)
    {
        $this->contactRepo = $contactRepo;
        $this->passportRepo = $passportRepo;
        $this->ispRepo = $ispRepo;
        $this->classRepo = $classRepo;
        $this->countRepo = $countRepo;
    }

    /**
     * count. 2019/7/19 12:09.
     *
     * @param $type
     *
     * @return mixed
     */
    public function count($type)
    {
        return $this->countRepo->first($type);
    }

    /**
     * contact. 2019/7/19 12:09.
     *
     * @param $type
     * @param $numeric
     * @param $isp_id
     * @param $passport_id
     * @param $title
     * @param $descript
     * @param $alias
     *
     * @return mixed
     */
    public function contact($type, $numeric, $isp_id, $passport_id, $title, $descript, $alias)
    {
        return $this->contactRepo->created($type, $numeric, $isp_id, $passport_id, $title, $descript, $alias);
    }

    /**
     * passport. 2019/7/19 12:09.
     *
     * @param $passport
     *
     * @return mixed
     */
    public function passport($passport)
    {
        return $this->passportRepo->firstOrCreated($passport);
    }

    /**
     * isp. 2019/7/19 12:09.
     *
     * @param $isp_id
     *
     * @return mixed
     */
    public function isp($isp_id)
    {
        return $this->ispRepo->find($isp_id);
    }

    /**
     * class. 2019/7/19 12:09.
     *
     * @param $class_id
     *
     * @return mixed
     */
    public function class($class_id)
    {
        return $this->classRepo->find($class_id);
    }

}