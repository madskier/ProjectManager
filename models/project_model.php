<?php

class Project_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function ajaxInsert()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtName'));
        $sth = $this->db->prepare('INSERT INTO project (name) VALUES (:name)');
        $sth->execute(array(':name' => $name));
    }
}



