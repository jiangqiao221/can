<?php

namespace can\base;


class Controller
{
    private $_view;

    public function render($file, $params = [])
    {
        return $this->getView()->render($file, $params);
    }

    public function getView()
    {
        if ($this->_view === null || !($this->_view instanceof View)) {
            $this->_view = new View();
        }
        return $this->_view;
    }
}