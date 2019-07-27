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


use Woisks\Contact\Models\Entity\TypeEntity;

/**
 * Class TypeRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:50
 */
class TypeRepository
{
    /**
     * model.  2019/7/19 9:50.
     *
     * @var static \Woisks\Contact\Models\Entity\TypeEntity
     */
    private static $model;

    /**
     * TypeRepository constructor. 2019/7/19 9:50.
     *
     * @param \Woisks\Contact\Models\Entity\TypeEntity $count
     *
     * @return void
     */
    public function __construct(TypeEntity $count)
    {
        self::$model = $count;
    }

    public function first($type)
    {
        return self::$model->where('type', $type)->first();
    }

    public function del($type_name)
    {
        return self::$model->where('type', $type_name)->decrement('count');
    }

}