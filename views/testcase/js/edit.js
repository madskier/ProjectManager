var gURL = globalURL;
$(function(){
    
    getProject(null, '#ddSearchProject');    
    
    $('#fEditTC').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
                          
            alert("Test Case Successfully Edited");             
            document.location.href = gURL + "testcase/listTC";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = gURL + "testcase/ajaxGetTCsByProject/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {            
            $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Test Case</option>');
            $('#ddSearchTitle').append(result);
        }
        else
        {
             $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}


