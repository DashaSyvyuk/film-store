<?php

class Controller {
    
    function __construct() {
        $this->view = new View();
    }
    public static function checkString($string)
    {
        $output1 = trim($string);
	$output2 = strip_tags($output1);
        return htmlspecialchars($output2, ENT_QUOTES, 'windows-1251');
    }
    public function getParamsString()
    {
        $get_params = parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
        return (!empty($get_params)) ? "?$get_params" : "";
    }
}
