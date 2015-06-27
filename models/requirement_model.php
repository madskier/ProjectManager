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
        $sth1 = $this->db->prepare('SELECT name FROM Employee WHERE username = :username');
        $sth1->execute(array(':username' => $username));
        
        $submittedBy = $sth1->fetch();
        
        $sth = $this->db->prepare('INSERT INTO requirement (name, project, description, submitted_by, last_modified_by, area_affected) VALUES (:name, :project, :description, :submittedBy, :lastModifiedBy, :area)');
        $sth->execute(array(':name' => $name, ':project' => $project, ':description' => $description, ':area' => $area, ':submittedBy' => $submittedBy[0], ':lastModifiedBy' => $submittedBy[0]));
    }
}

