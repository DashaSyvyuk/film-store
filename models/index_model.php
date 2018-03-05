<?php

class Index_Model extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function getFilmList($start,$order)
    {
        $orderby = ($order == "") ? "" : " ORDER BY `Title` " . $order;
        $from = $start * COUNT_FILMS_ON_PAGE;
        $sth = $this->db->prepare("SELECT `id`,`Title`,`Release Year`,`Format`,`Stars` FROM `film-list` " . $orderby . " LIMIT " . $from . "," . COUNT_FILMS_ON_PAGE . ";");
        $sth->execute(); 
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
        $sth = $this->db->prepare("SELECT COUNT(*) AS Count FROM `film-list`;");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(); 
        return $sth->fetchAll()[0]["Count"];
    }
    public function addFilm($title,$released_year,$format,$stars)
    {
        $sth = $this->db->prepare("INSERT INTO `film-list` (`Title`,`Release Year`,`Format`,`Stars`) VALUES (:title,:year,:format,:stars);");
        $sth->execute(array(
                            ':title'    => $title,
                            ':year'     => $released_year,
                            ':format'   => $format,
                            ':stars'    => $stars
        )); 
    }
    public function deleteFilm($id)
    {
        $sth = $this->db->prepare("DELETE FROM `film-list` WHERE `id`=:id;");
        $sth->execute(array(
                            ':id'    => $id
        )); 
    }
}