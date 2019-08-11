<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 5:52 PM
 */


namespace MobileShop\DAL\Repositories\Repository\Implementation;

use MobileShop\DAL\Repositories\DbService\Implementation\DbService;
use MobileShop\DAL\Repositories\Repository\Interfaces\IMobileDAL;
use MobileShop\Shared\Models\Implementation\Mobile;

class MobileDAL implements IMobileDAL
{
    private $_dbService;
    public function __construct(DbService $dbService)
    {
        if (empty($dbService)) {
            throw new \InvalidArgumentException("DbService cannot be empty");
        }
        $this->_dbService = $dbService;
    }

    public function get()
    {
        $sql = "SELECT * FROM Mobile";
        $this->_dbService->query($sql);
        return $this->_dbService->getAllRows();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM Mobile WHERE Id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getSingleRow();
    }

    public function update(Mobile $mobile)
    {
        $sql = "UPDATE Mobile SET Name=:name, Price=:price WHERE id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $mobile->id);
        $this->_dbService->bind(":name", $mobile->name);
        $this->_dbService->bind(":price", $mobile->price);
        $this->_dbService->execute();
    }

    public function create(Mobile $mobile)
    {
        $sql = "INSERT INTO Mobile (Name, Price) VALUES (:name, :price)";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":name", $mobile->name);
        $this->_dbService->bind(":price", $mobile->price);
        $this->_dbService->execute();
    }

    public function remove($id)
    {
        $sql = "DELETE FROM Mobile WHERE id = :id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getRowCount() > 0;
    }
}