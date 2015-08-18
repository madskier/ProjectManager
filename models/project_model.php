<?php

class Project_Model extends Model
{
    function __construct() {
        parent::__construct();
    }
    
    function ajaxInsert()
    {
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        
        try
        {
            $sth = $this->db->prepare('INSERT INTO project (name) VALUES (:name)');
            $sth->execute(array(':name' => $name));
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e;
        }
        
    }
    
    function ajaxUpdate()
    {
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));        
        $name = strip_tags(filter_input(INPUT_POST, 'txtTitle'));
        
        $sth = $this->db->prepare('UPDATE project SET name = :name WHERE id = :id');
        $sth->execute(array(':name' => $name, ':id' => $id));              
    }
    
    function ajaxDelete($id)
    {
        $sth = $this->db->prepare('DELETE FROM project WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }
    
    function ajaxGetList()
    {
        $sql = 'SELECT project.id, project.name FROM project WHERE project.id > 0';        
       
        $sql .= ' ORDER BY project.id';
        
        $sth = $this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll(); 
        echo json_encode($data);
    }
    
    function ajaxGetProject()
    {
        $sth = $this->db->prepare('SELECT id, name FROM project');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();        
        
        foreach($data as $value)
        {           
            echo "<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxGetProjectByID($id)
    {
        $sth = $this->db->prepare('SELECT project.name FROM project WHERE id = :projectID');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(':projectID' => $id));
        $data = $sth->fetchAll();       
        
        foreach($data as $value)
        {                       
            $data["name"] = $value['name'];            
        }
        
        echo json_encode($data);
    }
}



