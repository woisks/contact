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
     * model.  2019/7/28 9:59.
     *
     * @var static IspEntity
     */
    private static $model;


    /**
     * IspRepository constructor. 2019/7/28 9:59.
     *
     * @param IspEntity $isp
     *
     * @return void
     */
    public function __construct(IspEntity $isp)
    {
        self::$model = $isp;
    }

    /**
     * find. 2019/7/28 9:59.
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return self::$model->find($id);
    }

    /**
     * all. 2019/7/28 9:59.
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection|IspEntity[]|IspRepository[]
     */
    public function all()
    {
        return self::$model->all();
    }

    /**
     * decrement. 2019/7/28 9:59.
     *
     * @param $isp_id
     *
     * @return mixed
     */
    public function decrement($isp_id)
    {
        return self::$model->where('id', $isp_id)->decrement('count');
    }

}
