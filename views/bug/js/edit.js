$(function(){
    
    if(window.location.href.indexOf("id") > -1) {
        var id = window.location.href.indexOf("id");
        getBugByID(id);
    }
    else
    {
        getSearchProject();
    }
     
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
        getProject(result.projectID);        
        getArea(result.projectID, result.areaID);
        $('#txtaRepro').val(result.reproSteps);
        getStatus(result.status);
        getPlatform(result.platformID);
        getEmployee(result.assignedToID);
        $('#hdnID').val(bugID);
    });
}

function getStatus(currStatus)
{
    $('#ddStatus').find('option').remove().end().append('<option value="">Select a Status</option>');
    $('#ddStatus').append('<option value="Unverified">Unverified</option>');
    $('#ddStatus').append('<option value="Verified">Verified</option>');
    $('#ddStatus').append('<option value="Active">Active</option>');
    $('#ddStatus').append('<option value="Fixed">Fixed</option>');
    $('#ddStatus').append('<option value="Cannot Reproduce">Cannot Reproduce</option>');
    $('#ddStatus').append('<option value="Deffered">Deffered</option>');
    $('#ddStatus').append('<option value="Closed">Closed</option>');
    
    $('#ddStatus').val(currStatus).attr('selected', true);
}


