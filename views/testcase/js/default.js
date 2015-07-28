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
    
    $(fieldName).find('option').remove().end().append('<option value="" selected>Select a Status</option>');    
    $(fieldName).append('<option value="Design">Design</option>');
    $(fieldName).append('<option value="Testing">Testing</option>');
    $(fieldName).append('<option value="Closed">Closed</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}


