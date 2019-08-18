<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 7:18 PM
 */

use MobileShop\BLL\Services\MobileShopServices;
use MobileShop\BLL\Services\Implementation\MobileService\MobileShopService;
use MobileShop\Shared\Models\Implementation\User;
use MobileShop\API\Controllers\BaseController;

class Users extends BaseController
{
    private $_userService;

    public function __construct(MobileShopServices $services)
    {
        if (empty($services)) {
            throw new \InvalidArgumentException("Services cannot be empty");
        }

        $this->_userService = $services->getUserService();
    }

    public function get() {
        $this->httpGet();
        $userList = $this->_userService->get();
        echo json_encode($userList);
    }

    public function getById($id) {
        $this->httpGet();
        $user = $this->_userService->find($id);
        echo json_encode($user);
    }

    public function post($userData) {
        $this->httpPost();
        $user = new User($userData->name, $userData->email);
        $this->_userService->create($user);
        echo json_encode($user);
    }

    public function put($id, $userData) {
        $this->httpPut();
        $user = new User($userData->name, $userData->email, $id);
        $this->_userService->update($user);
        echo json_encode($user);
    }

    public function delete($id) {
        $this->httpDelete();
        $user = $this->_userService->find($id);
        $isDeleted = $this->_userService->remove($id);
        if (!$isDeleted) {
            echo false;
        } else {
            echo json_encode($user);
        }
    }
}