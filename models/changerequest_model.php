<?php

class Changerequest_Model extends Model
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
       
        $msg = $submittedByName . " has assigned a Change Request to you. \r\n Please accomplish this task as soon as possible. \r\n\r\n The Change Request Title is: " . $name . ". \r\n http://www.fluxlogicstudios.com/codecycle";
        $subject = "CodeCycle: Change Request assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
        
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
        $requested_by = strip_tags(filter_input(INPUT_POST, 'ddRequestedBy'));
        $approach = strip_tags(filter_input(INPUT_POST, 'txtaApproach'));
        $time = strip_tags(filter_input(INPUT_POST, 'txtTime'));
        $interval = strip_tags(filter_input(INPUT_POST, 'ddTime'));
        $question = strip_tags(filter_input(INPUT_POST, 'txtaQuestions'));
        
        $reqsToMap = array();
        $reqsToMap = $_POST['mlReqMap'];       
        
        try
        {
            $username = Session::get('username');
            $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
            $sth1->execute(array(':username' => $username));

            $submitted_by = $sth1->fetch();
            $varSubmittedBy = (string)$submitted_by[0];
        }
        catch (PDOException $e)
        {
            echo $e->getMessage(); 
        }
        
        try
        {
            $sth = $this->db->prepare('INSERT INTO changerequest (approach, area_affected, assigned_to, complete_time, description, name, priority, project, question, status, time_interval, requested_by) VALUES (:approach, :area, :assignedTo, :time, :description, :name, :priority, :project, :question, :status, :interval, :requestedBy)');
            
            $sth->execute(array(':approach' => $approach, ':area' => $area, ':assignedTo' => $assigned_to, ':time' => $time ,':description' => $description, ':name' => $name, ':priority' => $priority, ':project' => $project, ':question' => $question ,':status' => $status, ':interval' => $interval, ':requestedBy' => $requested_by));
        
            $sth2 = $this->db->prepare('SELECT id FROM changerequest ORDER BY id desc limit 1');
            $sth2->execute();
            $crID = $sth2->fetch();
        }
        catch (PDOException $e)
        {
          echo $e->getMessage();   
        }       
        
        if (is_array($reqsToMap) || is_object($reqsToMap))
        {            
            foreach($reqsToMap as $reqID)
            {
                strip_tags($reqID);                
                
                try
                {
                    $sth = $this->db->prepare('INSERT INTO crreqmap (cr_id, req_id) VALUES (:crID, :reqID)');
                    $sth->execute(array(':crID' => $crID[0], ':reqID' => $reqID));
                }
                catch (PDOException $e)
                {
                    echo $e->getMessage();
                }
            }            
        }
        
        if ($assigned_to)
        {
            $this->sendEmail($assigned_to, $name, $varSubmittedBy); 
        }
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
        $requested_by = strip_tags(filter_input(INPUT_POST, 'ddRequestedBy'));
        $approach = strip_tags(filter_input(INPUT_POST, 'txtaApproach'));
        $time = strip_tags(filter_input(INPUT_POST, 'txtTime'));
        $interval = strip_tags(filter_input(INPUT_POST, 'ddTime'));
        $question = strip_tags(filter_input(INPUT_POST, 'txtaQuestions'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $reqsToMap = $_POST['mlReqMap'];    
        
        try
        {
            $username = Session::get('username');
            $sth1 = $this->db->prepare('SELECT id FROM employee WHERE username = :username');
            $sth1->execute(array(':username' => $username));
            $submitted_by = $sth1->fetch();
            $varSubmittedBy = (string)$submitted_by[0];
            $sth1 = null;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage(); 
        }
        
        try
        {
            $sth1 = $this->db->prepare('SELECT assigned_to FROM changerequest WHERE id = :id');
            $sth1->execute(array(':id' => $id));
            $currAssignedTo = $sth1->fetch();
            $varCurrAssignedTo = (string)$currAssignedTo[0];
            $sth1 = null;
        } 
        catch (PDOException $ex)
        {
            echo $e->getMessage();
        }
        
        try
        {
            $sth = $this->db->prepare('UPDATE changerequest SET approach = :approach, area_affected = :area, assigned_to = :assignedTo, complete_time = :time, description = :description, name = :name, priority = :priority, project = :project, question = :question, status = :status, time_interval = :interval, requested_by = :requestedBy WHERE id = :id');
            $sth->execute(array(':approach' => $approach,':area' => $area, ':assignedTo' => $assigned_to, ':time' => $time,':description' => $description, ':name' => $name, ':priority' => $priority, ':project' => $project, ':question' => $question, ':status' => $status, ':interval' => $interval, ':requestedBy' => $requested_by, ':id' => $id));
        }
        catch (PDOException $e)
        {
            echo $e->getMessage(); 
        }
        
        if (is_array($reqsToMap) || is_object($reqsToMap))
        {            
            foreach($reqsToMap as $reqID)
            {
                strip_tags($reqID);                
                
                try
                {
                    $sth = $this->db->prepare('INSERT IGNORE INTO crreqmap (cr_id, req_id) VALUES (:crID, :reqID)');
                    $sth->execute(array(':crID' => $id, ':reqID' => $reqID));
                }
                catch (PDOException $e)
                {
                    echo $e->getMessage();
                }
            }            
        }
        
        if ($assigned_to != $varCurrAssignedTo && $status != "Closed" && $status != "Deferred")
        {
            $this->sendEmail($assigned_to, $name, $varSubmittedBy);
        }
    }
    
    function ajaxDelete($id)
    {
        try
        {
           $sth = $this->db->prepare('DELETE FROM changerequest WHERE id = :id');
           $sth->execute(array(':id' => $id));

           $sth1 = $this->db->prepare('DELETE FROM crreqmap WHERE cr_id = :id');
           $sth1->execute(array(':id' => $id));

           $sth=null;
           $sth1=null;   
        } 
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
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
        $sth = $this->db->prepare('SELECT changerequest.approach, changerequest.area_affected, changerequest.assigned_to, changerequest.complete_time, changerequest.description, changerequest.id, changerequest.name, changerequest.priority, changerequest.project, changerequest.question, changerequest.status, changerequest.time_interval, changerequest.requested_by FROM changerequest WHERE id = :crID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':crID' => $crID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["approach"] = $value['approach'];
            $data["areaID"] = $value['area_affected'];            
            $data["assignedToID"] = $value['assigned_to'];
            $data["time"] = $value['complete_time'];
            $data["description"] = $value['description'];
            $data["id"] = $value['id'];
            $data["name"] = $value['name'];
            $data["priority"] = $value['priority'];            
            $data["projectID"] = $value['project'];
            $data["question"] = $value['question'];
            $data["status"] = $value['status'];    
            $data["interval"] = $value['time_interval'];
            $data["requestedBy"] = $value['requested_by']; 
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetReqsLinkedCR($crID)
    {
        $sth = $this->db->prepare('SELECT crreqmap.req_id FROM crreqmap WHERE crreqmap.cr_id = :crID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':crID' => $crID));
        $data = $sth->fetchAll();
        $index = 0;
        foreach($data as $value)
        {               
            $data[$index] = $value['req_id'];
            $index++;
        }
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status, $active, $cycle)
    {
        $sql = 'SELECT changerequest.id, changerequest.name, changerequest.status, IFNULL(employee.name, "None") AS assigned_to FROM changerequest LEFT JOIN employee ON changerequest.assigned_to = employee.id WHERE changerequest.id > 0';        
                
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
        if ($active === "false")
        {
            $sql .= ' AND changerequest.status != "Closed" AND changerequest.status != "Deferred" AND changerequest.status != "Testing"';
        }
        
        if ($cycle > 0)
        {
            $sql .= ' AND changerequest.cycle = ' . (string)$cycle;
        }
        
        $sql .= ' ORDER BY changerequest.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
}


