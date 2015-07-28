$(function(){
    
    getProject(null, null);
    getType(null, null);
    getEmployee(null, null);
    
    $('#fCreateAsset').submit(function() {
         var url = $(this).attr('action');
         var data = $(this).serialize();
         
         $.post(url, data, function(callback){
             alert("Asset(s) Successfully Created");
             document.location.href = "http://localhost:80/ProjectManager/asset/listAsset";
         });
         return false;
    });
});

function addTitle()
{
    var rowCount = $('#tbBasic tr').length - 3; 
    var prevRowCount = rowCount - 1;
    var nextRowCount = rowCount + 1;
    var maxRowsCount = 20;
    
    if (nextRowCount <= maxRowsCount)
    {
        $('#row' + prevRowCount).after('<tr id="row'+ rowCount +'"><td><label id="lblTitle' + rowCount +'" for="txtTitle'+ rowCount +'">Title ' + nextRowCount + '</td><td colspan="3"><input type="text" id="txtTitle'+ rowCount +'" name="txtTitle' + rowCount +'"/></tr>');
    }
    else
    {
        alert("You've added the max number of Asset Titles for this entry.");
    }
}


