<?php
/**
 * Created by PhpStorm.
 * User: i5
 * Date: 8/10/2019
 * Time: 7:17 PM
 */

namespace MobileShop\API\Controllers;


abstract class BaseController
{
    public function httpGet() {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            die();
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
    }

    public function httpPost() {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die();
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Request-with");
    }

    public function httpDelete() {
        if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
            die();
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: DELETE");
        header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Request-with");
    }

    public function httpPut() {
        if ($_SERVER["REQUEST_METHOD"] !== "PUT") {
            die();
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
    }

}