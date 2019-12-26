<?php
class Upload extends CI_Model
{
    public $config;
    public $errors;
    public $data;
    public $allowedType = 'gif|jpg|png|pdf';
    
    public function __construct() 
    {
        parent::__construct();
        $this->config['upload_path'] = './uploads/';
        $this->config['allowed_types'] = $this->allowedType;
        $this->config['max_size'] = 2000;
        $this->config['max_width'] = 1500;
        $this->config['max_height'] = 1500;
        $this->load->library('upload', $this->config);
    }
    public function setAllowedType($var)
    {
        $this->allowedType = $var;
    }
    public function save($file)
    {
        if (!$this->upload->do_upload($file)) {
            $this->errors = $this->upload->display_errors();
            echo $this->upload->display_errors();
            exit;
            return false;
        }
        $this->data = (object) $this->upload->data();
        return true;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function getFileName()
    {
        return $this->data->file_name;
    }
    
}
