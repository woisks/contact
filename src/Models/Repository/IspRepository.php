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

namespace Woisks\Contact\Models\Repository;


use Woisks\Contact\Models\Entity\IspEntity;

/**
 * Class IspRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:49
 */
class IspRepository
{
    /**
     * model.  2019/7/19 9:49.
     *
     * @var static \Woisks\Contact\Models\Entity\IspEntity
     */
    private static $model;

    /**
     * IspRepository constructor. 2019/7/19 9:49.
     *
     * @param \Woisks\Contact\Models\Entity\IspEntity $isp
     *
     * @return void
     */
    public function __construct(IspEntity $isp)
    {
        self::$model = $isp;
    }

    public function find($id)
    {
        return self::$model->find($id);
    }


}