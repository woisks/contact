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


use Woisks\Contact\Models\Entity\ContactEntity;
use Woisks\Jwt\Services\JwtService;

/**
 * Class ContactRepository.
 *
 * @package Woisks\Contact\Models\Repository
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 9:48
 */
class ContactRepository
{
    /**
     * model.  2019/7/19 9:48.
     *
     * @var static \Woisks\Contact\Models\Entity\ContactEntity
     */
    private static $model;

    /**
     * ContactRepository constructor. 2019/7/19 9:48.
     *
     * @param \Woisks\Contact\Models\Entity\ContactEntity $contact
     *
     * @return void
     */
    public function __construct(ContactEntity $contact)
    {
        self::$model = $contact;
    }

    /**
     * created. 2019/7/19 10:18.
     *
     * @param $type
     * @param $numeric
     * @param $isp_id
     * @param $passport_id
     * @param $title
     * @param $descript
     * @param $alias
     *
     * @return mixed
     */
    public function created($type, $numeric, $isp_id, $passport_id, $title, $descript, $alias)
    {
        return self::$model->create([
            'id'           => create_numeric_id(),
            'account_uid'  => JwtService::jwt_account_uid(),
            'type'         => $type,
            'type_numeric' => $numeric,
            'isp_id'       => $isp_id,
            'passport_id'  => $passport_id,
            'title'        => $title,
            'desript'      => $descript,
            'alias'        => $alias
        ]);
    }

    /**
     * find. 2019/7/19 16:22.
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
     * whereTypeNumeric. 2019/7/19 16:22.
     *
     * @param $type
     * @param $numeric
     *
     * @return mixed
     */
    public function whereTypeNumeric($type, $numeric)
    {
        return self::$model->where('type', $type)->where('type_numeric', $numeric)->get();
    }
}