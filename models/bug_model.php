<?php

class Bug_Model extends Model
{
    function __construct()
    {
        parent::__construct();
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
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT name FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('INSERT INTO bugreport (area_affected, assigned_to, description, name, platform, project, repro_steps, status, submitted_by) VALUES (:area, :assignedTo, :description, :name, :platform, :project, :reproSteps, :status, :submittedBy)');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':platform' => $platform, ':project' => $project, ':reproSteps' => $repro_steps, ':status' => $status, ':submittedBy' => $submitted_by[0]));
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
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $sth = $this->db->prepare('UPDATE bugreport SET area_affected = :area, assigned_to = :assignedTo, description = :description, name = :name, platform = :platform, project = :project, repro_steps = :reproSteps, status = :status WHERE id = :id');
        $sth->execute(array(':area' => $area, ':assignedTo' => $assigned_to, ':description' => $description, ':name' => $name, ':platform' => $platform, ':project' => $project, ':reproSteps' => $repro_steps, ':status' => $status, ':id' => $id));
    }
    
    function ajaxGetArea($projectID)
    {        
        $sth = $this->db->prepare('SELECT areaaffected.id, areaaffected.area FROM areaaffected INNER JOIN project ON areaaffected.project = project.name WHERE project.id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {
            //$separater = join(",", $value);
            //echo "<option value=" . $separater . ">" . $separater . "</option>";
            echo "<option value='" . $value['id'] . "'>" . $value['area'] . "</option>";
        }
        unset($value);               
    }
    
    function ajaxGetBugsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT bugreport.id, bugreport.name FROM bugreport INNER JOIN project ON bugreport.project = project.id WHERE project.id = :projectID');
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
        $sth = $this->db->prepare('SELECT bugreport.area_affected, bugreport.assigned_to, bugreport.description, bugreport.id, bugreport.name, bugreport.platform, bugreport.project, bugreport.repro_steps, bugreport.status FROM bugreport WHERE id = :bugID');
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
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $assignedTo, $status)
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
        
        if ($status != 0)
        {
            $sql .= ' AND bugreport.status = ' . $status;
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
}

