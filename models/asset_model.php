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
        $toEmail = $sth->fetch();
        $toEmail = (string)$toEmail[0];
        
        $sth2 = $this->db->prepare('SELECT email, name FROM employee WHERE id = :submittedBy');
        $sth2->execute(array(':submittedBy' => $submittedBy));
        $data = $sth2->fetch();
        
        $submittedByName = (string)$data[1];
        $fromEmail = (string)$data[0];       
       
        $msg = $submittedByName . " has assigned an Asset to you. \r\n Please accomplish this task as soon as possible. \r\n\r\n The Asset Title is: " . $name . ". \r\n http://www.fluxlogicstudios.com/codecycle";
        $subject = "CodeCycle: Asset assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
        
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
        $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        $varSubmittedBy = (string)$submitted_by[0];
        $sth1 = null;
        
        $sth = $this->db->prepare('INSERT INTO artasset (assigned_to, name, project, status, type) VALUES (:assignedTo, :name, :project, :status, :type)');
        $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type));
        
        $this->sendEmail($assigned_to, $name, $varSubmittedBy);
        
        for ($i = 0; $i < 20; $i += 1)
        {
            $fieldName = 'txtTitle' . $i;
            
            $name = strip_tags(filter_input(INPUT_POST, (string)$fieldName));
            
            if (!empty($name))
            {
                $sth = $this->db->prepare('INSERT INTO artasset (assigned_to, name, project, status, type) VALUES (:assignedTo, :name, :project, :status, :type)');
                $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type));
        
                $this->sendEmail($assigned_to, $name, $varSubmittedBy);  
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
        $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        $varSubmittedBy = (string)$submitted_by[0];
        
        $sth = $this->db->prepare('UPDATE artasset SET assigned_to = :assignedTo, name = :name, project = :project, status = :status, type = :type WHERE id = :id');
        $sth->execute(array(':assignedTo' => $assigned_to, ':name' => $name, ':project' => $project, ':status' => $status, ':type' => $type, ':id' => $id));
        
        $this->sendEmail($assigned_to, $name, $varSubmittedBy);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM artasset WHERE id = :id');
        $sth->execute(array(':id' => $id));
    } 
    
    function ajaxGetAssetsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT artasset.id, artasset.name FROM artasset INNER JOIN project ON artasset.project = project.id WHERE project.id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {            
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") " . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetAssetByID($id)
    {
        $sth = $this->db->prepare('SELECT artasset.assigned_to, artasset.name, artasset.project, artasset.status, artasset.type FROM artasset WHERE id = :assetID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':assetID' => $id));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {                          
            $data["assignedToID"] = $value['assigned_to'];           
            $data["name"] = $value['name'];
            $data["type"] = $value['type'];            
            $data["projectID"] = $value['project'];           
            $data["status"] = $value['status'];            
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status, $type, $active)
    {
        $sql = 'SELECT artasset.id, artasset.name, artasset.status, artasset.type, IFNULL(employee.name, "None") AS assigned_to FROM artasset LEFT JOIN employee ON artasset.assigned_to = employee.id WHERE artasset.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND artasset.project = ' . (string)$projectID;
        }
        
        if ($assignedTo > 0)
        {
            $sql .= ' AND artasset.assigned_to = ' . (string)$assignedTo;
        }
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND artasset.status = "' . (string)$status . '"';
        }
        
        if ($type != "" && (string)$type != "0")
        {
            $sql .= ' AND artasset.type = "' . (string)$type . '"';
        }
        
        $sql .= ' ORDER BY artasset.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
}



