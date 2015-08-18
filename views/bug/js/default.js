var gURL = globalURL;
function getArea(projectID, areaID)
{        
    var url = gURL + "bug/ajaxGetArea/" + projectID;
    
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
     var url = gURL + "index/ajaxGetPlatform";
     $.get(url, function(result){
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
    
    var url = gURL + 'project/ajaxGetProject';
    $.get(url, function(result){
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
    
    var url = gURL + 'index/ajaxGetUser';
    $.get(url, function(result){
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
    $(fieldName).append('<option value="Deferred">Deferred</option>');
    $(fieldName).append('<option value="Closed">Closed</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}

function getBugByID(bugID)
{
    var url = gURL + "bug/ajaxGetBugByID/" + bugID;
    
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
        $('#txtTime').val(result.time);
        getTimeInterval(result.interval, null);
        $('#hdnID').val(bugID);
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
