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


use Woisks\Contact\Models\Entity\UserEntity;

/**
 * Class UserRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author Maple Grove  <bolelin@126.com> 2019/8/4 11:39
 */
class UserRepository
{
    /**
     * model.  2019/8/4 11:39.
     *
     * @var static UserEntity
     */
    private static $model;

    /**
     * UserRepository constructor. 2019/8/4 11:39.
     *
     * @param UserEntity $user
     *
     * @return void
     */
    public function __construct(UserEntity $user)
    {
        self::$model = $user;
    }

    /**
     * incrementU. 2019/8/4 11:39.
     *
     * @param $account_uid
     * @param $type
     *
     * @return mixed
     */
    public function incrementU($account_uid, $type)
    {
        $db = self::$model->firstOrCreate(['account_uid' => $account_uid, 'type' => $type], ['id' => create_numeric_id()]);
        $db->increment('count');
        return $db;
    }


}
