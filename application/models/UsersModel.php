<?php 
class UsersModel extends Models 
{
	public $tableName = 'users';
	public $columns = [
		['field' => 'name','type' => 'string'],
		['field' => 'username','type' => 'string'],
		['field' => 'password','type' => 'string'],
		['field' => 'role','type' => 'int'],
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string']
	];
    public $nullable = ['name'];
	public $primaryKey = 'id'; 
	public const ROLE = [
		'admin' => 0,
		'sales' => 1,
		'werehouse' => 2,
		'purchasing' => 3,
		'super' => 4
	];


	public $algo = PASSWORD_DEFAULT;

	public function setPassword(String $password)
	{
		$pwd = password_hash($password, $this->algo);
		$this->data->password = $pwd;
	}

	public function validatePassword(String $hashedPassword)
	{
		return password_verify($hashedPassword, $this->password);
	}
	public function findByUsername($username)
	{
        $this->db->where(['username' => $username]);
		$query = $this->db->get($this->tableName)->row();
		
        foreach ($this->columns as $key => $value) {
            $type = 'string';
            if (is_array($value)) {
                $type = $value['type'];
                $value = $value['field'];
            }
            $this->$value = isset($query) ? $query->$value : null;
		}
		
		$this->data = $query;
		return $query;
	}
	public function login()
	{
		$arr = [
			'id' => $this->data->id,
			'username' => $this->username,
			'name' => $this->name,
			'role' => $this->role,
		];
		$this->session->set_userdata('userdata', $arr);
		redirect("");
	}
} 