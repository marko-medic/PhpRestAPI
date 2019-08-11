<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:15 PM
 */

namespace MobileShop\BLL\Services\Interfaces;


use MobileShop\Shared\Models\Implementation\User;

interface IUserService
{
    public function get();
    public function remove($id);
    public function find($id);
    public function create(User $user);
    public function update(User $user);
}