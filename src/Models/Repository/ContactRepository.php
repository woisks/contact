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
     * model.  2019/7/27 22:24.
     *
     * @var static ContactEntity
     */
    private static $model;


    /**
     * ContactRepository constructor. 2019/7/27 22:24.
     *
     * @param ContactEntity $contact
     *
     * @return void
     */
    public function __construct(ContactEntity $contact)
    {
        self::$model = $contact;
    }


    /**
     * created. 2019/7/27 22:24.
     *
     * @param $account_uid
     * @param $type
     * @param $numeric
     * @param $isp
     * @param $passport
     * @param $title
     * @param $descript
     *
     * @return mixed
     */
    public function created($account_uid, $type, $numeric, $isp, $passport, $title, $descript)
    {
        return self::$model->create([
            'id'          => create_numeric_id(),
            'account_uid' => $account_uid,
            'type'        => $type,
            'numeric'     => $numeric,
            'isp'         => $isp,
            'passport'    => $passport,
            'title'       => $title,
            'descript'    => $descript
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
     * destroy. 2019/7/27 22:24.
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($id)
    {
        return self::$model->destroy($id);
    }

    /**
     * whereTypeNumeric. 2019/7/27 22:24.
     *
     * @param $type
     * @param $numeric
     *
     * @return mixed
     */
    public function whereTypeNumeric($type, $numeric)
    {
        return self::$model->where('numeric', $numeric)->where('type', $type)->get();
    }
}
