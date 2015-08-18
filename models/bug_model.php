<?php

class Bug_Model extends Model
{
    function __construct()
    {
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
       
        $msg = $submittedByName . " has assigned a Bug to you. \r\n Please resolve the issue promptly. \r\n\r\n The Bug Title is: " . $name . ". \r\n http://www.fluxlogicstudios.com/codecycle";
        $subject = "CodeCycle: Bug assigned to you";
        $headers = "From: " . $fromEmail . "\r\n" . "X-Mailer: PHP/" . phpversion();
        
        mail($toEmail, $subject, $msg, $headers);
    }
    
    function ajaxInsert()
    {
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));               
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $platform = strip_tags(filter_input(INPUT_POST, 'ddPlatform'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $repro_steps = strip_tags(filter_input(INPUT_POST, 'txtaRepro'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $time = strip_tags(filter_input(INPUT_POST, 'txtTime'));
        $interval = strip_tags(filter_input(INPUT_POST, 'ddTime'));
        
        $varSubmittedBy = Session::get('userID');
        try
        {
            $sql = "INSERT INTO `bugreport` (`area_affected`, `assigned_to`, `description`, `name`, `platform`, `project`, `repro_steps`, `status`, `submitted_by`, `complete_time`, `time_interval`) VALUES (:area, :assignedTo, :description, :name, :platform, :project, :reproSteps, :status, :submittedBy, :time, :interval)";
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth = $this->db->prepare($sql);           
            $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':platform' => $platform, ':project' => $project, ':reproSteps' => $repro_steps, ':status' => $status, ':submittedBy' => $varSubmittedBy, ':time' => $time, ':interval' => $interval));
                        
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $this->sendEmail($assigned_to, $name, $varSubmittedBy);        
    }
    
    function ajaxUpdate()
    {
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $assigned_to = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));       
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));               
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $platform = strip_tags(filter_input(INPUT_POST, 'ddPlatform'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $repro_steps = strip_tags(filter_input(INPUT_POST, 'txtaRepro'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $time = strip_tags(filter_input(INPUT_POST, 'txtTime'));
        $interval = strip_tags(filter_input(INPUT_POST, 'ddTime'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $varSubmittedBy = Session::get('userID');           
        
        try
        {
            $sth1 = $this->db->prepare('SELECT assigned_to FROM bugreport WHERE id = :id');
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
            $sth = $this->db->prepare('UPDATE bugreport SET area_affected = :area, assigned_to = :assignedTo, description = :description, name = :name, platform = :platform, project = :project, repro_steps = :reproSteps, status = :status, complete_time = :time, time_interval = :interval WHERE id = :id');
            $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':platform' => $platform, ':project' => $project, ':reproSteps' => $repro_steps, ':status' => $status, ':id' => $id, ':time' => $time, ':interval' => $interval));
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        
        if ($assigned_to != $varCurrAssignedTo)
        {
            $this->sendEmail($assigned_to, $name, $varSubmittedBy);
        }
    }
    
    function ajaxGetArea($projectID)
    {        
        $sth = $this->db->prepare('SELECT areaaffected.id, areaaffected.area FROM areaaffected INNER JOIN project ON areaaffected.project = project.name WHERE project.id = :projectID ORDER BY areaaffected.area');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {           
            echo "<option value='" . $value['id'] . "'>" . $value['area'] . "</option>";
        }
        unset($value);               
    }
    
    function ajaxGetBugsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT bugreport.id, bugreport.name FROM bugreport INNER JOIN project ON bugreport.project = project.id WHERE project.id = :projectID ORDER BY bugreport.id');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {            
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") " . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetBugByID($bugID)
    {       
        $sth = $this->db->prepare('SELECT bugreport.area_affected, bugreport.assigned_to, bugreport.description, bugreport.id, bugreport.name, bugreport.platform, bugreport.project, bugreport.repro_steps, bugreport.status, bugreport.complete_time, bugreport.time_interval FROM bugreport WHERE id = :bugID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':bugID' => $bugID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["areaID"] = $value['area_affected'];            
            $data["assignedToID"] = $value['assigned_to'];            
            $data["description"] = $value['description'];
            $data["id"] = $value['id'];
            $data["name"] = $value['name'];
            $data["platformID"] = $value['platform'];            
            $data["projectID"] = $value['project'];            
            $data["reproSteps"] = $value['repro_steps'];
            $data["status"] = $value['status'];
            $data["time"] = $value['complete_time'];
            $data["interval"] = $value['time_interval'];
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status, $active, $cycle)
    {
             
        $sql = 'SELECT bugreport.id, bugreport.name, bugreport.status, employee.name AS assigned_to FROM bugreport INNER JOIN employee ON bugreport.assigned_to = employee.id WHERE bugreport.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND bugreport.project = ' . (string)$projectID;
        }
        
        if ($assignedTo > 0)
        {
            $sql .= ' AND bugreport.assigned_to = ' . (string)$assignedTo;
        }
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND bugreport.status = "' . (string)$status . '"';
        }
        
        if ($active === "false")
        {
            $sql .= ' AND bugreport.status != "Closed" AND bugreport.status != "Deferred" AND bugreport.status != "Fixed"';
        }
        
        if ($cycle > 0)
        {
            $sql .= ' AND bugreport.cycle = ' . (string)$cycle;
        }
        
        $sql .= ' ORDER BY bugreport.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();        
        echo json_encode($data);        
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM bugreport WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }
    
    function downloadExcel($projectID, $assignedTo, $status, $active, $cycle)
    {
        $sql = 'bugreport.id, bugreport.name, bugreport.description, IFNULL(areaaffected.area, "None") as area_affected, bugreport.repro_steps, bugreport.status, IFNULL(project.name, "None") as project, IFNULL(employee.name, "None") as assigned_to, IFNULL(platform.name, "None") as platform, bugreport.priority, bugreport.complete_time, bugreport.time_interval FROM bugreport LEFT JOIN areaaffected ON bugreport.area_affected = areaaffected.id LEFT JOIN project ON bugreport.project = project.id LEFT JOIN employee ON bugreport.assigned_to = employee.id LEFT JOIN platform ON bugreport.platform = platform.id WHERE bugreport.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND bugreport.project = ' . (string)$projectID;
        }
        
        if ($assignedTo > 0)
        {
            $sql .= ' AND bugreport.assigned_to = ' . (string)$assignedTo;
        }
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND bugreport.status = "' . (string)$status . '"';
        }
        
        if ($active === "false")
        {
            $sql .= ' AND bugreport.status != "Closed" AND bugreport.status != "Deferred" AND bugreport.status != "Fixed"';
        }
        
        if ($cycle > 0)
        {
            $sql .= ' AND bugreport.cycle = ' . (string)$cycle;
        }
        
        $sql .= ' ORDER BY bugreport.id ';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();        
                
    }
}

