<?php

class Controller {
    
    function __construct() {
        $this->view = new View();
    }
    public static function checkString($string)
    {
        return htmlentities($string, ENT_QUOTES, "UTF-8");
    }
    public function getParamsString()
    {
        $get_params = parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
        return (!empty($get_params)) ? "?$get_params" : "";
    }
}
