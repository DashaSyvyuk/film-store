<?php
class Search extends Controller{

    public function __construct() {
        parent::__construct();
        require 'models/search_model.php';
        
        $this->view->css = 'search/css/default.css';
        $this->view->js = 'search/js/default.js';
        $this->model = new Search_Model();
        $this->view->orderURL = URL . "search/getFilmsList/0/";
        $this->view->params = $this->getParamsString();
    }
    public function index(){
        $this->view->render('search/index');
    }
    public function getFilmsList($start,$order = "")
    {
        $filmCount = $this->model->getFilmsCount();
        $pagination = new Pagination($start, $filmCount, URL . "search/getFilmsList",$order);
        $this->view->pagination = $pagination->getLinksHTML();
        $this->view->filmList = $this->model->getFilmList($start,$order);
        $this->view->order = $order;
        $this->index();
    }
}