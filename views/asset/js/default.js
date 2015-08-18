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

function getType(currType, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddType';
    }
    
    $(fieldName).find('option').remove().end().append('<option value="">Select a Type</option>');
    $(fieldName).append('<option value="Image">Image</option>');
    $(fieldName).append('<option value="Animation">Animation</option>');
    $(fieldName).append('<option value="Sound Effect">Sound Effect</option>');
    $(fieldName).append('<option value="Music">Music</option>');
    $(fieldName).append('<option value="Font">Font</option>');
    $(fieldName).append('<option value="Other">Other</option>');   
    
    if (currType !== null)
    {
        $(fieldName).val(currType).attr('selected', true);
    }
}

function getStatus(currStatus, fieldName)
{
    if (fieldName === null)
    {
        fieldName = '#ddStatus';
    }
    
    $(fieldName).find('option').remove().end().append('<option value="">Select a Status</option>');
    $(fieldName).append('<option value="Design">Design</option>');
    $(fieldName).append('<option value="Concept Created">Concept Created</option>');
    $(fieldName).append('<option value="Ready For Review">Ready For Review</option>');
    $(fieldName).append('<option value="Finalized and Committed">Finalized and Committed</option>');
    $(fieldName).append('<option value="In Project">In Project</option>');
    $(fieldName).append('<option value="Deferred">Deferred</option>');   
    $(fieldName).append('<option value="Deferred">Closed</option>');
    
    if (currStatus !== null)
    {
        $(fieldName).val(currStatus).attr('selected', true);
    }
}

function getAssetByID(assetID)
{
    var url = gURL + "asset/ajaxGetAssetByID/" + assetID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);               
        getProject(result.projectID, null);        
        getStatus(result.status, null);
        getType(result.type, null);
        getEmployee(result.assignedToID, null);
        $('#hdnID').val(assetID);
    });
}


