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
 * Class CountEntity.
 *
 * @package Woisks\Contact\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:43
 */
class CountEntity extends Models
{
    /**
     * table.  2019/7/19 9:43.
     *
     * @var  string
     */
    protected $table = 'contact_type_count';
    /**
     * fillable.  2019/7/19 9:43.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'name',
        'count',
        'status',
        'readme'
    ];

    public $timestamps = false;
}