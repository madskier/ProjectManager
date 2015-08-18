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
        $toEmail = $sth->fetch();
        $toEmail = (string)$toEmail[0];
        
        $sth2 = $this->db->prepare('SELECT email, name FROM employee WHERE id = :submittedBy');
        $sth2->execute(array(':submittedBy' => $submittedBy));
        $data = $sth2->fetch();
        
        $submittedByName = (string)$data[1];
        $fromEmail = (string)$data[0];       
       
        $msg = $submittedByName . " has assigned a Test Case to you. \r\n Please follow the reproduction steps for the case during your testing efforts. \r\n\r\n The Test Case Title is: " . $name . ". \r\n http://www.fluxlogicstudios.com/codecycle";
        $subject = "CodeCycle: Test Case assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
        
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
        $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        $varSubmittedBy = (string)$submitted_by[0];
        $this->sendEmail($assigned_to, $name, $varSubmittedBy);
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
        $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        $varSubmittedBy = (string)$submitted_by[0];
        
        $sth = $this->db->prepare('UPDATE testcase SET area = :area, assigned_to = :assignedTo, description = :description, name = :name, project = :project, repro_steps = :repro, status = :status WHERE id = :id');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':project' => $project, ':repro' => $repro,':status' => $status, ':id' => $id));
        
        $this->sendEmail($assigned_to, $name, $varSubmittedBy);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM testcase WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }
    
    function ajaxGetTCsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT testcase.id, testcase.name FROM testcase INNER JOIN project ON testcase.project = project.id WHERE project.id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {            
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") " . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetTCByID($tcID)
    {       
        $sth = $this->db->prepare('SELECT testcase.area, testcase.assigned_to, testcase.description, testcase.name, testcase.project, testcase.repro_steps, testcase.status FROM testcase WHERE id = :tcID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':tcID' => $tcID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["areaID"] = $value['area'];            
            $data["assignedToID"] = $value['assigned_to'];            
            $data["description"] = $value['description'];            
            $data["name"] = $value['name'];
            $data["reproSteps"] = $value['repro_steps'];            
            $data["projectID"] = $value['project'];            
            $data["status"] = $value['status'];            
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status)
    {
        $sql = 'SELECT testcase.id, testcase.name, testcase.status, IFNULL(employee.name, "None") AS assigned_to FROM testcase LEFT JOIN employee ON testcase.assigned_to = employee.id WHERE testcase.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND testcase.project = ' . (string)$projectID;
        }
        
        if ($assignedTo > 0)
        {
            $sql .= ' AND testcase.assigned_to = ' . (string)$assignedTo;
        }
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND testcase.status = "' . (string)$status . '"';
        }
        
        $sql .= ' ORDER BY testcase.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
}
