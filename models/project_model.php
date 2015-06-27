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
    
    function ajaxGetProject()
    {
        $sth = $this->db->prepare('SELECT name FROM Project');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        //echo "<select id='ddProject' name='ddProject>";
        
        foreach($data as $value)
        {
            $separater = join(",", $value);
            echo "<option value='" . $separater . "'>" . $separater . "</option>";
        }
        unset($value);
    }
}



