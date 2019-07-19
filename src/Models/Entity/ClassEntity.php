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

namespace Woisks\Contact\Models\Entity;


/**
 * Class ClassEntity.
 *
 * @package Woisks\Contact\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:21
 */
class ClassEntity extends Models
{
    /**
     * table.  2019/7/19 9:21.
     *
     * @var  string
     */
    protected $table = 'contact_isp_class';
    /**
     * fillable.  2019/7/19 9:21.
     *
     * @var  array
     */
    protected $fillable   = [
        'id',
        'name',
        'count'
    ];
    public    $timestamps = false;
}