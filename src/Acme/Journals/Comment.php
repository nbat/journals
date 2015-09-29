<?php

namespace Acme\Journals;

class Comment
{
    protected $_text;
    protected $_date;

    public function getText()
    {
        return $this->_text;
    }

    public function setText($text)
    {
        $this->_text = $text;
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }
}