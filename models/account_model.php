<?php

class Account_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function sendEmail($user, $role)
    {        
        $sth = $this->db->prepare('SELECT email FROM employee WHERE id = 1');
        $sth->execute();
        $toEmail = $sth->fetch();
        $toEmail = (string)$toEmail[0];
        
        $sth2 = $this->db->prepare('SELECT email, name FROM employee WHERE id = :user');
        $sth2->execute(array(':user' => $user));
        $data = $sth2->fetch();
        
        $submittedByName = (string)$data[1];
        $fromEmail = (string)$data[0];       
       
        $msg = $submittedByName . " has requested to become a " . $role . ". \r\n\r\n http://www.fluxlogicstudios.com/codecycle";
        $subject = "CodeCycle: Role Requested";
        $headers = "From: " . $fromEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
    }
    
    function changePassword()
    {
        $currentPassword = strip_tags(filter_input(INPUT_POST, 'txtCurrent'));        
        $newPassword = strip_tags(filter_input(INPUT_POST, 'txtNew'));
        $newPassword = md5($newPassword);
        
        $userID = Session::get('userID');
        $username = Session::get('username');
        
        $sth1 = $this->db->prepare('SELECT username FROM employee WHERE password = MD5(:password) AND id = :id');
        $sth1->execute(array(':password' => $currentPassword, ':id' => $userID));
        $result = $sth1->fetch();
        
        if ((string)$result[0] === $username)
        {
            $sth = $this->db->prepare('UPDATE employee SET password = :password WHERE id = :userID');
            $sth->execute(array(':userID' => $userID, ':password' => $newPassword));
        }   
        else
        {
            echo "Incorrect Password";
        }
               
    }
    
    function requestRole()
    {
        $userID = Session::get('userID');
        
        $userRole = strip_tags(filter_input(INPUT_POST, 'txtNewRole'));
        $this->sendEmail($userID, $userRole);
    }
    
    function ajaxGetCurrentRole()
    {
        try
        {
            $userID = Session::get('userID');
            $userRole = Session::get('role');        
            
            echo json_encode($userRole);
        } 
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }        
    }
    
    function ajaxGetRoles()
    {
        try
        {    
            $sth = $this->db->prepare('SELECT role.role FROM role ORDER BY role.role');
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetchAll();

            foreach($data as $value)
            {
                echo "<option value='" . $value['role'] . "'>" . $value['role'] . "</option>";
            }
            unset($value);  
            $sth = null; 
        } 
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
}

