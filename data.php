<?php

class Data {

    private $title;
    private $message;

    public function setTitle($title) 
    {
        $this->title = $title; 
    }

    public function setMessage($message) 
    {
        $this->message = $message;
    }

    public function getData() {
        $data = array();
        $data['data']['title'] = $this->title;
        $data['data']['message'] = $this->message;
        return $data;
    }

}

?>