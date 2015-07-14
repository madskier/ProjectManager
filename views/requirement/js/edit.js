$(function(){
        
    getProject(null, '#ddSearchProject');
         
    $('#fEditRequirement').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Requirement Successfully Edited");
             document.location.href = "http://localhost:80/ProjectManager/requirement/listReq";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = "http://localhost:80/ProjectManager/requirement/ajaxGetReqsByProject/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {            
            $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Requirement</option>');
            $('#ddSearchTitle').append(result);
        }
        else
        {
             $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}



