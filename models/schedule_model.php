<?php

class Schedule_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function ajaxGetList()
    {
        $sql = 'SELECT changerequest.id, changerequest.name, "Change Request" AS type , changerequest.complete_time, changerequest.time_interval FROM changerequest WHERE changerequest.status != "Closed" AND changerequest.status != "Deferred" AND changerequest.status != "Design" UNION SELECT bugreport.id, bugreport.name, "Bug" AS type, bugreport.complete_time, bugreport.time_interval FROM bugreport WHERE bugreport.status != "Closed" AND bugreport.status != "Deferred" AND bugreport.status != "Fixed" AND bugreport.status != "Unverified"';        
        
        try
        {
            $sth = $this->db->prepare($sql);
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetchAll();   
            
            foreach($data as $value)
            {
                $time = 0;
                if ($value['time_interval'] === "Days")
                {
                    $time = $value['complete_time'] * 8;
                }
                else if ($value['time_interval'] === "Weeks")
                {
                    $time = $value['complete_time'] * 40;
                }
                $value['complete_time'] = $time;
            }
                        
            echo json_encode($data); 
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }               
    }
    
    function ajaxInsert()
    {
        $startDate = strip_tags(filter_input(INPUT_POST, 'txtStartDate'));        
        $endDate = strip_tags(filter_input(INPUT_POST, 'hdnEndDate'));       
        $teamSize = strip_tags(filter_input(INPUT_POST, 'txtTeamSize'));               
        $totalHours = strip_tags(filter_input(INPUT_POST, 'hdnHours'));
        if (!$endDate)
        {
            $endDate = $startDate;
        }

        echo "start date: " . $startDate . "<br>";
        echo "end date: " . $endDate . "<br>";
        echo "team: " . $teamSize . "<br>";
        
        try
        {
            $sql = "INSERT INTO schedule (start_date, end_date, team_size, hours) VALUES (:startDate, :endDate, :teamSize, :hours)";
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth = $this->db->prepare($sql);           
            $sth->execute(array(':startDate' => $startDate, ':endDate' => $endDate, ':teamSize' => $teamSize, ':hours' => $totalHours));
            
            $sql = "SELECT id FROM schedule ORDER BY id DESC LIMIT 1";
            $sth = $this->db->prepare($sql);
            $sth->execute();
            $lastID = $sth->fetch();
            $lastID = (string)$lastID[0];
            
            foreach($_POST as $key => $value)
            {
                if (strpos($key,'Bug') !== false)
                {
                    $bugList = explode('_', $key);
                    $bugListNotIDs = array_keys($bugList, "Bug");

                    foreach($bugListNotIDs as $deleteIndex)
                    {
                        unset($bugList[$deleteIndex]);
                    }
                    foreach($bugList as $bugID)
                    {
                        $sth1 = $this->db->prepare('UPDATE bugreport SET cycle = :cycle WHERE id = :id');
                        $sth1->execute(array(':cycle' => $lastID, ':id' => $bugID));
                        echo "updated bug id: " . $bugID . "<br>";
                    }
                }
                else if (strpos($key,'ChangeRequest') !== false)
                {
                    $crList = explode('_',$key);
                    $crListNotIDs = array_keys($crList,"ChangeRequest");
                    
                    foreach($crListNotIDs as $deleteIndex)
                    {
                        unset($crList[$deleteIndex]);
                    }
                    foreach($crList as $crID)
                    {
                        $sth1 = $this->db->prepare('UPDATE changerequest SET cycle = :cycle WHERE id = :id');
                        $sth1->execute(array(':cycle' => $lastID, ':id' => $crID));
                        echo "updated cr id: " . $crID . "<br>";
                    }
                }
            }
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }        
    }
    
    function ajaxUpdate()
    {
        $startDate = strip_tags(filter_input(INPUT_POST, 'txtStartDate'));        
        $endDate = strip_tags(filter_input(INPUT_POST, 'hdnEndDate'));       
        $teamSize = strip_tags(filter_input(INPUT_POST, 'txtTeamSize'));               
        $totalHours = strip_tags(filter_input(INPUT_POST, 'hdnHours'));
        $id = strip_tags(filter_input(INPUT_POST, 'hdnID'));
        if (!$endDate)
        {
            $endDate = $startDate;
        }

        echo "start date: " . $startDate . "<br>";
        echo "end date: " . $endDate . "<br>";
        echo "team: " . $teamSize . "<br>";
        
        try
        {
            $sql = "UPDATE schedule SET schedule.start_date = :startDate, schedule.end_date = :endDate, schedule.team_size = :teamSize, schedule.hours = :hours WHERE schedule.id = :id";
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth = $this->db->prepare($sql);           
            $sth->execute(array(':startDate' => $startDate, ':endDate' => $endDate, ':teamSize' => $teamSize, ':hours' => $totalHours, ':id' => $id));
                                   
            foreach($_POST as $key => $value)
            {
                if (strpos($key,'Bug') !== false)
                {
                    $bugList = explode('_', $key);
                    $bugListNotIDs = array_keys($bugList, "Bug");

                    foreach($bugListNotIDs as $deleteIndex)
                    {
                        unset($bugList[$deleteIndex]);
                    }
                    foreach($bugList as $bugID)
                    {
                        $sth1 = $this->db->prepare('UPDATE bugreport SET cycle = :cycle WHERE id = :id');
                        $sth1->execute(array(':cycle' => $id, ':id' => $bugID));
                        echo "updated bug id: " . $bugID . "<br>";
                    }
                }
                else if (strpos($key,'ChangeRequest') !== false)
                {
                    $crList = explode('_',$key);
                    $crListNotIDs = array_keys($crList,"ChangeRequest");
                    
                    foreach($crListNotIDs as $deleteIndex)
                    {
                        unset($crList[$deleteIndex]);
                    }
                    foreach($crList as $crID)
                    {
                        $sth1 = $this->db->prepare('UPDATE changerequest SET cycle = :cycle WHERE id = :id');
                        $sth1->execute(array(':cycle' => $id, ':id' => $crID));
                        echo "updated cr id: " . $crID . "<br>";
                    }
                }
            }
        }
        catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }       
    }
    
    function ajaxGetCycleByID($id)
    {
        try 
        {
            $sth = $this->db->prepare('SELECT schedule.start_date, schedule.end_date, schedule.team_size FROM schedule WHERE id = :cycleID');
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute(array(':cycleID' => $id));
            $data = $sth->fetchAll();       

            foreach($data as $value)
            {            
                $data["startDate"] = $value['start_date'];            
                $data["endDate"] = $value['end_date'];            
                $data["teamSize"] = $value['team_size'];                                    
            }

            echo json_encode($data); 
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }        
    }
    
    function ajaxGetListByID($id)
    {
        $sql = 'SELECT changerequest.id, changerequest.name, "Change Request" AS type, changerequest.complete_time, changerequest.time_interval FROM changerequest WHERE changerequest.status != "Closed" AND changerequest.status != "Deferred" AND changerequest.status != "Design" AND changerequest.cycle = :id UNION SELECT bugreport.id, bugreport.name, "Bug" AS type, bugreport.complete_time, bugreport.time_interval FROM bugreport WHERE bugreport.status != "Closed" AND bugreport.status != "Deferred" AND bugreport.status != "Fixed" AND bugreport.status != "Unverified" AND bugreport.cycle = :id';        
        
        try
        {
            $sth = $this->db->prepare($sql);
            $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute(array(':id' => $id));
            $data = $sth->fetchAll();   
            
            foreach($data as $value)
            {
                $time = 0;
                if ($value['time_interval'] === "Days")
                {
                    $time = $value['complete_time'] * 8;
                }
                else if ($value['time_interval'] === "Weeks")
                {
                    $time = $value['complete_time'] * 40;
                }
                $value['complete_time'] = $time;
            }
                        
            echo json_encode($data); 
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }           
    }
    
    function ajaxGetCycleList()
    {
        try
        {
            $sql = 'SELECT schedule.id, schedule.start_date, schedule.end_date, schedule.hours FROM schedule';
            $sth = $this->db->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetchAll(); 
            echo json_encode($data);
            $sth = null;
        } 
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
    
    function ajaxGetCycle()
    {
        $sth = $this->db->prepare('SELECT id, end_date FROM schedule');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();        
        
        foreach($data as $value)
        {           
            echo "<option value='" . $value['id'] . "'>(ID: " . $value['id'] . ") Ending: " . $value['end_date'] . "</option>";
        }
        unset($value);
    }
    
    function ajaxDelete($id)
    {
        try
        { 
            $sth = $this->db->prepare('DELETE FROM schedule WHERE id = :id');
            $sth->execute(array(':id' => $id));            
        } 
        catch (PDOException $ex)
        {
           echo $ex->getMessage();
        }
    }   
    
}