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
 * Class ContactEntity.
 *
 * @package Woisks\Contact\Models\Entity
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:39
 */
class ContactEntity extends Models
{
    /**
     * table.  2019/7/19 9:39.
     *
     * @var  string
     */
    protected $table = 'contact';
    /**
     * fillable.  2019/7/19 9:39.
     *
     * @var  array
     */
    protected $fillable = [
        'id',
        'account_uid',
        'type',
        'type_numeric',
        'isp_id',
        'passport_id',
        'title',
        'descript',
        'created_at',
        'updated_at',
        'status',
        'alias'
    ];
    /**
     * hidden.  2019/7/19 16:51.
     *
     * @var  array
     */
    protected $hidden = [
        'status',
        'account_uid',
        'isp_id'
    ];
}