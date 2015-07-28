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


