<?php

class Requirement_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function ajaxInsert()
    {
        $name;
        $project;
        $description;
        $area;
        $submittedBy;
        $sth = $this->db->prepare('INSERT INTO requirement (name, project, description, submitted_by, last_modified_by, area_affected) VALUES (:name, :project, :description, :submittedBy, :lastModifiedBy, :area)');
        $sth->execute(array(':name' => $name, ':project' => $project, ':description' => $description, ':area' => $area, ':submittedBy' => $submittedBy, ':lastModifiedBy' => $submittedBy));
    }
}

