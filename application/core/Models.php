<?php

class Models extends CI_Model 
{
    public $tableName;
    public $columns = [null];
    public $primaryKey = 'id';
    public $data;
    public $nullable;
    public $errors;
    public $datatype = [];


    public function __construct($id=null)
    {
        parent::__construct();
        if ($id!=null) {
            $this->_id = $id;
            $data = $this->find($id);
            if ($data==null) {
                show_404();
            }
            $this->data = $data;
        }
        foreach ($this->columns as $key => $value) {
            $type = 'string';
            if (is_array($value)) {
                $type = $value['type'];
                $value = $value['field'];
            }
            $this->$value = isset($data) ? $data->$value : null;
            $this->datatype[$value] = $type;
        }
    }

    public function findAll()
    {
        return $query = $this->db->get($this->tableName)->result_object();
    }
    public function find($id)
    {
        $query = $this->db->get_where($this->tableName, [$this->primaryKey => $id])->row();
        return $query;
    }
    public function insert()
    {
        if ($this->data!=null) {
            return $this->db->insert($this->tableName, $this->data);
        }
        return false;
    }
    public function update()
    {
        if ($this->data!=null) {
            $this->db->where($this->primaryKey, $this->_id);
            $this->db->update($this->tableName, $this->data);
        }
        return false;
    }
    public function setAttributes(Array $arr)
    {
        foreach ($this->columns as $key => $value) {
            if (is_array($value)) {
                $value = $value['field'];
            }
            $this->data->$value = isset($arr[$value]) ? $arr[$value] : null;
            $this->$value = isset($arr[$value]) ? $arr[$value] : null;
        }
    }

    public function validate()
    {
        foreach ($this->data as $key => $value) {
            if ($value==null) {
                $this->errors[$key] = 'field '.$key.' cannot be null';
            }
            if ($this->datatype[$key] == 'int' && !is_numeric($value)) {
                $this->errors[$key] = 'must int';
            }
        }
        
        return count($this->errors)==0;
    }
    
    public function serializeForm(Array $config=[])
    {
        $class = isset($config['class']) ? $config['class']: 'form-control'; 
        $action= isset($config['action']) ? $config['action']: '';
        foreach ($this->columns as $key => $value) {
            if (is_array($value)) {
                $value = $value['field'];
            }
            $data = isset($this->data->$value) ?$this->data->$value : '';
            $form[] = '
            <div class="form-group">
                <input placeholder="'.strtolower($value).'" type="text" value="'.$data.'" class="'.$class.'" name="'.$value.'"> 
            </div>';
        }
        return form_open($action).implode('', $form).'<input type="submit" class="btn btn-success" value="Submit"> </form>';
    }
}

?>

