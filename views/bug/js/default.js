$(function(){
          
});

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

function getProject(projectID)
{
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $('#ddProject').find('option').remove().end().append('<option value="">Select a Project</option>');
        $('#ddProject').append(result);
        
        if (projectID !== null)
        {
            $('#ddProject').val(projectID).attr('selected', true);
        }                
    });
}

function getEmployee(employeeID)
{
    $.get('http://localhost:80/ProjectManager/index/ajaxGetUser', function(result){
        $('#ddAssignedTo').find('option').remove().end().append('<option value="" selected>Select a User</option>');
        $('#ddAssignedTo').append(result);
        
        if (employeeID !== null)
        {
            $('#ddAssignedTo').val(employeeID).attr('selected', true);
        }
    });
}
