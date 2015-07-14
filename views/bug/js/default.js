function getArea(projectID, areaID)
{        
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetArea/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {
            $('#ddArea').find('option').remove().end().append('<option value="" selected>Select an Area</option>');
            $('#ddArea').append(result);
            
            if (areaID !== null)
            {
                $('#ddArea').val(areaID).attr('selected', true); 
            }
        }
        else
        {
             $('#ddArea').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}

function getPlatform(platformID)
{
     $.get('http://localhost:80/ProjectManager/index/ajaxGetPlatform', function(result){
        $('#ddPlatform').find('option').remove().end().append('<option value="" selected>Select a Platform</option>');
        $('#ddPlatform').append(result);
        
        if (platformID !== null)
        {
            $('#ddPlatform').val(platformID).attr('selected', true); 
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
    $(fieldName).append('<option value="Unverified">Unverified</option>');
    $(fieldName).append('<option value="Verified">Verified</option>');
    $(fieldName).append('<option value="Active">Active</option>');
    $(fieldName).append('<option value="Fixed">Fixed</option>');
    $(fieldName).append('<option value="Cannot Reproduce">Cannot Reproduce</option>');
    $(fieldName).append('<option value="Deffered">Deffered</option>');
    $(fieldName).append('<option value="Closed">Closed</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}

function getBugByID(bugID)
{
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetBugByID/" + bugID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);
        $('#txtaDescription').val(result.description);        
        getProject(result.projectID, null);        
        getArea(result.projectID, result.areaID);
        $('#txtaRepro').val(result.reproSteps);
        getStatus(result.status, null);
        getPlatform(result.platformID);
        getEmployee(result.assignedToID, null);
        $('#hdnID').val(bugID);
    });
}
