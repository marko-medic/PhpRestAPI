<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:03 PM
 */

namespace MobileShop\BLL\Services\Implementation;


use MobileShop\BLL\Services\Interfaces\IMobileService;
use MobileShop\DAL\Repositories\Repository\Implementation\MobileDAL;
use MobileShop\Shared\Models\Implementation\Mobile;

class MobileService implements IMobileService
{
    private $_mobileDAL;
    public function __construct(MobileDAL $mobileDAL)
    {
        if (empty($mobileDAL)) {
            throw new \InvalidArgumentException("MobileDAL cannot be empty");
        }
        $this->_mobileDAL = $mobileDAL;
    }

    public function get()
    {
       return $this->_mobileDAL->get();
    }

    public function find($id)
    {
        $this->validateId($id);
        return $this->_mobileDAL->find($id);
    }

    public function remove($id)
    {
        $this->validateId($id);
        return $this->_mobileDAL->remove($id);
    }

    public function create(Mobile $mobile)
    {
        $this->validateMobile($mobile);
        return $this->_mobileDAL->create($mobile);
    }

    public function update(Mobile $mobile)
    {
        $this->validateMobile($mobile);
        $this->validateId($mobile->id);
        return $this->_mobileDAL->update($mobile);
    }

    private function validateId(int $id) {
        if (empty($id) || $id <= 0) {
            throw new \InvalidArgumentException("Id cannot be less than zero");
        }
    }

    private function validateMobile(Mobile $mobile) {
        if (empty($mobile)) {
            throw new \InvalidArgumentException("Mobile cannot be empty");
        }

    }
}