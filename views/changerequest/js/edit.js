var gURL = globalURL;
$(function(){
    
    getProject(null, '#ddSearchProject');    
    
    $('#fEditCR').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Change Request Successfully Edited");
             document.location.href = gURL + "changerequest/listCR";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = gURL + "changerequest/ajaxGetCRsByProject/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {            
            $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Change Request</option>');
            $('#ddSearchTitle').append(result);
        }
        else
        {
             $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}

