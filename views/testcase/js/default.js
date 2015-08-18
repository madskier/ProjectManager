var gURL = globalURL;
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

function getArea(projectID, areaID, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddArea';
    }
    
    var url = gURL + "bug/ajaxGetArea/" + projectID;
    
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
    
    $(fieldName).find('option').remove().end().append('<option value="" selected>Select a Status</option>');    
    $(fieldName).append('<option value="Design">Design</option>');
    $(fieldName).append('<option value="Testing">Testing</option>');
    $(fieldName).append('<option value="Closed">Closed</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}

function getTCByID(tcID)
{
    var url = gURL + "testcase/ajaxGetTCByID/" + tcID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);
        $('#txtaDescription').val(result.description);        
        $('#txtaRepro').val(result.reproSteps);
        getProject(result.projectID, null);        
        getArea(result.projectID, result.areaID, null);        
        getStatus(result.status, null);        
        getEmployee(result.assignedToID, null);        
        $('#hdnID').val(tcID);
    });
}


