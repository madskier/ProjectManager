$(function(){
    
    $.get('http://localhost:80/ProjectManager/project/ajaxGetProject', function(result){
        $('#ddProject').append(result);
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
    
    $.get(url, function(result){
        $('#ddArea').find('option').remove().end().append('<option value="" selected>Select an Area</option>');
        $('#ddArea').append(result);
    });
}

