<?php

class Models extends CI_Model 
{
    public $tableName;
    public $columns = [null];
    public $primaryKey = 'id';
    public $data;
    public $mandatory = [];
    public $errors = [];
    public $datatype = [];

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

    }
    public function search($column, $key)
    {
        $this->db->like($column, $key);
    }
    public function beforeInsert()
    {
        $this->data->created_date = date("Y-m-d H:i:s");
        $this->session->set_flashdata('success', 'Data successsfully saved');
    }
    public function beforeUpdate()
    {
        $this->data->updated_date = date("Y-m-d H:i:s");
        $this->session->set_flashdata('success', 'Data successsfully saved');
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
        $this->data = $query->result_object();
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
        $mandatory = array_flip($this->mandatory);
        foreach ($this->data as $key => $value) {
            if (isset($mandatory[$key])) {

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
        $grid= isset($config['grid']) ? $config['grid']: null;
        $btn_text= isset($config['btn_text']) ? $config['btn_text']: 'Submit';
        $btn_position= isset($config['btn_position']) ? $config['btn_position']: null;
        $formOptions= isset($config['formOptions']) ? $config['formOptions']: false;
        $isInline= isset($config['isInline']) ? $config['isInline']: false;
        $useLabel= isset($config['useLabel']) ? $config['useLabel']: true;

        // dd($grid);
        foreach ($columns as $key => $value) {
            $inputType = isset($value['inputType']) ? $value['inputType'] : 'text';
            $label = isset($value['label']) ? $value['label'] : null;
            $tip = isset($value['tip']) ? '('.$value['tip'].')' : null;
            $class = isset($value['class']) ? $class.' '.$value['class'] : $class;
            $options = isset($value['options']) ? $value['options'] : null;
            $dropDownContent = isset($value['content']) ? $value['content'] : null;
            $colspan = isset($value['colspan']) ? $value['colspan'] : null;

            
            if (is_array($value)) {
                $value = $value['field'];
            }
            $field_errors = isset($this->errors[$value]) ? "parsley-error" : null;
            
            $label = $label == null ? ucwords(str_replace('_', ' ', $value)) : $label;
            $placeholder = !$useLabel ? $label : null;
            $label = '<label>'.$label.'</label>';
            if (!$useLabel) {
                $label=null;
            }

            // if (!isset($this->datatype[$value])) {
            //     return 'column not valid';
            // }
            $data = isset($this->data->$value) ?$this->data->$value : '';
            
            switch ($inputType) {
                case 'dropdown':
                    $dropdown = $this->createDropdown($dropDownContent, $data);
                    $forms = $label.'
                        <small class="text-muted">'.$tip.'</small>
                        <select name="'.$value.'" data-live-search="true" class="'.$class.' selectpicker" '.$options.'>
                            '.$dropdown.'
                        </select>';
                    break;
                case 'reg_dropdown':
                    $dropdown = $this->createDropdown($dropDownContent, $data);
                    $forms = '
                    
                        '.$label.'
                        <small class="text-muted">'.$tip.'</small>
                        <select name="'.$value.'" class="'.$class.'" '.$options.'>
                            '.$dropdown.'
                        </select>';
                    break;
                case 'readonly':
                    $forms = '
                    
                        '.$label.'
                        <small class="text-muted">'.$tip.'</small>
                        : <span '.$options.'>'.$data.'</span> ';
                    break;
                case 'image':
                    $forms = '<image src="'.base_url('uploads/').$data.'" style="width: 300px"> <br>';
                    break;
                case 'button':
                    $forms = '
                    
                        <a href="javascript:void(0)" class="btn btn-primary" '.$options.'>'.$label.'</a> ';
                    break;
                case 'checkbox':
                    $dataCheck = $data ? 'checked' : null;
                    $forms = '<div class="custom-control custom-checkbox">
                        <input data-val="'.$data.'" type="checkbox" id="state" name="'.$value.'" class="custom-control-input" '.$dataCheck.'>
                        <label class="custom-control-label" for="state">'.$label.'</label>
                    </div>';
                    break;
                default:
                    $forms = '
                        '.$label.'
                        <small class="text-muted">'.$tip.'</small>
                        <input placeholder="'.$placeholder.'" autocomplete="off" type="'.$inputType.'" 
                        value="'.$data.'" class="'.$class.' '.$field_errors.'" name="'.$value.'" '.$options.'> ';
                    break;
            }
            if ($isInline) {
                $form[] = '<td colspan="'.$colspan.'">'.$forms.'</td>';
            }
            else{
                $form[] = $forms;

            }
        }
        if (!$isInline) {
            switch ($btn_position) {
                case 'top':
                    $form_fix =  form_open_multipart($action, $formOptions).
                    '<input type="submit" class="btn btn-success" value="'.$btn_text.'"> <br><br>'.
                    $this->template($form, $grid).' </form>';
                    break;
                
                default:
                    $form_fix = form_open_multipart($action, $formOptions).
                    $this->template($form, $grid).
                    '<input type="submit" class="btn btn-success" value="'.$btn_text.'"> </form>';
                    break;
            }
        }
        else{
            $form_fix = form_open_multipart($action, $formOptions).
            $this->template($form, $grid, $isInline).
            '<td><input type="submit" class="btn btn-success" value="'.$btn_text.'"></td> </form>';
        }
        return $form_fix;
    }
    private function template($form, $grid, $isInline=false){
        // if ($isInline) {
        //     $form = implode('</td><td>', $form);
        //     return '<td>'.$form.'</td>';
        // }
        if ($grid==null) {
            $form = implode('</div><div class="form-group">', $form);
            // return $form;
            return '<div class="form-group">'.$form.'</div>';
        }
        $form = implode('</div><div class="'.$grid.'">', $form);
        return '<div class="row"><div class="'.$grid.'">'.$form.'</div></div>';
    }
    public function createDropdown(Array $dropdown, $data)
    {
        $drs = [];
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

