function getArea(projectID, areaID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddArea';
    }
    
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetArea/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {
            $(fieldName).find('option').remove().end().append('<option value="" selected>Select an Area</option>');
            $(fieldName).append(result);
            
            if (areaID !== null)
            {
                $(fieldName).val(areaID).attr('selected', true); 
            }
        }
        else
        {
             $(fieldName).find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}

function getProject(projectID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddProject';
    }
    
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $(fieldName).find('option').remove().end().append('<option value="">Select a Project</option>');
        $(fieldName).append(result);
        
        if (projectID !== null)
        {
            $(fieldName).val(projectID).attr('selected', true);
        }                
    });
}

function getEmployee(employeeID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddAssignedTo';
    }
    
    $.get('http://localhost:80/ProjectManager/index/ajaxGetUser', function(result){
        $(fieldName).find('option').remove().end().append('<option value="" selected>Select a User</option>');
        $(fieldName).append(result);
        
        if (employeeID !== null)
        {
            $(fieldName).val(employeeID).attr('selected', true);
        }
    });
}

function getStatus(currStatus, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddStatus';
    }
    
    $(fieldName).find('option').remove().end().append('<option value="">Select a Status</option>');
    $(fieldName).append('<option value="Design">Design</option>');
    $(fieldName).append('<option value="Approved">Approved</option>');
    $(fieldName).append('<option value="Implementing">Implementing</option>');
    $(fieldName).append('<option value="Ready For Test">Ready For Test</option>');
    $(fieldName).append('<option value="Testing">Testing</option>');
    $(fieldName).append('<option value="Closed">Closed</option>');
    $(fieldName).append('<option value="Deferred">Deferred</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}

function getPriority(currPriority, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddPriority';
    }

    $(fieldName).find('option').remove().end().append('<option value="">Select a Priority</option>');
    $(fieldName).append('<option value="Urgent">Urgent</option>');
    $(fieldName).append('<option value="High">High</option>');
    $(fieldName).append('<option value="Medium">Medium</option>');
    $(fieldName).append('<option value="Low">Low</option>');
    
    if (currPriority !== null)
    {
        $(fieldName).val(currPriority).attr('selected', true);
    }
}

function getCRByID(crID)
{
    var url = "http://localhost:80/ProjectManager/changerequest/ajaxGetCRByID/" + crID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);
        $('#txtaDescription').val(result.description);        
        getProject(result.projectID, null);        
        getArea(result.projectID, result.areaID, null);        
        getStatus(result.status, null);
        getPriority(result.priority, null);
        getEmployee(result.assignedToID, null);
        $('#txtaApproach').val(result.approach);
        $('#txtaQuestions').val(result.question);
        $('#txtTime').val(result.time);
        getTimeInterval(result.interval, null);
        getExistingReqs(crID, result.projectID, null);
        $('#hdnID').val(crID);
    });
}

function getTimeInterval(currInterval, fieldName)
{
     if (fieldName === null)
    {
        fieldName = '#ddTime';
    }

    $(fieldName).find('option').remove().end();
    $(fieldName).append('<option value="Hours">Hours</option>');
    $(fieldName).append('<option value="Days">Days</option>');
    $(fieldName).append('<option value="Weeks">Weeks</option>');
    
    if (currInterval !== null)
    {
        $(fieldName).val(currInterval).attr('selected', true);
    }
}

function getReqsAndArea(projectID)
{
    getArea(projectID, null, null);
    getReqsByProject(projectID, null);
}

function getReqsByProject(projectID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#mlReqMap';
    }
    var url = 'http://localhost:80/ProjectManager/requirement/ajaxGetReqsByProject/' + projectID;
    $.get(url, function(result){
        $(fieldName).find('option').remove().end();
        $(fieldName).append(result);      
    });
}

function getExistingReqs(crID, projectID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#mlReqMap';
    }
    
    getReqsByProject(projectID, fieldName);
    
    var url = 'http://localhost:80/ProjectManager/changerequest/ajaxGetReqsLinkedCR/' + crID;
    
    $.getJSON(url, function(result){
                
        if (result !== null)
        {            
            $(fieldName).val(result).prop('selected', true);          
        }
    });   
}


