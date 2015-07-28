<?php

class Asset_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function sendEmail($user, $name, $submittedBy)
    {        
        $sth = $this->db->prepare('SELECT email FROM employee WHERE id = :assignedTo');
        $sth->execute(array(':assignedTo' => $user));
        
        $sth2 = $this->db->prepare('SELECT email, name FROM employee WHERE id = :submittedBy');
        $sth2->execute(array(':submittedBy' => $submittedBy));
        $data = $sth2->fetch();
        
        foreach($data as $value)
        {           
            $submittedByName = $value['name'];
            $fromEmail = $value['email'];
        }
        unset($value);    
        
        $toEmail = $sth->fetch();
        $fromEmail = $sth2->fetch();
        $submittedByName = $fromEmail[1];
        $msg = $submittedByName . "has assigned an Asset to you. \r\n Please create/modify the work as soon as possible. \r\n\r\n The Asset Title is " . $name . ".";
        $subject = "Asset assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" .
                   "Reply-To: " . $fromEmail . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
    }
    
    function ajaxInsert()
    {        
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $type = strip_tags(filter_input(INPUT_POST, 'ddType'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));        
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('INSERT INTO artasset (assigned_to, name, project, status, type) VALUES (:assignedTo, :name, :project, :status, :type)');
        $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type));
        
        //sendEmail($assigned_to, $name, $submitted_by);
        
        for ($i = 0; $i < 20; $i += 1)
        {
            $fieldName = 'txtTitle' . $i;
            
            $name = strip_tags(filter_input(INPUT_POST, (string)$fieldName));
            
            if (!empty($name))
            {
                $sth = $this->db->prepare('INSERT INTO artasset (assigned_to, name, project, status, type) VALUES (:assignedTo, :name, :project, :status, :type)');
                $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type));
        
                //sendEmail($assigned_to, $name, $submitted_by);  
            }
        }
    }
    
    function ajaxUpdate()
    {
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $type = strip_tags(filter_input(INPUT_POST, 'ddType'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));        
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));        
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('UPDATE artasset SET assigned_to = :assignedTo, name = :name, project = :project, status = :status, type = :type WHERE id = :id');
        $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type, ':id' => $id));
        
        //sendEmail($assigned_to, $name, $submitted_by);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM artasset WHERE id = :id');
        $sth->execute(array(':id' => $id));
    } 
}



