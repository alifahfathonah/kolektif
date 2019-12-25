<?php

class Controller extends CI_Controller 
{
    public $models;
    public $controllerId;
    public $isDefaultController;
    public $layout = 'app';
    public $forGuest = false;    
    public $exclution = false;

    public $roles = ['vendor', 'bfield'];
    
    public function __construct()
    {
        parent::__construct();
        $this->controllerId = strtolower(get_class($this));
        if ((!$this->forGuest) && $this->isGuest()) {
            redirect('site/login');
        }
        if (!$this->forGuest) {
            $this->roles = roles()[$this->loginInformation()->role];
            $this->assignMenus();
            if (!in_array($this->controllerId, $this->roles) && !$this->exclution) {
                forbidden();
            }
        }
        $this->load->model($this->models);
    }
    protected function loginInformation(){
        return (object) $this->session->userdata('userdata');
    }
    protected function assignMenus()
    {
        $menus = menus();
        foreach ($menus as $key => $value) {
            foreach ($this->roles as $key2 => $value2) {
                if ($key==$value2) {
                    $this->menus[$key] = $value;
                }
            }
        }
    }
    public function render($view, Array $params = [])
    {
        $this->load->view('layouts/'.$this->layout, [
            'view' => $view,
            'params' => $params,
            'controllerId'=> $this->controllerId,
            'title' => ucfirst($this->controllerId),
            'createMenus' => $this->forGuest ? null : $this->createMenus()
        ]);
    }
    protected function isGuest()
    {
        return !$this->session->has_userdata('userdata');
    }
    protected function createMenus()
    {
        $arr = $this->menus;
        return $items = $this->iterate($arr);
    }
    protected function iterate(Array $arr)
    {
        foreach ($arr as $key => $value) {
            $icon = isset($value['icon']) ? $value['icon'] : null;
            $url = isset($value['url']) ? $value['url'] : "#";
            if (isset($value['child'])) {
                $items[] = $this->createSubItem($value['menu'], $icon, $this->iterate($value['child']));
            }
            else{
                $items[] = $this->createItem($value['menu'], $icon, $url);
            }
        }
        return implode("\n", $items);
    }
    protected function createItem($str, $icon, $url)
    {
        $item = '<li>
        <a href="'.$url.'" class="waves-effect"><i class="mdi '.$icon.'"></i><span> '.$str.' </span></a>
        </li>';
        return $item;
    }
    protected function createSubItem($str, $icon, $items)
    {
        $item = '<li>
        <a href="javascript:void(0)" class="waves-effect"><i class="mdi '.$icon.'"></i><span> '.$str.
            '<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </span></a>
            <ul class="submenu">
            '.$items.'
            </ul>
        </li>';
        return $item;
    }
}
