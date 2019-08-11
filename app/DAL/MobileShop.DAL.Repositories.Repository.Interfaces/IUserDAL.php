<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 5:51 PM
 */

namespace MobileShop\DAL\Repositories\Repository\Interfaces;


use MobileShop\Shared\Models\Implementation\User;

interface IUserDAL
{
    public function get();
    public function find($id);
    public function update(User $user);
    public function create(User $user);
    public function remove($id);
}