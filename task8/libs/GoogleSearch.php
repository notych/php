<?php
include 'iSearchEngine.php';
include 'phpQuery-onefile.php';

class GoogleSearch implements  iSearchEngine
{
    private $url_search;
    private $result;
    private $errors;


    public function __construct()
    {
        $this->url_search = "https://google.com/search?q=";
        $this->result = "";
        $this->errors = [];
    }

    public function SearchRequest($request)
    {
        $request = str_replace(' ', '+', $request);
        $this->url_search .= $request;
        $ch = curl_init($this->url_search);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       /* if(!($res = curl_exec($ch))){
            $this->errors[] = curl_error($ch);
            curl_close($ch);
            return false;
        }*/
        $res = curl_exec($ch);
        curl_close($ch);
        $this->result = $res;
        return true;

    }

    public function Parse()
    {
        $search_doc = phpQuery::newDocument($this->result);
        $html='';
        foreach($search_doc->find('.g') as $a){
            $a = pq($a);
            $head = '<h3>'.$a->find('h3.r')->text().'</h3>'."\n";
            $link = $a->find('.s cite')->text();
            $html .= "<a href='$link'?>$head</a>\n";
            $html .= "<a href='$link'?>$link</a>\n";
            $html .= '<p>'.$a->find('.s span.st')->text().'</p>'."\n";
            $html .= '<hr>';
        }
        return $html;
    }

}
