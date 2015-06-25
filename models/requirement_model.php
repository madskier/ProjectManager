<?php

class Requirement_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function Insert()
    {
        $a;
        $sth = $this->db->prepare('INSERT INTO requirement () VALUES (:a)');
        $sth->execute(array(':a' => $a));
    }
}

