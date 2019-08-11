<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:04 PM
 */

namespace MobileShop\BLL\Services\Interfaces;


use MobileShop\Shared\Models\Implementation\Mobile;

interface IMobileService
{
    public function get();
    public function remove($id);
    public function find($id);
    public function create(Mobile $mobile);
    public function update(Mobile $mobile);
}