<?php
class Site extends Controller
{
    public $models = ['UsersModel'];
    public $layout = 'login';
    public $forGuest = true;
    
    public function index()
    {
        redirect('');
    }

    public function login()
    {
        if (!$this->isGuest()) {
            redirect('');
        }
        $model = new UsersModel();
        $errors = false;
        $old = null;
        if ($this->input->post() != null) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $model->findByUsername($username);
            if ($model->validatePassword($password)) {
                $model->login();
            }
            $old = $username;
            $errors = true;
            $model->username;
        }
        $this->render('login', [
            'model' => $model,
            'errors' => $errors,
            'old' => $old
        ]);
    }
    public function logout()
    {
        session_destroy();
        redirect('site/login');
    }
}
