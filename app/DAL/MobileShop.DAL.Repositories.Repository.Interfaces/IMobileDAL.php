<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 5:48 PM
 */

namespace MobileShop\DAL\Repositories\Repository\Interfaces;


use MobileShop\Shared\Models\Implementation\Mobile;

interface IMobileDAL
{
    public function get();
    public function find($id);
    public function update(Mobile $mobile);
    public function create(Mobile $mobile);
    public function remove($id);
}