<?php

class Index_Model extends Model
{    
    public function __construct()
    {
        parent::__construct();        
    }
    
    function sendNewAccountEmail($toEmail, $name, $username)
    {          
        $msg = "Welcome to CodeCycle " . $name . "! \r\n Your account information has been stored with us. \r\n An administrator will review your account and authorize it as soon as possible. \r\n\r\n The administrator will also assign you permissions. This is to prevent unauthorized users from creating accounts and viewing sensitive information. \r\n\r\n Thank you for you patience. You will receive an email when your account is set up.";
        $subject = "CodeCycle: Account Created";
        $headers = "From: flux@fluxlogicstudios.com \r\n" . "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
        
        $msgToAdmin = $username . " : " . $name . " has requested that you activate their account. \r\n Please email " . $toEmail . " when the account is active.";
        mail("nmarrs@fluxlogicstudios.com", "CodeCycle: Account Requested", $msgToAdmin, $headers);
    }
    
    function sendUsernameEmail($toEmail, $name, $username)
    {          
        $msg = $name . ", you have requested your username from CodeCycle. \r\n Your username is: " . $username;
        $subject = "CodeCycle: Username Request";
        $headers = "From: flux@fluxlogicstudios.com \r\n" . "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);       
    }
    
    function sendPasswordEmail($toEmail, $name, $password)
    {          
        $msg = $name . ", you have requested your password from CodeCycle. \r\n Your new temporary password is: " . $password . "\r\n Please change your password after logging in with this temporary password.";
        $subject = "CodeCycle: Password Request";
        $headers = "From: flux@fluxlogicstudios.com \r\n" . "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);      
    }
    
    public function doLogin()
    {
        $login = strip_tags(filter_input(INPUT_POST, 'txtUsername'));        
        $password = strip_tags(filter_input(INPUT_POST, 'txtPassword'));
   
        $sth = $this->db->prepare("SELECT id, role FROM employee WHERE username = :login AND password = MD5(:password)");
        $sth->execute(array(':login' => $login, ':password' => $password));               
        $count = $sth->rowCount();
        $result = $sth->fetch();
        
        if ($count > 0)
        {
            Session::startSession();
            Session::set('loggedIn', true);
            Session::set('username', $login);
            Session::set('userID', $result['id']);
            Session::set('role', $result['role']);
            header('location: ../dashboard');
        } 
        else
        {            
            header('location: ../index');
        }
    }
    
    function doSignup()
    {
        $username = strip_tags(filter_input(INPUT_POST, 'txtUsernameSignUp'));
        $password = strip_tags(filter_input(INPUT_POST, 'txtPasswordSignUp'));
        $password = md5($password);
        $name = strip_tags(filter_input(INPUT_POST, 'txtName'));               
        $email = strip_tags(filter_input(INPUT_POST, 'txtEmail'));             
        
        try
        {
            $sth1 = $this->db->prepare('SELECT tempuser.name FROM tempuser WHERE tempuser.name = :name UNION SELECT employee.name FROM employee WHERE employee.name = :name');
            $sth1->setFetchMode(PDO::FETCH_ASSOC);
            $sth1->execute(array(':name' => $name));
            $duplicateName = $sth1->fetchAll();
            
            if (empty($duplicateName))
            {             
                $sth1 = $this->db->prepare('SELECT tempuser.email FROM tempuser WHERE tempuser.email = :email UNION SELECT employee.email FROM employee WHERE employee.email = :email');
                $sth1->setFetchMode(PDO::FETCH_ASSOC);
                $sth1->execute(array(':email' => $email));
                $duplicateEmail = $sth1->fetchAll();
                
                if(empty($duplicateEmail))
                {
                    $sth = $this->db->prepare('INSERT INTO tempuser (email, name, password, username) VALUES (:email, :name, :password, :username)');            
                    $sth->execute(array(':email' => $email, ':name' => $name, ':password' => $password, ':username' => $username));
                    $this->sendNewAccountEmail($email, $name, $username);
                }
                else
                {
                    echo "That email is being used";
                }                
            }
            else
            {
                echo "That username is taken";
            }
        }
        catch (PDOException $e)
        {
          echo $e->getMessage();   
        }       
    }
    
    function addUser()
    {
        $username = strip_tags(filter_input(INPUT_POST, 'txtUsernameSignUp'));
        $password = strip_tags(filter_input(INPUT_POST, 'txtPasswordSignUp'));       
        $name = strip_tags(filter_input(INPUT_POST, 'txtName'));               
        $email = strip_tags(filter_input(INPUT_POST, 'txtEmail'));             
        
        try
        {
            $sth = $this->db->prepare('INSERT INTO employee (email, name, password, username) VALUES (:email, :name, :password, :username)');            
            $sth->execute(array(':email' => $email, ':name' => $name, ':password' => $password, ':username' => $username));
                    
        }
        catch (PDOException $e)
        {
          echo $e->getMessage();   
        }
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
        try
        {
            $username = Session::get('username');            
            $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
            $sth1->execute(array(':username' => (string)$username));
        
            $userID = $sth1->fetch();
        } 
        catch (PDOException $ex)        
        {
            echo "Error" . $ex->getMessage();
        }
       
        
        if ($activeOnly == 0)
        {
            $sql = 'SELECT bugreport.id, bugreport.name, bugreport.status, bugreport.priority, "bug" AS type FROM bugreport WHERE assigned_to = :userID UNION SELECT changerequest.id, changerequest.name, changerequest.status, changerequest.priority, "changerequest" AS type FROM changerequest WHERE assigned_to = :userID UNION SELECT testcase.id, testcase.name, testcase.status, "" AS priority, "testcase" AS type FROM testcase WHERE assigned_to = :userID UNION SELECT artasset.id, artasset.name, artasset.status, "" AS priority, "asset" AS type FROM artasset WHERE assigned_to = :userID';        
        }
        else 
        {
            $sql = 'SELECT bugreport.id, bugreport.name, bugreport.status, bugreport.priority, "bug" AS type FROM bugreport WHERE assigned_to = :userID AND bugreport.status != "Closed" UNION SELECT changerequest.id, changerequest.name, changerequest.status, changerequest.priority, "changerequest" AS type FROM changerequest WHERE assigned_to = :userID AND changerequest.status != "Closed" UNION SELECT testcase.id, testcase.name, testcase.status, "" AS priority, "testcase" AS type FROM testcase WHERE assigned_to = :userID AND testcase.status != "Closed" UNION SELECT artasset.id, artasset.name, artasset.status, "" AS priority, "asset" AS type FROM artasset WHERE assigned_to = :userID AND artasset.status != "Closed"';
        }
        
        $sql .= ' ORDER BY type';
        
        $sth = $this->db->prepare($sql);        
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        
        $varUserID = (string)$userID[0];
        $sth->execute(array(':userID' => $varUserID));
        $data = $sth->fetchAll();
        
        echo json_encode($data);  
    }
    
    function getUsername()
    {
        $email = strip_tags(filter_input(INPUT_POST, 'txtEmailOnly'));
                   
        try
        {                       
            $sth1 = $this->db->prepare('SELECT name, username FROM employee WHERE email = :email');
            $sth1->execute(array(':email' => (string)$email));        
            $retName = $sth1->fetch();
            $varName = (string)$retName[0];
            $varUserName = (string)$retName[1];
            
            $sth1 = null;
            
            if ($varName && $varUserName)
            {
                $this->sendUsernameEmail($email, $varName, $varUserName);
                echo "Success";
            }           
            else
            {
                echo "Fail";
            }
        } 
        catch (PDOException $ex)        
        {
            echo "Error" . $ex->getMessage();
        }
    }
    
    function getPassword()
    {
        $email = strip_tags(filter_input(INPUT_POST, 'txtEmail'));
        $username =  strip_tags(filter_input(INPUT_POST, 'txtUsername'));
        try
        {                       
            $sth1 = $this->db->prepare('SELECT name FROM employee WHERE email = :email AND username = :username');
            $sth1->execute(array(':email' => (string)$email, ':username' => (string)$username));        
            $retName = $sth1->fetch();
            $varName = (string)$retName[0];                        
            $sth1 = null;
            
            $varPassword = $this->generateRandomString();
            
            $varPasswordEncode = md5($varPassword);
            $sth = $this->db->prepare('UPDATE employee SET password = :password WHERE username = :username');
            $sth->execute(array(':password' => $varPasswordEncode, ':username' => $username));
            $sth = null;
            
            if ($varName && $varPassword)
            {
                $this->sendPasswordEmail($email, $varName, $varPassword);
                echo "Success";
            }           
            else
            {
                echo "Fail";
            }           
        } 
        catch (PDOException $ex)        
        {
            echo "Error" . $ex->getMessage();
        }
    }
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
}

