<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 6:20 PM
 */

namespace MobileShop\BLL\Services;

use MobileShop\BLL\Services\Implementation\MobileService;
use MobileShop\BLL\Services\Implementation\UserService;
use MobileShop\DAL\Repositories\DbService\Implementation\DbConnectionService;
use MobileShop\DAL\Repositories\DbService\Implementation\DbService;
use MobileShop\DAL\Repositories\Repository\Implementation\MobileDAL;
use MobileShop\DAL\Repositories\Repository\Implementation\UserDAL;
use MobileShop\Shared\Configs\DbConstants;

class MobileShopServices
{
    public $connectionString = "mysql:host=".DbConstants::SERVERNAME.";dbname=".DbConstants::DB_NAME;

    public function getMobileService() {
        return new MobileService(new MobileDAL($this->getDbService()));
    }

    public function getUserService() {
        return new UserService(new UserDAL($this->getDbService()));
    }

    private function getDbService() {
        return new DbService(new DbConnectionService($this->connectionString));
    }
}