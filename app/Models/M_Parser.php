<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/electrolinux/phpquery/phpQuery/phpQuery.php';



class M_Parser
{
    public function __construct($site, $selector1, $selector2){
        $this->site = $site;
        $this->blockselector = $selector1;
        $this->selector1 = $selector2;
    }

    public function parse(){
        $html = file_get_contents($this->site);
        $doc = phpQuery::newDocument('<meta charset="utf-8">' . $html);
        $newsItems = $doc->find($this->blockselector);

        $news = array();
        foreach ($newsItems as $newsItem) {
            $newsElem = pq($newsItem)->find($this->selector1);
            $title = $newsElem->text();
            $link = $newsElem->attr('href');

            if (strpos($link, $this->site) === false) {
                $link = $this->site . $link;
            }

            array_push($news, array(
                'title' => $title,
                'link' => $link
            ));
        }
        return $news;
    }
}
