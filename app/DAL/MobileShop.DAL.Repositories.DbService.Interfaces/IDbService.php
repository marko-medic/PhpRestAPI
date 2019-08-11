<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 4:19 PM
 */

namespace MobileShop\DAL\Repositories\DbService\Interfaces;

interface IDbService
{
     public function query($sql);
     public function execute();
     public function bind($param, $value, $type = null);
     public function getAllRows();
     public function getSingleRow();
     public function getRowCount();
     public function getColumnCount();
}