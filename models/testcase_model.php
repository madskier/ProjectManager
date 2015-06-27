<?php

class Testcase_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function ajaxInsert()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        $project = strip_tags(filter_input(INPUT_POST, 'ddProject'));
        $assignedTo = strip_tags(filter_input(INPUT_POST, 'ddAssignedTo'));
        $status = strip_tags(filter_input(INPUT_POST, 'ddStatus'));
        $area = strip_tags(filter_input(INPUT_POST, 'ddArea'));
        $repro = strip_tags(filter_input(INPUT_POST, 'txtaRepro'));
        $description = strip_tags(filter_input(INPUT_POST, 'txtaDescription'));
        $sth = $this->db->prepare('INSERT INTO testcase (name, project, assigned_to, status, area, repro_steps, description) VALUES (:name, :project, :assignedTo, :status, :area, :repro, :description)');
        $sth->execute(array(':name' => $name, ':project' => $project, ':assignedTo' => $assignedTo, ':status' => $status, ':area' => $area, ':repro' => $repro, ':description' => $description));
    }
}
