<?php
class Index extends Controller{

    public function __construct() {
        parent::__construct();
        require 'models/index_model.php';
        
        $this->view->css = 'index/css/default.css';
        $this->view->js = 'index/js/default.js';
        $this->model = new Index_Model();
        $this->view->orderURL = URL . "index/getFilmsList/0/";
        $this->view->params = $this->getParamsString();
    }
    public function index(){
        $this->view->render('index/index');
    }
    public function getFilmsList($start,$order = "")
    {
        $filmCount = $this->model->getFilmsCount();
        $pagination = new Pagination($start, $filmCount, URL . "index/getFilmsList",$order);
        $this->view->pagination = $pagination->getLinksHTML();
        $this->view->filmList = $this->model->getFilmList($start,$order);
        $this->view->order = $order;
        $this->index();
    }
    public function addFilm()
    {
        $this->model->addFilm($this->checkString($_POST["Title"]),$this->checkString($_POST["Released_Year"]),$this->checkString($_POST["format"]),$this->checkString($_POST["stars"]));
        header("Location:" . URL . "index/getFilmsList/0");
    }
    public function deleteFilm($id)
    {
        $this->model->deleteFilm($id);
        header("Location:" . URL . "index/getFilmsList/0");
    }
    public function downloadFilms()
    {
        $filename = basename($_FILES['userfile']['name']);
        $uploaddir = './public/downloads/';
        $uploadfile = $uploaddir . $filename;
        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        $data = file($uploadfile,FILE_SKIP_EMPTY_LINES);
        foreach($data as $key => $value){
            if($key%5 == 0)
            { 
                if(!empty($value) && !empty($data[$key+1]) && !empty($data[$key+2]) && $data[$key+3]){
                    $title = explode(":",$value); 
                    $released_year = explode(":",$data[$key+1]);
                    $format = explode(":",$data[$key+2]);
                    $stars = explode(":",$data[$key+3]);
                    $this->model->addFilm($title[1],$released_year[1],$format[1],$stars[1]);
                }
            }
        }
        header("Location:" . URL . "index/getFilmsList/0");
    }
}