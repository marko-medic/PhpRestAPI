<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 7:18 PM
 */

use MobileShop\BLL\Services\MobileShopServices;
use MobileShop\BLL\Services\Implementation\MobileService\MobileShopService;
use MobileShop\Shared\Models\Implementation\Mobile;
use MobileShop\API\Controllers\BaseController;

class Mobiles extends BaseController
{
    private $_mobileService;

    public function __construct(MobileShopServices $services)
    {
        if (empty($services)) {
            throw new \InvalidArgumentException("Services cannot be empty");
        }
        $this->_mobileService = $services->getMobileService();
    }

    public function get() {
        $this->httpGet();
        $mobileList = $this->_mobileService->get();
        echo json_encode($mobileList);
    }

    public function getById($id) {
        $this->httpGet();
        $mobile = $this->_mobileService->find($id);
        echo json_encode($mobile);
    }

    public function post($mobileData) {
        $this->httpPost();
        $mobile = new Mobile($mobileData->name, $mobileData->price);
        $this->_mobileService->create($mobile);
        echo json_encode($mobile);
    }

    public function put($id, $mobileData) {
        $this->httpPut();
        $mobile = new Mobile($mobileData->name, $mobileData->price, $id);
        $this->_mobileService->update($mobile);
        echo json_encode($mobile);
    }

    public function delete($id) {
        $this->httpDelete();
        $mobile = $this->_mobileService->find($id);
        $isDeleted = $this->_mobileService->remove($id);
        if (!$isDeleted) {
            echo false;
        } else {
            echo json_encode($mobile);
        }
    }
}