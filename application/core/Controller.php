<?php

class Controller extends CI_Controller 
{
    public $models;
    public $controllerId;
    public $isDefaultController;
    public $layout = 'app';
    public $forGuest = false;
    
    public function __construct()
    {
        parent::__construct();
        if ((!$this->forGuest) && $this->isGuest()) {
            redirect('site/login');
        }
        $this->controllerId = strtolower(get_class($this));
        $this->load->model($this->models);
    }
    public function render($view, Array $params = [])
    {
        $this->load->view('layouts/'.$this->layout, [
            'view' => $view,
            'params' => $params,
            'controllerId'=> $this->controllerId,
            'title' => ucfirst($this->controllerId),
        ]);
    }
    public function isGuest()
    {
        return !$this->session->has_userdata('userdata');
    }
}
