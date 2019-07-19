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
 * Class IspEntity.
 *
 * @package Woisks\Contact\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:36
 */
class IspEntity extends Models
{
    /**
     * table.  2019/7/19 9:36.
     *
     * @var  string
     */
    protected $table = 'contact_isp';
    /**
     * fillable.  2019/7/19 9:36.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'isp_class_id',
        'ico_photo_id',
        'name',
        'status',
        'count'
    ];

    public $timestamps = false;
}