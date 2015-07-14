<?php

class Requirement_Model extends Model
{
    function __construct() {
        parent::__construct();
    }  
    
    function ajaxInsert()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));        
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submittedBy = $sth1->fetch();
        
        $sth = $this->db->prepare('INSERT INTO requirement (name, project, description, submitted_by, last_modified_by, area_affected) VALUES (:name, :project, :description, :submittedBy, :lastModifiedBy, :area)');
        $sth->execute(array(':name' => $name, ':project' => $project, ':description' => $description, ':area' => $area, ':submittedBy' => $submittedBy[0], ':lastModifiedBy' => $submittedBy[0]));
              
    }
    
    function ajaxUpdate()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        
        $username = Session::get('username');
        $sth1 = $this->db->prepare('SELECT id FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submitted_by = $sth1->fetch();
        
        $sth = $this->db->prepare('UPDATE requirement SET area_affected = :area, description = :description, name = :name, project = :project, last_modified_by = :lmb WHERE id = :id');
        $sth->execute(array(':area' => $area, ':description' => $description, ':name' => $name, ':project' => $project, ':id' => $id, ':lmb' => $submitted_by[0]));
        
    }
    
    function ajaxGetReqsByProject($projectID)
    {
        $sth = $this->db->prepare('SELECT requirement.id, requirement.name FROM requirement INNER JOIN project ON requirement.project = project.id WHERE project.id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $projectID));
        $data = $sth->fetchAll();
                
        foreach($data as $value)
        {            
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") " . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetReqByID($reqID)
    {       
        $sth = $this->db->prepare('SELECT requirement.area_affected, requirement.description, requirement.name, requirement.project FROM requirement WHERE id = :reqID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':reqID' => $reqID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["areaID"] = $value['area_affected'];                      
            $data["description"] = $value['description'];            
            $data["name"] = $value['name'];                       
            $data["projectID"] = $value['project'];         
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $lastModifiedBy, $area)
    {
        $sql = 'SELECT requirement.id, requirement.name, areaaffected.area AS area_affected, employee.name AS last_modified_by FROM requirement INNER JOIN areaaffected ON areaaffected.id = requirement.area_affected INNER JOIN employee ON employee.id = requirement.last_modified_by WHERE requirement.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND requirement.project = ' . (string)$projectID;
        }
        
        if ($lastModifiedBy > 0)
        {
            $sql .= ' AND requirement.last_modified_by = ' . (string)$lastModifiedBy;
        }
        
        if ($area != 0)
        {
            $sql .= ' AND requirement.area_affected = ' . $area;
        }
        
        $sql .= ' ORDER BY requirement.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM requirement WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }    
}

