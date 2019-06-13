<?php


namespace classes;


class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $passport_code;

    public function __construct($first_name, $last_name, $phone_number, $email, $passport_code, $id=null)
    {
        $this->first_name = $first_name;
        $this->last_name=$last_name;
        $this->phone_number=$phone_number;
        $this->email=$email;
        $this->passport_code=$passport_code;
        $this->id=$id;
    }

    public function toArray(){
        return [
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'phone_number'=>$this->phone_number,
            'email'=>$this->email,
            'passport_code'=>$this->passport_code,
            'id'=>$this->id,
        ];
    }

    public function login(){
        setcookie('user', json_encode($this->toArray()));
    }

    public static function getCurrentUser(){
        $data = json_decode($_COOKIE['user'], true);
        return User::findById($data['id']);
    }

    public static function findById($id){
        if(!$id) return null;
        $DB=DBConnection::getDBConnection();
        $result = $DB->query("SELECT * FROM user WHERE `id`=".$id);
        $user = $result->fetch_assoc();
        $DB->close();
        if($user){
            return new User($user['first_name'], $user['last_name'], $user['phone_number'], $user['email'], $user['passport_code'], $user['id']);
        } else
            return null;
    }
    public function save(){
        $DB=DBConnection::getDBConnection();
        $user = self::findById($this->id);
        if($user!=null){
            $sql="UPDATE user SET `first_name`='".$this->first_name."',
            `last_name`='".$this->last_name."',
            `phone_number`='".$this->phone_number."',
            `email`='".$this->email."',
            `passport_code`='".$this->passport_code."' WHERE `id`=".$this->id;
            $DB->query($sql);
        } else {
            $sql="INSERT INTO `user`(`first_name`, `last_name`, `phone_number`, `email`, `passport_code`) VALUES ('".$this->first_name."','".$this->last_name."','".$this->phone_number."','".$this->email."','".$this->passport_code."')";
            $DB->query($sql);
            $tmp=$DB->query('SELECT id FROM `user` ORDER BY `id` DESC');
            $this->id=$tmp->fetch_assoc()['id'];
        }
    }
}