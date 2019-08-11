<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:25 PM
 */

namespace MobileShop\DAL\Repositories\DbService\Interfaces;


interface IDbConnectionService
{
    public function getConnectionString();
}