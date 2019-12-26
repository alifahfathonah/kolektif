<?php
class UserManagament extends Controller
{
    public $models = ['UsersModel'];
    public function index()
    {
        $model = new UsersModel();
        $dataProvider = $model->findAll();
        // dd($dataProvider);
        foreach ($dataProvider as $key => $value) {
            $roles = array_flip($model->role);
            $value->role = $roles[$value->role];
        }
        $this->render('user-man/index', [
            'model' => $dataProvider
        ]);
    }
    public function create()
    {
        $model = new UsersModel();
        if ($this->input->post()!=null) {
            $model->setAttributes($this->input->post());
            $model->setPassword($this->input->post('password'));
            if ($model->validate()) {
                $model->insert();
                redirect('usermanagament');
            }
        }
        foreach ($model->role as $key => $value) {
            $dropdown_list[$value] = $key;
        }
        // dd($dropdown_list);
        $this->render('user-man/form', [
            'model' => $model,
            'dropdown_list' => $dropdown_list
        ]);
    }
    public function edit($id)
    {
        $model = new UsersModel($id);
        $oldPwd = $model->password;
        if ($this->input->post()!=null) {
            $model->setAttributes($this->input->post());
            if ($this->input->post('password') != null) {
                $model->setPassword($this->input->post('password'));
            }
            else{
                $model->data->password = $oldPwd;
            }
            if ($model->validate()) {
                $model->update();
                redirect('usermanagament');
            }
        }
        foreach ($model->role as $key => $value) {
            $dropdown_list[$value] = $key;
        }
        // dd($dropdown_list);
        $model->data->password = '';
        $this->render('user-man/form', [
            'model' => $model,
            'dropdown_list' => $dropdown_list
        ]);
    }
}
