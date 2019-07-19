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


use Woisks\Contact\Models\Entity\PassportEntity;

/**
 * Class PassportRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:49
 */
class PassportRepository
{
    /**
     * model.  2019/7/19 9:49.
     *
     * @var static \Woisks\Contact\Models\Entity\PassportEntity
     */
    private static $model;

    /**
     * PassportRepository constructor. 2019/7/19 9:49.
     *
     * @param \Woisks\Contact\Models\Entity\PassportEntity $passport
     *
     * @return void
     */
    public function __construct(PassportEntity $passport)
    {
        self::$model = $passport;
    }

    /**
     * firstOrCreated. 2019/7/19 10:18.
     *
     * @param $passport
     *
     * @return mixed
     */
    public function firstOrCreated($passport)
    {
        $db = self::$model->firstOrCreate(['name' => $passport], ['id' => create_numeric_id()]);

        $db->increment('count');

        return $db;
    }

    /**
     * del. 2019/7/19 16:22.
     *
     * @param $passport_id
     *
     * @return mixed
     */
    public function del($passport_id)
    {
        return self::$model->where('id', $passport_id)->decrement('count');
    }

    /**
     * find. 2019/7/19 16:22.
     *
     * @param $passport_id
     *
     * @return mixed
     */
    public function find($passport_id)
    {
        return self::$model->find($passport_id);
    }
}