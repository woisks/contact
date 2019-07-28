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
     * model.  2019/7/28 9:55.
     *
     * @var static TypeEntity
     */
    private static $model;


    /**
     * TypeRepository constructor. 2019/7/28 9:55.
     *
     * @param TypeEntity $count
     *
     * @return void
     */
    public function __construct(TypeEntity $count)
    {
        self::$model = $count;
    }

    /**
     * first. 2019/7/28 9:55.
     *
     * @param $type
     *
     * @return mixed
     */
    public function first($type)
    {
        return self::$model->where('type', $type)->first();
    }

    /**
     * decrement. 2019/7/28 9:55.
     *
     * @param $type_name
     *
     * @return mixed
     */
    public function decrement($type_name)
    {
        return self::$model->where('type', $type_name)->decrement('count');
    }

}
