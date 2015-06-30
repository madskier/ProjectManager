$(function(){
    
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $('#ddProject').find('option').remove().end().append('<option value="" selected>Select a Project</option>');
        $('#ddProject').append(result);
    });
    
    $.get('http://localhost:80/ProjectManager/index/ajaxGetPlatform', function(result){
        $('#ddPlatform').find('option').remove().end().append('<option value="" selected>Select a Platform</option>');
        $('#ddPlatform').append(result);
    });
    
    $.get('http://localhost:80/ProjectManager/index/ajaxGetUser', function(result){
        $('#ddAssignedTo').find('option').remove().end().append('<option value="" selected>Select a User</option>');
        $('#ddAssignedTo').append(result);
    });
    
    $('#fCreateBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert(1);
         });
         return false;
    });   
});

function populateArea(projectID)
{        
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetArea/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {
            $('#ddArea').find('option').remove().end().append('<option value="" selected>Select an Area</option>');
            $('#ddArea').append(result);
        }
        else
        {
             $('#ddArea').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}

