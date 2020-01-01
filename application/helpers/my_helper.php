<?php
function loadCss(Array $css)
{
    foreach ($css as $key => $value) {
        $arr[] = '<link rel="stylesheet" href="'.base_url('assets/').$value.'"> ';
    }
    echo implode('', $arr);
}
function loadJs(Array $js)
{
    foreach ($js as $key => $value) {
        $arr[] = '<script src="'.base_url('assets/').$value.'"></script>';
    }
    echo implode('', $arr);
}
function getState($int=0)
{
    $arr = [
        'Draft',
        'Accepted',
        'On Process',
        'On Process',
        'Done',
        'Cance;'
    ];
    return $arr[$int];
}
function dd($data)
{
    echo "<pre style='color: red; margin: 30px; background-color: #dbdbdb; padding: 20px'>";
    print_r($data);
    echo "</pre>";
    exit;
}
function d($data)
{
    $data = json_encode($data, JSON_PRETTY_PRINT);
    echo "<pre style='color: red; margin: 30px; background-color: #dbdbdb; padding: 20px'>";
    print_r($data);
    echo "</pre>";
}
function textField($model, $options = []){
    return form_input($options);
}

function actionColoumn(Array $template, $uris, $model, $condition)
{
    $id = $model->id;
    $uri = $uris;
    if ($uri==null) {
        return null;
    }
    foreach ($template as $key => $value) {
        if (is_array($uris)) {
            $uri = isset($uris[$value]) ? $uris[$value] : $uri;
        }
        foreach ($condition as $key2 => $value2) {
            if ($value==$key2) {
                if ($model->$value2 != 'Accepted') {
                    $value = 'accepted';
                }
            }
            
        }
        switch ($value) {
            case 'edit':
                $icon = 'ti-pencil-alt';
                $color = 'ab-yellow';
                $btns[] = "<a class='action-btn ".$color."' href='".base_url().$uri."/edit/$id'><span class='".$icon."'></span></a>";
                break;
            case 'delete':
                $btns[] = deleteButton($id, $uri.'/delete');
                break;
            
            case 'activate':
                $btns[] = deleteButton($id, $uri.'/activate', 'ti-check', 'btn-light');
                break;
            
            case 'accepted':
                $icon = 'ti-check';
                $color = 'btn-success';
                $btns[] = "<a class='action-btn ".$color."' href='javascript:void(0)'><span class='".$icon."'></span></a>";
                break;
            case 'detail':
                $icon = 'ti-eye';
                $color = 'ab-yellow';
                $btns[] = "<a class='action-btn ".$color."' href='".base_url().$uri."/$id'><span class='".$icon."'></span></a>";
                break;
            default:
                # code...
                break;
        }
        
    }
    return '<td>'.implode(' ', $btns).'</td>';
}

function deleteButton($id, $uri, $icon='fa fa-trash', $color='ab-pink')
{
    
    $form[] = '<input type="hidden" name="delete_id" value="'.$id.'">';
    return form_open($uri, 'class="d-inline deleteData" id="deleteData'.$id.'"').implode('', $form).
    '<button type="submit" class="action-btn '.$color.'"><span class="'.$icon.'"></span></button> </form>';
}

function serializeTable($model, Array $config = [])
{
    $label = "Label";
    $action = isset($config['action']) ? $config['action'] : ['edit', 'delete'];
    $columns = $config['columns'];
    $actionLabel = $action ? '<th style="width: 100px"></th>' : '';
    $btn_condition = isset($config['btn_condition']) ? $config['btn_condition'] : [];
    $uri = isset($config['uri']) ? $config['uri'] : null;

    foreach ($columns as $key => $value) {
        if (is_array($value)) {
            $label_raw = $value['label'];
        }
        else{
            $label_raw = $value;
        }
        $label = ucwords(str_replace('_', ' ', $label_raw));
        $ths[] = '<th>'.$label.'</th>';
    }

    foreach ($model as $key => $value) {
        $index = $key+1;
        $action_btn = $action ? actionColoumn($action, $uri, $value, $btn_condition) : '';
        foreach ($columns as $key2 => $value2) {
            $template = isset($value2['template']) ? $value2['template'] : null;
            if (is_array($value2)) {
                $value2 = $value2['attribute'];
            }
            $col_value = $value->$value2;
            if ($template!=null) {
                $col_value = getFormat($template, $col_value);
            }
            $rows[$key2] = '<td>'.$col_value.'</td>';
        }
        $row = implode("\n", $rows);
        $trs[] = "<tr><td>".$index."</td>".$row.$action_btn."</tr>";
    }
    $th = implode("\n", $ths);
    $tr = isset($trs) ? implode("\n", $trs) : '';
    echo '
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 70px">No</th>
                '.$th.$actionLabel.'
                
            </tr>
        </thead>
        <tbody>
        '.$tr.'
        </tbody>
    </table>
    ';
}
function serializeTable1($model, Array $config = [])
{
    $label = "Label";
    $action = isset($config['action']) ? $config['action'] : ['edit'];
    $columns = $config['columns'];
    $actionLabel = $action ? '<th style="width: 100px"></th>' : '';

    foreach ($columns as $key => $value) {
        if (is_array($value)) {
            $label_raw = $value['label'];
        }
        else{
            $label_raw = $value;
        }
        $label = ucwords(str_replace('_', ' ', $label_raw));
        $ths[] = '<th>'.$label.'</th>';
    }
    
    foreach ($model as $key => $value) {
        $index = $key+1;
        $action_btn = $action ? actionColoumn($action, isset($config['uri']) ? $config['uri'] : null, $value->id) : '';
        foreach ($columns as $key2 => $value2) {
            $template = isset($value2['template']) ? $value2['template'] : null;
            if (is_array($value2)) {
                $value2 = $value2['attribute'];
            }
            $col_value = $value->$value2;
            if ($template!=null) {
                $col_value = getFormat($template, $col_value);
            }
            $rows[$key2] = '<td>'.$col_value.'</td>';
        }
        $row = implode("\n", $rows);
        $trs[] = "<tr><td>".$index."</td>".$row.$action_btn."</tr>";
    }
    $th = implode("\n", $ths);
    $tr = isset($trs) ? implode("\n", $trs) : '';
    echo '
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 70px">No</th>
                '.$th.$actionLabel.'
                
            </tr>
        </thead>
        <tbody>
        '.$tr.'
        </tbody>
    </table>
    ';
}
function getFormat($str, $val=null){
    $new_str = explode('{value}', $str);
    $str_final = $new_str[0].$val.$new_str[1];
    return $str_final;
}
?>