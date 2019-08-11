<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 5:52 PM
 */


namespace MobileShop\DAL\Repositories\Repository\Implementation;

use MobileShop\DAL\Repositories\DbService\Implementation\DbService;
use MobileShop\DAL\Repositories\Repository\Interfaces\IUserDAL;
use MobileShop\Shared\Models\Implementation\User;

class UserDAL implements IUserDAL
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
        $sql = "SELECT * FROM User";
        $this->_dbService->query($sql);
        return $this->_dbService->getAllRows();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM User WHERE Id = :id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getSingleRow();
    }

    public function update(User $user)
    {
        $sql = "UPDATE User SET Name=:name, Email=:email WHERE Id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $user->id);
        $this->_dbService->bind(":name", $user->name);
        $this->_dbService->bind(":email", $user->email);
        $this->_dbService->execute();
    }

    public function create(User $user)
    {
        $sql = "INSERT INTO User (Name, Email) VALUES (:name, :email)";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":name", $user->name);
        $this->_dbService->bind(":email", $user->email);
        $this->_dbService->execute();
    }

    public function remove($id)
    {
        $sql = "DELETE FROM User WHERE Id=:id";
        $this->_dbService->query($sql);
        $this->_dbService->bind(":id", $id);
        return $this->_dbService->getRowCount() > 0;
    }
}