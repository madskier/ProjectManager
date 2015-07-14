$(function(){
        
    getSearchProject();
         
    $('#fEditBug').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Bug Successfully Edited");
             document.location.href = "listBug";
         });
         return false;
    });
});

function getSearchProject()
{
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $('#ddSearchProject').find('option').remove().end().append('<option value="" selected>Select a Project</option>');
        $('#ddSearchProject').append(result);
    });
}

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

function getBugByID(bugID)
{
    var url = "http://localhost:80/ProjectManager/bug/ajaxGetBugByID/" + bugID;
    
    $.getJSON(url, function(result)
    {
        $('#txtTitle').val(result.name);
        $('#txtaDescription').val(result.description);        
        getProject(result.projectID, null);        
        getArea(result.projectID, result.areaID);
        $('#txtaRepro').val(result.reproSteps);
        getStatus(result.status, null);
        getPlatform(result.platformID);
        getEmployee(result.assignedToID, null);
        $('#hdnID').val(bugID);
    });
}



