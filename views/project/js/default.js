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

function getProjectByID(projectID)
{
    var url = gURL + "project/ajaxGetProjectByID/" + projectID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);        
        $('#hdnID').val(projectID);
    });
}




