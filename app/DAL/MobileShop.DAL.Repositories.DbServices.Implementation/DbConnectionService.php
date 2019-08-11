<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:32 PM
 */

namespace MobileShop\DAL\Repositories\DbService\Implementation;


use MobileShop\DAL\Repositories\DbService\Interfaces\IDbConnectionService;

class DbConnectionService implements IDbConnectionService
{
    private $_connectionString;

    public function __construct(string $connectionString)
    {
        if (empty($connectionString)) {
           throw new \InvalidArgumentException("Connection string cannot be null or empty string");
        }
        $this->_connectionString = $connectionString;
    }

    public function getConnectionString()
    {
        return $this->_connectionString;
    }
}