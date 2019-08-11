<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:09 PM
 */

namespace MobileShop\BLL\Services\Implementation;


use MobileShop\BLL\Services\Interfaces\IUserService;
use MobileShop\DAL\Repositories\Repository\Implementation\UserDAL;
use MobileShop\Shared\Models\Implementation\User;

class UserService implements IUserService
{
    private $_userDAL;

    public function __construct(UserDAL $userDAL)
    {
        if (empty($userDAL)) {
            throw new \InvalidArgumentException("UserDAL cannot be empty");
        }
        $this->_userDAL = $userDAL;
    }

    public function get()
    {
       return $this->_userDAL->get();
    }

    public function remove($id)
    {
        $this->validateId($id);
        return $this->_userDAL->remove($id);
    }

    public function find($id)
    {
        $this->validateId($id);
        $user = $this->_userDAL->find($id);
        return $user;
    }

    public function create(User $user)
    {
        $this->validateUser($user);
        $this->_userDAL->create($user);
    }

    public function update(User $user)
    {
        $this->validateUser($user);
        $this->validateId($user->id);
        $this->_userDAL->update($user);
    }

    private function validateId(int $id)
    {
        if (empty($id) || $id <= 0) {
            throw new \InvalidArgumentException("Id cannot be less than zero");
        }
    }

        private function validateUser(User $user) {
            if (empty($user)) {
                throw new \InvalidArgumentException("User cannot be empty");
            }

        }

}