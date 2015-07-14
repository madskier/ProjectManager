<?php

class Index_Model extends Model
{    
    public function __construct()
    {
        parent::__construct();        
    }
    
    public function doLogin()
    {
        $login = strip_tags(filter_input(INPUT_POST, 'txtUsername'));        
        $password = strip_tags(filter_input(INPUT_POST, 'txtPassword'));
   
        $sth = $this->db->prepare("SELECT id FROM employee WHERE username = :login AND password = MD5(:password)");
        $sth->execute(array(':login' => $login, ':password' => $password));
        
        //$data = $sth->fetchAll();        
        $count = $sth->rowCount();
        
        if ($count > 0)
        {
            Session::startSession();
            Session::set('loggedIn', true);
            Session::set('username', $login);
            header('location: ../dashboard');
        } 
        else
        {            
            header('location: ../index');
        }
    }
    
    function addUser()
    {
        
    }
    
    function ajaxGetPlatform()
    {
        $sth = $this->db->prepare('SELECT id, name FROM platform');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        
        foreach($data as $value)
        {           
            echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetUser()
    {
        $sth = $this->db->prepare('SELECT id, name FROM employee');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        
        foreach($data as $value)
        {           
            echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
        }
        unset($value);
    }
}

