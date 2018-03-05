<?php

class Pagination
{
    function __construct($offset,$filmCount,$action,$order) {
        $this->offset           = $offset;
        $this->filmCount        = $filmCount;
        $this->action           = $action;
        $this->order            = $order;
    }
    protected function getPagesCount()
    {
        return ceil($this->filmCount / COUNT_FILMS_ON_PAGE);
    }
    public function getLinksHTML()
    {
        $pageCount = $this->getPagesCount();
        $params = $this->getParamsString();
        if($pageCount > 1)
        {
            $html = $this->prevLinks();
            for($i = 1; $i <= $pageCount; $i++) {
                $class = ($i-1 == $this->offset) ? 'selected_page' : 'pagination_link';
                $html .= "<a href=\"" . $this->action . "/" . ($i-1) . "/" . $this->order . $params . "\" class=\"" . $class . "\" >" . $i . "</a>&nbsp;";
            }
            $html .= $this->nextLinks($pageCount);
            return $html;
        }
    }
    protected function prevLinks()
    {
        if($this->offset > 0)
        {   
            $offset = $this->offset;
            $prev = $offset - 1;
            $params = $this->getParamsString();
            return "<a href=\"" . $this->action . "/" . $prev . "/" . $this->order . $params . "\"  class=\"pagination_link\">&#10092;&#10092;</a>&nbsp;";
        }
    }
    protected function nextLinks($pageCount)
    {
        if($this->offset + 1 < $pageCount )
        {
            $next = $this->offset + 1;
            $params = $this->getParamsString();
            return "<a href=\"" . $this->action . "/" . $next . "/" . $this->order . $params . "\" class=\"pagination_link\">&#10093;&#10093;</a>";
        }
    }
    protected function getParamsString()
    {
        $get_params = parse_url($_SERVER["REQUEST_URI"],PHP_URL_QUERY);
        return (!empty($get_params)) ? "?$get_params" : "";
    }
}