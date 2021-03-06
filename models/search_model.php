<?php

class Search_Model extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function getFilmList($start,$order)
    {
        $orderby = ($order == "") ? "" : " ORDER BY `Title` " . $order;
        $from = $start * COUNT_FILMS_ON_PAGE;
        $sth = $this->db->prepare("SELECT `id`,`Title`,`Release Year`,`Format`,`Stars` FROM `film-list`
                                   WHERE " . Controller::checkString($_GET["param"]) . " LIKE CONCAT('%', :search ,'%')
                                   " . $orderby . " LIMIT " . $from . ", " . COUNT_FILMS_ON_PAGE . ";");
        $sth->execute(array(":search" => Controller::checkString($_GET["search-text"])));
        $result = array();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $row["Title"] = Controller::checkString($row["Title"], ENT_QUOTES, 'utf-8');
            $row["Stars"] = Controller::checkString($row["Stars"], ENT_QUOTES, 'utf-8');
            $result[] = $row;
        }
        return $result;
    }
    public function getFilmsCount()
    {
        $sth = $this->db->prepare("SELECT COUNT(*) AS Count FROM `film-list` WHERE `" . Controller::checkString($_GET["param"]) . "` LIKE '%" . Controller::checkString($_GET["search-text"]) . "%';");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(); 
        return $sth->fetchAll()[0]["Count"];
    }
}