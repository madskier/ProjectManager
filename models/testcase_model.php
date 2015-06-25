<?php

class Testcase_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function ajaxInsert()
    {
        $a;
        $sth = $this->db->prepare('INSERT INTO testcase () VALUES (:a)');
        $sth->execute(array(':a' => $a));
    }
}
