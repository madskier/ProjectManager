var gURL = globalURL;
$(function(){
        
    getProject(null, '#ddSearchProject');
         
    $('#fEditAsset').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Asset Successfully Edited");
             document.location.href = gURL + "asset/listAsset";
         });
         return false;
    });
});

function getTitles(projectID)
{
    var url = gURL + "asset/ajaxGetAssetsByProject/" + projectID;
    
    $.get(url, function(result)
    {
        if (projectID !== "")
        {            
            $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select an Asset</option>');
            $('#ddSearchTitle').append(result);
        }
        else
        {
             $('#ddSearchTitle').find('option').remove().end().append('<option value="" selected>Select a Project First</option>');
        }
    });
}

