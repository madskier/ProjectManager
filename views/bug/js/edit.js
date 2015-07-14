$(function(){
        
    getProject(null, '#ddSearchProject');
         
    $('#fEditBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Bug Successfully Edited");
             document.location.href = "http://localhost:80/ProjectManager/bug/listBug";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetBugsByProject/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {            
            $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Bug</option>');
            $('#ddSearchTitle').append(result);
        }
        else
        {
             $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}





