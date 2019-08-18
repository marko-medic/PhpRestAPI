<?php

/**
 * Description of Core
 *
 * @author I5
 */

namespace MobileShop\Root\ApplicationConfig;
use MobileShop\BLL\Services\MobileShopServices;
class Core {

    private $_currentController = "Mobiles";
    private $_currentMethod = "get";
    private $_passedArgs = [];

    function __construct() {

        $urlList = $this->getUrl();
        if (!in_array("api", $urlList)) {
            die("You must set api in url path");
        }
        unset($urlList[0]);
        $baseUrl = dirname(dirname(dirname(__FILE__)))."/API/MobileShop.API.Controllers";
        if (isset($urlList[1])) {
            $fileName = ucwords($urlList[1]);
            if (file_exists("$baseUrl/{$fileName}.php")) {
                $this->_currentController = $fileName;
                unset($urlList[1]);
            }
        }
        require_once "$baseUrl/{$this->_currentController}.php";
        $this->_currentController = new $this->_currentController(new MobileShopServices());

        if (isset($urlList[2])) {
            if (method_exists($this->_currentController, $urlList[2])) {
                $this->_currentMethod = $urlList[2];
                unset($urlList[2]);
            }
        }

         if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->_passedArgs = [json_decode(file_get_contents("php://input"))];
        } else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
            $this->_passedArgs = $urlList ? [$urlList[3], json_decode(file_get_contents("php://input"))] : die("You must set parameters for put method");
        } else {
            $this->_passedArgs = $urlList ? array_values($urlList) : [];
        }
        call_user_func_array([$this->_currentController, $this->_currentMethod], $this->_passedArgs);
    }

    function getUrl() {
        if ($url = filter_input(INPUT_GET, "url")) {
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, "/");
            $url = explode("/", $url);
            return $url;
        }
    }

}
