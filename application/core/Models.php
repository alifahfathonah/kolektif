<?php

class Models extends CI_Model 
{
    public $tableName;
    public $columns = [null];
    public $primaryKey = 'id';
    public $data;
    public $nullable = [];
    public $errors = [];
    public $datatype = [];
    public const STATUS=[];

    public function __construct($id=null)
    {
        parent::__construct();
        $this->data = new \stdClass();
        // dd($this->db);
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
            $this->data->$value = isset($data) ? $data->$value : null;
            $this->datatype[$value] = $type;
        }
        array_push($this->nullable, 'created_date', 'updated_date');
    }
    public function beforeInsert()
    {
        $this->data->created_date = date("Y-m-d H:i:s");
<<<<<<< HEAD
=======
        $this->session->set_flashdata('success', 'Data successsfully saved');
>>>>>>> 1684bc7bec46c57feb7a98061e0396fba7b42962
    }
    public function beforeUpdate()
    {
        $this->data->updated_date = date("Y-m-d H:i:s");
<<<<<<< HEAD
=======
        $this->session->set_flashdata('success', 'Data successsfully saved');
>>>>>>> 1684bc7bec46c57feb7a98061e0396fba7b42962
    }
    public function rawQuery($query)
    {
        return $this->db->query($query)->result_object();
    }
    public function select(Array $select)
    {
        return $this->db->select($select);
    }
    public function where($column, $val)
    {
        return $this->db->where($column, $val);
    }
    public function groupBy(Array $group)
    {
        return $this->db->group_by($group);
    }
    public function orderBy(Array $order =[])
    {
        foreach ($order as $key => $value) {
            $this->db->order_by($key,$value);            
        }
    }
    public function joinWith($table, $on, $type='inner')
    {
        $this->db->join($table, $on, $type);
    }
    public function findAll(Array $config = [])
    {
        if (isset($this->joinWith)) {
            $this->db->join($this->joinWith['field'], $this->joinWith['on'], $this->joinWith['type']);
        }
        $query = $this->db->get($this->tableName);
        $this->data = $query;
        return $query->result_object();
    }
    public function find($id)
    {
        if (isset($this->joinWith)) {
            $this->db->join($this->joinWith['field'], $this->joinWith['on'], $this->joinWith['type']);
        }
        $this->db->where([$this->tableName.'.'.$this->primaryKey => $id]);
        $query = $this->db->get($this->tableName)->row();
        return $query;
    }
    public function insert()
    {
        if ($this->data!=null) {
            $this->beforeInsert();
            $this->db->insert($this->tableName, $this->data);
            $insert_id = $this->db->insert_id();
            $this->newValue = ['id' => $insert_id, 'data' => $this->data];
        }
        return false;
    }
    public function update()
    {
        if ($this->data!=null) {
            $this->beforeUpdate();
            $this->db->where($this->primaryKey, $this->_id);
            $this->db->update($this->tableName, $this->data);
        }
        return false;
    }
    
	public function getListForDropdown($labe_name='name')
	{
        $data = $this->findAll();
        $pk = $this->primaryKey;
        $arr = [];
        foreach ($data as $key => $value) {
            $arr[$key]['value'] = $value->$pk;
            $arr[$key]['label'] = $value->$labe_name;
        }
        return $arr;
	}
    public function remove()
    {
        $this->db->where($this->primaryKey, $this->_id);
        $this->session->set_flashdata('success', 'Data successsfully deleted');
        return $this->db->delete($this->tableName);
    }
    public function setAttributes(Array $arr)
    {
        foreach ($this->columns as $key => $value) {
            if (is_array($value)) {
                $value = $value['field'];
            }
            $this->$value = isset($arr[$value]) ? $arr[$value] : $this->$value;
            $this->data->$value = $this->$value;
        }
    }

    public function validate()
    {
        $nullable = array_flip($this->nullable);
        foreach ($this->data as $key => $value) {
            if (!isset($nullable[$key])) {
                if (isset($this->datatype[$key])) {
                    if ($this->datatype[$key] == 'int' && !is_numeric($value)) {
                        $this->session->set_flashdata('error', 'Check your data');
                        $this->errors[$key] = 'must int';
                    }
                    
                }
                if ($value==null) {
                    $this->session->set_flashdata('error', 'Check your data');
                    $this->errors[$key] = 'field '.$key.' cannot be null';
                }
            }
        }
        return count($this->errors)==0;
    }
    
    public function serializeForm(Array $config=[])
    {
        $class = isset($config['class']) ? $config['class']: 'form-control'; 
        $action= isset($config['action']) ? $config['action']: '';
        $columns = isset($config['columns']) ? $config['columns'] : $this->columns;
        foreach ($columns as $key => $value) {
            $inputType = isset($value['inputType']) ? $value['inputType'] : 'text';
            $label = isset($value['label']) ? $value['label'] : null;
            $dropDownContent = isset($value['content']) ? $value['content'] : null;
            if (is_array($value)) {
                $value = $value['field'];
            }
            
            $label = $label == null ? ucwords(str_replace('_', ' ', $value)) : $label;

            // if (!isset($this->datatype[$value])) {
            //     return 'column not valid';
            // }
            $data = isset($this->data->$value) ?$this->data->$value : '';
            if ($inputType == 'dropdown') {
                $dropdown = $this->createDropdown($dropDownContent, $data);
                $form[] = '
                <div class="form-group">
                    <label>'.$label.'</label>
                    <select name="'.$value.'" class="'.$class.'">
                         <option value="null" disabled selected>--Pilih '.$label.'--</option>
                        '.$dropdown.'
                    </select> 
                </div>';
            }
            else{
                $form[] = '
                <div class="form-group">
                    <label>'.$label.'</label>
                    <input placeholder="'.strtolower($label).'" type="'.$inputType.'" value="'.$data.'" class="'.$class.'" name="'.$value.'"> 
                </div>';
            }
        }
        return form_open_multipart($action).implode('', $form).'<input type="submit" class="btn btn-success" value="Submit"> </form>';
    }
    public function createDropdown(Array $dropdown, $data)
    {
        foreach ($dropdown as $key => $value) {
            if (is_array($value)) {
                if ($value['value']==$data) {
                    $drs[] = '<option selected value="'.$value['value'].'">'.$value['label'].'</option>';
                }
                else{
                    $drs[] = '<option value="'.$value['value'].'">'.$value['label'].'</option>';
                }
            }
            else{
                $key++;
                if ($key==$data) {
                    $drs[] = '<option selected value="'.$key.'">'.$value.'</option>';
                }
                else{
                    $drs[] = '<option value="'.$key.'">'.$value.'</option>';
                }
            }
        }
        return implode("\n", $drs);
    }
}

?>

