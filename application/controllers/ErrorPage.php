<?php
class ErrorPage extends Controller
{
    public $exclution = true;
    public $layout = 'app';
    
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
       $this->output->set_status_header('404');
       $this->render('errors/page');    
    }    
}
