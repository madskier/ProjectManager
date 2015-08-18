var gURL = globalURL;
$(function(){
        
    getProject(null, '#ddSearchProject');
         
    $('#fEditBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Bug Successfully Edited");
             document.location.href = gURL + "bug/listBug";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = gURL + "bug/ajaxGetBugsByProject/" + projectID;
    
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





