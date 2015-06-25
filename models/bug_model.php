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
    
    function ajaxGetList()
    {
        
    }
}

