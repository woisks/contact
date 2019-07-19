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

namespace Woisks\Contact\Http\Requests;


/**
 * Class GetContactRequest.
 *
 * @package Woisks\Contact\Http\Requests
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/7/19 10:06
 */
class GetContactRequest extends Requests
{
    /**
     * rules. 2019/7/19 10:06.
     *
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'    => 'required|string|max:20',
            'numeric' => 'required|numeric|digits_between:18,19'
        ];
    }

}