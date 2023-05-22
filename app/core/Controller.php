<?php

class Controller
{
    public function view($view, $data = [])
    {
        $data['title'] = (isset($data['title'])) ? $data['title'] : 'Document';
        $main = '../app/views/' . $view . '.php';
        require_once '../app/views/templates/index.php';
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
