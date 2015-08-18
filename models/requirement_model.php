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
        $role = strip_tags(filter_input(INPUT_POST, 'txtaRoles'));
        $rule = strip_tags(filter_input(INPUT_POST, 'txtaRules'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea')); 
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        
        $varSubmittedBy = Session::get('userID');
        
        try
        {
            $sth = $this->db->prepare('INSERT INTO requirement (name, project, description, submitted_by, last_modified_by, area_affected, role, business_rule, status) VALUES (:name, :project, :description, :submittedBy, :lastModifiedBy, :area, :role, :business, :status)');
            $sth->execute(array(':name' => $name, ':project' => $project, ':description' => $description, ':area' => $area, ':submittedBy' => $varSubmittedBy, ':lastModifiedBy' => $varSubmittedBy, ':role' => $role, ':business' => $rule, ':status' => $status));
        } 
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }             
    }
    
    function ajaxUpdate()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $role = strip_tags(filter_input(INPUT_POST, 'txtaRoles'));
        $rule = strip_tags(filter_input(INPUT_POST, 'txtaRules'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
                
        $varSubmittedBy = Session::get('userID');
        
        try
        {
            $sth = $this->db->prepare('UPDATE requirement SET area_affected = :area, description = :description, name = :name, project = :project, last_modified_by = :lmb, role = :role, business_rule = :rule, status = :status WHERE id = :id');
            $sth->execute(array(':area' => $area, ':description' => $description, ':name' => $name, ':project' => $project, ':id' => $id, ':lmb' => $varSubmittedBy, ':role' => $role, ':rule' => $rule, ':status' => $status));
        } 
        catch (PDOException $ex) {
            echo $ex->getMessage();
        }       
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
        $sth = $this->db->prepare('SELECT requirement.area_affected, requirement.description, requirement.name, requirement.project, requirement.role, requirement.business_rule, requirement.status FROM requirement WHERE id = :reqID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':reqID' => $reqID));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {            
            $data["areaID"] = $value['area_affected'];                      
            $data["description"] = $value['description'];            
            $data["name"] = $value['name'];                       
            $data["projectID"] = $value['project']; 
            $data["roles"] = $value['role'];
            $data["businessRules"] = $value['business_rule'];
            $data["status"] = $value['status'];
        }
        
        echo json_encode($data);
    }
    
    function ajaxGetList($projectID, $lastModifiedBy, $area, $status, $active)
    {
        $sql = 'SELECT requirement.id, requirement.name, IFNULL(areaaffected.area, "None") AS area_affected, requirement.status, IFNULL(employee.name, "None") AS last_modified_by FROM requirement LEFT JOIN areaaffected ON areaaffected.id = requirement.area_affected LEFT JOIN employee ON employee.id = requirement.last_modified_by WHERE requirement.id > 0';        
                
        if ($projectID > 0)
        {
            $sql .= ' AND requirement.project = ' . (string)$projectID;
        }
        
        if ($lastModifiedBy > 0)
        {
            $sql .= ' AND requirement.last_modified_by = ' . (string)$lastModifiedBy;
        }
        
        if ($area > 0)
        {
            $sql .= ' AND requirement.area_affected = ' . $area;
        }  
        
        if ($status != "" && (string)$status != "0")
        {
            $sql .= ' AND requirement.status = "' . (string)$status . '"';
            
        }
        
        if ($active === "false")
        {
            $sql .= ' AND requirement.status != "Closed"';
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

