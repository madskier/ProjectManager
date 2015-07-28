<?php

class Testcase_Model extends Model
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
        $submittedByName = $sth3->fetch();
        $msg = $submittedByName . "has assigned a Test Case to you. \r\n Please include the case in your testing efforts. \r\n\r\n The Test Case Title is " . $name . ".";
        $subject = "Test Case assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" .
                   "Reply-To: " . $fromEmail . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
    }
    
    function ajaxInsert()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $repro = strip_tags(filter_input(INPUT_POST, 'txtaRepro'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        
        $sth = $this->db->prepare('INSERT INTO testcase (name, project, assigned_to, status, area, repro_steps, description) VALUES (:name, :project, :assignedTo, :status, :area, :repro, :description)');
        $sth->execute(array(':name' => $name, ':project' => $project, ':assignedTo' => $assigned_to, ':status' => $status, ':area' => $area, ':repro' => $repro, ':description' => $description));
    
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        sendEmail($assigned_to, $name, $submitted_by);
    }
    
     function ajaxUpdate()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $repro = strip_tags(filter_input(INPUT_POST, 'txtaRepro'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('UPDATE testcase SET area = :area, assigned_to = :assignedTo, description = :description, name = :name, project = :project, repro_steps = :repro, status = :status WHERE id = :id');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':project' => $project, ':repro' => $repro,':status' => $status, ':id' => $id));
        
        sendEmail($assigned_to, $name, $submitted_by);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM testcase WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }
    
    function ajaxGetTCsByProject($projectID)
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
