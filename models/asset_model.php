<?php

class Asset_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function Insert()
    {
        $a;
        $sth = $this->db->prepare('INSERT INTO artasset () VALUES (:a)');
        $sth->execute(array(':a' => $a));
    }
}



