<?php

class Model {
    function __construct() {
        $this->db = new Database();
        $this->db->query("SET NAMES 'utf8';");
    }
    public function getContactsPhone()
    {
        $sth = $this->db->prepare("SELECT `text` FROM `configs` WHERE `alias`='contacts_phone';");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(); 
        $result = $sth->fetchAll();
        return $result[0]['text'];
    }
    public function getPageInfo($alias)
    {
        $sth = $this->db->prepare("SELECT `title`,`description`,`keywords`,`noindex`,`canonical` FROM `site_pages` WHERE `alias`='" . $alias . "';");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(); 
        $result = $sth->fetchAll();
        return $result[0];
    }
}