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


use Woisks\Contact\Models\Entity\ClassEntity;

/**
 * Class IspRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:49
 */
class ClassRepository
{
    /**
     * model.  2019/7/19 9:49.
     *
     * @var static \Woisks\Contact\Models\Entity\ClassEntity
     */
    private static $model;

    /**
     * IspRepository constructor. 2019/7/19 9:49.
     *
     * @param \Woisks\Contact\Models\Entity\ClassEntity $class
     *
     * @return void
     */
    public function __construct(ClassEntity $class)
    {
        self::$model = $class;
    }

    public function find($class_id)
    {
        return self::$model->find($class_id);
    }

    public function del($class_id)
    {
        return self::$model->where('id', $class_id)->decrement('count');
    }
}