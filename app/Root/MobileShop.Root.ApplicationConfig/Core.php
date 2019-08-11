<?php

/**
 * Description of Core
 *
 * @author I5
 */

namespace MobileShop\Root\ApplicationConfig;
use MobileShop\Shared\Services\MobileShopServices;
class Core {

    protected $currentController = "Mobiles";
    protected $currentMethod = "get";
    protected $passedArgs = [];

    function __construct() {

        $urlList = $this->getUrl();
        if (!in_array("api", $urlList)) {
            die();
        }
        unset($urlList[0]);
        $baseUrl = dirname(dirname(dirname(__FILE__)))."/API/MobileShop.API.Controllers";
        if (isset($urlList[1])) {
            $fileName = ucwords($urlList[1]);
            if (file_exists("$baseUrl/{$fileName}.php")) {
                $this->currentController = $fileName;
                unset($urlList[1]);
            }
        }
        require_once "$baseUrl/{$this->currentController}.php";
        $this->currentController = new $this->currentController(new MobileShopServices());

        if (isset($urlList[2])) {
            if (method_exists($this->currentController, $urlList[2])) {
                $this->currentMethod = $urlList[2];
                unset($urlList[2]);
            }
        }

         if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->passedArgs = [json_decode(file_get_contents("php://input"))];
        } else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
            $this->passedArgs = $urlList ? [$urlList[3], json_decode(file_get_contents("php://input"))] : die();
        } else {
            $this->passedArgs = $urlList ? array_values($urlList) : [];
        }
        call_user_func_array([$this->currentController, $this->currentMethod], $this->passedArgs);
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
