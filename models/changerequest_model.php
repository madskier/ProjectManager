<?php

class Changerequest_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function sendEmail($user, $name, $submittedBy)
    {
        $msg = $submittedBy . "has assigned a Bug to you. \r\n Please resolve the issue promptly. \r\n\r\n The Bug Title is " . $name . ".";
        $subject = "Bug assigned to you";
        
        $sth = $this->db->prepare('SELECT email FROM employee WHERE id = :assignedTo');
        $sth->execute(array(':assignedTo' => $user));
        
        $sth2 = $this->db->prepare('SELECT email FROM employee WHERE id = 1');
        $sth2->execute();
        
        $toEmail = $sth->fetch();
        $fromEmail = $sth2->fetch();
        $headers = "From: " . $fromEmail . "\r\n" .
                   "Reply-To: " . $fromEmail . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
    }
    
    function ajaxInsert()
    {
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));               
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $priority = strip_tags(filter_input(INPUT_POST, 'ddPriority'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));        
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('INSERT INTO changerequest (area_affected, assigned_to, description, name, priority, project, status) VALUES (:area, :assignedTo, :description, :name, :priority, :project, :status)');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':priority' => $priority, ':project' => $project, ':status' => $status));
        
        sendEmail($assigned_to, $name, $submitted_by); 
    }
    
    function ajaxUpdate()
    {
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));               
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $priority = strip_tags(filter_input(INPUT_POST, 'ddPriority'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));     
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('UPDATE changerequest SET area_affected = :area, assigned_to = :assignedTo, description = :description, name = :name, priority = :priority, project = :project, status = :status WHERE id = :id');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':priority' => $priority, ':project' => $project, ':status' => $status, ':id' => $id));
        
        sendEmail($assigned_to, $name, $submitted_by);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM changerequest WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }
    
    function ajaxGetCRsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT changerequest.id, changerequest.name FROM changerequest INNER JOIN project ON changerequest.project = project.id WHERE project.id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {            
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") " . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetCRByID($crID)
    {       
        $sth = $this->db->prepare('SELECT changerequest.area_affected, changerequest.assigned_to, changerequest.description, changerequest.id, changerequest.name, changerequest.priority, changerequest.project, changerequest.status FROM changerequest WHERE id = :crID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':crID' => $crID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["areaID"] = $value['area_affected'];            
            $data["assignedToID"] = $value['assigned_to'];            
            $data["description"] = $value['description'];
            $data["id"] = $value['id'];
            $data["name"] = $value['name'];
            $data["priority"] = $value['priority'];            
            $data["projectID"] = $value['project'];            
            $data["status"] = $value['status'];            
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status)
    {
        $sql = 'SELECT changerequest.id, changerequest.name, changerequest.status, employee.name AS assigned_to FROM changerequest INNER JOIN employee ON changerequest.assigned_to = employee.id WHERE changerequest.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND changerequest.project = ' . (string)$projectID;
        }
        
        if ($assignedTo > 0)
        {
            $sql .= ' AND changerequest.assigned_to = ' . (string)$assignedTo;
        }
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND changerequest.status = "' . (string)$status . '"';
        }
        
        $sql .= ' ORDER BY changerequest.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
}


