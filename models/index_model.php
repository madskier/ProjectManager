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
}

