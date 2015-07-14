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