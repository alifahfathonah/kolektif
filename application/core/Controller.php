<?php

class Controller extends CI_Controller 
{
    public $models;
    public $controllerId;
    public $isDefaultController;
    public $layout = 'app';
    public $forGuest = false;
    public $exclution = false;
    public $accessGroup;
    public $thisRoute;
    public $searchKey;

    public $roles = ['vendor', 'bfield'];
    
    public function __construct()
    {
        parent::__construct();
        if ($this->router->fetch_method()=='delete') {
            $this->validateRequest("POST");
        }
        $this->controllerId = strtolower(get_class($this));
        $this->thisRoute = $this->controllerId.'/'.$this->router->fetch_method();
        if ((!$this->forGuest) && $this->isGuest()) {
            redirect('site/login');
        }
        if (!$this->forGuest) {
            if (!isset(roles()[$this->loginInformation()->role])) {
                forbidden();
            }
            $this->roles = roles()[$this->loginInformation()->role];
            $this->assignMenus();
            if ( $this->loginInformation()->role != '0') {
                if (!in_array($this->accessGroup, $this->roles) && !$this->exclution) {
                    forbidden();
                }
            }
        }
        $this->load->model($this->models);
        $search = isset($_GET['search_key']) ? $_GET['search_key'] : null;
        $this->searchKey = $search;
    }
    protected function loginInformation(){
        return (object) $this->session->userdata('userdata');
    }
    protected function validateRequest($type)
    {
		if ($_SERVER['REQUEST_METHOD']!=$type) {
			bad_request();			
		}
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
            'thisRoute' => $this->isDefaultController ? null : $this->thisRoute,
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
        <a href="'.base_url().$url.'" class="waves-effect"><i class="menu-icon '.$icon.'"></i><span> '.$str.' </span></a>
        </li>';
        return $item;
    }
    protected function createSubItem($str, $icon, $items)
    {
        $item = '<li>
        <a href="javascript:void(0)" class="waves-effect"><i class="menu-icon '.$icon.'"></i><span> '.$str.
            '<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </span></a>
            <ul class="submenu">
            '.$items.'
            </ul>
        </li>';
        return $item;
    }
}
