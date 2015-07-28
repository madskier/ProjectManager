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
    
    function ajaxGetList($activeOnly)
    {
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $userID = $sth1->fetch();
        
        if ($activeOnly == 0)
        {
            $sql = 'SELECT bugreport.id, bugreport.name, bugreport.status, bugreport.priority, "bug" AS type FROM bugreport WHERE assigned_to = :userID UNION SELECT changerequest.id, changerequest.name, changerequest.status, changerequest.priority, "changerequest" AS type FROM changerequest WHERE assigned_to = :userID UNION SELECT testcase.id, testcase.name, testcase.status, "" AS priority, "testcase" AS type FROM testcase WHERE assigned_to = :userID';        
        }
        else 
        {
            $sql = 'SELECT bugreport.id, bugreport.name, bugreport.status, bugreport.priority, "bug" AS type FROM bugreport WHERE assigned_to = :userID AND bugreport.status != "Closed" UNION SELECT changerequest.id, changerequest.name, changerequest.status, changerequest.priority, "changerequest" AS type FROM changerequest WHERE assigned_to = :userID AND changerequest.status != "Closed" UNION SELECT testcase.id, testcase.name, testcase.status, "" AS priority, "testcase" AS type FROM testcase WHERE assigned_to = :userID AND testcase.status != "Closed"';
        }
        
        $sql .= ' ORDER BY type';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':userID' => $userID[0]));
        $data = $sth->fetchAll();
        
        echo json_encode($data);  
    }
}

